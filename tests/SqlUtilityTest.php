<?php declare(strict_types=1);

use PHPallas\Utilities\ArrayUtility;
use PHPallas\Utilities\SqlUtility;
use PHPallas\Utilities\StringUtility;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SqlUtility::class)]
#[UsesClass(StringUtility::class)]
final class SqlUtilityTest extends TestCase
{
    public function testDelete(): void
    {
        $tables = ["users", "customers"];
        $datbases = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        $aliases = [null, "tableAlias"];
        $limits = [null, 100];
        $orders = [
            [],
            [
                "name" => "asc",
                "id" => "desc",
            ],
            [
                "name",
                "id" => "desc",
            ],
            [
                "name",
                "id",
            ],
        ];
        $wheres = [
            [],
            [
                ["@p:id", "<", 120],
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "!l", "rob%"],
                    "or",
                    [18, "<", "@p:age"]
                ]
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "!l", "rob%"],
                    "or",
                    [18, "<", "@p:age"],
                    "or",
                    [48, ">", "@p:age"],
                ]
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "!l", "rob%"],
                    "or",
                    ["age", "between", 18, 48],
                ]
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "not like", "rob%"],
                    "or",
                    ["age", "in", 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32],
                ]
            ]
        ];
        foreach ($wheres as $whereIndex => $where) {
            foreach ($orders as $orderIndex => $order) {
                foreach ($limits as $limit) {
                    foreach ($aliases as $alias) {
                        foreach ($datbases as $database) {
                            foreach ($tables as $table) {
                                $params = [];
                                $limitText = "";
                                $aliasText = "";
                                $orderText = "";
                                $whereText = "";
                                if (1 === $whereIndex) {
                                    $whereText = " WHERE (id < :id)";
                                    $params[":id"] = 120;
                                } elseif (2 === $whereIndex) {
                                    $whereText = " WHERE (id < :id) AND ((name NOT LIKE :name) OR (:age < age))";
                                    $params[":id"] = 120;
                                    $params[":name"] = "rob%";
                                    $params[":age"] = 18;
                                } elseif (3 === $whereIndex) {
                                    $whereText = " WHERE (id < :id) AND ((name NOT LIKE :name) OR (:age < age) OR (:age2 > age))";
                                    $params[":id"] = 120;
                                    $params[":name"] = "rob%";
                                    $params[":age"] = 18;
                                    $params[":age2"] = 48;
                                } elseif (4 === $whereIndex) {
                                    $whereText = " WHERE (id < :id) AND ((name NOT LIKE :name) OR (age BETWEEN :age AND :age2))";
                                    $params[":id"] = 120;
                                    $params[":name"] = "rob%";
                                    $params[":age"] = 18;
                                    $params[":age2"] = 48;
                                } elseif (5 === $whereIndex) {
                                    $whereText = " WHERE (id < :id) AND ((name NOT LIKE :name) OR (age IN (:age,:age2,:age3,:age4,:age5,:age6,:age7,:age8,:age9,:age10,:age11,:age12,:age13,:age14,:age15)))";
                                    $params[":id"] = 120;
                                    $params[":name"] = "rob%";
                                    $params[":age"] = 18;
                                    $params[":age2"] = 19;
                                    $params[":age3"] = 20;
                                    $params[":age4"] = 21;
                                    $params[":age5"] = 22;
                                    $params[":age6"] = 23;
                                    $params[":age7"] = 24;
                                    $params[":age8"] = 25;
                                    $params[":age9"] = 26;
                                    $params[":age10"] = 27;
                                    $params[":age11"] = 28;
                                    $params[":age12"] = 29;
                                    $params[":age13"] = 30;
                                    $params[":age14"] = 31;
                                    $params[":age15"] = 32;
                                }
                                if (null !== $order && in_array($database, [8, 9, 11, 12])) {
                                    switch ($orderIndex) {
                                        case 1:
                                            $orderText = " ORDER BY name ASC, id DESC";
                                            break;
                                        case 2:
                                            $orderText = " ORDER BY name ASC, id DESC";
                                            break;
                                        case 3:
                                            $orderText = " ORDER BY name ASC, id ASC";
                                            break;
                                    }
                                }
                                if (null !== $limit && in_array($database, [7, 8, 9, 11, 12])) {
                                    $limitText = " LIMIT $limit";
                                }
                                if (null !== $alias) {
                                    $aliasText = " AS $alias";
                                }
                                // echo <<<EOT
                                // ========================================================
                                // table = $table
                                // database = $database
                                // alias = $alias
                                // limit = $limit
                                // order = $orderIndex
                                // where = $whereIndex

                                // EOT;
                                $sql = "DELETE FROM " . $table . $aliasText . $whereText . $orderText . $limitText;
                                $sql = StringUtility::dropFromEnd($sql, " ");
                                $expected = [
                                    "sql" => "$sql;",
                                    "params" => $params
                                ];
                                $actual = SqlUtility::deleteQuery($table, $where, $order, $limit, $alias, $database);
                                $this->assertSame($expected, $actual);
                            }
                        }
                    }
                }
            }
        }
    }
    public function testInsert(): void
    {
        $tables = ["users", "customers"];
        $databases = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        $ignores = [false, true];
        $valueCases = [
            [
                "name" => "john",
                "surname" => "doe"
            ],
            [
                [
                    "id" => 1,
                    "job" => "teacher"
                ],
                [
                    "id" => 2,
                    "job" => "student"
                ]
            ]
        ];
        $returns = [true, false];
        foreach ($returns as $return) {
            foreach ($databases as $database) {

                foreach ($ignores as $ignore) {
                    $insert = "INSERT INTO";
                    if (true === $ignore && in_array($database, [8, 9, 12])) {
                        $insert = "INSERT IGNORE INTO";
                        if (12 === $database)
                            $insert = "INSERT OR IGNORE INTO";
                    }
                    foreach ($valueCases as $valueIndex => $values) {
                        switch ($valueIndex) {
                            case 0:
                                $valuesList = "(:name, :surname)";
                                $fieldNames = "(name, surname)";
                                $params = [
                                    ":name" => "john",
                                    ":surname" => "doe"
                                ];
                                break;
                            case 1:
                                $fieldNames = "(id, job)";
                                $valuesList = "(:id, :job), (:id1, :job1)";
                                $params = [
                                    ":id" => 1,
                                    ":job" => "teacher",
                                    ":id1" => 2,
                                    ":job1" => "student"
                                ];
                                break;
                        }
                        foreach ($tables as $table) {
                            $outputPhrase = "";
                            $returnPhrase = "";
                            $attachedSQL = "";
                            if (true === $return) {
                                if (in_array($database, [3, 4, 14])) {
                                    if (0 === $valueIndex) {
                                        $outputPhrase = " OUTPUT INSERTED.name,INSERTED.surname";
                                    } else if (1 === $valueIndex) {
                                        $outputPhrase = " OUTPUT INSERTED.id,INSERTED.job";
                                    }
                                } elseif (in_array($database, [5, 6, 7, 11, 12])) {
                                    if (0 === $valueIndex) {
                                        $returnPhrase = " RETURNING name, surname";
                                    } else if (1 === $valueIndex) {
                                        $returnPhrase = " RETURNING id, job";
                                    }
                                } elseif (in_array($database, [8, 9])) {
                                    if (0 === $valueIndex) {
                                        $attachedSQL = " SELECT name, surname FROM $table WHERE id = LAST_INSERT_ID();";
                                    } else if (1 === $valueIndex) {
                                        $attachedSQL = " SELECT id, job FROM $table WHERE id = LAST_INSERT_ID();";
                                    }
                                }
                            }
                            $sql = "$insert $table $fieldNames$outputPhrase VALUES $valuesList$returnPhrase";
                            if ($ignore && 11 === $database) {
                                $sql .= " ON CONFLICT DO NOTHING";
                            }
                            $expected = [
                                "sql" => "$sql;$attachedSQL",
                                "params" => $params
                            ];
                            $actual = SqlUtility::insertQuery($table, $values, $ignore, $return, $database);
                            $this->assertSame($expected, $actual);
                        }
                    }
                }
            }
        }




    }
    public function testUpdate(): void
    {
        $tables = ["users", "customers"];
        $databases = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        $ignores = [false, true];
        $valueCases = [
            [
                "name" => "john",
                "surname" => "doe"
            ],
            [
                "id" => 1,
                "job" => "teacher"
            ]
        ];
        $returns = [true, false];
        $wheres = [
            [],
            [
                ["@p:id", "<", 120],
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "!l", "rob%"],
                    "or",
                    [18, "<", "@p:age"]
                ]
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "!l", "rob%"],
                    "or",
                    [18, "<", "@p:age"],
                    "or",
                    [48, ">", "@p:age"],
                ]
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "!l", "rob%"],
                    "or",
                    ["age", "between", 18, 48],
                ]
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "not like", "rob%"],
                    "or",
                    ["age", "in", 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32],
                ]
            ]
        ];
        foreach ($wheres as $whereIndex => $where) {
            foreach ($valueCases as $valueIndex => $values) {
                foreach ($tables as $table) {
                    $setPhrase = "";
                    $params = [];
                    if (0 === $valueIndex) {
                        $setPhrase = "SET name = :name, surname = :surname";
                        $params = [
                            ":name" => "john",
                            ":surname" => "doe"
                        ];
                    } else if (1 === $valueIndex) {
                        $setPhrase = "SET id = :id, job = :job";
                        $params = [
                            ":id" => 1,
                            ":job" => "teacher"
                        ];
                    }
                    $wherePhrase = "";
                    $whereParams = [];
                    switch ($whereIndex) {
                        case 0:
                            $wherePhrase = "";
                            break;
                        case 1:
                            if (0 === $valueIndex) {
                                $whereParams[":id"] = 120;
                                $wherePhrase = " WHERE (id < :id)";
                            } else if (1 === $valueIndex) {
                                $whereParams[":id2"] = 120;
                                $wherePhrase = " WHERE (id < :id2)";
                            }
                            break;
                        case 2:
                            if (0 === $valueIndex) {
                                $whereParams[":id"] = 120;
                                $whereParams[":name2"] = "rob%";
                                $whereParams[":age"] = 18;
                                $wherePhrase = " WHERE (id < :id) AND ((name NOT LIKE :name2) OR (:age < age))";
                            } else if (1 === $valueIndex) {
                                $whereParams[":id2"] = 120;
                                $whereParams[":name"] = "rob%";
                                $whereParams[":age"] = 18;
                                $wherePhrase = " WHERE (id < :id2) AND ((name NOT LIKE :name) OR (:age < age))";
                            }
                            break;
                        case 3:
                            if (0 === $valueIndex) {
                                $whereParams[":id"] = 120;
                                $whereParams[":name2"] = "rob%";
                                $whereParams[":age"] = 18;
                                $whereParams[":age2"] = 48;
                                $wherePhrase = " WHERE (id < :id) AND ((name NOT LIKE :name2) OR (:age < age) OR (:age2 > age))";
                            } else if (1 === $valueIndex) {
                                $whereParams[":id2"] = 120;
                                $whereParams[":name"] = "rob%";
                                $whereParams[":age"] = 18;
                                $whereParams[":age2"] = 48;
                                $wherePhrase = " WHERE (id < :id2) AND ((name NOT LIKE :name) OR (:age < age) OR (:age2 > age))";
                            }
                            break;
                        case 4:
                            if (0 === $valueIndex) {
                                $whereParams[":id"] = 120;
                                $whereParams[":name2"] = "rob%";
                                $whereParams[":age"] = 18;
                                $whereParams[":age2"] = 48;
                                $wherePhrase = " WHERE (id < :id) AND ((name NOT LIKE :name2) OR (age BETWEEN :age AND :age2))";
                            } else if (1 === $valueIndex) {
                                $whereParams[":id2"] = 120;
                                $whereParams[":name"] = "rob%";
                                $whereParams[":age"] = 18;
                                $whereParams[":age2"] = 48;
                                $wherePhrase = " WHERE (id < :id2) AND ((name NOT LIKE :name) OR (age BETWEEN :age AND :age2))";
                            }
                            break;
                        case 5:
                            if (0 === $valueIndex) {
                                $whereParams[":id"] = 120;
                                $whereParams[":name2"] = "rob%";
                                $whereParams[":age"] = 18;
                                $whereParams[":age2"] = 19;
                                $whereParams[":age3"] = 20;
                                $whereParams[":age4"] = 21;
                                $whereParams[":age5"] = 22;
                                $whereParams[":age6"] = 23;
                                $whereParams[":age7"] = 24;
                                $whereParams[":age8"] = 25;
                                $whereParams[":age9"] = 26;
                                $whereParams[":age10"] = 27;
                                $whereParams[":age11"] = 28;
                                $whereParams[":age12"] = 29;
                                $whereParams[":age13"] = 30;
                                $whereParams[":age14"] = 31;
                                $whereParams[":age15"] = 32;
                                $wherePhrase = " WHERE (id < :id) AND ((name NOT LIKE :name2) OR (age IN (:age,:age2,:age3,:age4,:age5,:age6,:age7,:age8,:age9,:age10,:age11,:age12,:age13,:age14,:age15)))";
                            } else if (1 === $valueIndex) {
                                $whereParams[":id2"] = 120;
                                $whereParams[":name"] = "rob%";
                                $whereParams[":age"] = 18;
                                $whereParams[":age2"] = 19;
                                $whereParams[":age3"] = 20;
                                $whereParams[":age4"] = 21;
                                $whereParams[":age5"] = 22;
                                $whereParams[":age6"] = 23;
                                $whereParams[":age7"] = 24;
                                $whereParams[":age8"] = 25;
                                $whereParams[":age9"] = 26;
                                $whereParams[":age10"] = 27;
                                $whereParams[":age11"] = 28;
                                $whereParams[":age12"] = 29;
                                $whereParams[":age13"] = 30;
                                $whereParams[":age14"] = 31;
                                $whereParams[":age15"] = 32;
                                $wherePhrase = " WHERE (id < :id2) AND ((name NOT LIKE :name) OR (age IN (:age,:age2,:age3,:age4,:age5,:age6,:age7,:age8,:age9,:age10,:age11,:age12,:age13,:age14,:age15)))";
                            }
                            break;
                    }

                    $params = array_merge($params, $whereParams);
                    $actual = SqlUtility::updateQuery($table, $values, $where, false, null, 9);
                    $expected = [
                        "sql" => "UPDATE $table $setPhrase$wherePhrase;",
                        "params" => $params
                    ];
                    $this->assertSame($expected, $actual);
                }
            }
        }


    }
    public function testSelect(): void
    {
        $fieldsSet = [
            null,
            "*",
            ["*"],
            ["name", "surname"],
            ["name" => "fname", "surname" => "lname"],
            [
                "birth" => "age",
                "not-important" => [
                    "expression" => "name, ' ', surname",
                    "function" => "CONCAT",
                    "alias" => "fullname"
                ]
            ],
            [
                "gender" => "sex",
                "age" => [
                    "function" => "MAX",
                    "alias" => "m"
                ]
            ]
        ];
        $fieldsPhrases = [
            "*",
            "*",
            "*",
            "name, surname",
            "name AS fname, surname AS lname",
            "birth AS age, (CONCAT(name, ' ', surname)) AS fullname",
            "gender AS sex, (MAX(age)) AS m"
        ];
        $groups = [
            null,
            [],
            ["m"]
        ];
        $groupPhrases = [
            "",
            "",
            " GROUP BY m",
        ];
        $distincts = [true, false];
        $databases = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        $limits = [null, 100];
        $wheres = [
            [],
            [
                ["@p:id", "<", 120],
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "!l", "rob%"],
                    "or",
                    [18, "<", "@p:age"]
                ]
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "!l", "rob%"],
                    "or",
                    [18, "<", "@p:age"],
                    "or",
                    [48, ">", "@p:age"],
                ]
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "!l", "rob%"],
                    "or",
                    ["age", "between", 18, 48],
                ]
            ],
            [
                ["@p:id", "<", 120],
                "and",
                [
                    ["@p:name", "not like", "rob%"],
                    "or",
                    ["age", "in", 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32],
                ]
            ]
        ];
        $tables = ["users", "products"];
        $orders = [
            null,
            [],
            ["id"],
            ["id" => "desc", "fname"],
        ];
        $orderPhrases = [
            "",
            "",
            " ORDER BY id ASC",
            " ORDER BY id DESC, fname ASC",
        ];
        $joinsSet = [
            null,
            [
                [
                    "type" => "inner",
                    "table" => "meta_info",
                    "alias" => "meta",
                    "on" => [
                        ["meta.id", "=", 15]
                    ]
                ]
            ],
            [
                [
                    "type" => "cross",
                    "table" => "meta_info",
                    "alias" => "meta",
                    "on" => [
                        ["meta.id", "=", 15]
                    ]
                ],
                [
                    "type" => "inner",
                    "table" => "meta_info_2",
                    "alias" => "meta2",
                    "on" => [
                        ["meta2.id", "=", "meta1.id"]
                    ]
                ]
            ]
        ];
        $joinPhrases = [
            "",
            " INNER JOIN meta_info AS meta ON (meta.id = 15)",
            " CROSS JOIN meta_info AS meta ON (meta.id = 15) INNER JOIN meta_info_2 AS meta2 ON (meta2.id = meta1.id)",
        ];
        $havings = [
            null,
            [
                [
                    "COUNT(CustomerID)", ">", 5
                ]
            ]
        ];
        $havingPhrases = [
            "",
            " HAVING (COUNT(CustomerID) > 5)"
        ];
        foreach ($havings as $havingIndex => $having) {
            $havingPhrase = $havingPhrases[$havingIndex];
            foreach ($joinsSet as $joinIndex => $joins) {
                $joinPhrase = $joinPhrases[$joinIndex];
                foreach ($groups as $groupIndex => $group) {
                    $groupingPhrase = $groupPhrases[$groupIndex];
                    foreach ($orders as $orderIndex => $order) {
                        $orderPhrase = $orderPhrases[$orderIndex];
                        foreach ($fieldsSet as $fieldsIndex => $fields) {
                            $fieldsPhrase = $fieldsPhrases[$fieldsIndex];
                            foreach ($tables as $table) {
                                foreach ($wheres as $whereIndex => $where) {
                                    foreach ($limits as $limit) {
                                        foreach ($databases as $database) {
                                            foreach ($distincts as $distinct) {
                                                $params = [];
                                                $whereClause = "";
                                                switch ($whereIndex) {
                                                    case 0;
                                                        $whereClause = "";
                                                        $params = [];
                                                        break;
                                                    case 1;
                                                        $whereClause = " WHERE (id < :id)";
                                                        $params = [
                                                            ":id" => 120
                                                        ];
                                                        break;
                                                    case 2;
                                                        $whereClause = " WHERE (id < :id) AND ((name NOT LIKE :name) OR (:age < age))";
                                                        $params = [
                                                            ':id' => 120,
                                                            ':name' => 'rob%',
                                                            ':age' => 18,
                                                        ];
                                                        break;
                                                    case 3;
                                                        $whereClause = " WHERE (id < :id) AND ((name NOT LIKE :name) OR (:age < age) OR (:age2 > age))";
                                                        $params = [
                                                            ':id' => 120,
                                                            ':name' => 'rob%',
                                                            ':age' => 18,
                                                            ':age2' => 48,
                                                        ];
                                                        break;
                                                    case 4;
                                                        $whereClause = " WHERE (id < :id) AND ((name NOT LIKE :name) OR (age BETWEEN :age AND :age2))";
                                                        $params = [
                                                            ':id' => 120,
                                                            ':name' => 'rob%',
                                                            ':age' => 18,
                                                            ':age2' => 48,
                                                        ];
                                                        break;
                                                    case 5;
                                                        $whereClause = " WHERE (id < :id) AND ((name NOT LIKE :name) OR (age IN (:age,:age2,:age3,:age4,:age5,:age6,:age7,:age8,:age9,:age10,:age11,:age12,:age13,:age14,:age15)))";
                                                        $params = [
                                                            ':id' => 120,
                                                            ':name' => 'rob%',
                                                            ':age' => 18,
                                                            ':age2' => 19,
                                                            ':age3' => 20,
                                                            ':age4' => 21,
                                                            ':age5' => 22,
                                                            ':age6' => 23,
                                                            ':age7' => 24,
                                                            ':age8' => 25,
                                                            ':age9' => 26,
                                                            ':age10' => 27,
                                                            ':age11' => 28,
                                                            ':age12' => 29,
                                                            ':age13' => 30,
                                                            ':age14' => 31,
                                                            ':age15' => 32,
                                                        ];
                                                        break;

                                                }
                                                $select = "SELECT";
                                                if (true === $distinct) {
                                                    $select = "SELECT DISTINCT";
                                                }
                                                if ($limit) {
                                                    switch ($database) {
                                                        case 1:
                                                        case 5:
                                                        case 7:
                                                        case 8:
                                                        case 9:
                                                        case 11:
                                                        case 12:
                                                        case 13:
                                                            $sql = "$select $fieldsPhrase FROM $table$joinPhrase$whereClause$groupingPhrase$havingPhrase$orderPhrase LIMIT $limit;";
                                                            break;
                                                        case 6:
                                                            $sql = "$select $fieldsPhrase FROM $table$joinPhrase$whereClause$groupingPhrase$havingPhrase$orderPhrase FETCH FIRST $limit ROWS ONLY;";
                                                            break;
                                                        case 2:
                                                        case 3:
                                                        case 4:
                                                        case 14:
                                                            $sql = "$select TOP $limit $fieldsPhrase FROM $table$joinPhrase$whereClause$groupingPhrase$havingPhrase$orderPhrase;";
                                                            break;
                                                        case 10:
                                                            $sql = "$select $fieldsPhrase FROM $table$joinPhrase$whereClause$groupingPhrase$havingPhrase$orderPhrase ROWNUM <= $limit;";
                                                            break;
                                                        default:
                                                            $sql = "$select $fieldsPhrase FROM $table$joinPhrase$whereClause$groupingPhrase$havingPhrase$orderPhrase;";
                                                            break;
                                                    }
                                                } else {
                                                    $sql = "$select $fieldsPhrase FROM $table$joinPhrase$whereClause$groupingPhrase$havingPhrase$orderPhrase;";
                                                }

                                                $expected = [
                                                    "sql" => $sql,
                                                    "params" => $params
                                                ];

                                                $actual = SqlUtility::selectQuery(
                                                    $table,
                                                    $fields,
                                                    $joins,
                                                    $where,
                                                    $order,
                                                    $group,
                                                    $having,
                                                    $limit,
                                                    $database,
                                                    $distinct
                                                );
                                                $this->assertSame($expected, $actual);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}