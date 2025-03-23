<?php declare(strict_types=1);

use PHPallas\Utilities\ArrayUtility;
use PHPallas\Utilities\SqlUtility;
use PHPUnit\Framework\TestCase;

final class SqlUtilityTest extends TestCase
{
    public function testSelect(): void
    {
        $expected = [
            "sql" => "SELECT * FROM users;",
            "params" => []
        ];
        $actual = SqlUtility::selectQuery("users");
        $this->assertSame($expected, $actual);

        $expected = [
            "sql" => "SELECT id,fname FROM users;",
            "params" => []
        ];
        $actual = SqlUtility::selectQuery("users", ["id", "fname"]);
        $this->assertSame($expected, $actual);

        $expected = [
            "sql" => "SELECT id FROM users;",
            "params" => []
        ];
        $actual = SqlUtility::selectQuery("users", ["id"]);
        $this->assertSame($expected, $actual);

        $expected = [
            "sql" => "SELECT id AS identifier FROM users;",
            "params" => []
        ];
        $actual = SqlUtility::selectQuery("users", ["id" => "identifier"]);
        $this->assertSame($expected, $actual);

        $expected = [
            "sql" => "SELECT CONCAT(fname,', ', lname) AS name FROM users;",
            "params" => []
        ];
        $actual = SqlUtility::selectQuery("users", ["CONCAT(fname,', ', lname)" => "name"]);
        $this->assertSame($expected, $actual);

        $expected = [
            "sql" => "SELECT id FROM users WHERE id = :id;",
            "params" => [
                ":id" => 120
            ]
        ];
        $actual = SqlUtility::selectQuery(
            "users",
            ["id"],
            ["id", "=", 120]
        );
        $this->assertSame($expected, $actual);

        $expected = [
            "sql" => "SELECT id,fname FROM users WHERE (id = :id) AND (lname = :lname);",
            "params" => [
                ":id" => 120,
                ":lname" => "doe"
            ]
        ];
        $actual = SqlUtility::selectQuery("users", ["id", "fname"], [["id", "=", 120], "and", ["lname", "=", "doe"]]);
        $this->assertSame($expected, $actual);

        $expected = [
            "sql" => "SELECT id,fname FROM users WHERE (id = :id) AND ((lname = :lname) OR (lname = :lname2));",
            "params" => [
                ":id" => 120,
                ":lname" => "doe",
                ":lname2" => "welsh",
            ]
        ];
        $actual = SqlUtility::selectQuery(
            "users",
            ["id", "fname"],
            [
                ["id", "=", 120],
                "and",
                [
                    ["lname", "=", "doe"],
                    "OR",
                    ["lname", "=", "welsh"],
                ]
            ]
        );
        $this->assertSame($expected, $actual);

        $expected = [
            "sql" => "SELECT id,fname FROM users WHERE (id = :id) AND ((lname = :lname) OR ((lname = :lname2) AND (fname = :fname)));",
            "params" => [
                ":id" => 120,
                ":lname" => "doe",
                ":lname2" => "welsh",
                ":fname" => "robert",
            ]
        ];
        $actual = SqlUtility::selectQuery(
            "users",
            ["id", "fname"],
            [
                ["id", "=", 120],
                "and",
                [
                    ["lname", "=", "doe"],
                    "OR",
                    [
                        ["lname", "=", "welsh"],
                        "and",
                        ["fname", "=", "robert"]
                    ],
                ]
            ]
        );
        $this->assertSame($expected, $actual);
    }
}