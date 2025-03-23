<?php

declare(strict_types=1);

namespace PHPallas\Utilities;

class SqlUtility
{

    const DATABASE_MYSQL = 1;
    const DATABASE_MARIADB = 2;
    const DATABASE_SQLSERVER = 3;
    const DATABASE_ORACLE = 4;
    const DATABASE_ORACLE_NEW = 4;
    const DATABASE_POSTGRESQL = 5;
    const DATABASE_SQLITE = 6;

    # --------------------------------------------------------------------------
    # Select Methods
    # --------------------------------------------------------------------------
    #   Use this methods to create a select command.
    #
    #   Contributing Roles:
    #   [1]. All creational methods MUST starts in select and follow a 
    #        camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * selectQuery is a versatile function that dynamically builds a SQL SELECT 
     * statement based on the provided parameters. It handles various SQL syntax 
     * differences across multiple database systems, ensuring that the correct 
     * syntax is used for limiting results, grouping, ordering, and filtering 
     * data. The method is designed to be flexible and reusable for different 
     * database interactions.
     * @param string $table
     * @param string|array $fields
     * @param array $where
     * @param array $order
     * @param array $group
     * @param array $having
     * @param mixed $limit
     * @param int $database
     * @return array
     */
    public static function selectQuery(string $table, string|array $fields = "*", array $where = [], array $order = [], array $group = [], array $having = [], ?int $limit = null, int $database = 1): array
    {
        $params = [];
        if (is_array($fields)) {
            $fields = static::buildFieldsClause($fields);
        }
        $whereClause = "";
        if (!ArrayUtility::isEmpty($where)) {
            $whereClause .= "WHERE ";
            $whereClause .= static::buildWhereClause($where, $params);
        }
        $havingClause = "";
        if (!ArrayUtility::isEmpty($having)) {
            $havingClause .= "HAVING ";
            $havingClause .= static::buildWhereClause($having, $params);
        }
        $orderClause = "";
        if (!ArrayUtility::isEmpty($order)) {
            $orderClause = "ORDER BY ";
            $orderClause .= static::buildOrderClause($order);
        }
        $groupClause = "";
        if (!ArrayUtility::isEmpty($group)) {
            $groupClause = "GROUP BY ";
            $groupClause .= StringUtility::fromArray($group, ",");
        }
        if ($limit) {
            switch ($database) {
                case static::DATABASE_MYSQL:
                case static::DATABASE_MARIADB:
                case static::DATABASE_POSTGRESQL:
                case static::DATABASE_SQLITE:
                    $sql = "SELECT $fields FROM $table $whereClause $groupClause $havingClause $orderClause LIMIT $limit";
                    break;
                case static::DATABASE_SQLSERVER:
                    $sql = "SELECT TOP $limit $fields FROM $table $whereClause $groupClause $havingClause $orderClause";
                    break;
                case static::DATABASE_ORACLE:
                    $sql = "SELECT $fields FROM $table $whereClause $groupClause $orderClause $havingClause ROWNUM <= $limit";
                    break;
                case static::DATABASE_ORACLE_NEW:
                    $sql = "SELECT $fields FROM $table $whereClause $groupClause $orderClause $havingClause FETCH FIRST $limit ROWS ONLY";
                    break;
            }
        } else {
            $sql = "SELECT $fields FROM $table $whereClause $groupClause $havingClause $orderClause";
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
    public static function updateQuery(string $table, array $values, array $where): array
    {
        $params = [];
        $set = [];
        foreach ($values as $name => $value) {
            $param = ":$name";
            $params[$param] = $value;
            $set[] = "$name = $param";
        }
        $setClause = StringUtility::fromArray($set, ",");
        $whereClause = "";
        if (!ArrayUtility::isEmpty($where)) {
            $whereClause .= "WHERE ";
            $whereClause .= static::buildWhereClause($where, $params);
        }
        $sql = "UPDATE $table SET $setClause $whereClause";
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
    public static function deleteQuery(string $table, array $where): array
    {
        $params = [];
        $whereClause = "";
        if (!ArrayUtility::isEmpty($where)) {
            $whereClause .= "WHERE ";
            $whereClause .= static::buildWhereClause($where, $params);
        }
        $sql = "DELETE FROM $table $whereClause";
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
    public static function insertQuery(string $table, array $values): array
    {
        $params = [];
        $fields = [];
        if (ArrayUtility::isAssociative($values)) {
            foreach ($values as $name => $value) {
                $param = ":$name";
                $params[$param] = $value;
                $fields[] = $name;
            }
            $paramClause = "(" . StringUtility::fromArray($params, ",") . ")";
        }
        else {
            $paramClauseStock = [];
            foreach ($values as $item) {
                $iParams = [];
                foreach ($item as $name => $value) {
                    $i = 0;
                    while (ArrayUtility::hasKey($params, $param)) {
                        $i++;
                        $param = ":$name$i";
                    }
                    $params[$param] = $value;
                    $iParams[] = $param;
                    if (! ArrayUtility::has($fields, $name)) {
                        $fields[] = $name;
                    }
                    $paramClauseStock = "(" . StringUtility::fromArray($iParams, ",") . ")";
                }
            }
            $paramClause = StringUtility::fromArray($paramClauseStock,",");
        }
        $fieldClause = "(" . StringUtility::fromArray($fields, ",") . ")";
        $sql = "INSERT INTO $table $fieldClause VALUES $paramClause";
        $sql = StringUtility::dropFromSides($sql) . ";";
        return static::responder($sql, $params);
    }

    public static function joinQuery(): array
    {
        return static::responder("", []);
    }

    # --------------------------------------------------------------------------
    # Internal Methods
    # --------------------------------------------------------------------------
    #   These methods considered to be used by intera-utility methods. So, All 
    #   are private.
    # --------------------------------------------------------------------------

    public static function buildOrderClause(array $order): string
    {
        $output = "";
        if (ArrayUtility::isAssociative($order)) {
            foreach ($order as $field => $type) {
                $output .= "$field " . StringUtility::transformToUppercase($type) . ",";
            }
        } else {
            $output = StringUtility::fromArray($order, ",");
        }
        return $output;
    }
    public static function buildWhereClause(array $conditions, array &$params)
    {
        $sql = "";
        if (ArrayUtility::isScalar($conditions)) {
            if (3 === ArrayUtility::estimateSize($conditions)) {
                $field = $conditions[0];
                $operation = StringUtility::transformToUppercase($conditions[1]);
                $value = $conditions[2];
                $param = ":$field";
                $i = 1;
                while (ArrayUtility::hasKey($params, $param)) {
                    $i++;
                    $param = ":$field$i";
                }
                $params[$param] = $value;
                switch ($operation) {
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
                    case "B":
                    case "BETWEEN":
                        $sql .= "$field BETWEEN " . StringUtility::setReplace($param, ",", " AND ");
                        break;
                    case "NB":
                    case "!B":
                    case "~B":
                    case "NOT BETWEEN":
                    case "!BETWEEN":
                    case "~BETWEEN":
                        $sql .= "$field NOT BETWEEN " . StringUtility::setReplace($param, ",", " AND ");
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

            } elseif (4 === ArrayUtility::estimateSize($conditions)) {
                $field = $conditions[0];
                $operation = StringUtility::transformToUppercase($conditions[1]);
                $value1 = $conditions[2];
                $value2 = $conditions[3];
                $param1 = ":$field";
                $param2 = ":$field";
                $i = 1;
                while (ArrayUtility::hasKey($params, $param1)) {
                    $i++;
                    $param1 = ":$field$i";
                }
                $i = 1;
                while (ArrayUtility::hasKey($params, $param2)) {
                    $i++;
                    $param2 = ":$field$i";
                }
                $params[$param1] = $value1;
                $params[$param2] = $value2;
                switch ($operation) {
                    case "BETWEEN":
                        $sql .= "$field BETWEEN $param1 AND $param2)";
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
            } elseif (4 < ArrayUtility::estimateSize($conditions)) {
                $field = $conditions[0];
                $operation = StringUtility::transformToUppercase($conditions[1]);
                $sql .= "$field $operation(";
                $inside = "";
                for ($i = 2; $i < count($conditions); $i++) {
                    $j = 1;
                    $value = $conditions[$i];
                    while (ArrayUtility::hasKey($params, $param)) {
                        $j++;
                        $param = ":$field$j";
                        $inside .= "$param,";
                    }
                    $inside = StringUtility::dropFromEnd($inside, ",");
                    $params[$param] = $value;
                }
                $sql .= "$inside)";
            }
        } else {
            foreach ($conditions as $condition) {
                if (is_array($condition)) {
                    $sql .= "(" . static::buildWhereClause($condition, $params) . ")";
                } else {
                    $sql .= " " . StringUtility::transformToUppercase((string) $condition) . " ";
                }
            }
        }
        return $sql;
    }
    private static function buildFieldsClause(array $fields): string
    {
        if (ArrayUtility::isAssociative($fields)) {
            $fields = ArrayUtility::transform(
                $fields,
                function ($key, $value) {
                    if (is_array($value)) {
                        $v = $key;
                        $expression = $value["expression"] ?? $value[0] ?? null;
                        if ($expression) {
                            $v = "($expression)";
                        }
                        $function = $value["function"] ?? $value[1] ?? null;
                        if ($function) {
                            $v = "$function($v)";
                        }
                        $alias = $value["alias"] ?? $value[2] ?? null;
                        if ($alias) {
                            $v = "$v AS $alias";
                        }
                        return [$key, $v];
                    }
                    else {
                        return [$key, "$key AS $value"];
                    }
                }
            );
        } else {
            $fields = ArrayUtility::transform(
                $fields,
                function ($key, $value) {
                    return [$key, "$value"];
                }
            );
        }
        return StringUtility::fromArray($fields, ",");

    }
    private static function responder(string $sql, array $params): array
    {
        return [
            "sql" => StringUtility::dropFromSides($sql, " "),
            "params" => $params
        ];
    }
}