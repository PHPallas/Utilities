<?php

/*
 * This file is part of the PHPallas package.
 *
 * (c) Sina Kuhestani <sinakuhestani@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPallas\Utilities;

use Exception;

class SqlUtility
{
    public const DATABASE_CUBIRD = 1;
    public const DATABASE_FREETDS = 2;
    public const DATABASE_SQLSERVER = 3;
    public const DATABASE_SYBASE = 4;
    public const DATABASE_FIREBIRD = 5;
    public const DATABASE_IBMDB2 = 6;
    public const DATABASE_IBMINFORMIX = 7;
    public const DATABASE_MYSQL = 8;
    public const DATABASE_MARIADB = 9;
    public const DATABASE_ORACLE = 10;
    public const DATABASE_POSTGRESQL = 11;
    public const DATABASE_SQLITE = 12;
    public const DATABASE_ODBC = 13;
    public const DATABASE_AZURE = 14;

    private const JOIN_SUPPORT = [
        "left" => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
        "right" => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14],
        "inner" => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
        "full" => [1, 3, 4, 5, 6],
        "cross" => [3, 8, 9],
    ];

    /**
     * selectQuery is a versatile function that dynamically builds a SQL SELECT 
     * statement based on the provided parameters. It handles various SQL syntax 
     * differences across multiple database systems, ensuring that the correct 
     * syntax is used for limiting results, grouping, ordering, and filtering 
     * data. The method is designed to be flexible and reusable for different 
     * database interactions.
     * @param string|array $table
     * @param string|array|null $fields
     * @param array $where
     * @param array $order
     * @param array $group
     * @param array $having
     * @param mixed $limit
     * @param int $database
     * @return array
     */
    public static function selectQuery($table, $fields = "*", $joins = [], array $where = [], $order = [], $group = [], $having = [], $limit = null, $database = 9, $distinct = false)
    {
        $select = "SELECT";
        if ($distinct)
            $select = "SELECT DISTINCT";
        $params = [];
        if (is_array($table))
        {
            $tableName = $table["table"] ?? $table[0];
            $alias = $table["alias"] ?? $table[1] ?? null;
            $tablePhrase = $tableName;
            if ($alias)
                $tablePhrase .= " AS $alias";
            $table = $tableName;
        }
        else
        {
            $tablePhrase = $table;
        }
        if (is_array($fields))
        {
            $fields = static::buildFieldsClause($fields);
        }
        if (null === $fields)
        {
            $fields = "*";
        }
        $whereClause = "";
        if (!ArrayUtility::isEmpty($where))
        {
            $whereClause .= "WHERE ";
            $whereClause .= static::buildWhereClause($where, $params);
        }
        $havingClause = "";
        if ($having && !ArrayUtility::isEmpty($having))
        {
            $havingClause .= "HAVING ";
            $havingClause .= static::buildWhereClause($having, $params);
        }
        $orderClause = "";
        if ($order && !ArrayUtility::isEmpty($order))
        {
            $orderClause = "ORDER BY ";
            $orderClause .= static::buildOrderClause($order);
        }
        $groupClause = "";
        if ($group && !ArrayUtility::isEmpty($group))
        {
            $groupClause = "GROUP BY ";
            $groupClause .= StringUtility::fromArray($group, ",");
        }
        $joinClause = "";
        if (is_array($joins) && !ArrayUtility::isEmpty($joins))
        {
            foreach ($joins as $join)
            {
                $type = StringUtility::transformToUppercase((string) ($join["type"] ?? ""));
                $jTable = $join["table"];
                $jTableAlias = $join["alias"] ?? $jTable;
                $jTablePhrase = $jTable;
                if ($jTableAlias !== $jTable)
                {
                    $jTablePhrase .= " AS $jTableAlias";
                }
                $joinClause .= " $type JOIN $jTablePhrase";
                $on = $join["on"] ?? [];
                $onPhrase = static::buildWhereClause($on, $params);
                $joinClause .= " ON $onPhrase";
            }
        }
        if ($limit)
        {
            switch ($database)
            {
                case static::DATABASE_MYSQL:
                case static::DATABASE_MARIADB:
                case static::DATABASE_POSTGRESQL:
                case static::DATABASE_SQLITE:
                case static::DATABASE_IBMINFORMIX:
                case static::DATABASE_FIREBIRD:
                case static::DATABASE_CUBIRD:
                case static::DATABASE_ODBC:
                    $sql = "$select $fields FROM $tablePhrase $joinClause $whereClause $groupClause $havingClause $orderClause LIMIT $limit";
                    break;
                case static::DATABASE_IBMDB2:
                    $sql = "$select $fields FROM $tablePhrase $joinClause $whereClause $groupClause $havingClause $orderClause FETCH FIRST $limit ROWS ONLY";
                    break;
                case static::DATABASE_SQLSERVER:
                case static::DATABASE_AZURE:
                case static::DATABASE_FREETDS:
                case static::DATABASE_SYBASE:
                    $sql = "$select TOP $limit $fields FROM $tablePhrase $joinClause $whereClause $groupClause $havingClause $orderClause";
                    break;
                case static::DATABASE_ORACLE:
                    $sql = "$select $fields FROM $tablePhrase $joinClause $whereClause $groupClause $havingClause $orderClause ROWNUM <= $limit";
                    break;
                default:
                    $sql = "--------------------------------------";
            }
        }
        else
        {
            $sql = "$select $fields FROM $tablePhrase $joinClause $whereClause $groupClause $havingClause $orderClause";
        }
        for ($t = 0; $t < 10; $t++)
        {
            $sql = str_replace("  ", " ", $sql);
        }
        $sql = StringUtility::dropFromSides($sql) . ";";
        return static::responder($sql, $params);
    }

    /**
     * The updateQuery method is a flexible function that constructs a SQL 
     * UPDATE statement dynamically based on the provided parameters. It handles 
     * the creation of the SET and WHERE clauses, ensuring proper parameter 
     * binding to prevent SQL injection. This method is designed to be reusable 
     * for updating rows in different tables with varying conditions.
     * @param string $table
     * @param array $values
     * @param array $where
     * @return array
     */
    public static function updateQuery($table, $values, $where, $return = false, $limit = null, $database = 9)
    {
        $params = [];
        $set = [];
        foreach ($values as $name => $value)
        {
            $param = ":$name";
            $params[$param] = $value;
            $set[] = "$name = $param";
        }
        $setClause = StringUtility::fromArray($set, ", ");
        $whereClause = "";
        if (!ArrayUtility::isEmpty($where))
        {
            $whereClause .= "WHERE ";
            $whereClause .= static::buildWhereClause($where, $params);
        }
        $limitPhrase = "";
        if ($limit && ArrayUtility::has([], $database))
        {
            $limitPhrase = "LIMIT $limit";
        }
        $outputPhrase = "";
        $returningPhrase = "";
        if ($return)
        {
            switch ($database)
            {
                case static::DATABASE_AZURE:
                case static::DATABASE_SQLSERVER:
                    $outputFields = ArrayUtility::transform(ArrayUtility::getKeys($set), function ($key, $value)
                    {
                        return [$key, "INSERTED.$value"];
                    });
                    $outputPhrase = "OUTPUT " . StringUtility::fromArray($outputFields, ",");
                    break;
                case static::DATABASE_POSTGRESQL:
                case static::DATABASE_FIREBIRD:
                case static::DATABASE_SQLITE:
                case static::DATABASE_IBMDB2:
                case static::DATABASE_IBMINFORMIX:
                    $returningPhrase .= "RETURNING " . StringUtility::fromArray($set, ",");
                    break;
            }
        }
        $sql = "UPDATE $table SET $setClause $outputPhrase $whereClause $limitPhrase $returningPhrase";
        for ($t = 0; $t < 100; $t++)
        {
            $sql = str_replace("  ", " ", $sql);
        }
        $sql = StringUtility::dropFromSides($sql) . ";";
        return static::responder($sql, $params);
    }

    /**
     * The deleteQuery method is a straightforward function that constructs a 
     * SQL DELETE statement dynamically based on the provided parameters. It 
     * builds the WHERE clause to specify which rows to delete, ensuring proper 
     * parameter binding to prevent SQL injection. This method is designed to be 
     * reusable for deleting records from different tables based on various 
     * conditions.
     * @param string $table
     * @param array $where
     * @return array
     */
    public static function deleteQuery($table, $where = [], $order = [], $limit = null, $alias = null, $database = 9)
    {
        $params = [];
        $sql = "DELETE FROM $table";
        if ($alias)
        {
            $sql .= " AS $alias";
        }
        if (!ArrayUtility::isEmpty($where))
        {
            $sql .= " WHERE ";
            $sql .= static::buildWhereClause($where, $params);
        }
        if (!ArrayUtility::isEmpty($order))
        {
            switch ($database)
            {
                case static::DATABASE_MYSQL:
                case static::DATABASE_SQLITE:
                case static::DATABASE_MARIADB:
                case static::DATABASE_POSTGRESQL:
                    $sql .= " ORDER BY ";
                    $sql .= static::buildOrderClause($order);
                    break;
            }
        }
        if ($limit)
        {
            switch ($database)
            {
                case static::DATABASE_MYSQL:
                case static::DATABASE_MARIADB:
                case static::DATABASE_POSTGRESQL:
                case static::DATABASE_SQLITE:
                case static::DATABASE_IBMINFORMIX:
                    $sql .= " LIMIT $limit";
                    break;
            }
        }
        $sql = StringUtility::dropFromSides($sql) . ";";
        return static::responder($sql, $params);
    }

    /**
     * This function is designed to handle both single-row and multi-row 
     * inserts into a database table. It dynamically constructs the SQL query 
     * and ensures that parameter names are unique to prevent conflicts during 
     * execution.
     * @param string $table
     * @param array $values
     * @return array
     */
    public static function insertQuery($table, $values, $ignore = false, $return = false, $database = 9)
    {
        $sql = "";
        $fields = [];
        $params = [];
        $paramClauseStock = [];
        if (ArrayUtility::isAssociative($values))
        {
            foreach ($values as $name => $value)
            {
                $param = ":$name";
                $params[$param] = $value;
                $fields[] = $name;
            }
            $paramClauseStock[] = "(" . StringUtility::fromArray(array_keys($params), ", ") . ")";
        }
        else
        {
            if (ArrayUtility::has([static::DATABASE_ORACLE . static::DATABASE_SYBASE], $database))
            {
                foreach ($values as $item)
                {
                    $sql .= static::insertQuery($table, $item, $ignore, $return, $database);
                }
                $sql = StringUtility::dropFromSides($sql) . ";";
                return static::responder($sql, $params);
            }
            else
            {
                $paramClauseStock = [];
                foreach ($values as $item)
                {
                    $iParams = [];
                    foreach ($item as $name => $value)
                    {
                        $i = 0;
                        $param = ":$name";
                        while (ArrayUtility::hasKey($params, $param))
                        {
                            $i++;
                            $param = ":$name$i";
                        }
                        $params[$param] = $value;
                        $iParams[] = $param;
                        if (!ArrayUtility::has($fields, $name))
                        {
                            $fields[] = $name;
                        }
                    }
                    $paramClauseStock[] = "(" . StringUtility::fromArray($iParams, ", ") . ")";
                }
            }
        }
        $paramClause = StringUtility::fromArray($paramClauseStock, ", ");
        $fieldClause = "(" . StringUtility::fromArray($fields, ", ") . ")";
        if ($ignore and ArrayUtility::has([static::DATABASE_MYSQL, static::DATABASE_MARIADB, static::DATABASE_SQLITE], $database))
        {
            $ignorePhrase = "IGNORE";
            if (static::DATABASE_SQLITE === $database)
                $ignorePhrase = "OR IGNORE";
            $sql = "INSERT $ignorePhrase INTO $table $fieldClause";
        }
        else
        {
            $sql = "INSERT INTO $table $fieldClause";
        }
        $attachedSQL = "";
        $endSQL = "";
        if ($return)
        {
            switch ($database)
            {
                case static::DATABASE_SQLSERVER:
                case static::DATABASE_SYBASE:
                case static::DATABASE_AZURE:
                    $outputFields = ArrayUtility::transform(($fields), function ($key, $value)
                    {
                        return [$key, "INSERTED.$value"];
                    });
                    $sql .= " OUTPUT " . StringUtility::fromArray($outputFields, ",");
                    break;
                case static::DATABASE_FIREBIRD:
                case static::DATABASE_IBMDB2:
                case static::DATABASE_IBMINFORMIX:
                case static::DATABASE_POSTGRESQL:
                case static::DATABASE_SQLITE:
                    $endSQL = " RETURNING " . StringUtility::fromArray($fields, ", ");
                    break;
                case static::DATABASE_MYSQL:
                case static::DATABASE_MARIADB:
                    $attachedSQL = " SELECT " . StringUtility::fromArray($fields, ", ") . " FROM $table WHERE id = LAST_INSERT_ID();";
                    break;
                default:
                    break;
            }
        }

        $sql .= " VALUES $paramClause$endSQL";
        if ($ignore && static::DATABASE_POSTGRESQL === $database)
        {
            $sql .= " ON CONFLICT DO NOTHING";
        }
        $sql = StringUtility::dropFromSides($sql) . ";" . $attachedSQL;
        return static::responder($sql, $params);
    }

    /**
     * Create union query
     * @param mixed $selects
     * @param mixed $full
     * @return array{params: mixed, sql: string}
     */
    public static function unionQuery($selects, $full = false)
    {
        $params = [];
        $sql = "";
        foreach ($selects as $select)
        {
            [$sql, $params] = call_user_func_array([static::class, "insertQuery"], $select);
            $sql = StringUtility::dropFromEnd($sql, ";");
        }
        $sql = StringUtility::dropFromSides($sql) . ";";
        return static::responder($sql, $params);
    }

        /**
     * Creates a SQL CREATE TABLE statement.
     * @param string $tableName
     * @param array $columns Associative array of column names and data types
     * @param array $options Additional options like PRIMARY KEY, UNIQUE, etc.
     * @return array
     * @since 1.1.0
     */
    public static function createTable($tableName, array $columns, array $options = [])
    {
        $columnDefinitions = [];
        foreach ($columns as $name => $type)
        {
            $columnDefinitions[] = "$name $type";
        }
        $columnsClause = implode(", ", $columnDefinitions);

        $optionsClause = "";
        if (!empty($options))
        {
            $optionsClause = ", " . implode(", ", $options);
        }

        $sql = "CREATE TABLE $tableName ($columnsClause$optionsClause);";
        return static::responder($sql, []);
    }

    /**
     * Alters an existing table to add or drop columns.
     * @param string $tableName
     * @param array $addColumns Associative array of column names and data types to add
     * @param array $dropColumns Array of column names to drop
     * @return array
     * @since 1.1.0
     */
    public static function alterTable($tableName, array $addColumns = [], array $dropColumns = [], $database = 9)
    {
        $addClauses = [];
        foreach ($addColumns as $name => $type)
        {
            if ($database === static::DATABASE_POSTGRESQL || $database === static::DATABASE_SQLSERVER || $database === static::DATABASE_AZURE)
            {
                $addClauses[] = "ADD $name $type"; // PostgreSQL and SQL Server
            }
            else
            {
                $addClauses[] = "ADD COLUMN $name $type"; // MySQL, MariaDB, SQLite
            }
        }
        $addClause = implode(", ", $addClauses);

        $dropClause = !empty($dropColumns) ? "DROP " . implode(", ", $dropColumns) : "";

        $sql = "ALTER TABLE $tableName ";
        if (!empty($addClause))
        {
            $sql .= "$addClause ";
        }
        if (!empty($dropClause))
        {
            $sql .= "$dropClause ";
        }
        $sql = rtrim($sql) . ";";

        return static::responder($sql, []);
    }

    /**
     * Drops an existing table.
     * @param string $tableName
     * @return array
     * @since 1.1.0
     */
    public static function dropTable($tableName)
    {
        $sql = "DROP TABLE $tableName;";
        return static::responder($sql, []);
    }

    /**
     * Modifies an existing column in a table.
     * @param string $tableName
     * @param string $columnName
     * @param string $newDefinition New data type or attributes
     * @return array
     * @since 1.1.0
     */
    public static function modifyColumn($tableName, $columnName, $newDefinition, $database = 9)
    {
        if ($database === static::DATABASE_POSTGRESQL || $database === static::DATABASE_SQLSERVER || $database === static::DATABASE_AZURE)
        {
            $sql = "ALTER TABLE $tableName ALTER COLUMN $columnName $newDefinition;";
        }
        elseif ($database === static::DATABASE_MYSQL || $database === static::DATABASE_MARIADB)
        {
            $sql = "ALTER TABLE $tableName MODIFY $columnName $newDefinition;";
        }
        elseif ($database === static::DATABASE_SQLITE)
        {
            // SQLite does not support modifying column types directly
            throw new Exception("SQLite does not support modifying column types directly.");
        }
        else
        {
            throw new Exception("Unsupported database type for modifying columns.");
        }

        return static::responder($sql, []);
    }

    /**
     * Adds an index to a table.
     * @param string $tableName
     * @param string $indexName
     * @param array $columns Array of column names to index
     * @return array
     * @since 1.1.0
     */
    public static function addIndex($tableName, $indexName, array $columns)
    {
        $columnsClause = implode(", ", $columns);
        $sql = "CREATE INDEX $indexName ON $tableName ($columnsClause);";
        return static::responder($sql, []);
    }

    /**
     * Drops an existing index from a table.
     * @param string $tableName
     * @param string $indexName
     * @return array
     * @since 1.1.0
     */
    public static function dropIndex($tableName, $indexName, $database = 9)
    {
        if ($database === static::DATABASE_SQLSERVER || $database === static::DATABASE_AZURE)
        {
            $sql = "DROP INDEX $indexName ON $tableName;";
        }
        else
        {
            $sql = "DROP INDEX $indexName;";
        }
        return static::responder($sql, []);
    }

    /**
     * Creates a new database.
     *
     * @param int $database The database type constant.
     * @param string $dbName The name of the database to create.
     * @return array The SQL statement and parameters for execution.
     * @throws Exception If the database type is unsupported or if SQLite is used.
     * @since 1.1.0
     */
    public static function createDatabase($dbName, $database)
    {
        switch ($database) {
            case static::DATABASE_MYSQL:
            case static::DATABASE_MARIADB:
                $sql = "CREATE DATABASE `$dbName`;";
                break;
            case static::DATABASE_POSTGRESQL:
                $sql = "CREATE DATABASE \"$dbName\";";
                break;
            case static::DATABASE_SQLSERVER:
            case static::DATABASE_AZURE:
                $sql = "CREATE DATABASE [$dbName];";
                break;
            case static::DATABASE_ORACLE:
                $sql = "CREATE USER \"$dbName\" IDENTIFIED BY password;"; // Oracle uses users instead of databases
                break;
            case static::DATABASE_SQLITE:
                // SQLite doesn't have a CREATE DATABASE command; it creates the database file on connection.
                throw new Exception("SQLite does not support CREATE DATABASE command directly.");
            default:
                throw new Exception("Unsupported database type for creating databases.");
        }

        return static::responder($sql, []);
    }

    /**
     * Drops an existing database.
     *
     * @param int $database The database type constant.
     * @param string $dbName The name of the database to drop.
     * @return array The SQL statement and parameters for execution.
     * @throws Exception If the database type is unsupported or if SQLite is used.
     * @since 1.1.0
     */
    public static function dropDatabase($dbName, $database)
    {
        switch ($database) {
            case static::DATABASE_MYSQL:
            case static::DATABASE_MARIADB:
                $sql = "DROP DATABASE `$dbName`;";
                break;
            case static::DATABASE_POSTGRESQL:
                $sql = "DROP DATABASE \"$dbName\";";
                break;
            case static::DATABASE_SQLSERVER:
            case static::DATABASE_AZURE:
                $sql = "DROP DATABASE [$dbName];";
                break;
            case static::DATABASE_ORACLE:
                $sql = "DROP USER \"$dbName\" CASCADE;"; // Oracle uses users instead of databases
                break;
            case static::DATABASE_SQLITE:
                // SQLite does not support DROP DATABASE; you would delete the file manually.
                throw new Exception("SQLite does not support DROP DATABASE command directly.");
            default:
                throw new Exception("Unsupported database type for dropping databases.");
        }

        return static::responder($sql, []);
    }

    public static function buildOrderClause($order)
    {
        $output = "";
        if (ArrayUtility::isAssociative($order))
        {
            foreach ($order as $field => $type)
            {
                if (is_int($field))
                {
                    $field = $type;
                    $type = "asc";
                }
                $output .= "$field " . StringUtility::transformToUppercase($type) . ", ";
            }
            $output = StringUtility::dropFromEnd($output, ", ");
        }
        else
        {
            $output = StringUtility::fromArray($order, " ASC, ");
            if ($output)
                $output .= " ASC";
        }
        return $output;
    }

    public static function buildWhereClause($conditions, &$params)
    {
        $sql = "";
        if (ArrayUtility::isScalar($conditions))
        {
            if (3 === ArrayUtility::estimateSize($conditions))
            {
                $param = null;
                $value = null;
                $field = null;
                $reverse = false;
                $f1 = $conditions[0];
                $operation = StringUtility::transformToUppercase($conditions[1]);
                $f2 = $conditions[2];

                if (StringUtility::isStartedBy((string) $f1, "@p:"))
                {
                    $field = str_replace("@p:", "", $f1);
                    $param = ":$field";
                    $value = $f2;
                    $reverse = false;
                }
                elseif (StringUtility::isStartedBy((string) $f2, "@p:"))
                {
                    $field = str_replace("@p:", "", $f2);
                    $param = ":$field";
                    $value = $f1;
                    $reverse = true;
                }
                else
                {
                    $field = $f1;
                    $value = $f2;
                }

                if ($param)
                {
                    $i = 1;
                    while (ArrayUtility::hasKey($params, $param))
                    {
                        $i++;
                        $param = ":$field$i";
                    }
                    $params[$param] = $value;
                }
                else
                {
                    $param = $value;
                }
                if ($reverse === true)
                {
                    $tmp = $param;
                    $param = $field;
                    $field = $tmp;
                }
                switch ($operation)
                {
                    case "=":
                        $sql .= "$field = $param";
                        break;
                    case "!=":
                    case "<>":
                    case "~=":
                        $sql .= "$field <> $param";
                        break;
                    case "<":
                        $sql .= "$field < $param";
                        break;
                    case "!<":
                    case "~<":
                    case ">=":
                    case ">>":
                        $sql .= "$field >= $param";
                        break;
                    case ">":
                        $sql .= "$field > $param";
                        break;
                    case "!>":
                    case "~>":
                    case "<=":
                    case "<<":
                        $sql .= "$field <= $param";
                        break;
                    case "IN":
                        $sql .= "$field IN($param)";
                        break;
                    case "NIN":
                    case "NOT IN":
                    case "!IN":
                    case "~IN":
                        $sql .= "$field NOT IN($param)";
                        break;
                    case "L":
                    case "LIKE":
                    case "===":
                        $sql .= "$field LIKE $param";
                        break;
                    case "NL":
                    case "!L":
                    case "~L":
                    case "NOT LIKE":
                    case "!LIKE":
                    case "~LIKE":
                    case "!==":
                    case "~==":
                        $sql .= "$field NOT LIKE $param";
                        break;
                    default: // ... + IS + NULL, ... + IS NOT + NULL
                        $sql .= "$field $operation $param";
                        break;
                }

            }
            elseif (4 === ArrayUtility::estimateSize($conditions))
            {
                $field = $conditions[0];
                $operation = StringUtility::transformToUppercase($conditions[1]);
                $value1 = $conditions[2];
                $value2 = $conditions[3];
                $i = 1;
                $param1 = ":$field";
                while (ArrayUtility::hasKey($params, $param1))
                {
                    $i++;
                    $param1 = ":$field$i";
                }
                $params[$param1] = $value1;
                $param2 = ":$field";
                $i = 1;
                while (ArrayUtility::hasKey($params, $param2))
                {
                    $i++;
                    $param2 = ":$field$i";
                }
                $params[$param2] = $value2;
                switch ($operation)
                {
                    case "BETWEEN":
                        $sql .= "$field BETWEEN $param1 AND $param2";
                        break;
                    case "NB":
                    case "!B":
                    case "~B":
                    case "NOT BETWEEN":
                    case "!BETWEEN":
                    case "~BETWEEN":
                        $sql .= "$field NOT BETWEEN $param1 AND $param2)";
                        break;
                    case "IN":
                        $sql .= "$field IN($param1, $param2)";
                        break;
                    case "NIN":
                    case "NOT IN":
                    case "!IN":
                    case "~IN":
                        $sql .= "$field NOT IN($param1, $param2)";
                        break;
                    default:
                        $sql .= "$field $operation ($param1, $param2)";
                        break;

                }
            }
            elseif (4 < ArrayUtility::estimateSize($conditions))
            {
                $field = $conditions[0];
                $operation = StringUtility::transformToUppercase($conditions[1]);
                $sql .= "$field $operation (";
                $inside = "";
                for ($i = 2; $i < count($conditions); $i++)
                {
                    $j = 1;
                    $value = $conditions[$i];
                    $param = ":$field";
                    while (ArrayUtility::hasKey($params, $param))
                    {
                        $j++;
                        $param = ":$field$j";
                    }
                    $inside .= "$param,";
                    $params[$param] = $value;
                }
                $inside = StringUtility::dropFromEnd($inside, ",");
                $sql .= "$inside)";
            }
        }
        else
        {
            foreach ($conditions as $condition)
            {
                if (is_array($condition))
                {
                    $sql .= "(" . static::buildWhereClause($condition, $params) . ")";
                }
                else
                {
                    $sql .= " " . StringUtility::transformToUppercase((string) $condition) . " ";
                }
            }
        }
        return $sql;
    }
    private static function buildFieldsClause(array $fields)
    {
        if (ArrayUtility::isAssociative($fields))
        {
            $fields = ArrayUtility::transform(
                $fields,
                function ($key, $value)
                {
                    if (is_array($value))
                    {
                        $v = $key;
                        $expression = $value["expression"] ?? $value[0] ?? null;
                        if ($expression)
                        {
                            $v = "$expression";
                        }
                        $function = $value["function"] ?? $value[1] ?? null;
                        if ($function)
                        {
                            $v = "$function($v)";
                        }
                        $alias = $value["alias"] ?? $value[2] ?? null;
                        if ($alias)
                        {
                            $v = "($v) AS $alias";
                        }
                        return [$key, $v];
                    }
                    else
                    {
                        return [$key, "$key AS $value"];
                    }
                }
            );
        }
        else
        {
            $fields = ArrayUtility::transform(
                $fields,
                function ($key, $value)
                {
                    return [$key, "$value"];
                }
            );
        }
        return StringUtility::fromArray($fields, ", ");

    }

    private static function responder($sql, $params)
    {
        return [
            "sql" => StringUtility::dropFromSides($sql, " "),
            "params" => $params
        ];
    }
}