# Changelog

## [1.2.0]

### Added

- `FileUtility::createDirectory()`
- `FileUtility::loadFileContent()`
- `FileUtility::writeToFile()`
- `FileUtility::isDirectory()`
- `FileUtility::isNotDirectory()`
- `FileUtility::fileExists()`
- `FileUtility::fileNotExists()`
- `FileUtility::readFromJson()`
- `FileUtility::writeToJson()`
- `FileUtility::readFromYaml()`
- `FileUtility::writeToYaml()`
- `FileUtility::readFromIni()`
- `FileUtility::writeToIni()`
- `FileUtility::readFromXml()`
- `FileUtility::writeToXml()`
- `FileUtility::readFromEnv()`
- `FileUtility::writeToEnv()`

### Changed

- `Boolean::areEqual()`: extra code line removed

## [1.1.0]

### Added

47 New Methods added:

- `SqlUtility::createTable()`
- `SqlUtility::alterTable()`
- `SqlUtility::dropTable()`
- `SqlUtility::modifyColumn()`
- `SqlUtility::addIndex()`
- `SqlUtility::dropIndex()`
- `SqlUtility::createDatabase()`
- `SqlUtility::dropDatabase()`
- `StringUtility::transformToTitleCase()`
- `StringUtility::estimateLevenshteinDistance()`
- `StringUtility::inBase64()`
- `StringUtility::ofBase64()`
- `StringUtility::slugify()`
- `StringUtility::interpolate()`
- `StringUtility::formatPhoneNumber()`
- `StringUtility::validatePhoneNumber()`
- `StringUtility::validateEmail()`
- `StringUtility::validateName()`
- `StringUtility::validateURL()`
- `StringUtility::validateDate()`
- `StringUtility::validatePassword()`
- `StringUtility::validateCreditCard()`
- `StringUtility::validateUsername()`
- `StringUtility::validatePostalCode()`
- `StringUtility::validateIP()`
- `TypesUtility::isNotArray()`
- `TypesUtility::isNotBoolean()`
- `TypesUtility::isBool()`
- `TypesUtility::isNotBool()`
- `TypesUtility::isNotCallable()`
- `TypesUtility::isNotCountable()`
- `TypesUtility::isNotFloat()`
- `TypesUtility::isDouble()`
- `TypesUtility::isNotDouble()`
- `TypesUtility::isNotInteger()`
- `TypesUtility::isInt()`
- `TypesUtility::isNotInt()`
- `TypesUtility::isNotIterable()`
- `TypesUtility::isNotNull()`
- `TypesUtility::isNotNumeric()`
- `TypesUtility::isNotObject()`
- `TypesUtility::isNotResource()`
- `TypesUtility::isNotScalar()`
- `TypesUtility::isNotString()`
- `TypesUtility::toInt()`
- `TypesUtility::toDouble()`
- `TypesUtility::toBool()`

### Changed

### Deprecated

### Removed

### Fixed


## [1.0.0] - 2025-04-04

### Added

- Initial release of the application featuring core functionalities, including:

    * **ArrayUtility**: Over 60 functions for array manipulation.
    * **BooleanUtility**: More than 20 functions for handling boolean values.
    * **MathUtility**: Over 130 functions covering a wide range of mathematical operations.
    * **SqlUtility**: Functions for constructing SQL queries, including `SELECT`, `UPDATE`, `DELETE`, `INSERT`, `JOIN`, and `UNION`.
    * **StringUtility**: More than 80 functions for string manipulation.
    * **TypesUtility**: Over 20 functions for type manipulation, including conversions.


---

*Created with ❤️ and dedication by [PHPallas team](https://github.com/PHPallas)! 🌟*