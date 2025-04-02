# PHPallas Utilities 

Welcome to **PHPallas Utilities**! This application is designed to provide a comprehensive set of utility functions that simplify common programming tasks across various domains. Whether you're manipulating arrays, performing mathematical operations, or constructing SQL queries, our library offers a robust solution to enhance your development experience. With a focus on usability and efficiency, **PHPallas Utilities** aims to empower developers with powerful tools that streamline their workflows and improve productivity. 

## Features 

- **ArrayUtility**: Over 60 functions for array manipulation.
- **BooleanUtility**: More than 20 functions for handling boolean values.
- **MathUtility**: Over 130 functions covering a wide range of mathematical operations.
- **SqlUtility**: Functions for constructing SQL queries, including `SELECT`, `UPDATE`, `DELETE`, `INSERT`, `JOIN`, and `UNION`.
- **StringUtility**: More than 80 functions for string manipulation.
- **TypesUtility**: Over 20 functions for type manipulation, including conversions.

## Installation 

To install this application, clone the repository and run the following command:

```bash
composer require phpallas/utilities
```

## Basic Usage

Here’s a quick example of how to use the utilities:

```php
// Assumed you are using composer autoload

// Example usage of ArrayUtility
$array1 = [
    "name" => [
        "name" => "john",
        "surname" => "doe",
    ]
];
$array2 = [
    "email" => "johndoe@example.com",
    "name" => [
        "midname" => "washington"
    ]
];
$array3 = [
    "country" => "Germany",
    "city" => "Berlin",
];

$result = ArrayUtility::mergeInDepth($array1, $array2, $array3);

/*
$result => [
    "name" => [
        "name" => "john",
        "surname" => "doe",
        "midname" => "washington"
    ],
    "email" => "johndoe@example.com",
    "country" => "Germany",
    "city" => "Berlin",
];
*/

// Example usage of BooleanUtility
$bool = BooleanUtility.fromString("ON");

/*
$bool => true; 
*/

// Example usage of MathUtility

$matrix = [
    [1, 2],
    [3, 4]
];

$result = MathUtility::qrDecompositionMatrix($matrix);

/*
$result => [
    [0.316227766, 0.948683298],
    [0.948683298, -0.316227766]
];
*/

// Example of SqlUtility
$table = "users";
$conditions = ["id", "=", 12];
$sql = SqlUtility::deleteQuery($table, $conditions);

/*
$sql => "DELETE FROM users WHERE id=12;";
*/

// Example of StringUtility
$string = "hello-wORLd";

$result = StringUtility::transformToPascalSnakecase($result);

/*
$result => "Hello_World";
*/
```

## Contributing

We welcome contributions! Please read our [Contributing Guidelines](CONTRIBUTING.md) for more information on how to get involved.

## Changelog

All notable changes to this project will be documented in the [CHANGELOG.md](CHANGELOG.md).

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

---

*Created with ❤️ and dedication by [PHPallas team](https://github.com/PHPallas)! 🌟*