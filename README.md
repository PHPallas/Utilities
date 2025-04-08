# PHPallas Utilities 

Welcome to **PHPallas Utilities**! This application is designed to provide a comprehensive set of utility functions that simplify common programming tasks across various domains. Whether you're manipulating arrays, performing mathematical operations, or constructing SQL queries, our library offers a robust solution to enhance your development experience. With a focus on usability and efficiency, **PHPallas Utilities** aims to empower developers with powerful tools that streamline their workflows and improve productivity. 

## Features 

- **ArrayUtility**: Over 60 functions for array manipulation.
- **BooleanUtility**: More than 20 functions for handling boolean values.
- **FileUtility**: Over 15 functions for file handling.
- **MathUtility**: Over 130 functions covering a wide range of mathematical operations.
- **RandomUtility**: Functions for creating random values.
- **SecurityUtility**: Around 50 function for security check, verification and etc.
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

## Utilities

| Method | Description |
|--------|-------------|
| [**ArrayUtility**](#ArrayUtility) |  |
| [ArrayUtility::create](#ArrayUtilitycreate) | Creates an array of given elements |
| [ArrayUtility::createRandom](#ArrayUtilitycreateRandom) | Creates an array of randon numbers between 1 and 100. |
| [ArrayUtility::createRange](#ArrayUtilitycreateRange) | Creates an array containing a range of float or integer numericals |
| [ArrayUtility::createByValue](#ArrayUtilitycreateByValue) | Creates an one dimension array of given size includes elements withsimilar value |
| [ArrayUtility::createZeroArray](#ArrayUtilitycreateZeroArray) | Creates an one dimension array of given size that all elements are zero. |
| [ArrayUtility::createNullArray](#ArrayUtilitycreateNullArray) | Createss an one dimension array of given size that all elements are null. |
| [ArrayUtility::createEmpty](#ArrayUtilitycreateEmpty) | Creates an empty array |
| [ArrayUtility::createByKeys](#ArrayUtilitycreateByKeys) | Creates an array with given keys, all elements have similar value |
| [ArrayUtility::createMatrixArray](#ArrayUtilitycreateMatrixArray) | Creates a two dimension array of given rows and columns that all elementsare equal to given value. |
| [ArrayUtility::createTableArray](#ArrayUtilitycreateTableArray) | Creates a two dimension array of given rows and column names that allelements  are of equal value. |
| [ArrayUtility::createPairs](#ArrayUtilitycreatePairs) | Creates an `array` by using the values from the `keys` array as keys andthe values from the `values` array as the corresponding values. |
| [ArrayUtility::get](#ArrayUtilityget) | Get array items, supporting dot notation |
| [ArrayUtility::getKeys](#ArrayUtilitygetKeys) | Get all keys of an array |
| [ArrayUtility::getFirstKey](#ArrayUtilitygetFirstKey) | Gets the first key of an array |
| [ArrayUtility::getLastKey](#ArrayUtilitygetLastKey) | Gets the last key of an array |
| [ArrayUtility::getFirst](#ArrayUtilitygetFirst) | Gets the first element of an array |
| [ArrayUtility::getLast](#ArrayUtilitygetLast) | Gets the last element of an array |
| [ArrayUtility::getSubset](#ArrayUtilitygetSubset) | Get a subset of an array by giving keys |
| [ArrayUtility::getColumns](#ArrayUtilitygetColumns) | Get a subset of two-dimensions array by keys |
| [ArrayUtility::getFiltered](#ArrayUtilitygetFiltered) | Get a subset of array elements using a callback filter function |
| [ArrayUtility::set](#ArrayUtilityset) | Set array items, supporting dot notation |
| [ArrayUtility::has](#ArrayUtilityhas) | Check if an array includes a given value |
| [ArrayUtility::hasKey](#ArrayUtilityhasKey) | Checks if the given key or index exists in the array |
| [ArrayUtility::add](#ArrayUtilityadd) | An acronym to addToEnd() |
| [ArrayUtility::addToEnd](#ArrayUtilityaddToEnd) | Append elements into the end of an array |
| [ArrayUtility::addToStart](#ArrayUtilityaddToStart) | Prepend elements into the start of an array |
| [ArrayUtility::dropFromStart](#ArrayUtilitydropFromStart) | Drop n first element(s) of an array |
| [ArrayUtility::dropFirst](#ArrayUtilitydropFirst) | Drop the forst element of an array |
| [ArrayUtility::dropFromEnd](#ArrayUtilitydropFromEnd) | Drop n last element(s) of an array |
| [ArrayUtility::dropLast](#ArrayUtilitydropLast) | Drops the last element from an array |
| [ArrayUtility::dropKey](#ArrayUtilitydropKey) | Drops an element from an array by key, supporting dot notation |
| [ArrayUtility::drop](#ArrayUtilitydrop) | Drops all elements of an array that has a value equal to the given value |
| [ArrayUtility::transform](#ArrayUtilitytransform) | Applies a transform callable to all elements of an array |
| [ArrayUtility::transformToUppercaseKeys](#ArrayUtilitytransformToUppercaseKeys) | Transform the case of all keys in an array to the UPPER_CASE |
| [ArrayUtility::transformToLowercaseKeys](#ArrayUtilitytransformToLowercaseKeys) | Transform the case of all keys in an array to lower_case |
| [ArrayUtility::transformToLowercase](#ArrayUtilitytransformToLowercase) | Transform all elements of an array to lower_case |
| [ArrayUtility::transformToUppercase](#ArrayUtilitytransformToUppercase) | Transform all elements of an array to UPPER_CASE |
| [ArrayUtility::transformFlip](#ArrayUtilitytransformFlip) | Exchanges all keys with their associated values in an array |
| [ArrayUtility::isAssociative](#ArrayUtilityisAssociative) | Checks if an array is associative |
| [ArrayUtility::isEmpty](#ArrayUtilityisEmpty) | Checks if an array is empty |
| [ArrayUtility::isSameAs](#ArrayUtilityisSameAs) | Compare two arrays and check if are same |
| [ArrayUtility::isEligibleTo](#ArrayUtilityisEligibleTo) | Checks a condition against all element of an array |
| [ArrayUtility::isString](#ArrayUtilityisString) | Checks if an array elements all are string |
| [ArrayUtility::isBoolean](#ArrayUtilityisBoolean) | Checks if an array elements all are boolean |
| [ArrayUtility::isCallable](#ArrayUtilityisCallable) | Checks if an array elements all are callable |
| [ArrayUtility::isCountable](#ArrayUtilityisCountable) | Checks if an array elements all are countable |
| [ArrayUtility::isIterable](#ArrayUtilityisIterable) | Checks if an array elements all are iterable |
| [ArrayUtility::isNumeric](#ArrayUtilityisNumeric) | Checks if an array elements all are numeric |
| [ArrayUtility::isScalar](#ArrayUtilityisScalar) | Checks if an array elements all are scalar |
| [ArrayUtility::isFloat](#ArrayUtilityisFloat) | Checks if an array elements all are float |
| [ArrayUtility::isNull](#ArrayUtilityisNull) | Checks if an array elements all are null |
| [ArrayUtility::isObject](#ArrayUtilityisObject) | Checks if an array elements all are object |
| [ArrayUtility::isArray](#ArrayUtilityisArray) | Checks if an array elements all are array |
| [ArrayUtility::isInstanceOf](#ArrayUtilityisInstanceOf) | Checks if an array elements all are of given class |
| [ArrayUtility::estimateSize](#ArrayUtilityestimateSize) | Get total number of elements inside an array |
| [ArrayUtility::estimateCounts](#ArrayUtilityestimateCounts) | Get count of distinct values inside an array |
| [ArrayUtility::estimateSum](#ArrayUtilityestimateSum) | Calculate the sum of values in an array |
| [ArrayUtility::merge](#ArrayUtilitymerge) | Merge one or more arrays |
| [ArrayUtility::mergeInDepth](#ArrayUtilitymergeInDepth) | Merge one or more arrays recursively |
| [ArrayUtility::split](#ArrayUtilitysplit) | Split an array into chunks |
| [ArrayUtility::sort](#ArrayUtilitysort) | Sort elements of an array |
| [ArrayUtility::sortRandom](#ArrayUtilitysortRandom) | Shuffles (randomizes the order of the elements in) an array. |
| [**BooleanUtility**](#BooleanUtility) | Class BooleanUtility |
| [BooleanUtility::createRandom](#BooleanUtilitycreateRandom) |  |
| [BooleanUtility::fromString](#BooleanUtilityfromString) | Converts a string to a boolean value. |
| [BooleanUtility::toString](#BooleanUtilitytoString) | Converts a boolean value to its string representation. |
| [BooleanUtility::areEqual](#BooleanUtilityareEqual) | Checks if two boolean values are equal. |
| [BooleanUtility::isTrue](#BooleanUtilityisTrue) | Checks if a boolean is TRUE. |
| [BooleanUtility::isFalse](#BooleanUtilityisFalse) | Checks if a boolean is FALSE. |
| [BooleanUtility::not](#BooleanUtilitynot) | Negates a boolean value. |
| [BooleanUtility::gnot](#BooleanUtilitygnot) | Performs a logical NOT operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::and](#BooleanUtilityand) | Performs a logical AND operation on two boolean values. |
| [BooleanUtility::gand](#BooleanUtilitygand) | Performs a logical AND operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::nand](#BooleanUtilitynand) | Performs a logical NAND operation on two boolean values. |
| [BooleanUtility::gnand](#BooleanUtilitygnand) | Performs a logical NAND operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::or](#BooleanUtilityor) | Performs a logical OR operation on two boolean values. |
| [BooleanUtility::gor](#BooleanUtilitygor) | Performs a logical OR operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::nor](#BooleanUtilitynor) | Performs a logical NOR operation on two boolean values. |
| [BooleanUtility::gnor](#BooleanUtilitygnor) | Performs a logical NOR operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::xor](#BooleanUtilityxor) | Performs a logical XOR operation on two boolean values. |
| [BooleanUtility::gxor](#BooleanUtilitygxor) | Performs a logical XOR operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::xnor](#BooleanUtilityxnor) | Performs a logical XNOR operation on two boolean values. |
| [BooleanUtility::gxnor](#BooleanUtilitygxnor) | Performs a logical XNOR operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::nxor](#BooleanUtilitynxor) | Alias for xnor |
| [BooleanUtility::xand](#BooleanUtilityxand) | Alias for xnor |
| [BooleanUtility::gnxor](#BooleanUtilitygnxor) | Alias for gxnor |
| [BooleanUtility::gxand](#BooleanUtilitygxand) | Alias for gxnor |
| [**DateTime**](#DateTime) |  |
| [DateTime::getComponents](#DateTimegetComponents) | Summary of toString |
| [DateTime::isLeapSolarHijri](#DateTimeisLeapSolarHijri) | Checks if a Solar Hijri year is leap year |
| [DateTime::isLeapLunarHijri](#DateTimeisLeapLunarHijri) |  |
| [**FileUtility**](#FileUtility) | Class FileUtility |
| [FileUtility::createDirectory](#FileUtilitycreateDirectory) | Creates a directory at the specified path. |
| [FileUtility::loadFileContent](#FileUtilityloadFileContent) | Loads the content of a file. |
| [FileUtility::writeToFile](#FileUtilitywriteToFile) | Writes content to a specified file. |
| [FileUtility::isDirectory](#FileUtilityisDirectory) | Checks if the specified path is a directory. |
| [FileUtility::isNotDirectory](#FileUtilityisNotDirectory) | Checks if the specified path is not a directory. |
| [FileUtility::fileExists](#FileUtilityfileExists) | Checks if a file exists. |
| [FileUtility::fileNotExists](#FileUtilityfileNotExists) | Checks if a file does not exist. |
| [FileUtility::readFromJson](#FileUtilityreadFromJson) | Reads data from a JSON file. |
| [FileUtility::writeToJson](#FileUtilitywriteToJson) | Writes data to a JSON file. |
| [FileUtility::readFromYaml](#FileUtilityreadFromYaml) | Reads data from a YAML file. |
| [FileUtility::writeToYaml](#FileUtilitywriteToYaml) | Writes data to a YAML file. |
| [FileUtility::readFromIni](#FileUtilityreadFromIni) | Reads data from an INI file. |
| [FileUtility::writeToIni](#FileUtilitywriteToIni) | Writes data to an INI file. |
| [FileUtility::readFromXml](#FileUtilityreadFromXml) | Reads data from an XML file. |
| [FileUtility::writeToXml](#FileUtilitywriteToXml) | Writes data to an XML file. |
| [FileUtility::readFromEnv](#FileUtilityreadFromEnv) | Reads key-value pairs from a .env file. |
| [FileUtility::writeToEnv](#FileUtilitywriteToEnv) | Writes key-value pairs to a .env file. |
| [**MathUtility**](#MathUtility) | Class MathUtilityA utility class for common mathematical and physical constants. |
| [MathUtility::round](#MathUtilityround) | Round to the nearest integer. |
| [MathUtility::floor](#MathUtilityfloor) | Floor: Round down to the nearest integer. |
| [MathUtility::ceil](#MathUtilityceil) | Ceil: Round up to the nearest integer. |
| [MathUtility::truncate](#MathUtilitytruncate) | Truncate: Remove decimal part without rounding. |
| [MathUtility::roundHalfUp](#MathUtilityroundHalfUp) | Round Half Up. |
| [MathUtility::roundHalfDown](#MathUtilityroundHalfDown) | Round Half Down. |
| [MathUtility::roundHalfToEven](#MathUtilityroundHalfToEven) | Bankers&#039; Rounding (Round Half to Even). |
| [MathUtility::randomInt](#MathUtilityrandomInt) | Generate a random integer between the given min and max values. |
| [MathUtility::randomFloat](#MathUtilityrandomFloat) | Generate a random float between the given min and max values. |
| [MathUtility::estimateSimpleInterest](#MathUtilityestimateSimpleInterest) | Estimate simple interest. |
| [MathUtility::estimateCompoundInterest](#MathUtilityestimateCompoundInterest) | Estimate compound interest. |
| [MathUtility::estimateFutureValue](#MathUtilityestimateFutureValue) | Estimate the future value of an investment. |
| [MathUtility::estimatePresentValue](#MathUtilityestimatePresentValue) | Estimate the present value of a future amount. |
| [MathUtility::estimateLoanPayment](#MathUtilityestimateLoanPayment) | Estimate monthly loan payment. |
| [MathUtility::estimateTotalPayment](#MathUtilityestimateTotalPayment) | Estimate the total amount paid over the life of the loan. |
| [MathUtility::estimateTotalInterest](#MathUtilityestimateTotalInterest) | Estimate the total interest paid over the life of the loan. |
| [MathUtility::estimateAPR](#MathUtilityestimateAPR) | Estimate the Annual Percentage Rate (APR). |
| [MathUtility::estimateEAR](#MathUtilityestimateEAR) | Estimate the Effective Annual Rate (EAR). |
| [MathUtility::generateAmortizationSchedule](#MathUtilitygenerateAmortizationSchedule) | Generate a loan amortization schedule. |
| [MathUtility::estimateLoanPayoffTime](#MathUtilityestimateLoanPayoffTime) | Estimate the loan payoff time in months. |
| [MathUtility::estimateNPV](#MathUtilityestimateNPV) | Estimate the Net Present Value (NPV) of cash flows. |
| [MathUtility::compareLoans](#MathUtilitycompareLoans) | Compare two loans based on total cost. |
| [MathUtility::addVectors](#MathUtilityaddVectors) | Add two vectors element-wise |
| [MathUtility::subtractVectors](#MathUtilitysubtractVectors) | Subtract two vectors element-wise |
| [MathUtility::scalarMultiply](#MathUtilityscalarMultiply) | Multiply vector by scalar |
| [MathUtility::normalize](#MathUtilitynormalize) | Normalize vector (convert to unit vector) |
| [MathUtility::magnitude](#MathUtilitymagnitude) | Calculate vector magnitude (Euclidean norm) |
| [MathUtility::dotProduct](#MathUtilitydotProduct) | Dot product of two vectors |
| [MathUtility::angleBetween](#MathUtilityangleBetween) | Calculate angle between two vectors in radians |
| [MathUtility::vectorSum](#MathUtilityvectorSum) | Calculate sum of vector elements |
| [MathUtility::vectorAvg](#MathUtilityvectorAvg) | Calculate average of vector elements |
| [MathUtility::vectorMin](#MathUtilityvectorMin) | Find minimum value in vector |
| [MathUtility::vectorMax](#MathUtilityvectorMax) | Find maximum value in vector |
| [MathUtility::crossProduct1D](#MathUtilitycrossProduct1D) | 1D cross product (returns scalar value) |
| [MathUtility::projection](#MathUtilityprojection) | Project vector A onto vector B |
| [MathUtility::vectorAppend](#MathUtilityvectorAppend) | Append value to vector (modifies original vector) |
| [MathUtility::vectorReverse](#MathUtilityvectorReverse) | Reverse vector elements |
| [MathUtility::sin](#MathUtilitysin) | Calculates the sine of an angle. |
| [MathUtility::cos](#MathUtilitycos) | Calculates the cosine of an angle. |
| [MathUtility::tan](#MathUtilitytan) | Calculates the tangent of an angle. |
| [MathUtility::asin](#MathUtilityasin) | Calculates the arcsine (inverse sine) of a value. |
| [MathUtility::acos](#MathUtilityacos) | Calculates the arccosine (inverse cosine) of a value. |
| [MathUtility::atan](#MathUtilityatan) | Calculates the arctangent (inverse tangent) of a value. |
| [MathUtility::atan2](#MathUtilityatan2) | Calculates the arctangent of y/x, using the signs of the arguments to determine the quadrant of the result. |
| [MathUtility::sinh](#MathUtilitysinh) | Calculates the hyperbolic sine of a value. |
| [MathUtility::cosh](#MathUtilitycosh) | Calculates the hyperbolic cosine of a value. |
| [MathUtility::tanh](#MathUtilitytanh) | Calculates the hyperbolic tangent of a value. |
| [MathUtility::asinh](#MathUtilityasinh) | Calculates the inverse hyperbolic sine of a value. |
| [MathUtility::acosh](#MathUtilityacosh) | Calculates the inverse hyperbolic cosine of a value. |
| [MathUtility::atanh](#MathUtilityatanh) | Calculates the inverse hyperbolic tangent of a value. |
| [MathUtility::deg2rad](#MathUtilitydeg2rad) | Converts an angle from degrees to radians. |
| [MathUtility::rad2deg](#MathUtilityrad2deg) | Converts an angle from radians to degrees. |
| [MathUtility::exponential](#MathUtilityexponential) | Calculate the exponential of a number. |
| [MathUtility::naturalLog](#MathUtilitynaturalLog) | Calculate the natural logarithm of a number. |
| [MathUtility::logBase10](#MathUtilitylogBase10) | Calculate the base 10 logarithm of a number. |
| [MathUtility::logBase2](#MathUtilitylogBase2) | Calculate the base 2 logarithm of a number. |
| [MathUtility::logBase](#MathUtilitylogBase) | Calculate the logarithm of a number with an arbitrary base. |
| [MathUtility::changeBase](#MathUtilitychangeBase) | Change the base of a logarithm from one base to another. |
| [MathUtility::inverseNaturalLog](#MathUtilityinverseNaturalLog) | Calculate the inverse of the natural logarithm. |
| [MathUtility::inverseLogBase10](#MathUtilityinverseLogBase10) | Calculate the inverse of the base 10 logarithm. |
| [MathUtility::inverseLogBase2](#MathUtilityinverseLogBase2) | Calculate the inverse of the base 2 logarithm. |
| [MathUtility::exponentialGrowth](#MathUtilityexponentialGrowth) | Calculate exponential growth. |
| [MathUtility::exponentialDecay](#MathUtilityexponentialDecay) | Calculate exponential decay. |
| [MathUtility::power](#MathUtilitypower) | Calculate the power of a base raised to an exponent. |
| [MathUtility::solveExponentialEquation](#MathUtilitysolveExponentialEquation) | Solve for x in the equation a^x = b. |
| [MathUtility::logFactorial](#MathUtilitylogFactorial) | Calculate the logarithm of a factorial (log(n!)). |
| [MathUtility::addMatrix](#MathUtilityaddMatrix) | Add two matrices. |
| [MathUtility::subtractMatrix](#MathUtilitysubtractMatrix) | Subtract two matrices. |
| [MathUtility::multiplyMatrix](#MathUtilitymultiplyMatrix) | Multiply two matrices. |
| [MathUtility::inverseMatrix](#MathUtilityinverseMatrix) | Calculate the inverse of a matrix. |
| [MathUtility::eigenvaluesMatrix](#MathUtilityeigenvaluesMatrix) | Get the eigenvalues of a matrix (simplified for 2x2 matrices). |
| [MathUtility::luDecompositionMatrix](#MathUtilityluDecompositionMatrix) | Perform LU decomposition of a matrix. |
| [MathUtility::qrDecompositionMatrix](#MathUtilityqrDecompositionMatrix) | Perform QR decomposition of a matrix using Gram-Schmidt process. |
| [MathUtility::subsetMatrix](#MathUtilitysubsetMatrix) | Get a subset of a matrix. |
| [MathUtility::mean](#MathUtilitymean) | Calculate the mean of an array of numbers. |
| [MathUtility::median](#MathUtilitymedian) | Calculate the median of an array of numbers. |
| [MathUtility::mode](#MathUtilitymode) | Calculate the mode of an array of numbers. |
| [MathUtility::variance](#MathUtilityvariance) | Calculate the sample variance of an array of numbers. |
| [MathUtility::populationVariance](#MathUtilitypopulationVariance) | Calculate the population variance of an array of numbers. |
| [MathUtility::standardDeviation](#MathUtilitystandardDeviation) | Calculate the sample standard deviation of an array of numbers. |
| [MathUtility::populationStandardDeviation](#MathUtilitypopulationStandardDeviation) | Calculate the population standard deviation of an array of numbers. |
| [MathUtility::correlation](#MathUtilitycorrelation) | Calculate the correlation coefficient between two variables. |
| [MathUtility::multipleLinearRegression](#MathUtilitymultipleLinearRegression) | Perform multiple linear regression to calculate coefficients. |
| [MathUtility::normalDistributionPDF](#MathUtilitynormalDistributionPDF) | Calculate the normal distribution PDF. |
| [MathUtility::normalDistributionCDF](#MathUtilitynormalDistributionCDF) | Calculate the normal distribution CDF. |
| [MathUtility::binomialProbability](#MathUtilitybinomialProbability) | Calculate the binomial probability. |
| [MathUtility::poissonDistribution](#MathUtilitypoissonDistribution) | Calculate the Poisson distribution PDF. |
| [MathUtility::exponentialDistributionPDF](#MathUtilityexponentialDistributionPDF) | Calculate the exponential distribution PDF. |
| [MathUtility::exponentialDistributionCDF](#MathUtilityexponentialDistributionCDF) | Calculate the exponential distribution CDF. |
| [MathUtility::uniformDistributionPDF](#MathUtilityuniformDistributionPDF) | Calculate the uniform distribution PDF. |
| [MathUtility::uniformDistributionCDF](#MathUtilityuniformDistributionCDF) | Calculate the uniform distribution CDF. |
| [MathUtility::skewness](#MathUtilityskewness) | Calculate the sample skewness of an array of numbers. |
| [MathUtility::kurtosis](#MathUtilitykurtosis) | Calculate the sample kurtosis of an array of numbers. |
| [MathUtility::gcd](#MathUtilitygcd) | Calculate the greatest common divisor (GCD) of two numbers. |
| [MathUtility::lcm](#MathUtilitylcm) | Calculate the least common multiple (LCM) of two numbers. |
| [MathUtility::isPrime](#MathUtilityisPrime) | Check if a number is prime. |
| [MathUtility::generatePrimes](#MathUtilitygeneratePrimes) | Generate a list of prime numbers up to a given limit. |
| [MathUtility::fibonacci](#MathUtilityfibonacci) | Calculate the Fibonacci number at a given position. |
| [MathUtility::isPerfectSquare](#MathUtilityisPerfectSquare) | Check if a number is a perfect square. |
| [MathUtility::primeFactorization](#MathUtilityprimeFactorization) | Find the prime factorization of a number. |
| [MathUtility::sumOfDivisors](#MathUtilitysumOfDivisors) | Calculate the sum of divisors of a number. |
| [MathUtility::eulerTotient](#MathUtilityeulerTotient) | Calculate Euler&#039;s Totient function for a given number. |
| [MathUtility::areCoprime](#MathUtilityareCoprime) | Check if two numbers are coprime (i.e., their GCD is 1). |
| [MathUtility::generatePerfectNumbers](#MathUtilitygeneratePerfectNumbers) | Generate a list of perfect numbers up to a given limit. |
| [MathUtility::differentiate](#MathUtilitydifferentiate) |  |
| [MathUtility::integrate](#MathUtilityintegrate) |  |
| [MathUtility::evaluate](#MathUtilityevaluate) |  |
| [MathUtility::findQuadraticRoots](#MathUtilityfindQuadraticRoots) |  |
| [MathUtility::limit](#MathUtilitylimit) |  |
| [MathUtility::taylorSeries](#MathUtilitytaylorSeries) |  |
| [MathUtility::numericalIntegration](#MathUtilitynumericalIntegration) |  |
| [MathUtility::partialDerivative](#MathUtilitypartialDerivative) |  |
| [MathUtility::gradient](#MathUtilitygradient) |  |
| [MathUtility::secondDerivative](#MathUtilitysecondDerivative) |  |
| [MathUtility::findLocalExtrema](#MathUtilityfindLocalExtrema) |  |
| [MathUtility::areaUnderCurve](#MathUtilityareaUnderCurve) |  |
| [MathUtility::areaOfCircle](#MathUtilityareaOfCircle) | Calculate the area of a circle. |
| [MathUtility::circumferenceOfCircle](#MathUtilitycircumferenceOfCircle) | Calculate the circumference of a circle. |
| [MathUtility::areaOfRectangle](#MathUtilityareaOfRectangle) | Calculate the area of a rectangle. |
| [MathUtility::perimeterOfRectangle](#MathUtilityperimeterOfRectangle) | Calculate the perimeter of a rectangle. |
| [MathUtility::areaOfTriangle](#MathUtilityareaOfTriangle) | Calculate the area of a triangle. |
| [MathUtility::perimeterOfTriangle](#MathUtilityperimeterOfTriangle) | Calculate the perimeter of a triangle (assuming it&#039;s a right triangle). |
| [MathUtility::areaOfSquare](#MathUtilityareaOfSquare) | Calculate the area of a square. |
| [MathUtility::perimeterOfSquare](#MathUtilityperimeterOfSquare) | Calculate the perimeter of a square. |
| [MathUtility::volumeOfCube](#MathUtilityvolumeOfCube) | Calculate the volume of a cube. |
| [MathUtility::surfaceAreaOfCube](#MathUtilitysurfaceAreaOfCube) | Calculate the surface area of a cube. |
| [MathUtility::volumeOfRectangularPrism](#MathUtilityvolumeOfRectangularPrism) | Calculate the volume of a rectangular prism. |
| [MathUtility::surfaceAreaOfRectangularPrism](#MathUtilitysurfaceAreaOfRectangularPrism) | Calculate the surface area of a rectangular prism. |
| [MathUtility::areaOfTrapezoid](#MathUtilityareaOfTrapezoid) | Calculate the area of a trapezoid. |
| [MathUtility::areaOfParallelogram](#MathUtilityareaOfParallelogram) | Calculate the area of a parallelogram. |
| [MathUtility::areaOfEllipse](#MathUtilityareaOfEllipse) | Calculate the area of an ellipse. |
| [MathUtility::circumferenceOfEllipse](#MathUtilitycircumferenceOfEllipse) | Calculate the circumference of an ellipse (approximation). |
| [**PHP**](#PHP) |  |
| [PHP::version](#PHPversion) | Get PHP version |
| [PHP::versionID](#PHPversionID) | Get PHP version as a number |
| [PHP::versionMajor](#PHPversionMajor) | Get PHP major version |
| [PHP::versionMinor](#PHPversionMinor) | Get PHP minor Version |
| [PHP::versionRelease](#PHPversionRelease) | Get PHP release version |
| [**Polyfill**](#Polyfill) | Class PolyfillProvides multibyte string functions to polyfill missing PHP functionality. |
| [Polyfill::mb_str_pad](#Polyfillmb_str_pad) | Pads a string to a certain length with another string. |
| [Polyfill::mb_strlen](#Polyfillmb_strlen) | Get the length of a multibyte string. |
| [Polyfill::mb_internal_encoding](#Polyfillmb_internal_encoding) | Get or set the internal encoding. |
| [Polyfill::iconv](#Polyfilliconv) | Convert character encoding. |
| [Polyfill::mb_split](#Polyfillmb_split) | Split a string into an array using a regular expression. |
| [Polyfill::mb_str_split](#Polyfillmb_str_split) | Split a multibyte string into an array. |
| [Polyfill::mb_substr](#Polyfillmb_substr) | Get a part of a multibyte string. |
| [Polyfill::mb_trim](#Polyfillmb_trim) | Trim whitespace or other characters from both sides of a multibyte string. |
| [Polyfill::mb_ltrim](#Polyfillmb_ltrim) | Trim characters from the left side of a multibyte string. |
| [Polyfill::mb_rtrim](#Polyfillmb_rtrim) | Trim characters from the right side of a multibyte string. |
| [Polyfill::mb_strpos](#Polyfillmb_strpos) | Find the position of the first occurrence of a substring in a multibyte string. |
| [Polyfill::mb_strrev](#Polyfillmb_strrev) | Reverse a multibyte string. |
| [Polyfill::mb_str_shuffle](#Polyfillmb_str_shuffle) | Shuffle the characters of a multibyte string. |
| [Polyfill::chr](#Polyfillchr) | Get a character from an ASCII value. |
| [Polyfill::polyfill_mb_detect_encoding](#Polyfillpolyfill_mb_detect_encoding) | Detect the encoding of a string. |
| [Polyfill::mb_detect_encoding](#Polyfillmb_detect_encoding) | Detect the encoding of a string. |
| [Polyfill::mb_detect_order](#Polyfillmb_detect_order) | Get or set the order of encodings to use for detection. |
| [Polyfill::ord](#Polyfillord) | Get the ASCII value of the first character of a string. |
| [Polyfill::mb_ord](#Polyfillmb_ord) | Get the codepoint of a character. |
| [Polyfill::str_contains](#Polyfillstr_contains) | Check if a string contains a substring. |
| [Polyfill::str_starts_with](#Polyfillstr_starts_with) | Check if a string starts with a given substring. |
| [Polyfill::str_ends_with](#Polyfillstr_ends_with) | Check if a string ends with a given substring. |
| [Polyfill::mb_chr](#Polyfillmb_chr) | Get a character from a Unicode codepoint. |
| [Polyfill::mb_convert_encoding](#Polyfillmb_convert_encoding) | Convert a string from one character encoding to another. |
| [Polyfill::mb_check_encoding](#Polyfillmb_check_encoding) | Check if a string is valid for a given encoding. |
| [Polyfill::password_verify](#Polyfillpassword_verify) | Verify a password against a hashed value. |
| [Polyfill::password_hash](#Polyfillpassword_hash) | Hash a password using a secure algorithm. |
| [Polyfill::yaml_parse](#Polyfillyaml_parse) | Polyfill for yaml_parse function. |
| [Polyfill::yaml_emit](#Polyfillyaml_emit) | Polyfill for yaml_emit function. |
| [Polyfill::arrayToXml](#PolyfillarrayToXml) | Converts an associative array to XML format. |
| [Polyfill::xmlToArray](#PolyfillxmlToArray) | Converts XML to an associative array. |
| [**RandomUtility**](#RandomUtility) | Class RandomUtility |
| [RandomUtility::randomInt](#RandomUtilityrandomInt) | Generates a random integer between the specified minimum and maximum values. |
| [RandomUtility::randomFloat](#RandomUtilityrandomFloat) | Generates a random float between the specified minimum and maximum values. |
| [RandomUtility::randomBool](#RandomUtilityrandomBool) | Generates a random boolean value. |
| [RandomUtility::randomString](#RandomUtilityrandomString) | Generates a random string of the specified length using predefined characters. |
| [RandomUtility::randomArray](#RandomUtilityrandomArray) | Generates an array of random values of the specified count. |
| [RandomUtility::randomObject](#RandomUtilityrandomObject) | Generates a random object with properties based on random values. |
| [**SecurityUtility**](#SecurityUtility) |  |
| [SecurityUtility::hashPassword](#SecurityUtilityhashPassword) | Hash a password using SHA-256. |
| [SecurityUtility::verifyPassword](#SecurityUtilityverifyPassword) | Verify a password against a hashed value. |
| [SecurityUtility::generateToken](#SecurityUtilitygenerateToken) | Generate a secure random token. |
| [SecurityUtility::sanitizeString](#SecurityUtilitysanitizeString) | Sanitize a string to prevent XSS. |
| [SecurityUtility::validateEmail](#SecurityUtilityvalidateEmail) | Validate an email address. |
| [SecurityUtility::generateRandomPassword](#SecurityUtilitygenerateRandomPassword) | Generate a random password. |
| [SecurityUtility::isStrongPassword](#SecurityUtilityisStrongPassword) | Check if a string is a strong password. |
| [SecurityUtility::encryptData](#SecurityUtilityencryptData) | Encrypt data using a simple XOR cipher (not secure for sensitive data). |
| [SecurityUtility::decryptData](#SecurityUtilitydecryptData) | Decrypt data encrypted by the XOR cipher. |
| [SecurityUtility::generateRandomString](#SecurityUtilitygenerateRandomString) | Generate a random alphanumeric string. |
| [SecurityUtility::generateRandomInt](#SecurityUtilitygenerateRandomInt) | Generate a random integer. |
| [SecurityUtility::generateRandomFloat](#SecurityUtilitygenerateRandomFloat) | Generate a random float. |
| [SecurityUtility::generateUUID](#SecurityUtilitygenerateUUID) | Generate a random UUID. |
| [SecurityUtility::generateSecureRandomBytes](#SecurityUtilitygenerateSecureRandomBytes) | Generate a secure random binary string. |
| [SecurityUtility::validateURL](#SecurityUtilityvalidateURL) | Validate a URL. |
| [SecurityUtility::validatePhoneNumber](#SecurityUtilityvalidatePhoneNumber) | Validate a phone number (simple validation). |
| [SecurityUtility::hashWithBcrypt](#SecurityUtilityhashWithBcrypt) | Generate a secure hash using bcrypt. |
| [SecurityUtility::verifyBcryptPassword](#SecurityUtilityverifyBcryptPassword) | Verify a bcrypt-hashed password. |
| [SecurityUtility::generateRandomColor](#SecurityUtilitygenerateRandomColor) | Generate a random color in HEX format. |
| [SecurityUtility::sanitizeArray](#SecurityUtilitysanitizeArray) | Sanitize an array of strings. |
| [SecurityUtility::generateSecurityQuestion](#SecurityUtilitygenerateSecurityQuestion) | Generate a random security question. |
| [SecurityUtility::generateSecurityAnswer](#SecurityUtilitygenerateSecurityAnswer) | Generate a random answer for a security question. |
| [SecurityUtility::getClientIP](#SecurityUtilitygetClientIP) | Get the current IP address. |
| [SecurityUtility::getUserAgent](#SecurityUtilitygetUserAgent) | Get the current user agent. |
| [SecurityUtility::generateSessionID](#SecurityUtilitygenerateSessionID) | Generate a random session ID. |
| [SecurityUtility::isValidJSON](#SecurityUtilityisValidJSON) | Check if a string is a valid JSON. |
| [SecurityUtility::generateRandomStringFromSet](#SecurityUtilitygenerateRandomStringFromSet) | Generate a random string of a specified character set. |
| [SecurityUtility::aesEncrypt](#SecurityUtilityaesEncrypt) | Encrypt a string using AES-256. |
| [SecurityUtility::aesDecrypt](#SecurityUtilityaesDecrypt) | Decrypt a string using AES-256. |
| [SecurityUtility::generateAPIKey](#SecurityUtilitygenerateAPIKey) | Generate a random API key. |
| [SecurityUtility::createCSRFToken](#SecurityUtilitycreateCSRFToken) | Create a CSRF token. |
| [SecurityUtility::validateCSRFToken](#SecurityUtilityvalidateCSRFToken) | Validate a CSRF token. |
| [SecurityUtility::generateHMACKey](#SecurityUtilitygenerateHMACKey) | Generate a random secret key for HMAC. |
| [SecurityUtility::generateHMAC](#SecurityUtilitygenerateHMAC) | Generate HMAC for a given data. |
| [SecurityUtility::validateHMAC](#SecurityUtilityvalidateHMAC) | Validate HMAC for a given data. |
| [SecurityUtility::generateSalt](#SecurityUtilitygenerateSalt) | Generate a random salt. |
| [SecurityUtility::hashPasswordWithSalt](#SecurityUtilityhashPasswordWithSalt) | Hash a password with a salt. |
| [SecurityUtility::verifyPasswordWithSalt](#SecurityUtilityverifyPasswordWithSalt) | Verify a password with a salt. |
| [SecurityUtility::generateRandomPhrase](#SecurityUtilitygenerateRandomPhrase) | Generate a random phrase (for testing). |
| [**SqlUtility**](#SqlUtility) |  |
| [SqlUtility::selectQuery](#SqlUtilityselectQuery) | selectQuery is a versatile function that dynamically builds a SQL SELECTstatement based on the provided parameters. It handles various SQL syntaxdifferences across multiple database systems, ensuring that the correctsyntax is used for limiting results, grouping, ordering, and filteringdata. The method is designed to be flexible and reusable for differentdatabase interactions. |
| [SqlUtility::updateQuery](#SqlUtilityupdateQuery) | The updateQuery method is a flexible function that constructs a SQLUPDATE statement dynamically based on the provided parameters. It handlesthe creation of the SET and WHERE clauses, ensuring proper parameterbinding to prevent SQL injection. This method is designed to be reusablefor updating rows in different tables with varying conditions. |
| [SqlUtility::deleteQuery](#SqlUtilitydeleteQuery) | The deleteQuery method is a straightforward function that constructs aSQL DELETE statement dynamically based on the provided parameters. Itbuilds the WHERE clause to specify which rows to delete, ensuring properparameter binding to prevent SQL injection. This method is designed to bereusable for deleting records from different tables based on variousconditions. |
| [SqlUtility::insertQuery](#SqlUtilityinsertQuery) | This function is designed to handle both single-row and multi-rowinserts into a database table. It dynamically constructs the SQL queryand ensures that parameter names are unique to prevent conflicts duringexecution. |
| [SqlUtility::unionQuery](#SqlUtilityunionQuery) | Create union query |
| [SqlUtility::createTable](#SqlUtilitycreateTable) | Creates a SQL CREATE TABLE statement. |
| [SqlUtility::alterTable](#SqlUtilityalterTable) | Alters an existing table to add or drop columns. |
| [SqlUtility::dropTable](#SqlUtilitydropTable) | Drops an existing table. |
| [SqlUtility::modifyColumn](#SqlUtilitymodifyColumn) | Modifies an existing column in a table. |
| [SqlUtility::addIndex](#SqlUtilityaddIndex) | Adds an index to a table. |
| [SqlUtility::dropIndex](#SqlUtilitydropIndex) | Drops an existing index from a table. |
| [SqlUtility::createDatabase](#SqlUtilitycreateDatabase) | Creates a new database. |
| [SqlUtility::dropDatabase](#SqlUtilitydropDatabase) | Drops an existing database. |
| [SqlUtility::buildOrderClause](#SqlUtilitybuildOrderClause) |  |
| [SqlUtility::buildWhereClause](#SqlUtilitybuildWhereClause) |  |
| [**StringUtility**](#StringUtility) | Class StringUtility |
| [StringUtility::create](#StringUtilitycreate) | Creates a string consisting of a specified character repeated to a givenlength. |
| [StringUtility::createRandom](#StringUtilitycreateRandom) | Generates a random string of a specified length using the providedcharacters. |
| [StringUtility::createByRepeat](#StringUtilitycreateByRepeat) | Repeats a given string a specified number of times. |
| [StringUtility::get](#StringUtilityget) | Retrieves a character from a string at a specified index. |
| [StringUtility::getSubset](#StringUtilitygetSubset) | Retrieves a subset of a string starting from a given index. |
| [StringUtility::getSegment](#StringUtilitygetSegment) | Retrieves a segment of a string between two specified indices. |
| [StringUtility::set](#StringUtilityset) | Sets a character at a specified index in the given string. |
| [StringUtility::setReplace](#StringUtilitysetReplace) | Replaces occurrences of a substring within a string. |
| [StringUtility::setInStart](#StringUtilitysetInStart) | Pads the string on the left with a specified character to a given length. |
| [StringUtility::setInEnd](#StringUtilitysetInEnd) | Pads the string on the right with a specified character to a given length. |
| [StringUtility::hasPhrase](#StringUtilityhasPhrase) | Checks if a specified phrase exists within a given string. |
| [StringUtility::addToStart](#StringUtilityaddToStart) | Adds a specified value to the start of the given string. |
| [StringUtility::addToEnd](#StringUtilityaddToEnd) | Adds a specified value to the end of the given string. |
| [StringUtility::addToCenter](#StringUtilityaddToCenter) | Adds a specified value to the center of the given string. |
| [StringUtility::addEvenly](#StringUtilityaddEvenly) | Adds a specified value evenly throughout the given string. |
| [StringUtility::drop](#StringUtilitydrop) | Drops specified characters from the given string. |
| [StringUtility::dropFirst](#StringUtilitydropFirst) | Drops the first character from the given string. |
| [StringUtility::dropLast](#StringUtilitydropLast) | Drops the last character from the given string. |
| [StringUtility::dropNth](#StringUtilitydropNth) | Drops the character at the specified index from the given string. |
| [StringUtility::dropFromSides](#StringUtilitydropFromSides) | Drops specified characters from both ends of the given string. |
| [StringUtility::dropFromStart](#StringUtilitydropFromStart) | Drops specified characters from the start of the given string. |
| [StringUtility::dropFromEnd](#StringUtilitydropFromEnd) | Drops specified characters from the end of the given string. |
| [StringUtility::dropSeparator](#StringUtilitydropSeparator) | Drops specified separators from the given string. |
| [StringUtility::dropSpace](#StringUtilitydropSpace) | Drops all spaces from the given string. |
| [StringUtility::dropExtras](#StringUtilitydropExtras) | Truncates a string to a specified length and appends ellipsis if needed. |
| [StringUtility::transformToReverse](#StringUtilitytransformToReverse) | Transforms the given string to its reverse. |
| [StringUtility::transformToShuffle](#StringUtilitytransformToShuffle) | Transforms the given string by shuffling its characters. |
| [StringUtility::transformToNoTag](#StringUtilitytransformToNoTag) | Transforms the given string by stripping HTML and PHP tags. |
| [StringUtility::transformToLowercase](#StringUtilitytransformToLowercase) | Transforms the given string to lowercase. |
| [StringUtility::transformToUppercase](#StringUtilitytransformToUppercase) | Transforms the given string to uppercase. |
| [StringUtility::transformToLowercaseFirst](#StringUtilitytransformToLowercaseFirst) | Transforms the given string to lowercase, capitalizing the first character. |
| [StringUtility::transformToUppercaseFirst](#StringUtilitytransformToUppercaseFirst) | Transforms the given string to uppercase, capitalizing the first character. |
| [StringUtility::transformToCapital](#StringUtilitytransformToCapital) | Capitalizes the first letter of each word in the string. |
| [StringUtility::transformToFlatcase](#StringUtilitytransformToFlatcase) | Transforms the given string to flatcase. |
| [StringUtility::transformToPascalCase](#StringUtilitytransformToPascalCase) | Transforms the given string to PascalCase. |
| [StringUtility::transformToTitleCase](#StringUtilitytransformToTitleCase) | Converts a string to title case. |
| [StringUtility::transformToCamelcase](#StringUtilitytransformToCamelcase) | Transforms the given string to camelCase. |
| [StringUtility::transformToSnakecase](#StringUtilitytransformToSnakecase) | Transforms the given string to snake_case. |
| [StringUtility::transformToMacrocase](#StringUtilitytransformToMacrocase) | Transforms the given string to MACROCASE. |
| [StringUtility::transformToPascalSnakecase](#StringUtilitytransformToPascalSnakecase) | Transforms the given string to Pascal_Snake_Case. |
| [StringUtility::transformToCamelSnakecase](#StringUtilitytransformToCamelSnakecase) | Transforms the given string to camel_snake_case. |
| [StringUtility::transformToKebabcase](#StringUtilitytransformToKebabcase) | Transforms the given string to kebab-case. |
| [StringUtility::transformToCobolcase](#StringUtilitytransformToCobolcase) | Transforms the given string to COBOLCASE. |
| [StringUtility::transformToTraincase](#StringUtilitytransformToTraincase) | Transforms the given string to train-case. |
| [StringUtility::transformToMetaphone](#StringUtilitytransformToMetaphone) | Transforms the given string to its metaphone representation. |
| [StringUtility::transformToSoundex](#StringUtilitytransformToSoundex) | Transforms the given string to its soundex representation. |
| [StringUtility::isEqualTo](#StringUtilityisEqualTo) | Checks if two strings are equal. |
| [StringUtility::isSameAs](#StringUtilityisSameAs) | Checks if two strings are equal, ignoring case. |
| [StringUtility::isStartedBy](#StringUtilityisStartedBy) | Checks if a string starts with a given substring. |
| [StringUtility::isEndedWith](#StringUtilityisEndedWith) | Checks if a string ends with a given substring. |
| [StringUtility::isPalindrome](#StringUtilityisPalindrome) | Checks if a string is a palindrome. |
| [StringUtility::estimateLength](#StringUtilityestimateLength) | Estimates the length of a string. |
| [StringUtility::estimateCounts](#StringUtilityestimateCounts) | Estimates the counts of each character in a string. |
| [StringUtility::estimateSimilarity](#StringUtilityestimateSimilarity) | Compares two strings and returns a similarity score. |
| [StringUtility::estimateLevenshteinDistance](#StringUtilityestimateLevenshteinDistance) | Calculates the Levenshtein distance between two strings. |
| [StringUtility::merge](#StringUtilitymerge) | Merges multiple strings into a single string using a specified separator. |
| [StringUtility::split](#StringUtilitysplit) | Splits a string into segments of specified length. |
| [StringUtility::splitBy](#StringUtilitysplitBy) | Splits a string by a specified separator. |
| [StringUtility::toHex](#StringUtilitytoHex) | Converts a string to its hexadecimal representation. |
| [StringUtility::fromHex](#StringUtilityfromHex) | Converts a hexadecimal string back to its original form. |
| [StringUtility::toAscii](#StringUtilitytoAscii) | Converts a character to its ASCII value. |
| [StringUtility::fromAscii](#StringUtilityfromAscii) | Converts an ASCII value back to its corresponding character. |
| [StringUtility::toFormat](#StringUtilitytoFormat) | Formats values into a string according to a specified format. |
| [StringUtility::fromFormat](#StringUtilityfromFormat) | Parses a string according to a specified format. |
| [StringUtility::toArray](#StringUtilitytoArray) | Converts a string into an array of its characters. |
| [StringUtility::toArrayWithSeparator](#StringUtilitytoArrayWithSeparator) | Converts a string into an array using a custom separator. |
| [StringUtility::fromArray](#StringUtilityfromArray) | Converts an array of strings back into a single string. |
| [StringUtility::toInteger](#StringUtilitytoInteger) | Converts a string to an integer. |
| [StringUtility::fromInteger](#StringUtilityfromInteger) | Converts an integer back to a string. |
| [StringUtility::toFloat](#StringUtilitytoFloat) | Converts a string to a float. |
| [StringUtility::fromFloat](#StringUtilityfromFloat) | Converts a float back to a string. |
| [StringUtility::toBoolean](#StringUtilitytoBoolean) | Converts a string to a boolean value. |
| [StringUtility::fromBoolean](#StringUtilityfromBoolean) | Converts a boolean value to its string representation. |
| [StringUtility::inRot](#StringUtilityinRot) | Encodes a string using ROT13. |
| [StringUtility::ofRot](#StringUtilityofRot) | Decodes a string using ROT13. |
| [StringUtility::inSlashes](#StringUtilityinSlashes) | Escapes special characters in a string using slashes. |
| [StringUtility::ofSlashes](#StringUtilityofSlashes) | Unescapes special characters in a string. |
| [StringUtility::inUU](#StringUtilityinUU) | Encodes a string using UU encoding. |
| [StringUtility::ofUU](#StringUtilityofUU) | Decodes a UU encoded string. |
| [StringUtility::inSafeCharacters](#StringUtilityinSafeCharacters) | Converts special characters to HTML entities. |
| [StringUtility::ofSafeCharacters](#StringUtilityofSafeCharacters) | Converts HTML entities back to their corresponding characters. |
| [StringUtility::inHtmlEntities](#StringUtilityinHtmlEntities) | Converts special characters to HTML entities with quotes. |
| [StringUtility::ofHtmlEntities](#StringUtilityofHtmlEntities) | Converts HTML entities back to their corresponding characters with quotes. |
| [StringUtility::inBase64](#StringUtilityinBase64) | Encodes a string using Base64 encoding. |
| [StringUtility::ofBase64](#StringUtilityofBase64) | Decodes a Base64 encoded string. |
| [StringUtility::hashMD5](#StringUtilityhashMD5) | Generates an MD5 hash of a given string. |
| [StringUtility::hashSHA](#StringUtilityhashSHA) | Generates a SHA-1 hash of a given string. |
| [StringUtility::hashChecksum](#StringUtilityhashChecksum) | Generates a checksum for a given string using SHA-1. |
| [StringUtility::validateChecksum](#StringUtilityvalidateChecksum) | Validates a given string against a provided checksum. |
| [StringUtility::slugify](#StringUtilityslugify) | Converts a string into a URL-friendly slug. |
| [StringUtility::interpolate](#StringUtilityinterpolate) | Interpolates variables into a string template. |
| [StringUtility::formatPhoneNumber](#StringUtilityformatPhoneNumber) | Formats a given phone number into a specified format. |
| [StringUtility::validatePhoneNumber](#StringUtilityvalidatePhoneNumber) | Validates a phone number. |
| [StringUtility::validateEmail](#StringUtilityvalidateEmail) | Validates an email address. |
| [StringUtility::validateName](#StringUtilityvalidateName) | Validates a name. |
| [StringUtility::validateURL](#StringUtilityvalidateURL) | Validates a URL. |
| [StringUtility::validateDate](#StringUtilityvalidateDate) | Validates a date in YYYY-MM-DD format. |
| [StringUtility::validatePassword](#StringUtilityvalidatePassword) | Validates a password. |
| [StringUtility::validateCreditCard](#StringUtilityvalidateCreditCard) | Validates a credit card number using the Luhn algorithm. |
| [StringUtility::validateUsername](#StringUtilityvalidateUsername) | Validates a username. |
| [StringUtility::validatePostalCode](#StringUtilityvalidatePostalCode) | Validates a postal code. |
| [StringUtility::validateIP](#StringUtilityvalidateIP) | Validates an IP address. |
| [**TypesUtility**](#TypesUtility) | Class TypesUtility |
| [TypesUtility::getType](#TypesUtilitygetType) | Get the type of a variable. |
| [TypesUtility::isArray](#TypesUtilityisArray) | Check if the variable is an array. |
| [TypesUtility::isNotArray](#TypesUtilityisNotArray) | Check if the variable is not an array. |
| [TypesUtility::isBoolean](#TypesUtilityisBoolean) | Check if the variable is a boolean. |
| [TypesUtility::isNotBoolean](#TypesUtilityisNotBoolean) | Check if the variable is not a boolean. |
| [TypesUtility::isBool](#TypesUtilityisBool) | An alias to isBoolean() |
| [TypesUtility::isNotBool](#TypesUtilityisNotBool) | An alias to isMotBoolean() |
| [TypesUtility::isCallable](#TypesUtilityisCallable) | Check if the variable is callable. |
| [TypesUtility::isNotCallable](#TypesUtilityisNotCallable) | Check if the variable is not callable. |
| [TypesUtility::isCountable](#TypesUtilityisCountable) | Check if the variable is countable. |
| [TypesUtility::isNotCountable](#TypesUtilityisNotCountable) | Check if the variable is not countable. |
| [TypesUtility::isFloat](#TypesUtilityisFloat) | Check if the variable is a float. |
| [TypesUtility::isNotFloat](#TypesUtilityisNotFloat) | Check if the variable is not a float. |
| [TypesUtility::isDouble](#TypesUtilityisDouble) | An alias to isFloat() |
| [TypesUtility::isNotDouble](#TypesUtilityisNotDouble) | An alias to isNotFloat() |
| [TypesUtility::isInteger](#TypesUtilityisInteger) | Check if the variable is an integer. |
| [TypesUtility::isNotInteger](#TypesUtilityisNotInteger) | Check if the variable is not an integer. |
| [TypesUtility::isInt](#TypesUtilityisInt) | An alias to isInteger() |
| [TypesUtility::isNotInt](#TypesUtilityisNotInt) | An alias to isNotInteger() |
| [TypesUtility::isIterable](#TypesUtilityisIterable) | Check if the variable is iterable. |
| [TypesUtility::isNotIterable](#TypesUtilityisNotIterable) | Check if the variable is not iterable. |
| [TypesUtility::isNull](#TypesUtilityisNull) | Check if the variable is null. |
| [TypesUtility::isNotNull](#TypesUtilityisNotNull) | Check if the variable is not null. |
| [TypesUtility::isNumeric](#TypesUtilityisNumeric) | Check if the variable is numeric. |
| [TypesUtility::isNotNumeric](#TypesUtilityisNotNumeric) | Check if the variable is not numeric. |
| [TypesUtility::isObject](#TypesUtilityisObject) | Check if the variable is an object. |
| [TypesUtility::isNotObject](#TypesUtilityisNotObject) | Check if the variable is not an object. |
| [TypesUtility::isResource](#TypesUtilityisResource) | Check if the variable is a resource. |
| [TypesUtility::isNotResource](#TypesUtilityisNotResource) | Check if the variable is not a resource. |
| [TypesUtility::isScalar](#TypesUtilityisScalar) | Check if the variable is a scalar. |
| [TypesUtility::isNotScalar](#TypesUtilityisNotScalar) | Check if the variable is not a scalar. |
| [TypesUtility::isString](#TypesUtilityisString) | Check if the variable is a string. |
| [TypesUtility::isNotString](#TypesUtilityisNotString) | Check if the variable is not a string. |
| [TypesUtility::to](#TypesUtilityto) | Convert a variable to a specified target type. |
| [TypesUtility::toString](#TypesUtilitytoString) | Convert a variable to a string. |
| [TypesUtility::toInteger](#TypesUtilitytoInteger) | Convert a variable to an integer. |
| [TypesUtility::toInt](#TypesUtilitytoInt) | An alias to toInteger() |
| [TypesUtility::toFloat](#TypesUtilitytoFloat) | Convert a variable to a float. |
| [TypesUtility::toDouble](#TypesUtilitytoDouble) | An alias to toFloat() |
| [TypesUtility::toBoolean](#TypesUtilitytoBoolean) | Convert a variable to a boolean. |
| [TypesUtility::toBool](#TypesUtilitytoBool) | An alias to toBoolean() |
| [TypesUtility::toArray](#TypesUtilitytoArray) | Convert a variable to an array. |
| [TypesUtility::toObject](#TypesUtilitytoObject) | Convert a variable to an object. |

## ArrayUtility





* Full name: \PHPallas\Utilities\ArrayUtility


### ArrayUtility::create

Creates an array of given elements

```php
ArrayUtility::create(  ): array
```



* This method is **static**.

**Return Value:**





---
### ArrayUtility::createRandom

Creates an array of randon numbers between 1 and 100.

```php
ArrayUtility::createRandom( int size ): int[]
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `size` | **int** | Length of array |


**Return Value:**





---
### ArrayUtility::createRange

Creates an array containing a range of float or integer numericals

```php
ArrayUtility::createRange( float|int min, float|int max, float|int step = 1 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `min` | **float\|int** | The minimum value in the array |
| `max` | **float\|int** | The maximum value in the array |
| `step` | **float\|int** | Indicates by how much is the produced sequence
progressed between values of the sequence. step may be negative for
decreasing sequences |


**Return Value:**





---
### ArrayUtility::createByValue

Creates an one dimension array of given size includes elements with
similar value

```php
ArrayUtility::createByValue( int size, mixed value ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `size` | **int** | Count of array elements |
| `value` | **mixed** | value of array elements |


**Return Value:**





---
### ArrayUtility::createZeroArray

Creates an one dimension array of given size that all elements are zero.

```php
ArrayUtility::createZeroArray( int size ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `size` | **int** |  |


**Return Value:**





---
### ArrayUtility::createNullArray

Createss an one dimension array of given size that all elements are null.

```php
ArrayUtility::createNullArray( int size ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `size` | **int** |  |


**Return Value:**





---
### ArrayUtility::createEmpty

Creates an empty array

```php
ArrayUtility::createEmpty(  ): array
```



* This method is **static**.

**Return Value:**





---
### ArrayUtility::createByKeys

Creates an array with given keys, all elements have similar value

```php
ArrayUtility::createByKeys( array keys, mixed value ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `keys` | **array** |  |
| `value` | **mixed** |  |


**Return Value:**





---
### ArrayUtility::createMatrixArray

Creates a two dimension array of given rows and columns that all elements
are equal to given value.

```php
ArrayUtility::createMatrixArray( int columnsCount, int rowsCount, mixed value ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `columnsCount` | **int** | Number of matrix columns |
| `rowsCount` | **int** | Number of matrix rows |
| `value` | **mixed** | Value of matrix elements |


**Return Value:**





---
### ArrayUtility::createTableArray

Creates a two dimension array of given rows and column names that all
elements  are of equal value.

```php
ArrayUtility::createTableArray( array columns, int rowsCount, mixed value ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `columns` | **array** | An array of table head keys |
| `rowsCount` | **int** | Number of rows |
| `value` | **mixed** | Value of cells |


**Return Value:**





---
### ArrayUtility::createPairs

Creates an `array` by using the values from the `keys` array as keys and
the values from the `values` array as the corresponding values.

```php
ArrayUtility::createPairs( array keys, array values ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `keys` | **array** |  |
| `values` | **array** |  |


**Return Value:**





---
### ArrayUtility::get

Get array items, supporting dot notation

```php
ArrayUtility::get( array &array, string path, mixed default = null ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `path` | **string** |  |
| `default` | **mixed** |  |


**Return Value:**





---
### ArrayUtility::getKeys

Get all keys of an array

```php
ArrayUtility::getKeys( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::getFirstKey

Gets the first key of an array

```php
ArrayUtility::getFirstKey( array array ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::getLastKey

Gets the last key of an array

```php
ArrayUtility::getLastKey( array array ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::getFirst

Gets the first element of an array

```php
ArrayUtility::getFirst( array array ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::getLast

Gets the last element of an array

```php
ArrayUtility::getLast( array array ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::getSubset

Get a subset of an array by giving keys

```php
ArrayUtility::getSubset( array array, array keys ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `keys` | **array** |  |


**Return Value:**





---
### ArrayUtility::getColumns

Get a subset of two-dimensions array by keys

```php
ArrayUtility::getColumns( array array, array columns ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `columns` | **array** |  |


**Return Value:**





---
### ArrayUtility::getFiltered

Get a subset of array elements using a callback filter function

```php
ArrayUtility::getFiltered( array array, callable function ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `function` | **callable** |  |


**Return Value:**





---
### ArrayUtility::set

Set array items, supporting dot notation

```php
ArrayUtility::set( array &array, string path, mixed value ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `path` | **string** |  |
| `value` | **mixed** |  |


**Return Value:**





---
### ArrayUtility::has

Check if an array includes a given value

```php
ArrayUtility::has( array array, mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `value` | **mixed** |  |


**Return Value:**





---
### ArrayUtility::hasKey

Checks if the given key or index exists in the array

```php
ArrayUtility::hasKey( array array, int|string key ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `key` | **int\|string** |  |


**Return Value:**





---
### ArrayUtility::add

An acronym to addToEnd()

```php
ArrayUtility::add(  ): array
```



* This method is **static**.

**Return Value:**





---
### ArrayUtility::addToEnd

Append elements into the end of an array

```php
ArrayUtility::addToEnd( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::addToStart

Prepend elements into the start of an array

```php
ArrayUtility::addToStart( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::dropFromStart

Drop n first element(s) of an array

```php
ArrayUtility::dropFromStart( array array, int count = 1 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `count` | **int** |  |


**Return Value:**





---
### ArrayUtility::dropFirst

Drop the forst element of an array

```php
ArrayUtility::dropFirst( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::dropFromEnd

Drop n last element(s) of an array

```php
ArrayUtility::dropFromEnd( array array, int count = 1 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `count` | **int** |  |


**Return Value:**





---
### ArrayUtility::dropLast

Drops the last element from an array

```php
ArrayUtility::dropLast( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::dropKey

Drops an element from an array by key, supporting dot notation

```php
ArrayUtility::dropKey( array &array, mixed key, bool reIndex = true ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `key` | **mixed** |  |
| `reIndex` | **bool** |  |


**Return Value:**





---
### ArrayUtility::drop

Drops all elements of an array that has a value equal to the given value

```php
ArrayUtility::drop( array array, mixed value, bool reIndex = true ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `value` | **mixed** |  |
| `reIndex` | **bool** |  |


**Return Value:**





---
### ArrayUtility::transform

Applies a transform callable to all elements of an array

```php
ArrayUtility::transform( array array, callable function ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `function` | **callable** |  |


**Return Value:**





---
### ArrayUtility::transformToUppercaseKeys

Transform the case of all keys in an array to the UPPER_CASE

```php
ArrayUtility::transformToUppercaseKeys( mixed array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **mixed** |  |


**Return Value:**





---
### ArrayUtility::transformToLowercaseKeys

Transform the case of all keys in an array to lower_case

```php
ArrayUtility::transformToLowercaseKeys( mixed array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **mixed** |  |


**Return Value:**





---
### ArrayUtility::transformToLowercase

Transform all elements of an array to lower_case

```php
ArrayUtility::transformToLowercase( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::transformToUppercase

Transform all elements of an array to UPPER_CASE

```php
ArrayUtility::transformToUppercase( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::transformFlip

Exchanges all keys with their associated values in an array

```php
ArrayUtility::transformFlip( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isAssociative

Checks if an array is associative

```php
ArrayUtility::isAssociative( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isEmpty

Checks if an array is empty

```php
ArrayUtility::isEmpty( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isSameAs

Compare two arrays and check if are same

```php
ArrayUtility::isSameAs( array array1, array array2, bool strict = false ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array1` | **array** |  |
| `array2` | **array** |  |
| `strict` | **bool** |  |


**Return Value:**





---
### ArrayUtility::isEligibleTo

Checks a condition against all element of an array

```php
ArrayUtility::isEligibleTo( array array, callable function ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `function` | **callable** |  |


**Return Value:**





---
### ArrayUtility::isString

Checks if an array elements all are string

```php
ArrayUtility::isString( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isBoolean

Checks if an array elements all are boolean

```php
ArrayUtility::isBoolean( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isCallable

Checks if an array elements all are callable

```php
ArrayUtility::isCallable( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isCountable

Checks if an array elements all are countable

```php
ArrayUtility::isCountable( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isIterable

Checks if an array elements all are iterable

```php
ArrayUtility::isIterable( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isNumeric

Checks if an array elements all are numeric

```php
ArrayUtility::isNumeric( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isScalar

Checks if an array elements all are scalar

```php
ArrayUtility::isScalar( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isFloat

Checks if an array elements all are float

```php
ArrayUtility::isFloat( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isNull

Checks if an array elements all are null

```php
ArrayUtility::isNull( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isObject

Checks if an array elements all are object

```php
ArrayUtility::isObject( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isArray

Checks if an array elements all are array

```php
ArrayUtility::isArray( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::isInstanceOf

Checks if an array elements all are of given class

```php
ArrayUtility::isInstanceOf( array array, mixed class ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `class` | **mixed** |  |


**Return Value:**





---
### ArrayUtility::estimateSize

Get total number of elements inside an array

```php
ArrayUtility::estimateSize( array array ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::estimateCounts

Get count of distinct values inside an array

```php
ArrayUtility::estimateCounts( array array ): int[]
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::estimateSum

Calculate the sum of values in an array

```php
ArrayUtility::estimateSum( array array ): float|int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### ArrayUtility::merge

Merge one or more arrays

```php
ArrayUtility::merge(  ): array
```



* This method is **static**.

**Return Value:**





---
### ArrayUtility::mergeInDepth

Merge one or more arrays recursively

```php
ArrayUtility::mergeInDepth(  ): array
```



* This method is **static**.

**Return Value:**





---
### ArrayUtility::split

Split an array into chunks

```php
ArrayUtility::split( array array, int size, bool isAssoc = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `size` | **int** |  |
| `isAssoc` | **bool** |  |


**Return Value:**





---
### ArrayUtility::sort

Sort elements of an array

```php
ArrayUtility::sort( array array, mixed sortByKeys = false, mixed descending = false, mixed isAssoc = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `sortByKeys` | **mixed** |  |
| `descending` | **mixed** |  |
| `isAssoc` | **mixed** |  |


**Return Value:**





---
### ArrayUtility::sortRandom

Shuffles (randomizes the order of the elements in) an array.

```php
ArrayUtility::sortRandom( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
## BooleanUtility

Class BooleanUtility

A utility class providing methods for boolean manipulations, including
a set of immutable constants for commonly used boolean values.

* Full name: \PHPallas\Utilities\BooleanUtility


### BooleanUtility::createRandom



```php
BooleanUtility::createRandom(  ): mixed
```



* This method is **static**.

**Return Value:**





---
### BooleanUtility::fromString

Converts a string to a boolean value.

```php
BooleanUtility::fromString( string string ): bool
```

This method interprets specific string values as true or false.
Recognized true values include: "true", "1", "yes", "on".
Recognized false values include: "false", "0", "no", "off".

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to convert. |


**Return Value:**

The boolean value represented by the string.



---
### BooleanUtility::toString

Converts a boolean value to its string representation.

```php
BooleanUtility::toString( bool boolean ): string
```

This method returns "true" or "false" based on the boolean value.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean` | **bool** | The boolean value to convert. |


**Return Value:**

"true" or "false" based on the boolean value.



---
### BooleanUtility::areEqual

Checks if two boolean values are equal.

```php
BooleanUtility::areEqual( bool boolean1, bool boolean2 ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean1` | **bool** | The first boolean to compare. |
| `boolean2` | **bool** | The second boolean to compare. |


**Return Value:**

Returns true if both booleans are equal, false otherwise.



---
### BooleanUtility::isTrue

Checks if a boolean is TRUE.

```php
BooleanUtility::isTrue( bool boolean ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean` | **bool** | The boolean to check. |


**Return Value:**

Returns true if both booleans are equal, false otherwise.



---
### BooleanUtility::isFalse

Checks if a boolean is FALSE.

```php
BooleanUtility::isFalse( bool boolean ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean` | **bool** | The boolean to check. |


**Return Value:**

Returns true if both booleans are equal, false otherwise.



---
### BooleanUtility::not

Negates a boolean value.

```php
BooleanUtility::not( bool boolean ): bool
```

This method returns the opposite of the provided boolean value.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean` | **bool** | The boolean value to negate. |


**Return Value:**

The negated boolean value.



---
### BooleanUtility::gnot

Performs a logical NOT operation on an array of boolean values or a variable number of boolean arguments.

```php
BooleanUtility::gnot( mixed booleans ): array
```

This function negates each boolean value in the input array or the provided arguments and returns an array of the results.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `booleans` | **mixed** | Either an array of boolean values or a list of boolean arguments. |


**Return Value:**

An array containing the negated boolean values.



---
### BooleanUtility::and

Performs a logical AND operation on two boolean values.

```php
BooleanUtility::and( bool boolean1, bool boolean2 ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean1` | **bool** | The first boolean value. |
| `boolean2` | **bool** | The second boolean value. |


**Return Value:**

The result of the logical AND operation.



---
### BooleanUtility::gand

Performs a logical AND operation on an array of boolean values or a variable number of boolean arguments.

```php
BooleanUtility::gand( mixed booleans ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `booleans` | **mixed** | Either an array of boolean values or a list of boolean arguments. |


**Return Value:**

The result of the logical AND operation.



---
### BooleanUtility::nand

Performs a logical NAND operation on two boolean values.

```php
BooleanUtility::nand( bool boolean1, bool boolean2 ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean1` | **bool** | The first boolean value. |
| `boolean2` | **bool** | The second boolean value. |


**Return Value:**

The result of the logical NAND operation.



---
### BooleanUtility::gnand

Performs a logical NAND operation on an array of boolean values or a variable number of boolean arguments.

```php
BooleanUtility::gnand( mixed booleans ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `booleans` | **mixed** | Either an array of boolean values or a list of boolean arguments. |


**Return Value:**

The result of the logical NAND operation.



---
### BooleanUtility::or

Performs a logical OR operation on two boolean values.

```php
BooleanUtility::or( bool boolean1, bool boolean2 ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean1` | **bool** | The first boolean value. |
| `boolean2` | **bool** | The second boolean value. |


**Return Value:**

The result of the logical OR operation.



---
### BooleanUtility::gor

Performs a logical OR operation on an array of boolean values or a variable number of boolean arguments.

```php
BooleanUtility::gor( mixed booleans ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `booleans` | **mixed** | Either an array of boolean values or a list of boolean arguments. |


**Return Value:**

The result of the logical OR operation.



---
### BooleanUtility::nor

Performs a logical NOR operation on two boolean values.

```php
BooleanUtility::nor( bool boolean1, bool boolean2 ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean1` | **bool** | The first boolean value. |
| `boolean2` | **bool** | The second boolean value. |


**Return Value:**

The result of the logical NOR operation.



---
### BooleanUtility::gnor

Performs a logical NOR operation on an array of boolean values or a variable number of boolean arguments.

```php
BooleanUtility::gnor( mixed booleans ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `booleans` | **mixed** | Either an array of boolean values or a list of boolean arguments. |


**Return Value:**

The result of the logical NOR operation.



---
### BooleanUtility::xor

Performs a logical XOR operation on two boolean values.

```php
BooleanUtility::xor( bool boolean1, bool boolean2 ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean1` | **bool** | The first boolean value. |
| `boolean2` | **bool** | The second boolean value. |


**Return Value:**

The result of the logical XOR operation.



---
### BooleanUtility::gxor

Performs a logical XOR operation on an array of boolean values or a variable number of boolean arguments.

```php
BooleanUtility::gxor( mixed booleans ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `booleans` | **mixed** | Either an array of boolean values or a list of boolean arguments. |


**Return Value:**

The result of the logical XOR operation.



---
### BooleanUtility::xnor

Performs a logical XNOR operation on two boolean values.

```php
BooleanUtility::xnor( bool boolean1, bool boolean2 ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean1` | **bool** | The first boolean value. |
| `boolean2` | **bool** | The second boolean value. |


**Return Value:**

The result of the logical XNOR operation.



---
### BooleanUtility::gxnor

Performs a logical XNOR operation on an array of boolean values or a variable number of boolean arguments.

```php
BooleanUtility::gxnor( mixed booleans ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `booleans` | **mixed** | Either an array of boolean values or a list of boolean arguments. |


**Return Value:**

The result of the logical XNOR operation.



---
### BooleanUtility::nxor

Alias for xnor

```php
BooleanUtility::nxor( mixed boolean1, mixed boolean2 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean1` | **mixed** |  |
| `boolean2` | **mixed** |  |


**Return Value:**





---
### BooleanUtility::xand

Alias for xnor

```php
BooleanUtility::xand( mixed boolean1, mixed boolean2 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean1` | **mixed** |  |
| `boolean2` | **mixed** |  |


**Return Value:**





---
### BooleanUtility::gnxor

Alias for gxnor

```php
BooleanUtility::gnxor( mixed booleans ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `booleans` | **mixed** |  |


**Return Value:**





---
### BooleanUtility::gxand

Alias for gxnor

```php
BooleanUtility::gxand( mixed boolean ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean` | **mixed** |  |


**Return Value:**





---
## DateTime





* Full name: \PHPallas\Utilities\DateTime


### DateTime::getComponents

Summary of toString

```php
DateTime::getComponents( int timestamp, int calendar ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `timestamp` | **int** |  |
| `calendar` | **int** |  |


**Return Value:**





---
### DateTime::isLeapSolarHijri

Checks if a Solar Hijri year is leap year

```php
DateTime::isLeapSolarHijri( mixed year ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `year` | **mixed** |  |


**Return Value:**





---
### DateTime::isLeapLunarHijri



```php
DateTime::isLeapLunarHijri( mixed year ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `year` | **mixed** |  |


**Return Value:**





---
## FileUtility

Class FileUtility

A utility class providing methods to read, write, manipulate and other
operations upon files.

* Full name: \PHPallas\Utilities\FileUtility


### FileUtility::createDirectory

Creates a directory at the specified path.

```php
FileUtility::createDirectory( string path, int permissions = 0777, bool recursive = true ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | The path of the directory to create. |
| `permissions` | **int** | The permissions to set for the new directory (default is 0777). |
| `recursive` | **bool** | Whether to create directories recursively (default is true). |


**Return Value:**





---
### FileUtility::loadFileContent

Loads the content of a file.

```php
FileUtility::loadFileContent( string file ): string|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **string** | The path to the file. |


**Return Value:**

The content of the file, or null if the file does not exist.



---
### FileUtility::writeToFile

Writes content to a specified file.

```php
FileUtility::writeToFile( string file, string content ): int|false
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **string** | The path to the file. |
| `content` | **string** | The content to write to the file. |


**Return Value:**

The number of bytes written to the file, or false on failure.



---
### FileUtility::isDirectory

Checks if the specified path is a directory.

```php
FileUtility::isDirectory( string path ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | The path to check. |


**Return Value:**

True if the path is a directory, false otherwise.



---
### FileUtility::isNotDirectory

Checks if the specified path is not a directory.

```php
FileUtility::isNotDirectory( string path ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | The path to check. |


**Return Value:**

True if the path is not a directory, false otherwise.



---
### FileUtility::fileExists

Checks if a file exists.

```php
FileUtility::fileExists( string file ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **string** | The path to the file. |


**Return Value:**

True if the file exists and is not a directory, false otherwise.



---
### FileUtility::fileNotExists

Checks if a file does not exist.

```php
FileUtility::fileNotExists( string file ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **string** | The path to the file. |


**Return Value:**

True if the file does not exist, false otherwise.



---
### FileUtility::readFromJson

Reads data from a JSON file.

```php
FileUtility::readFromJson( string file ): array|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **string** | The path to the JSON file. |


**Return Value:**

The decoded data as an associative array, or null on failure.



---
### FileUtility::writeToJson

Writes data to a JSON file.

```php
FileUtility::writeToJson( array data, string file ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The data to be encoded and written to the file. |
| `file` | **string** | The path to the JSON file. |


**Return Value:**

True on success, false on failure.



---
### FileUtility::readFromYaml

Reads data from a YAML file.

```php
FileUtility::readFromYaml( string file ): array|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **string** | The path to the YAML file. |


**Return Value:**

The parsed data as an associative array, or null on failure.



---
### FileUtility::writeToYaml

Writes data to a YAML file.

```php
FileUtility::writeToYaml( array data, string file ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The data to be encoded and written to the file. |
| `file` | **string** | The path to the YAML file. |


**Return Value:**

True on success, false on failure.



---
### FileUtility::readFromIni

Reads data from an INI file.

```php
FileUtility::readFromIni( string file ): array|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **string** | The path to the INI file. |


**Return Value:**

The parsed data as an associative array, or null on failure.



---
### FileUtility::writeToIni

Writes data to an INI file.

```php
FileUtility::writeToIni( array data, string file ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The data to be encoded and written to the file. |
| `file` | **string** | The path to the INI file. |


**Return Value:**

True on success, false on failure.



---
### FileUtility::readFromXml

Reads data from an XML file.

```php
FileUtility::readFromXml( string file ): array|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **string** | The path to the XML file. |


**Return Value:**

The parsed data as an associative array, or null on failure.



---
### FileUtility::writeToXml

Writes data to an XML file.

```php
FileUtility::writeToXml( array data, string file ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The data to be encoded and written to the file. |
| `file` | **string** | The path to the XML file. |


**Return Value:**

True on success, false on failure.



---
### FileUtility::readFromEnv

Reads key-value pairs from a .env file.

```php
FileUtility::readFromEnv( string file ): array|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **string** | The path to the .env file. |


**Return Value:**

The parsed environment variables as an associative array, or null on failure.



---
### FileUtility::writeToEnv

Writes key-value pairs to a .env file.

```php
FileUtility::writeToEnv( array data, string file ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The key-value pairs to be written to the .env file. |
| `file` | **string** | The path to the .env file. |


**Return Value:**

True on success, false on failure.



---
## MathUtility

Class MathUtility
A utility class for common mathematical and physical constants.



* Full name: \PHPallas\Utilities\MathUtility


### MathUtility::round

Round to the nearest integer.

```php
MathUtility::round( float number ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `number` | **float** | The number to round. |


**Return Value:**

The rounded integer.



---
### MathUtility::floor

Floor: Round down to the nearest integer.

```php
MathUtility::floor( float number ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `number` | **float** | The number to floor. |


**Return Value:**

The floored integer.



---
### MathUtility::ceil

Ceil: Round up to the nearest integer.

```php
MathUtility::ceil( float number ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `number` | **float** | The number to ceil. |


**Return Value:**

The ceiled integer.



---
### MathUtility::truncate

Truncate: Remove decimal part without rounding.

```php
MathUtility::truncate( float number ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `number` | **float** | The number to truncate. |


**Return Value:**

The truncated integer.



---
### MathUtility::roundHalfUp

Round Half Up.

```php
MathUtility::roundHalfUp( float number ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `number` | **float** | The number to round. |


**Return Value:**

The rounded integer.



---
### MathUtility::roundHalfDown

Round Half Down.

```php
MathUtility::roundHalfDown( float number ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `number` | **float** | The number to round. |


**Return Value:**

The rounded integer.



---
### MathUtility::roundHalfToEven

Bankers' Rounding (Round Half to Even).

```php
MathUtility::roundHalfToEven( float number ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `number` | **float** | The number to round. |


**Return Value:**

The rounded integer.



---
### MathUtility::randomInt

Generate a random integer between the given min and max values.

```php
MathUtility::randomInt( int min, int max ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `min` | **int** | The minimum value (inclusive). |
| `max` | **int** | The maximum value (inclusive). |


**Return Value:**

A random integer between min and max.



---
### MathUtility::randomFloat

Generate a random float between the given min and max values.

```php
MathUtility::randomFloat( float min, float max ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `min` | **float** | The minimum value (inclusive). |
| `max` | **float** | The maximum value (inclusive). |


**Return Value:**

A random float between min and max.



---
### MathUtility::estimateSimpleInterest

Estimate simple interest.

```php
MathUtility::estimateSimpleInterest( float principal, float rate, int time ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `principal` | **float** | The principal amount. |
| `rate` | **float** | The annual interest rate (as a decimal). |
| `time` | **int** | The time in years. |


**Return Value:**

The estimated simple interest.



---
### MathUtility::estimateCompoundInterest

Estimate compound interest.

```php
MathUtility::estimateCompoundInterest( float principal, float rate, int time, int n ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `principal` | **float** | The principal amount. |
| `rate` | **float** | The annual interest rate (as a decimal). |
| `time` | **int** | The time in years. |
| `n` | **int** | The number of times interest is compounded per year. |


**Return Value:**

The estimated compound interest.



---
### MathUtility::estimateFutureValue

Estimate the future value of an investment.

```php
MathUtility::estimateFutureValue( float principal, float rate, int time ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `principal` | **float** | The principal amount. |
| `rate` | **float** | The annual interest rate (as a decimal). |
| `time` | **int** | The time in years. |


**Return Value:**

The estimated future value.



---
### MathUtility::estimatePresentValue

Estimate the present value of a future amount.

```php
MathUtility::estimatePresentValue( float futureValue, float rate, int time ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `futureValue` | **float** | The future amount. |
| `rate` | **float** | The annual interest rate (as a decimal). |
| `time` | **int** | The time in years. |


**Return Value:**

The estimated present value.



---
### MathUtility::estimateLoanPayment

Estimate monthly loan payment.

```php
MathUtility::estimateLoanPayment( float principal, float annualRate, int months ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `principal` | **float** | The loan amount. |
| `annualRate` | **float** | The annual interest rate (as a decimal). |
| `months` | **int** | The number of months to pay off the loan. |


**Return Value:**

The estimated monthly payment.



---
### MathUtility::estimateTotalPayment

Estimate the total amount paid over the life of the loan.

```php
MathUtility::estimateTotalPayment( float monthlyPayment, int months ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `monthlyPayment` | **float** | The monthly payment amount. |
| `months` | **int** | The number of months to pay off the loan. |


**Return Value:**

The estimated total amount paid.



---
### MathUtility::estimateTotalInterest

Estimate the total interest paid over the life of the loan.

```php
MathUtility::estimateTotalInterest( float totalPayment, float principal ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `totalPayment` | **float** | The total amount paid. |
| `principal` | **float** | The loan amount. |


**Return Value:**

The estimated total interest paid.



---
### MathUtility::estimateAPR

Estimate the Annual Percentage Rate (APR).

```php
MathUtility::estimateAPR( float interest, float principal, int months ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `interest` | **float** | The total interest paid. |
| `principal` | **float** | The loan amount. |
| `months` | **int** | The number of months. |


**Return Value:**

The estimated APR as a decimal.



---
### MathUtility::estimateEAR

Estimate the Effective Annual Rate (EAR).

```php
MathUtility::estimateEAR( float nominalRate, int n ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `nominalRate` | **float** | The nominal interest rate (as a decimal). |
| `n` | **int** | The number of compounding periods per year. |


**Return Value:**

The estimated EAR as a decimal.



---
### MathUtility::generateAmortizationSchedule

Generate a loan amortization schedule.

```php
MathUtility::generateAmortizationSchedule( float principal, float annualRate, int months ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `principal` | **float** | The loan amount. |
| `annualRate` | **float** | The annual interest rate (as a decimal). |
| `months` | **int** | The number of months to pay off the loan. |


**Return Value:**

The amortization schedule.



---
### MathUtility::estimateLoanPayoffTime

Estimate the loan payoff time in months.

```php
MathUtility::estimateLoanPayoffTime( float principal, float monthlyPayment, float annualRate ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `principal` | **float** | The loan amount. |
| `monthlyPayment` | **float** | The monthly payment amount. |
| `annualRate` | **float** | The annual interest rate (as a decimal). |


**Return Value:**

The estimated number of months to pay off the loan.



---
### MathUtility::estimateNPV

Estimate the Net Present Value (NPV) of cash flows.

```php
MathUtility::estimateNPV( array cashFlows, float rate ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `cashFlows` | **array** | An array of cash flows (positive and negative). |
| `rate` | **float** | The discount rate (as a decimal). |


**Return Value:**

The estimated NPV.



---
### MathUtility::compareLoans

Compare two loans based on total cost.

```php
MathUtility::compareLoans( float principal1, float annualRate1, int months1, float principal2, float annualRate2, int months2 ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `principal1` | **float** | The first loan amount. |
| `annualRate1` | **float** | The first loan annual interest rate (as a decimal). |
| `months1` | **int** | The first loan term in months. |
| `principal2` | **float** | The second loan amount. |
| `annualRate2` | **float** | The second loan annual interest rate (as a decimal). |
| `months2` | **int** | The second loan term in months. |


**Return Value:**

Comparison result.



---
### MathUtility::addVectors

Add two vectors element-wise

```php
MathUtility::addVectors( array vec1, array vec2 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vec1` | **array** |  |
| `vec2` | **array** |  |


**Return Value:**





---
### MathUtility::subtractVectors

Subtract two vectors element-wise

```php
MathUtility::subtractVectors( array vec1, array vec2 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vec1` | **array** |  |
| `vec2` | **array** |  |


**Return Value:**





---
### MathUtility::scalarMultiply

Multiply vector by scalar

```php
MathUtility::scalarMultiply( array vector, float scalar ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vector` | **array** |  |
| `scalar` | **float** |  |


**Return Value:**





---
### MathUtility::normalize

Normalize vector (convert to unit vector)

```php
MathUtility::normalize( array vector ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vector` | **array** |  |


**Return Value:**





---
### MathUtility::magnitude

Calculate vector magnitude (Euclidean norm)

```php
MathUtility::magnitude( array vector ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vector` | **array** |  |


**Return Value:**





---
### MathUtility::dotProduct

Dot product of two vectors

```php
MathUtility::dotProduct( array vec1, array vec2 ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vec1` | **array** |  |
| `vec2` | **array** |  |


**Return Value:**





---
### MathUtility::angleBetween

Calculate angle between two vectors in radians

```php
MathUtility::angleBetween( array vec1, array vec2 ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vec1` | **array** |  |
| `vec2` | **array** |  |


**Return Value:**





---
### MathUtility::vectorSum

Calculate sum of vector elements

```php
MathUtility::vectorSum( array vector ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vector` | **array** |  |


**Return Value:**





---
### MathUtility::vectorAvg

Calculate average of vector elements

```php
MathUtility::vectorAvg( array vector ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vector` | **array** |  |


**Return Value:**





---
### MathUtility::vectorMin

Find minimum value in vector

```php
MathUtility::vectorMin( array vector ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vector` | **array** |  |


**Return Value:**





---
### MathUtility::vectorMax

Find maximum value in vector

```php
MathUtility::vectorMax( array vector ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vector` | **array** |  |


**Return Value:**





---
### MathUtility::crossProduct1D

1D cross product (returns scalar value)

```php
MathUtility::crossProduct1D( array vec1, array vec2 ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vec1` | **array** |  |
| `vec2` | **array** |  |


**Return Value:**





---
### MathUtility::projection

Project vector A onto vector B

```php
MathUtility::projection( array vecA, array vecB ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vecA` | **array** |  |
| `vecB` | **array** |  |


**Return Value:**





---
### MathUtility::vectorAppend

Append value to vector (modifies original vector)

```php
MathUtility::vectorAppend( array &vector, float value ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vector` | **array** |  |
| `value` | **float** |  |


**Return Value:**





---
### MathUtility::vectorReverse

Reverse vector elements

```php
MathUtility::vectorReverse( array vector ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `vector` | **array** |  |


**Return Value:**





---
### MathUtility::sin

Calculates the sine of an angle.

```php
MathUtility::sin( float angle ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `angle` | **float** | The angle in radians. |


**Return Value:**

The sine of the angle.



---
### MathUtility::cos

Calculates the cosine of an angle.

```php
MathUtility::cos( float angle ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `angle` | **float** | The angle in radians. |


**Return Value:**

The cosine of the angle.



---
### MathUtility::tan

Calculates the tangent of an angle.

```php
MathUtility::tan( float angle ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `angle` | **float** | The angle in radians. |


**Return Value:**

The tangent of the angle.



---
### MathUtility::asin

Calculates the arcsine (inverse sine) of a value.

```php
MathUtility::asin( float value ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **float** | The value, in the range [-1, 1]. |


**Return Value:**

The angle in radians whose sine is the given value.



---
### MathUtility::acos

Calculates the arccosine (inverse cosine) of a value.

```php
MathUtility::acos( float value ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **float** | The value, in the range [-1, 1]. |


**Return Value:**

The angle in radians whose cosine is the given value.



---
### MathUtility::atan

Calculates the arctangent (inverse tangent) of a value.

```php
MathUtility::atan( float value ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **float** | The value. |


**Return Value:**

The angle in radians whose tangent is the given value.



---
### MathUtility::atan2

Calculates the arctangent of y/x, using the signs of the arguments to determine the quadrant of the result.

```php
MathUtility::atan2( float y, float x ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `y` | **float** | The y-coordinate. |
| `x` | **float** | The x-coordinate. |


**Return Value:**

The angle in radians.



---
### MathUtility::sinh

Calculates the hyperbolic sine of a value.

```php
MathUtility::sinh( float value ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **float** | The value. |


**Return Value:**

The hyperbolic sine of the value.



---
### MathUtility::cosh

Calculates the hyperbolic cosine of a value.

```php
MathUtility::cosh( float value ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **float** | The value. |


**Return Value:**

The hyperbolic cosine of the value.



---
### MathUtility::tanh

Calculates the hyperbolic tangent of a value.

```php
MathUtility::tanh( float value ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **float** | The value. |


**Return Value:**

The hyperbolic tangent of the value.



---
### MathUtility::asinh

Calculates the inverse hyperbolic sine of a value.

```php
MathUtility::asinh( float value ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **float** | The value. |


**Return Value:**

The inverse hyperbolic sine of the value.



---
### MathUtility::acosh

Calculates the inverse hyperbolic cosine of a value.

```php
MathUtility::acosh( float value ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **float** | The value. |


**Return Value:**

The inverse hyperbolic cosine of the value.



---
### MathUtility::atanh

Calculates the inverse hyperbolic tangent of a value.

```php
MathUtility::atanh( float value ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **float** | The value. |


**Return Value:**

The inverse hyperbolic tangent of the value.



---
### MathUtility::deg2rad

Converts an angle from degrees to radians.

```php
MathUtility::deg2rad( float degrees ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `degrees` | **float** | The angle in degrees. |


**Return Value:**

The angle in radians.



---
### MathUtility::rad2deg

Converts an angle from radians to degrees.

```php
MathUtility::rad2deg( float radians ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `radians` | **float** | The angle in radians. |


**Return Value:**

The angle in degrees.



---
### MathUtility::exponential

Calculate the exponential of a number.

```php
MathUtility::exponential( float x ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The exponent. |


**Return Value:**

The value of e raised to the power of x.



---
### MathUtility::naturalLog

Calculate the natural logarithm of a number.

```php
MathUtility::naturalLog( float x ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The number to calculate the logarithm for. |


**Return Value:**

The natural logarithm of x.



---
### MathUtility::logBase10

Calculate the base 10 logarithm of a number.

```php
MathUtility::logBase10( float x ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The number to calculate the logarithm for. |


**Return Value:**

The base 10 logarithm of x.



---
### MathUtility::logBase2

Calculate the base 2 logarithm of a number.

```php
MathUtility::logBase2( float x ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The number to calculate the logarithm for. |


**Return Value:**

The base 2 logarithm of x.



---
### MathUtility::logBase

Calculate the logarithm of a number with an arbitrary base.

```php
MathUtility::logBase( float x, float base ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The number to calculate the logarithm for. |
| `base` | **float** | The base of the logarithm. |


**Return Value:**

The logarithm of x with the specified base.



---
### MathUtility::changeBase

Change the base of a logarithm from one base to another.

```php
MathUtility::changeBase( float x, float fromBase, float toBase ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The number to calculate the logarithm for. |
| `fromBase` | **float** | The original base of the logarithm. |
| `toBase` | **float** | The new base for the logarithm. |


**Return Value:**

The logarithm of x with the new base.



---
### MathUtility::inverseNaturalLog

Calculate the inverse of the natural logarithm.

```php
MathUtility::inverseNaturalLog( float y ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `y` | **float** | The value to calculate the inverse for. |


**Return Value:**

The value of e raised to the power of y.



---
### MathUtility::inverseLogBase10

Calculate the inverse of the base 10 logarithm.

```php
MathUtility::inverseLogBase10( float y ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `y` | **float** | The value to calculate the inverse for. |


**Return Value:**

The value of 10 raised to the power of y.



---
### MathUtility::inverseLogBase2

Calculate the inverse of the base 2 logarithm.

```php
MathUtility::inverseLogBase2( float y ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `y` | **float** | The value to calculate the inverse for. |


**Return Value:**

The value of 2 raised to the power of y.



---
### MathUtility::exponentialGrowth

Calculate exponential growth.

```php
MathUtility::exponentialGrowth( float initial, float rate, float time ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `initial` | **float** | The initial amount. |
| `rate` | **float** | The growth rate. |
| `time` | **float** | The time period. |


**Return Value:**

The amount after exponential growth.



---
### MathUtility::exponentialDecay

Calculate exponential decay.

```php
MathUtility::exponentialDecay( float initial, float rate, float time ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `initial` | **float** | The initial amount. |
| `rate` | **float** | The decay rate. |
| `time` | **float** | The time period. |


**Return Value:**

The amount after exponential decay.



---
### MathUtility::power

Calculate the power of a base raised to an exponent.

```php
MathUtility::power( float base, float exponent ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `base` | **float** | The base. |
| `exponent` | **float** | The exponent. |


**Return Value:**

The result of base raised to the exponent.



---
### MathUtility::solveExponentialEquation

Solve for x in the equation a^x = b.

```php
MathUtility::solveExponentialEquation( float a, float b ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `a` | **float** | The base. |
| `b` | **float** | The result. |


**Return Value:**

The value of x.



---
### MathUtility::logFactorial

Calculate the logarithm of a factorial (log(n!)).

```php
MathUtility::logFactorial( int n ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `n` | **int** | A non-negative integer. |


**Return Value:**

The logarithm of n!.



---
### MathUtility::addMatrix

Add two matrices.

```php
MathUtility::addMatrix( array matrixA, array matrixB ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `matrixA` | **array** | The first matrix. |
| `matrixB` | **array** | The second matrix. |


**Return Value:**

The resulting matrix after addition.



---
### MathUtility::subtractMatrix

Subtract two matrices.

```php
MathUtility::subtractMatrix( array matrixA, array matrixB ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `matrixA` | **array** | The first matrix. |
| `matrixB` | **array** | The second matrix. |


**Return Value:**

The resulting matrix after subtraction.



---
### MathUtility::multiplyMatrix

Multiply two matrices.

```php
MathUtility::multiplyMatrix( array matrixA, array matrixB ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `matrixA` | **array** | The first matrix. |
| `matrixB` | **array** | The second matrix. |


**Return Value:**

The resulting matrix after multiplication.



---
### MathUtility::inverseMatrix

Calculate the inverse of a matrix.

```php
MathUtility::inverseMatrix( array matrix ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `matrix` | **array** | The matrix to invert. |


**Return Value:**

The inverted matrix.



---
### MathUtility::eigenvaluesMatrix

Get the eigenvalues of a matrix (simplified for 2x2 matrices).

```php
MathUtility::eigenvaluesMatrix( array matrix ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `matrix` | **array** | The matrix to find eigenvalues for. |


**Return Value:**

The eigenvalues of the matrix.



---
### MathUtility::luDecompositionMatrix

Perform LU decomposition of a matrix.

```php
MathUtility::luDecompositionMatrix( array matrix ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `matrix` | **array** | The matrix to decompose. |


**Return Value:**

An array containing matrices L and U.



---
### MathUtility::qrDecompositionMatrix

Perform QR decomposition of a matrix using Gram-Schmidt process.

```php
MathUtility::qrDecompositionMatrix( array matrix ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `matrix` | **array** | The matrix to decompose. |


**Return Value:**

An array containing matrices Q and R.



---
### MathUtility::subsetMatrix

Get a subset of a matrix.

```php
MathUtility::subsetMatrix( array matrix, int startRow, int startCol, int numRows, int numCols ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `matrix` | **array** | The original matrix. |
| `startRow` | **int** | The starting row index. |
| `startCol` | **int** | The starting column index. |
| `numRows` | **int** | The number of rows to include. |
| `numCols` | **int** | The number of columns to include. |


**Return Value:**

The subset of the matrix.



---
### MathUtility::mean

Calculate the mean of an array of numbers.

```php
MathUtility::mean( array data ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The input array of numbers. |


**Return Value:**

The mean of the numbers.



---
### MathUtility::median

Calculate the median of an array of numbers.

```php
MathUtility::median( array data ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The input array of numbers. |


**Return Value:**

The median of the numbers.



---
### MathUtility::mode

Calculate the mode of an array of numbers.

```php
MathUtility::mode( array data ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The input array of numbers. |


**Return Value:**

The mode(s) of the numbers.



---
### MathUtility::variance

Calculate the sample variance of an array of numbers.

```php
MathUtility::variance( array data ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The input array of numbers. |


**Return Value:**

The sample variance of the numbers.



---
### MathUtility::populationVariance

Calculate the population variance of an array of numbers.

```php
MathUtility::populationVariance( array data ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The input array of numbers. |


**Return Value:**

The population variance of the numbers.



---
### MathUtility::standardDeviation

Calculate the sample standard deviation of an array of numbers.

```php
MathUtility::standardDeviation( array data ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The input array of numbers. |


**Return Value:**

The sample standard deviation of the numbers.



---
### MathUtility::populationStandardDeviation

Calculate the population standard deviation of an array of numbers.

```php
MathUtility::populationStandardDeviation( array data ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The input array of numbers. |


**Return Value:**

The population standard deviation of the numbers.



---
### MathUtility::correlation

Calculate the correlation coefficient between two variables.

```php
MathUtility::correlation( array x, array y ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **array** | The first variable (independent). |
| `y` | **array** | The second variable (dependent). |


**Return Value:**

The correlation coefficient.



---
### MathUtility::multipleLinearRegression

Perform multiple linear regression to calculate coefficients.

```php
MathUtility::multipleLinearRegression( array X, array Y ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `X` | **array** | The independent variables (features). |
| `Y` | **array** | The dependent variable (target). |


**Return Value:**

The coefficients of the regression model.



---
### MathUtility::normalDistributionPDF

Calculate the normal distribution PDF.

```php
MathUtility::normalDistributionPDF( float x, float mean, float stdDev ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The value for which to calculate the PDF. |
| `mean` | **float** | The mean of the distribution. |
| `stdDev` | **float** | The standard deviation of the distribution. |


**Return Value:**

The PDF value.



---
### MathUtility::normalDistributionCDF

Calculate the normal distribution CDF.

```php
MathUtility::normalDistributionCDF( float x, float mean, float stdDev ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The value for which to calculate the CDF. |
| `mean` | **float** | The mean of the distribution. |
| `stdDev` | **float** | The standard deviation of the distribution. |


**Return Value:**

The CDF value.



---
### MathUtility::binomialProbability

Calculate the binomial probability.

```php
MathUtility::binomialProbability( int n, int k, float p ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `n` | **int** | The number of trials. |
| `k` | **int** | The number of successes. |
| `p` | **float** | The probability of success. |


**Return Value:**

The binomial probability.



---
### MathUtility::poissonDistribution

Calculate the Poisson distribution PDF.

```php
MathUtility::poissonDistribution( int x, float lambda ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **int** | The number of occurrences. |
| `lambda` | **float** | The expected number of occurrences. |


**Return Value:**

The PDF value.



---
### MathUtility::exponentialDistributionPDF

Calculate the exponential distribution PDF.

```php
MathUtility::exponentialDistributionPDF( float x, float lambda ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The value for which to calculate the PDF. |
| `lambda` | **float** | The rate parameter. |


**Return Value:**

The PDF value.



---
### MathUtility::exponentialDistributionCDF

Calculate the exponential distribution CDF.

```php
MathUtility::exponentialDistributionCDF( float x, float lambda ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The value for which to calculate the CDF. |
| `lambda` | **float** | The rate parameter. |


**Return Value:**

The CDF value.



---
### MathUtility::uniformDistributionPDF

Calculate the uniform distribution PDF.

```php
MathUtility::uniformDistributionPDF( float x, float a, float b ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The value for which to calculate the PDF. |
| `a` | **float** | The lower bound of the distribution. |
| `b` | **float** | The upper bound of the distribution. |


**Return Value:**

The PDF value.



---
### MathUtility::uniformDistributionCDF

Calculate the uniform distribution CDF.

```php
MathUtility::uniformDistributionCDF( float x, float a, float b ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** | The value for which to calculate the CDF. |
| `a` | **float** | The lower bound of the distribution. |
| `b` | **float** | The upper bound of the distribution. |


**Return Value:**

The CDF value.



---
### MathUtility::skewness

Calculate the sample skewness of an array of numbers.

```php
MathUtility::skewness( array data ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The input array of numbers. |


**Return Value:**

The skewness of the numbers.



---
### MathUtility::kurtosis

Calculate the sample kurtosis of an array of numbers.

```php
MathUtility::kurtosis( array data ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The input array of numbers. |


**Return Value:**

The kurtosis of the numbers.



---
### MathUtility::gcd

Calculate the greatest common divisor (GCD) of two numbers.

```php
MathUtility::gcd( int a, int b ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `a` | **int** | First number |
| `b` | **int** | Second number |


**Return Value:**

GCD of the two numbers



---
### MathUtility::lcm

Calculate the least common multiple (LCM) of two numbers.

```php
MathUtility::lcm( int a, int b ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `a` | **int** | First number |
| `b` | **int** | Second number |


**Return Value:**

LCM of the two numbers



---
### MathUtility::isPrime

Check if a number is prime.

```php
MathUtility::isPrime( int n ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `n` | **int** | The number to check |


**Return Value:**

True if the number is prime, false otherwise



---
### MathUtility::generatePrimes

Generate a list of prime numbers up to a given limit.

```php
MathUtility::generatePrimes( int limit ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `limit` | **int** | The upper limit |


**Return Value:**

An array of prime numbers



---
### MathUtility::fibonacci

Calculate the Fibonacci number at a given position.

```php
MathUtility::fibonacci( int n ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `n` | **int** | The position in the Fibonacci sequence |


**Return Value:**

The Fibonacci number at that position



---
### MathUtility::isPerfectSquare

Check if a number is a perfect square.

```php
MathUtility::isPerfectSquare( int n ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `n` | **int** | The number to check |


**Return Value:**

True if the number is a perfect square, false otherwise



---
### MathUtility::primeFactorization

Find the prime factorization of a number.

```php
MathUtility::primeFactorization( int n ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `n` | **int** | The number to factor |


**Return Value:**

An array of prime factors



---
### MathUtility::sumOfDivisors

Calculate the sum of divisors of a number.

```php
MathUtility::sumOfDivisors( int n ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `n` | **int** | The number to calculate the sum of divisors for |


**Return Value:**

The sum of divisors of the number



---
### MathUtility::eulerTotient

Calculate Euler's Totient function for a given number.

```php
MathUtility::eulerTotient( int n ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `n` | **int** | The number to calculate the Totient for |


**Return Value:**

The value of Euler's Totient function



---
### MathUtility::areCoprime

Check if two numbers are coprime (i.e., their GCD is 1).

```php
MathUtility::areCoprime( int a, int b ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `a` | **int** | First number |
| `b` | **int** | Second number |


**Return Value:**

True if the numbers are coprime, false otherwise



---
### MathUtility::generatePerfectNumbers

Generate a list of perfect numbers up to a given limit.

```php
MathUtility::generatePerfectNumbers( int limit ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `limit` | **int** | The upper limit |


**Return Value:**

An array of perfect numbers



---
### MathUtility::differentiate



```php
MathUtility::differentiate( mixed function, mixed x, mixed h = 1.0E-10 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `function` | **mixed** |  |
| `x` | **mixed** |  |
| `h` | **mixed** |  |


**Return Value:**





---
### MathUtility::integrate



```php
MathUtility::integrate( array coefficients ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `coefficients` | **array** |  |


**Return Value:**





---
### MathUtility::evaluate



```php
MathUtility::evaluate( array coefficients, mixed x ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `coefficients` | **array** |  |
| `x` | **mixed** |  |


**Return Value:**





---
### MathUtility::findQuadraticRoots



```php
MathUtility::findQuadraticRoots( mixed a, mixed b, mixed c ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `a` | **mixed** |  |
| `b` | **mixed** |  |
| `c` | **mixed** |  |


**Return Value:**





---
### MathUtility::limit



```php
MathUtility::limit( mixed function, mixed x, mixed h = 1.0E-10 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `function` | **mixed** |  |
| `x` | **mixed** |  |
| `h` | **mixed** |  |


**Return Value:**





---
### MathUtility::taylorSeries



```php
MathUtility::taylorSeries( mixed function, mixed x, mixed n ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `function` | **mixed** |  |
| `x` | **mixed** |  |
| `n` | **mixed** |  |


**Return Value:**





---
### MathUtility::numericalIntegration



```php
MathUtility::numericalIntegration( mixed function, mixed a, mixed b, mixed n = 1000 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `function` | **mixed** |  |
| `a` | **mixed** |  |
| `b` | **mixed** |  |
| `n` | **mixed** |  |


**Return Value:**





---
### MathUtility::partialDerivative



```php
MathUtility::partialDerivative( mixed function, mixed varIndex, mixed point, mixed h = 1.0E-10 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `function` | **mixed** |  |
| `varIndex` | **mixed** |  |
| `point` | **mixed** |  |
| `h` | **mixed** |  |


**Return Value:**





---
### MathUtility::gradient



```php
MathUtility::gradient( mixed function, mixed point, mixed h = 1.0E-10 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `function` | **mixed** |  |
| `point` | **mixed** |  |
| `h` | **mixed** |  |


**Return Value:**





---
### MathUtility::secondDerivative



```php
MathUtility::secondDerivative( mixed function, mixed x, mixed h = 1.0E-10 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `function` | **mixed** |  |
| `x` | **mixed** |  |
| `h` | **mixed** |  |


**Return Value:**





---
### MathUtility::findLocalExtrema



```php
MathUtility::findLocalExtrema( mixed function, mixed x0, mixed h = 1.0E-10 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `function` | **mixed** |  |
| `x0` | **mixed** |  |
| `h` | **mixed** |  |


**Return Value:**





---
### MathUtility::areaUnderCurve



```php
MathUtility::areaUnderCurve( mixed function, mixed a, mixed b, mixed n = 1000 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `function` | **mixed** |  |
| `a` | **mixed** |  |
| `b` | **mixed** |  |
| `n` | **mixed** |  |


**Return Value:**





---
### MathUtility::areaOfCircle

Calculate the area of a circle.

```php
MathUtility::areaOfCircle( float radius ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `radius` | **float** | The radius of the circle. |


**Return Value:**

The area of the circle.



---
### MathUtility::circumferenceOfCircle

Calculate the circumference of a circle.

```php
MathUtility::circumferenceOfCircle( float radius ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `radius` | **float** | The radius of the circle. |


**Return Value:**

The circumference of the circle.



---
### MathUtility::areaOfRectangle

Calculate the area of a rectangle.

```php
MathUtility::areaOfRectangle( float length, float width ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **float** | The length of the rectangle. |
| `width` | **float** | The width of the rectangle. |


**Return Value:**

The area of the rectangle.



---
### MathUtility::perimeterOfRectangle

Calculate the perimeter of a rectangle.

```php
MathUtility::perimeterOfRectangle( float length, float width ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **float** | The length of the rectangle. |
| `width` | **float** | The width of the rectangle. |


**Return Value:**

The perimeter of the rectangle.



---
### MathUtility::areaOfTriangle

Calculate the area of a triangle.

```php
MathUtility::areaOfTriangle( float base, float height ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `base` | **float** | The base of the triangle. |
| `height` | **float** | The height of the triangle. |


**Return Value:**

The area of the triangle.



---
### MathUtility::perimeterOfTriangle

Calculate the perimeter of a triangle (assuming it's a right triangle).

```php
MathUtility::perimeterOfTriangle( float a, float b, float c ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `a` | **float** | The length of the first side. |
| `b` | **float** | The length of the second side. |
| `c` | **float** | The length of the third side. |


**Return Value:**

The perimeter of the triangle.



---
### MathUtility::areaOfSquare

Calculate the area of a square.

```php
MathUtility::areaOfSquare( float side ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `side` | **float** | The length of a side of the square. |


**Return Value:**

The area of the square.



---
### MathUtility::perimeterOfSquare

Calculate the perimeter of a square.

```php
MathUtility::perimeterOfSquare( float side ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `side` | **float** | The length of a side of the square. |


**Return Value:**

The perimeter of the square.



---
### MathUtility::volumeOfCube

Calculate the volume of a cube.

```php
MathUtility::volumeOfCube( float side ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `side` | **float** | The length of a side of the cube. |


**Return Value:**

The volume of the cube.



---
### MathUtility::surfaceAreaOfCube

Calculate the surface area of a cube.

```php
MathUtility::surfaceAreaOfCube( float side ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `side` | **float** | The length of a side of the cube. |


**Return Value:**

The surface area of the cube.



---
### MathUtility::volumeOfRectangularPrism

Calculate the volume of a rectangular prism.

```php
MathUtility::volumeOfRectangularPrism( float length, float width, float height ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **float** | The length of the prism. |
| `width` | **float** | The width of the prism. |
| `height` | **float** | The height of the prism. |


**Return Value:**

The volume of the rectangular prism.



---
### MathUtility::surfaceAreaOfRectangularPrism

Calculate the surface area of a rectangular prism.

```php
MathUtility::surfaceAreaOfRectangularPrism( float length, float width, float height ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **float** | The length of the prism. |
| `width` | **float** | The width of the prism. |
| `height` | **float** | The height of the prism. |


**Return Value:**

The surface area of the rectangular prism.



---
### MathUtility::areaOfTrapezoid

Calculate the area of a trapezoid.

```php
MathUtility::areaOfTrapezoid( float base1, float base2, float height ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `base1` | **float** | The length of the first base. |
| `base2` | **float** | The length of the second base. |
| `height` | **float** | The height of the trapezoid. |


**Return Value:**

The area of the trapezoid.



---
### MathUtility::areaOfParallelogram

Calculate the area of a parallelogram.

```php
MathUtility::areaOfParallelogram( float base, float height ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `base` | **float** | The length of the base. |
| `height` | **float** | The height of the parallelogram. |


**Return Value:**

The area of the parallelogram.



---
### MathUtility::areaOfEllipse

Calculate the area of an ellipse.

```php
MathUtility::areaOfEllipse( float semiMajorAxis, float semiMinorAxis ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `semiMajorAxis` | **float** | The length of the semi-major axis. |
| `semiMinorAxis` | **float** | The length of the semi-minor axis. |


**Return Value:**

The area of the ellipse.



---
### MathUtility::circumferenceOfEllipse

Calculate the circumference of an ellipse (approximation).

```php
MathUtility::circumferenceOfEllipse( float semiMajorAxis, float semiMinorAxis ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `semiMajorAxis` | **float** | The length of the semi-major axis. |
| `semiMinorAxis` | **float** | The length of the semi-minor axis. |


**Return Value:**

The circumference of the ellipse.



---
## PHP





* Full name: \PHPallas\Utilities\PHP


### PHP::version

Get PHP version

```php
PHP::version(  ): bool|string
```



* This method is **static**.

**Return Value:**





---
### PHP::versionID

Get PHP version as a number

```php
PHP::versionID(  ): int
```



* This method is **static**.

**Return Value:**





---
### PHP::versionMajor

Get PHP major version

```php
PHP::versionMajor(  ): int|string
```



* This method is **static**.

**Return Value:**





---
### PHP::versionMinor

Get PHP minor Version

```php
PHP::versionMinor(  ): int|string
```



* This method is **static**.

**Return Value:**





---
### PHP::versionRelease

Get PHP release version

```php
PHP::versionRelease(  ): int|string
```



* This method is **static**.

**Return Value:**





---
## Polyfill

Class Polyfill
Provides multibyte string functions to polyfill missing PHP functionality.



* Full name: \PHPallas\Utilities\Polyfill


### Polyfill::mb_str_pad

Pads a string to a certain length with another string.

```php
Polyfill::mb_str_pad( string input, int pad_length, string pad_string = ' ', int pad_type = STR_PAD_RIGHT, string|null encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `input` | **string** | The input string. |
| `pad_length` | **int** | The length of the resulting string after padding. |
| `pad_string` | **string** | The string to pad with. |
| `pad_type` | **int** | The type of padding (STR_PAD_LEFT, STR_PAD_RIGHT, STR_PAD_BOTH). |
| `encoding` | **string\|null** | The character encoding. |


**Return Value:**

The padded string.



---
### Polyfill::mb_strlen

Get the length of a multibyte string.

```php
Polyfill::mb_strlen( string string, string|null encoding = null ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `encoding` | **string\|null** | The character encoding. |


**Return Value:**

The length of the string.



---
### Polyfill::mb_internal_encoding

Get or set the internal encoding.

```php
Polyfill::mb_internal_encoding( string|null encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `encoding` | **string\|null** | The character encoding. |


**Return Value:**

The internal encoding.



---
### Polyfill::iconv

Convert character encoding.

```php
Polyfill::iconv( string in_charset, string out_charset, string str ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `in_charset` | **string** | The input character set. |
| `out_charset` | **string** | The output character set. |
| `str` | **string** | The string to convert. |


**Return Value:**

The converted string.



---
### Polyfill::mb_split

Split a string into an array using a regular expression.

```php
Polyfill::mb_split( string pattern, string string, string|null encoding = null ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `pattern` | **string** | The regular expression pattern. |
| `string` | **string** | The input string. |
| `encoding` | **string\|null** | The character encoding. |


**Return Value:**

The array of split strings.



---
### Polyfill::mb_str_split

Split a multibyte string into an array.

```php
Polyfill::mb_str_split( string string, int length = 1, string|null encoding = null ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `length` | **int** | The length of each segment. |
| `encoding` | **string\|null** | The character encoding. |


**Return Value:**

The array of split strings.



---
### Polyfill::mb_substr

Get a part of a multibyte string.

```php
Polyfill::mb_substr( string string, int start, int|null length = null, string|null encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `start` | **int** | The starting position. |
| `length` | **int\|null** | The length of the substring. |
| `encoding` | **string\|null** | The character encoding. |


**Return Value:**

The substring.



---
### Polyfill::mb_trim

Trim whitespace or other characters from both sides of a multibyte string.

```php
Polyfill::mb_trim( string string, string|null character_mask = null, string|null encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `character_mask` | **string\|null** | The characters to trim. |
| `encoding` | **string\|null** | The character encoding. |


**Return Value:**

The trimmed string.



---
### Polyfill::mb_ltrim

Trim characters from the left side of a multibyte string.

```php
Polyfill::mb_ltrim( string string, string character_mask, string encoding ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `character_mask` | **string** | The characters to trim. |
| `encoding` | **string** | The character encoding. |


**Return Value:**

The trimmed string.



---
### Polyfill::mb_rtrim

Trim characters from the right side of a multibyte string.

```php
Polyfill::mb_rtrim( string string, string character_mask, string encoding ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `character_mask` | **string** | The characters to trim. |
| `encoding` | **string** | The character encoding. |


**Return Value:**

The trimmed string.



---
### Polyfill::mb_strpos

Find the position of the first occurrence of a substring in a multibyte string.

```php
Polyfill::mb_strpos( string haystack, string needle, int offset, string|null encoding = null ): int|false
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `haystack` | **string** | The input string. |
| `needle` | **string** | The substring to find. |
| `offset` | **int** | The offset from which to start searching. |
| `encoding` | **string\|null** | The character encoding. |


**Return Value:**

The position of the first occurrence or false if not found.



---
### Polyfill::mb_strrev

Reverse a multibyte string.

```php
Polyfill::mb_strrev( string string, string encoding = 'UTF-8' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `encoding` | **string** | The character encoding. |


**Return Value:**

The reversed string.



---
### Polyfill::mb_str_shuffle

Shuffle the characters of a multibyte string.

```php
Polyfill::mb_str_shuffle( string string, string encoding = 'UTF-8' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `encoding` | **string** | The character encoding. |


**Return Value:**

The shuffled string.



---
### Polyfill::chr

Get a character from an ASCII value.

```php
Polyfill::chr( int ascii ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `ascii` | **int** | The ASCII value. |


**Return Value:**

The character.



---
### Polyfill::polyfill_mb_detect_encoding

Detect the encoding of a string.

```php
Polyfill::polyfill_mb_detect_encoding( string string, array|null encodings = null ): string|false
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `encodings` | **array\|null** | The list of encodings to check. |


**Return Value:**

The detected encoding or false if not found.



---
### Polyfill::mb_detect_encoding

Detect the encoding of a string.

```php
Polyfill::mb_detect_encoding( string string, array|null encodings = null ): string|false
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `encodings` | **array\|null** | The list of encodings to check. |


**Return Value:**

The detected encoding or false if not found.



---
### Polyfill::mb_detect_order

Get or set the order of encodings to use for detection.

```php
Polyfill::mb_detect_order( array|null order = null ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `order` | **array\|null** | The order of encodings. |


**Return Value:**

The current encoding order.



---
### Polyfill::ord

Get the ASCII value of the first character of a string.

```php
Polyfill::ord( string string ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |


**Return Value:**

The ASCII value.



---
### Polyfill::mb_ord

Get the codepoint of a character.

```php
Polyfill::mb_ord( string char ): int|false
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `char` | **string** | The input character. |


**Return Value:**

The codepoint or false if invalid.



---
### Polyfill::str_contains

Check if a string contains a substring.

```php
Polyfill::str_contains( string haystack, string needle, string encoding = 'UTF-8' ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `haystack` | **string** | The input string. |
| `needle` | **string** | The substring to find. |
| `encoding` | **string** | The character encoding. |


**Return Value:**

True if the substring is found, false otherwise.



---
### Polyfill::str_starts_with

Check if a string starts with a given substring.

```php
Polyfill::str_starts_with( string haystack, string needle, string encoding = 'UTF-8' ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `haystack` | **string** | The input string. |
| `needle` | **string** | The substring to check. |
| `encoding` | **string** | The character encoding. |


**Return Value:**

True if the string starts with the substring, false otherwise.



---
### Polyfill::str_ends_with

Check if a string ends with a given substring.

```php
Polyfill::str_ends_with( string haystack, string needle, string encoding = 'UTF-8' ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `haystack` | **string** | The input string. |
| `needle` | **string** | The substring to check. |
| `encoding` | **string** | The character encoding. |


**Return Value:**

True if the string ends with the substring, false otherwise.



---
### Polyfill::mb_chr

Get a character from a Unicode codepoint.

```php
Polyfill::mb_chr( int codepoint ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `codepoint` | **int** | The Unicode codepoint (must be between 0 and 0x10FFFF). |


**Return Value:**

The corresponding character.



---
### Polyfill::mb_convert_encoding

Convert a string from one character encoding to another.

```php
Polyfill::mb_convert_encoding( string string, string to_encoding, string|null from_encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `to_encoding` | **string** | The target encoding. |
| `from_encoding` | **string\|null** | The source encoding (if null, will be detected). |


**Return Value:**

The converted string.



---
### Polyfill::mb_check_encoding

Check if a string is valid for a given encoding.

```php
Polyfill::mb_check_encoding( string string, string|null encoding = null ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string. |
| `encoding` | **string\|null** | The encoding to check against (defaults to &#039;UTF-8&#039;). |


**Return Value:**

True if the string is valid for the encoding, false otherwise.



---
### Polyfill::password_verify

Verify a password against a hashed value.

```php
Polyfill::password_verify( string password, string hash ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `password` | **string** | The plain text password. |
| `hash` | **string** | The hashed password. |


**Return Value:**

True if the password matches the hash, false otherwise.



---
### Polyfill::password_hash

Hash a password using a secure algorithm.

```php
Polyfill::password_hash( string password, int algo = PASSWORD_DEFAULT, array options = [] ): string|false
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `password` | **string** | The plain text password. |
| `algo` | **int** | The hashing algorithm to use (defaults to PASSWORD_DEFAULT). |
| `options` | **array** | Options for the hashing algorithm. |


**Return Value:**

The hashed password or false on failure.



---
### Polyfill::yaml_parse

Polyfill for yaml_parse function.

```php
Polyfill::yaml_parse( string yamlContent ): array|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `yamlContent` | **string** | The YAML content to parse. |


**Return Value:**

The parsed data as an associative array, or null on failure.



---
### Polyfill::yaml_emit

Polyfill for yaml_emit function.

```php
Polyfill::yaml_emit( array data ): string|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The data to encode as YAML. |


**Return Value:**

The YAML representation of the data, or null on failure.



---
### Polyfill::arrayToXml

Converts an associative array to XML format.

```php
Polyfill::arrayToXml( array data, string rootElement = 'root' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **array** | The data to convert. |
| `rootElement` | **string** | The root element name. |


**Return Value:**

The XML representation of the data.



---
### Polyfill::xmlToArray

Converts XML to an associative array.

```php
Polyfill::xmlToArray( string xmlString ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `xmlString` | **string** | The XML string to convert. |


**Return Value:**

The converted associative array.



---
## RandomUtility

Class RandomUtility

Provides utility methods for generating random values.

* Full name: \PHPallas\Utilities\RandomUtility


### RandomUtility::randomInt

Generates a random integer between the specified minimum and maximum values.

```php
RandomUtility::randomInt( int min, int max = 100 ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `min` | **int** | The minimum value (inclusive). |
| `max` | **int** | The maximum value (inclusive). |


**Return Value:**

A random integer between min and max.



---
### RandomUtility::randomFloat

Generates a random float between the specified minimum and maximum values.

```php
RandomUtility::randomFloat( float min = 0.0, float max = 100.0 ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `min` | **float** | The minimum value (inclusive). |
| `max` | **float** | The maximum value (inclusive). |


**Return Value:**

A random float between min and max.



---
### RandomUtility::randomBool

Generates a random boolean value.

```php
RandomUtility::randomBool(  ): bool
```



* This method is **static**.

**Return Value:**

A random boolean value (true or false).



---
### RandomUtility::randomString

Generates a random string of the specified length using predefined characters.

```php
RandomUtility::randomString( int length = 10 ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **int** | The length of the random string to generate. |


**Return Value:**

A random string of the specified length.



---
### RandomUtility::randomArray

Generates an array of random values of the specified count.

```php
RandomUtility::randomArray( int count = 5 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `count` | **int** | The number of random values to generate. |


**Return Value:**

An array containing random values.



---
### RandomUtility::randomObject

Generates a random object with properties based on random values.

```php
RandomUtility::randomObject( int count = 5 ): object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `count` | **int** | The number of properties to include in the random object. |


**Return Value:**

A random object with specified properties.



---
## SecurityUtility





* Full name: \PHPallas\Utilities\SecurityUtility


### SecurityUtility::hashPassword

Hash a password using SHA-256.

```php
SecurityUtility::hashPassword( string password ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `password` | **string** | The password to hash. |


**Return Value:**

The hashed password.



---
### SecurityUtility::verifyPassword

Verify a password against a hashed value.

```php
SecurityUtility::verifyPassword( string password, string hashedPassword ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `password` | **string** | The password to verify. |
| `hashedPassword` | **string** | The hashed password to compare against. |


**Return Value:**

True if the password matches, false otherwise.



---
### SecurityUtility::generateToken

Generate a secure random token.

```php
SecurityUtility::generateToken( int length = 32 ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **int** | The length of the token. |


**Return Value:**

The generated token.



---
### SecurityUtility::sanitizeString

Sanitize a string to prevent XSS.

```php
SecurityUtility::sanitizeString( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The string to sanitize. |


**Return Value:**

The sanitized string.



---
### SecurityUtility::validateEmail

Validate an email address.

```php
SecurityUtility::validateEmail( string email ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `email` | **string** | The email address to validate. |


**Return Value:**

True if the email is valid, false otherwise.



---
### SecurityUtility::generateRandomPassword

Generate a random password.

```php
SecurityUtility::generateRandomPassword( int length = 12 ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **int** | The length of the password. |


**Return Value:**

The generated password.



---
### SecurityUtility::isStrongPassword

Check if a string is a strong password.

```php
SecurityUtility::isStrongPassword( string password ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `password` | **string** | The password to check. |


**Return Value:**

True if the password is strong, false otherwise.



---
### SecurityUtility::encryptData

Encrypt data using a simple XOR cipher (not secure for sensitive data).

```php
SecurityUtility::encryptData( string data, string key ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **string** | The data to encrypt. |
| `key` | **string** | The key to use for encryption. |


**Return Value:**

The encrypted data.



---
### SecurityUtility::decryptData

Decrypt data encrypted by the XOR cipher.

```php
SecurityUtility::decryptData( string encryptedData, string key ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `encryptedData` | **string** | The encrypted data to decrypt. |
| `key` | **string** | The key to use for decryption. |


**Return Value:**

The decrypted data.



---
### SecurityUtility::generateRandomString

Generate a random alphanumeric string.

```php
SecurityUtility::generateRandomString( int length = 10, mixed characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **int** | The length of the string. |
| `characters` | **mixed** |  |


**Return Value:**

The generated string.



---
### SecurityUtility::generateRandomInt

Generate a random integer.

```php
SecurityUtility::generateRandomInt( int min, int max = 100 ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `min` | **int** | The minimum value. |
| `max` | **int** | The maximum value. |


**Return Value:**

The generated integer.



---
### SecurityUtility::generateRandomFloat

Generate a random float.

```php
SecurityUtility::generateRandomFloat( float min = 0.0, float max = 100.0 ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `min` | **float** | The minimum value. |
| `max` | **float** | The maximum value. |


**Return Value:**

The generated float.



---
### SecurityUtility::generateUUID

Generate a random UUID.

```php
SecurityUtility::generateUUID(  ): string
```



* This method is **static**.

**Return Value:**

The generated UUID.



---
### SecurityUtility::generateSecureRandomBytes

Generate a secure random binary string.

```php
SecurityUtility::generateSecureRandomBytes( int length = 16 ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **int** | The length of the binary string. |


**Return Value:**

The generated binary string.



---
### SecurityUtility::validateURL

Validate a URL.

```php
SecurityUtility::validateURL( string url ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `url` | **string** | The URL to validate. |


**Return Value:**

True if the URL is valid, false otherwise.



---
### SecurityUtility::validatePhoneNumber

Validate a phone number (simple validation).

```php
SecurityUtility::validatePhoneNumber( string phone ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `phone` | **string** | The phone number to validate. |


**Return Value:**

True if the phone number is valid, false otherwise.



---
### SecurityUtility::hashWithBcrypt

Generate a secure hash using bcrypt.

```php
SecurityUtility::hashWithBcrypt( string password ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `password` | **string** | The password to hash. |


**Return Value:**

The hashed password.



---
### SecurityUtility::verifyBcryptPassword

Verify a bcrypt-hashed password.

```php
SecurityUtility::verifyBcryptPassword( string password, string hashedPassword ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `password` | **string** | The password to verify. |
| `hashedPassword` | **string** | The hashed password to compare against. |


**Return Value:**

True if the password matches, false otherwise.



---
### SecurityUtility::generateRandomColor

Generate a random color in HEX format.

```php
SecurityUtility::generateRandomColor(  ): string
```



* This method is **static**.

**Return Value:**

The generated color.



---
### SecurityUtility::sanitizeArray

Sanitize an array of strings.

```php
SecurityUtility::sanitizeArray( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** | The array of strings to sanitize. |


**Return Value:**

The sanitized array.



---
### SecurityUtility::generateSecurityQuestion

Generate a random security question.

```php
SecurityUtility::generateSecurityQuestion(  ): string
```



* This method is **static**.

**Return Value:**

The generated security question.



---
### SecurityUtility::generateSecurityAnswer

Generate a random answer for a security question.

```php
SecurityUtility::generateSecurityAnswer(  ): string
```



* This method is **static**.

**Return Value:**

The generated answer.



---
### SecurityUtility::getClientIP

Get the current IP address.

```php
SecurityUtility::getClientIP(  ): string
```



* This method is **static**.

**Return Value:**

The client's IP address.



---
### SecurityUtility::getUserAgent

Get the current user agent.

```php
SecurityUtility::getUserAgent(  ): string
```



* This method is **static**.

**Return Value:**

The user agent string.



---
### SecurityUtility::generateSessionID

Generate a random session ID.

```php
SecurityUtility::generateSessionID(  ): string
```



* This method is **static**.

**Return Value:**

The generated session ID.



---
### SecurityUtility::isValidJSON

Check if a string is a valid JSON.

```php
SecurityUtility::isValidJSON( string string ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The string to check. |


**Return Value:**

True if valid JSON, false otherwise.



---
### SecurityUtility::generateRandomStringFromSet

Generate a random string of a specified character set.

```php
SecurityUtility::generateRandomStringFromSet( int length, string set ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **int** | The length of the string. |
| `set` | **string** | The character set to use. |


**Return Value:**

The generated string.



---
### SecurityUtility::aesEncrypt

Encrypt a string using AES-256.

```php
SecurityUtility::aesEncrypt( string data, string key ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **string** | The data to encrypt. |
| `key` | **string** | The key to use for encryption. |


**Return Value:**

The encrypted data.



---
### SecurityUtility::aesDecrypt

Decrypt a string using AES-256.

```php
SecurityUtility::aesDecrypt( string encryptedData, string key ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `encryptedData` | **string** | The encrypted data to decrypt. |
| `key` | **string** | The key to use for decryption. |


**Return Value:**

The decrypted data.



---
### SecurityUtility::generateAPIKey

Generate a random API key.

```php
SecurityUtility::generateAPIKey( int length = 32 ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **int** | The length of the API key. |


**Return Value:**

The generated API key.



---
### SecurityUtility::createCSRFToken

Create a CSRF token.

```php
SecurityUtility::createCSRFToken(  ): string
```



* This method is **static**.

**Return Value:**

The generated CSRF token.



---
### SecurityUtility::validateCSRFToken

Validate a CSRF token.

```php
SecurityUtility::validateCSRFToken( string token, string sessionToken ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `token` | **string** | The token to validate. |
| `sessionToken` | **string** | The session token to compare against. |


**Return Value:**

True if the tokens match, false otherwise.



---
### SecurityUtility::generateHMACKey

Generate a random secret key for HMAC.

```php
SecurityUtility::generateHMACKey( int length = 32 ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **int** | The length of the secret key. |


**Return Value:**

The generated secret key.



---
### SecurityUtility::generateHMAC

Generate HMAC for a given data.

```php
SecurityUtility::generateHMAC( string data, string key ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **string** | The data to hash. |
| `key` | **string** | The key to use for HMAC. |


**Return Value:**

The generated HMAC.



---
### SecurityUtility::validateHMAC

Validate HMAC for a given data.

```php
SecurityUtility::validateHMAC( string data, string key, string hmac ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **string** | The data to validate. |
| `key` | **string** | The key used to generate the HMAC. |
| `hmac` | **string** | The HMAC to compare against. |


**Return Value:**

True if the HMAC is valid, false otherwise.



---
### SecurityUtility::generateSalt

Generate a random salt.

```php
SecurityUtility::generateSalt( int length = 16 ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **int** | The length of the salt. |


**Return Value:**

The generated salt.



---
### SecurityUtility::hashPasswordWithSalt

Hash a password with a salt.

```php
SecurityUtility::hashPasswordWithSalt( string password, string salt ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `password` | **string** | The password to hash. |
| `salt` | **string** | The salt to use. |


**Return Value:**

The hashed password.



---
### SecurityUtility::verifyPasswordWithSalt

Verify a password with a salt.

```php
SecurityUtility::verifyPasswordWithSalt( string password, string salt, string hashedPassword ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `password` | **string** | The password to verify. |
| `salt` | **string** | The salt used in hashing. |
| `hashedPassword` | **string** | The hashed password to compare against. |


**Return Value:**

True if the password matches, false otherwise.



---
### SecurityUtility::generateRandomPhrase

Generate a random phrase (for testing).

```php
SecurityUtility::generateRandomPhrase( int wordCount = 4 ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `wordCount` | **int** | The number of words in the phrase. |


**Return Value:**

The generated phrase.



---
## SqlUtility





* Full name: \PHPallas\Utilities\SqlUtility


### SqlUtility::selectQuery

selectQuery is a versatile function that dynamically builds a SQL SELECT
statement based on the provided parameters. It handles various SQL syntax
differences across multiple database systems, ensuring that the correct
syntax is used for limiting results, grouping, ordering, and filtering
data. The method is designed to be flexible and reusable for different
database interactions.

```php
SqlUtility::selectQuery( string|array table, string|array|null fields = "*", mixed joins = [], array where = [], array order = [], array group = [], array having = [], mixed limit = null, int database = 9, mixed distinct = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `table` | **string\|array** |  |
| `fields` | **string\|array\|null** |  |
| `joins` | **mixed** |  |
| `where` | **array** |  |
| `order` | **array** |  |
| `group` | **array** |  |
| `having` | **array** |  |
| `limit` | **mixed** |  |
| `database` | **int** |  |
| `distinct` | **mixed** |  |


**Return Value:**





---
### SqlUtility::updateQuery

The updateQuery method is a flexible function that constructs a SQL
UPDATE statement dynamically based on the provided parameters. It handles
the creation of the SET and WHERE clauses, ensuring proper parameter
binding to prevent SQL injection. This method is designed to be reusable
for updating rows in different tables with varying conditions.

```php
SqlUtility::updateQuery( string table, array values, array where, mixed return = false, mixed limit = null, mixed database = 9 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `table` | **string** |  |
| `values` | **array** |  |
| `where` | **array** |  |
| `return` | **mixed** |  |
| `limit` | **mixed** |  |
| `database` | **mixed** |  |


**Return Value:**





---
### SqlUtility::deleteQuery

The deleteQuery method is a straightforward function that constructs a
SQL DELETE statement dynamically based on the provided parameters. It
builds the WHERE clause to specify which rows to delete, ensuring proper
parameter binding to prevent SQL injection. This method is designed to be
reusable for deleting records from different tables based on various
conditions.

```php
SqlUtility::deleteQuery( string table, array where = [], mixed order = [], mixed limit = null, mixed alias = null, mixed database = 9 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `table` | **string** |  |
| `where` | **array** |  |
| `order` | **mixed** |  |
| `limit` | **mixed** |  |
| `alias` | **mixed** |  |
| `database` | **mixed** |  |


**Return Value:**





---
### SqlUtility::insertQuery

This function is designed to handle both single-row and multi-row
inserts into a database table. It dynamically constructs the SQL query
and ensures that parameter names are unique to prevent conflicts during
execution.

```php
SqlUtility::insertQuery( string table, array values, mixed ignore = false, mixed return = false, mixed database = 9 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `table` | **string** |  |
| `values` | **array** |  |
| `ignore` | **mixed** |  |
| `return` | **mixed** |  |
| `database` | **mixed** |  |


**Return Value:**





---
### SqlUtility::unionQuery

Create union query

```php
SqlUtility::unionQuery( mixed selects, mixed full = false ): array{params: mixed, sql: string}
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `selects` | **mixed** |  |
| `full` | **mixed** |  |


**Return Value:**





---
### SqlUtility::createTable

Creates a SQL CREATE TABLE statement.

```php
SqlUtility::createTable( string tableName, array columns, array options = [] ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `tableName` | **string** |  |
| `columns` | **array** | Associative array of column names and data types |
| `options` | **array** | Additional options like PRIMARY KEY, UNIQUE, etc. |


**Return Value:**





---
### SqlUtility::alterTable

Alters an existing table to add or drop columns.

```php
SqlUtility::alterTable( string tableName, array addColumns = [], array dropColumns = [], mixed database = 9 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `tableName` | **string** |  |
| `addColumns` | **array** | Associative array of column names and data types to add |
| `dropColumns` | **array** | Array of column names to drop |
| `database` | **mixed** |  |


**Return Value:**





---
### SqlUtility::dropTable

Drops an existing table.

```php
SqlUtility::dropTable( string tableName ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `tableName` | **string** |  |


**Return Value:**





---
### SqlUtility::modifyColumn

Modifies an existing column in a table.

```php
SqlUtility::modifyColumn( string tableName, string columnName, string newDefinition, mixed database = 9 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `tableName` | **string** |  |
| `columnName` | **string** |  |
| `newDefinition` | **string** | New data type or attributes |
| `database` | **mixed** |  |


**Return Value:**





---
### SqlUtility::addIndex

Adds an index to a table.

```php
SqlUtility::addIndex( string tableName, string indexName, array columns ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `tableName` | **string** |  |
| `indexName` | **string** |  |
| `columns` | **array** | Array of column names to index |


**Return Value:**





---
### SqlUtility::dropIndex

Drops an existing index from a table.

```php
SqlUtility::dropIndex( string tableName, string indexName, mixed database = 9 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `tableName` | **string** |  |
| `indexName` | **string** |  |
| `database` | **mixed** |  |


**Return Value:**





---
### SqlUtility::createDatabase

Creates a new database.

```php
SqlUtility::createDatabase( string dbName, int database ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `dbName` | **string** | The name of the database to create. |
| `database` | **int** | The database type constant. |


**Return Value:**

The SQL statement and parameters for execution.



---
### SqlUtility::dropDatabase

Drops an existing database.

```php
SqlUtility::dropDatabase( string dbName, int database ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `dbName` | **string** | The name of the database to drop. |
| `database` | **int** | The database type constant. |


**Return Value:**

The SQL statement and parameters for execution.



---
### SqlUtility::buildOrderClause



```php
SqlUtility::buildOrderClause( mixed order ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `order` | **mixed** |  |


**Return Value:**





---
### SqlUtility::buildWhereClause



```php
SqlUtility::buildWhereClause( mixed conditions, mixed &params ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `conditions` | **mixed** |  |
| `params` | **mixed** |  |


**Return Value:**





---
## StringUtility

Class StringUtility

A comprehensive utility class designed to facilitate various string
manipulations and transformations. This class provides methods for
creating, modifying, encoding, decoding, hashing, and checking strings
in a consistent and reusable manner. It includes functionalities such as
string creation, substring retrieval, character manipulation,
phrase checking, and various encoding/decoding techniques.

The utility also supports different string formats and transformations,
making it a versatile tool for developers working with string data
in PHP applications.

* Full name: \PHPallas\Utilities\StringUtility


### StringUtility::create

Creates a string consisting of a specified character repeated to a given
length.

```php
StringUtility::create( string character, int length ): string
```

This method generates a string where the specified character is repeated
until the desired length is achieved. If the length is less than or equal
to zero, an empty string is returned.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `character` | **string** | The character to repeat. |
| `length` | **int** | The total length of the resulting string. |


**Return Value:**

The resulting string filled with the specified character.



---
### StringUtility::createRandom

Generates a random string of a specified length using the provided
characters.

```php
StringUtility::createRandom( int length = 8, string characters = "abcdefghijklmnopqrstuvwxyz" ): string
```

This method creates a random string by selecting characters from the
provided set. If the length is not specified, it defaults to 8. The
characters can be customized to include any valid characters.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `length` | **int** | The length of the random string to create. Default is
8. |
| `characters` | **string** | The characters to use for generating the random
string. Default is lowercase letters. |


**Return Value:**

The generated random string.



---
### StringUtility::createByRepeat

Repeats a given string a specified number of times.

```php
StringUtility::createByRepeat( string string, int times ): string
```

This method takes an input string and repeats it the specified number of
times. If the times parameter is less than or equal to zero, an empty
string is returned.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The string to repeat. |
| `times` | **int** | The number of times to repeat the string. |


**Return Value:**

The resulting string after repetition.



---
### StringUtility::get

Retrieves a character from a string at a specified index.

```php
StringUtility::get( string string, int index ): string
```

This method splits the given string into an array of characters and
returns the character at the specified index. If the index is out of
bounds, it returns an empty string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string from which to retrieve the character. |
| `index` | **int** | The index of the character to retrieve. |


**Return Value:**

The character at the specified index, or an empty string if not found.



---
### StringUtility::getSubset

Retrieves a subset of a string starting from a given index.

```php
StringUtility::getSubset( string string, int startIndex, int|null length, string encoding = 'UTF-8' ): string
```

This method extracts a substring from the input string, starting at
the specified index and continuing for the specified length. It uses
the multibyte string function if available, falling back to standard
string functions otherwise.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string from which to extract the subset. |
| `startIndex` | **int** | The starting index for the substring. |
| `length` | **int\|null** | The length of the substring. If null, the substring extends to the end of the string. |
| `encoding` | **string** | The character encoding. Default is &#039;UTF-8&#039;. |


**Return Value:**

The extracted substring.



---
### StringUtility::getSegment

Retrieves a segment of a string between two specified indices.

```php
StringUtility::getSegment( string string, int startIndex, int endIndex ): string
```

This method extracts a substring from the input string starting at
the specified start index and ending at the specified end index.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string from which to extract the segment. |
| `startIndex` | **int** | The starting index of the segment. |
| `endIndex` | **int** | The ending index of the segment. |


**Return Value:**

The extracted segment of the string.



---
### StringUtility::set

Sets a character at a specified index in the given string.

```php
StringUtility::set( string string, int index, string value ): string
```

This method splits the string into an array of characters, replaces
the character at the specified index with the provided value, and
then reconstructs the string from the modified array.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |
| `index` | **int** | The index at which to set the new character. |
| `value` | **string** | The character to set at the specified index. |


**Return Value:**

The modified string with the character set at the index.



---
### StringUtility::setReplace

Replaces occurrences of a substring within a string.

```php
StringUtility::setReplace( string string, string|array needle, string|array replace, bool caseSensitive = false ): string
```

This method replaces all instances of the specified needle with the
replacement value. It can perform case-sensitive or case-insensitive
replacements based on the provided flag.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string in which to perform the replacement. |
| `needle` | **string\|array** | The substring to be replaced. |
| `replace` | **string\|array** | The substring to replace with. |
| `caseSensitive` | **bool** | Indicates whether the replacement should be
case-sensitive. Default is false. |


**Return Value:**

The modified string with replacements made.



---
### StringUtility::setInStart

Pads the string on the left with a specified character to a given length.

```php
StringUtility::setInStart( string string, string character, int length ): string
```

This method adds the specified character to the start of the string
until the desired length is reached.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to pad. |
| `character` | **string** | The character to use for padding. |
| `length` | **int** | The total length of the resulting string after padding. |


**Return Value:**

The left-padded string.



---
### StringUtility::setInEnd

Pads the string on the right with a specified character to a given length.

```php
StringUtility::setInEnd( string string, string character, int length ): string
```

This method adds the specified character to the end of the string
until the desired length is reached.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to pad. |
| `character` | **string** | The character to use for padding. |
| `length` | **int** | The total length of the resulting string after padding. |


**Return Value:**

The right-padded string.



---
### StringUtility::hasPhrase

Checks if a specified phrase exists within a given string.

```php
StringUtility::hasPhrase( string string, string needle, bool caseSensitive = true ): bool
```

This method determines whether the needle (substring) is present in the
string, with an option for case sensitivity. If case sensitivity is
disabled, both the string and the needle are transformed to lowercase
before the check.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to search within. |
| `needle` | **string** | The substring to search for. |
| `caseSensitive` | **bool** | Indicates whether the search should be
case-sensitive. Default is true. |


**Return Value:**

Returns true if the needle is found in the string, false otherwise.



---
### StringUtility::addToStart

Adds a specified value to the start of the given string.

```php
StringUtility::addToStart( string string, string value ): string
```

This method concatenates the value with the input string, placing
the value at the beginning.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |
| `value` | **string** | The value to add to the start of the string. |


**Return Value:**

The modified string with the value added at the start.



---
### StringUtility::addToEnd

Adds a specified value to the end of the given string.

```php
StringUtility::addToEnd( string string, string value ): string
```

This method concatenates the input string with the value, placing
the value at the end.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |
| `value` | **string** | The value to add to the end of the string. |


**Return Value:**

The modified string with the value added at the end.



---
### StringUtility::addToCenter

Adds a specified value to the center of the given string.

```php
StringUtility::addToCenter( string string, string value ): string
```

This method calculates the middle of the input string and inserts
the value at that position.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |
| `value` | **string** | The value to add to the center of the string. |


**Return Value:**

The modified string with the value added at the center.



---
### StringUtility::addEvenly

Adds a specified value evenly throughout the given string.

```php
StringUtility::addEvenly( string string, string value, int size ): string
```

This method inserts the value at regular intervals defined by the
specified size within the string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |
| `value` | **string** | The value to insert into the string. |
| `size` | **int** | The interval size at which to insert the value. |


**Return Value:**

The modified string with the value added evenly.



---
### StringUtility::drop

Drops specified characters from the given string.

```php
StringUtility::drop( string string, string characters = " \n\r\t\v\x00" ): string
```

This method removes all occurrences of the specified characters
from the input string. By default, it drops whitespace and control
characters.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |
| `characters` | **string** | The characters to drop from the string. |


**Return Value:**

The modified string with the specified characters removed.



---
### StringUtility::dropFirst

Drops the first character from the given string.

```php
StringUtility::dropFirst( string string ): string
```

This method removes the first character of the input string and
returns the modified string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |


**Return Value:**

The modified string with the first character removed.



---
### StringUtility::dropLast

Drops the last character from the given string.

```php
StringUtility::dropLast( string string ): string
```

This method removes the last character of the input string and
returns the modified string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |


**Return Value:**

The modified string with the last character removed.



---
### StringUtility::dropNth

Drops the character at the specified index from the given string.

```php
StringUtility::dropNth( string string, int index ): string
```

This method removes the character at the specified index and
returns the modified string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |
| `index` | **int** | The index of the character to drop. |


**Return Value:**

The modified string with the character at the specified index removed.



---
### StringUtility::dropFromSides

Drops specified characters from both ends of the given string.

```php
StringUtility::dropFromSides( string string, string characters = " \n\r\t\v\x00" ): string
```

This method trims the specified characters from the start and end
of the input string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |
| `characters` | **string** | The characters to drop from both ends. |


**Return Value:**

The modified string with specified characters trimmed from both ends.



---
### StringUtility::dropFromStart

Drops specified characters from the start of the given string.

```php
StringUtility::dropFromStart( string string, string characters = " \n\r\t\v\x00" ): string
```

This method removes all occurrences of the specified characters
from the beginning of the input string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |
| `characters` | **string** | The characters to drop from the start. |


**Return Value:**

The modified string with specified characters removed from the start.



---
### StringUtility::dropFromEnd

Drops specified characters from the end of the given string.

```php
StringUtility::dropFromEnd( string string, string characters = " \n\r\t\v\x00" ): string
```

This method removes all occurrences of the specified characters
from the end of the input string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |
| `characters` | **string** | The characters to drop from the end. |


**Return Value:**

The modified string with specified characters removed from the end.



---
### StringUtility::dropSeparator

Drops specified separators from the given string.

```php
StringUtility::dropSeparator( string string ): string
```

This method removes dashes and underscores from the input string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |


**Return Value:**

The modified string with specified separators removed.



---
### StringUtility::dropSpace

Drops all spaces from the given string.

```php
StringUtility::dropSpace( string string ): string
```

This method removes all space characters from the input string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to modify. |


**Return Value:**

The modified string with all spaces removed.



---
### StringUtility::dropExtras

Truncates a string to a specified length and appends ellipsis if needed.

```php
StringUtility::dropExtras( string string, int length ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to truncate. |
| `length` | **int** | The maximum length of the resulting string. |


**Return Value:**

The truncated string with ellipsis.



---
### StringUtility::transformToReverse

Transforms the given string to its reverse.

```php
StringUtility::transformToReverse( string string ): string
```

This method returns the input string reversed.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The reversed string.



---
### StringUtility::transformToShuffle

Transforms the given string by shuffling its characters.

```php
StringUtility::transformToShuffle( string string ): string
```

This method returns a new string with the characters of the input string
shuffled randomly.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The shuffled string.



---
### StringUtility::transformToNoTag

Transforms the given string by stripping HTML and PHP tags.

```php
StringUtility::transformToNoTag( string string, string|null allowedTags = null ): string
```

This method removes all tags from the input string, optionally allowing
specified tags.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |
| `allowedTags` | **string\|null** | Tags that should not be stripped. |


**Return Value:**

The string with tags stripped.



---
### StringUtility::transformToLowercase

Transforms the given string to lowercase.

```php
StringUtility::transformToLowercase( string string, bool removeSeparators = false, bool dropSpace = false ): string
```

This method converts the input string to lowercase, with options to
remove separators and spaces.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |
| `removeSeparators` | **bool** | Whether to remove separators. |
| `dropSpace` | **bool** | Whether to remove spaces. |


**Return Value:**

The lowercase string.



---
### StringUtility::transformToUppercase

Transforms the given string to uppercase.

```php
StringUtility::transformToUppercase( string string, bool removeSeparators = false, bool removeSpace = false ): string
```

This method converts the input string to uppercase, with options to
remove separators and spaces.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |
| `removeSeparators` | **bool** | Whether to remove separators. |
| `removeSpace` | **bool** | Whether to remove spaces. |


**Return Value:**

The uppercase string.



---
### StringUtility::transformToLowercaseFirst

Transforms the given string to lowercase, capitalizing the first character.

```php
StringUtility::transformToLowercaseFirst( string string, bool removeSeparators = false, bool removeSpace = false ): string
```

This method converts the input string to lowercase, with options to
remove separators and spaces.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |
| `removeSeparators` | **bool** | Whether to remove separators. |
| `removeSpace` | **bool** | Whether to remove spaces. |


**Return Value:**

The string with the first character in lowercase.



---
### StringUtility::transformToUppercaseFirst

Transforms the given string to uppercase, capitalizing the first character.

```php
StringUtility::transformToUppercaseFirst( string string, bool removeSeparators = false, bool removeSpace = false ): string
```

This method converts the input string to uppercase, with options to
remove separators and spaces.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |
| `removeSeparators` | **bool** | Whether to remove separators. |
| `removeSpace` | **bool** | Whether to remove spaces. |


**Return Value:**

The string with the first character in uppercase.



---
### StringUtility::transformToCapital

Capitalizes the first letter of each word in the string.

```php
StringUtility::transformToCapital( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to capitalize. |


**Return Value:**

The capitalized string.



---
### StringUtility::transformToFlatcase

Transforms the given string to flatcase.

```php
StringUtility::transformToFlatcase( string string ): string
```

This method replaces dashes and underscores with spaces, converts
each word to lowercase, and removes spaces.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The flatcase string.



---
### StringUtility::transformToPascalCase

Transforms the given string to PascalCase.

```php
StringUtility::transformToPascalCase( string string ): string
```

This method replaces dashes and underscores with spaces, capitalizes
each word, and joins them together.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The PascalCase string.



---
### StringUtility::transformToTitleCase

Converts a string to title case.

```php
StringUtility::transformToTitleCase( string string ): string
```

This method capitalizes the first letter of each word in the
input string while converting the rest to lowercase.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The title-cased string.



---
### StringUtility::transformToCamelcase

Transforms the given string to camelCase.

```php
StringUtility::transformToCamelcase( string string ): string
```

This method converts the input string to PascalCase and then lowers
the first character.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The camelCase string.



---
### StringUtility::transformToSnakecase

Transforms the given string to snake_case.

```php
StringUtility::transformToSnakecase( string string ): string
```

This method replaces dashes and underscores with spaces, converts
each word to lowercase, and joins them with underscores.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The snake_case string.



---
### StringUtility::transformToMacrocase

Transforms the given string to MACROCASE.

```php
StringUtility::transformToMacrocase( string string ): string
```

This method converts the input string to snake_case and then converts
it to uppercase.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The MACROCASE string.



---
### StringUtility::transformToPascalSnakecase

Transforms the given string to Pascal_Snake_Case.

```php
StringUtility::transformToPascalSnakecase( string string ): string
```

This method converts the input string to PascalCase and joins them
with underscores.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The Pascal_Snake_Case string.



---
### StringUtility::transformToCamelSnakecase

Transforms the given string to camel_snake_case.

```php
StringUtility::transformToCamelSnakecase( string string ): string
```

This method converts the input string to Pascal_Snake_Case and then
lowers the first character.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The camel_snake_case string.



---
### StringUtility::transformToKebabcase

Transforms the given string to kebab-case.

```php
StringUtility::transformToKebabcase( string string ): string
```

This method converts the input string to snake_case and replaces
underscores with dashes.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The kebab-case string.



---
### StringUtility::transformToCobolcase

Transforms the given string to COBOLCASE.

```php
StringUtility::transformToCobolcase( string string ): string
```

This method converts the input string to kebab-case and then
converts it to uppercase.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The COBOLCASE string.



---
### StringUtility::transformToTraincase

Transforms the given string to train-case.

```php
StringUtility::transformToTraincase( string string ): string
```

This method converts the input string to Pascal_Snake_Case and
replaces underscores with dashes.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The train-case string.



---
### StringUtility::transformToMetaphone

Transforms the given string to its metaphone representation.

```php
StringUtility::transformToMetaphone( string string ): string
```

This method returns the metaphone key for the input string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The metaphone representation of the string.



---
### StringUtility::transformToSoundex

Transforms the given string to its soundex representation.

```php
StringUtility::transformToSoundex( string string ): string
```

This method returns the soundex key for the input string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to transform. |


**Return Value:**

The soundex representation of the string.



---
### StringUtility::isEqualTo

Checks if two strings are equal.

```php
StringUtility::isEqualTo( string string1, string string2 ): bool
```

This method compares two strings for strict equality.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string1` | **string** | The first string to compare. |
| `string2` | **string** | The second string to compare. |


**Return Value:**

Returns true if the strings are equal, false otherwise.



---
### StringUtility::isSameAs

Checks if two strings are equal, ignoring case.

```php
StringUtility::isSameAs( string string1, string string2 ): bool
```

This method converts both strings to lowercase and then compares them
for equality.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string1` | **string** | The first string to compare. |
| `string2` | **string** | The second string to compare. |


**Return Value:**

Returns true if the strings are equal (case-insensitive), false otherwise.



---
### StringUtility::isStartedBy

Checks if a string starts with a given substring.

```php
StringUtility::isStartedBy( string string, string starting ): bool
```

This method checks if the input string begins with the specified starting
substring.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The string to check. |
| `starting` | **string** | The substring to look for at the start. |


**Return Value:**

Returns true if the string starts with the specified substring, false otherwise.



---
### StringUtility::isEndedWith

Checks if a string ends with a given substring.

```php
StringUtility::isEndedWith( string string, string ending ): bool
```

This method checks if the input string ends with the specified ending
substring.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The string to check. |
| `ending` | **string** | The substring to look for at the end. |


**Return Value:**

Returns true if the string ends with the specified substring, false otherwise.



---
### StringUtility::isPalindrome

Checks if a string is a palindrome.

```php
StringUtility::isPalindrome( string string ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to check. |


**Return Value:**

True if the string is a palindrome, false otherwise.



---
### StringUtility::estimateLength

Estimates the length of a string.

```php
StringUtility::estimateLength( string string ): int
```

This method uses `mb_strlen` if available, otherwise falls back to
`strlen` for length estimation.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to estimate the length of. |


**Return Value:**

The estimated length of the string.



---
### StringUtility::estimateCounts

Estimates the counts of each character in a string.

```php
StringUtility::estimateCounts( string string ): array
```

This method converts the string to an array of characters and counts
the occurrences of each character.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to estimate character counts. |


**Return Value:**

An associative array where keys are characters and values
are their respective counts.



---
### StringUtility::estimateSimilarity

Compares two strings and returns a similarity score.

```php
StringUtility::estimateSimilarity( string string1, string string2 ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string1` | **string** | The first string to compare. |
| `string2` | **string** | The second string to compare. |


**Return Value:**

A similarity score between 0 and 1, where 1 means identical.



---
### StringUtility::estimateLevenshteinDistance

Calculates the Levenshtein distance between two strings.

```php
StringUtility::estimateLevenshteinDistance( string string1, string string2 ): int
```

This method measures the number of single-character edits
(insertions, deletions, or substitutions) required to change
one string into another.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string1` | **string** | The first string to compare. |
| `string2` | **string** | The second string to compare. |


**Return Value:**

The Levenshtein distance between the two strings.



---
### StringUtility::merge

Merges multiple strings into a single string using a specified separator.

```php
StringUtility::merge( string separator ): string
```

This method takes a variable number of string arguments, removes the
first argument (the separator), and concatenates the remaining strings
with the specified separator.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `separator` | **string** | The separator to use between the strings. |


**Return Value:**

The merged string with the specified separator.



---
### StringUtility::split

Splits a string into segments of specified length.

```php
StringUtility::split( string string, int segmentLength ): array
```

This method uses `mb_str_split` from the Polyfill to handle multibyte
characters properly.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to be split. |
| `segmentLength` | **int** | The length of each segment. |


**Return Value:**

An array of string segments.



---
### StringUtility::splitBy

Splits a string by a specified separator.

```php
StringUtility::splitBy( string string, string separator ): array
```

This method uses `explode` to divide the string into an array based on
the provided separator.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to be split. |
| `separator` | **string** | The separator to split the string by. |


**Return Value:**

An array of substrings created by splitting the input string.



---
### StringUtility::toHex

Converts a string to its hexadecimal representation.

```php
StringUtility::toHex( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to convert. |


**Return Value:**

The hexadecimal representation of the input string.



---
### StringUtility::fromHex

Converts a hexadecimal string back to its original form.

```php
StringUtility::fromHex( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The hexadecimal string to convert. |


**Return Value:**

The original string represented by the hexadecimal input.



---
### StringUtility::toAscii

Converts a character to its ASCII value.

```php
StringUtility::toAscii( string character ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `character` | **string** | The character to convert. |


**Return Value:**

The ASCII value of the character.



---
### StringUtility::fromAscii

Converts an ASCII value back to its corresponding character.

```php
StringUtility::fromAscii( int ascii ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `ascii` | **int** | The ASCII value to convert. |


**Return Value:**

The character represented by the ASCII value.



---
### StringUtility::toFormat

Formats values into a string according to a specified format.

```php
StringUtility::toFormat( string format ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `format` | **string** | The format string. |


**Return Value:**

The formatted string.



---
### StringUtility::fromFormat

Parses a string according to a specified format.

```php
StringUtility::fromFormat( string string, string format ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to parse. |
| `format` | **string** | The format string. |


**Return Value:**

An array of parsed values.



---
### StringUtility::toArray

Converts a string into an array of its characters.

```php
StringUtility::toArray( string string ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to convert. |


**Return Value:**

An array of characters from the string.



---
### StringUtility::toArrayWithSeparator

Converts a string into an array using a custom separator.

```php
StringUtility::toArrayWithSeparator( string string, string separator ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to convert. |
| `separator` | **string** | The separator to use for splitting the string. |


**Return Value:**

An array of substrings created by splitting the input string.



---
### StringUtility::fromArray

Converts an array of strings back into a single string.

```php
StringUtility::fromArray( array array, string separator = "" ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** | The array of strings to join. |
| `separator` | **string** | The separator to use when joining. |


**Return Value:**

The joined string.



---
### StringUtility::toInteger

Converts a string to an integer.

```php
StringUtility::toInteger( string string ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to convert. |


**Return Value:**

The integer value of the string.



---
### StringUtility::fromInteger

Converts an integer back to a string.

```php
StringUtility::fromInteger( int integer ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `integer` | **int** | The integer to convert. |


**Return Value:**

The string representation of the integer.



---
### StringUtility::toFloat

Converts a string to a float.

```php
StringUtility::toFloat( string string ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to convert. |


**Return Value:**

The float value of the string.



---
### StringUtility::fromFloat

Converts a float back to a string.

```php
StringUtility::fromFloat( float float ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `float` | **float** | The float to convert. |


**Return Value:**

The string representation of the float.



---
### StringUtility::toBoolean

Converts a string to a boolean value.

```php
StringUtility::toBoolean( string string ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to convert. |


**Return Value:**

The boolean value represented by the string.



---
### StringUtility::fromBoolean

Converts a boolean value to its string representation.

```php
StringUtility::fromBoolean( bool boolean ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `boolean` | **bool** | The boolean to convert. |


**Return Value:**

"true" or "false" based on the boolean value.



---
### StringUtility::inRot

Encodes a string using ROT13.

```php
StringUtility::inRot( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to encode. |


**Return Value:**

The ROT13 encoded string.



---
### StringUtility::ofRot

Decodes a string using ROT13.

```php
StringUtility::ofRot( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to decode. |


**Return Value:**

The ROT13 decoded string.



---
### StringUtility::inSlashes

Escapes special characters in a string using slashes.

```php
StringUtility::inSlashes( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to escape. |


**Return Value:**

The escaped string with slashes.



---
### StringUtility::ofSlashes

Unescapes special characters in a string.

```php
StringUtility::ofSlashes( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to unescape. |


**Return Value:**

The unescaped string.



---
### StringUtility::inUU

Encodes a string using UU encoding.

```php
StringUtility::inUU( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to encode. |


**Return Value:**

The UU encoded string.



---
### StringUtility::ofUU

Decodes a UU encoded string.

```php
StringUtility::ofUU( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The UU encoded string to decode. |


**Return Value:**

The decoded string.



---
### StringUtility::inSafeCharacters

Converts special characters to HTML entities.

```php
StringUtility::inSafeCharacters( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to convert. |


**Return Value:**

The string with special characters converted to HTML entities.



---
### StringUtility::ofSafeCharacters

Converts HTML entities back to their corresponding characters.

```php
StringUtility::ofSafeCharacters( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string with HTML entities. |


**Return Value:**

The decoded string with HTML entities converted back.



---
### StringUtility::inHtmlEntities

Converts special characters to HTML entities with quotes.

```php
StringUtility::inHtmlEntities( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to convert. |


**Return Value:**

The string with special characters converted to HTML entities.



---
### StringUtility::ofHtmlEntities

Converts HTML entities back to their corresponding characters with quotes.

```php
StringUtility::ofHtmlEntities( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string with HTML entities. |


**Return Value:**

The decoded string with HTML entities converted back.



---
### StringUtility::inBase64

Encodes a string using Base64 encoding.

```php
StringUtility::inBase64( string string ): string
```

This method converts the input string into its Base64 encoded
representation, which is useful for data transfer.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to encode. |


**Return Value:**

The Base64 encoded string.



---
### StringUtility::ofBase64

Decodes a Base64 encoded string.

```php
StringUtility::ofBase64( string string ): string
```

This method converts a Base64 encoded string back to its
original form.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The Base64 encoded string to decode. |


**Return Value:**

The original string represented by the Base64 input.



---
### StringUtility::hashMD5

Generates an MD5 hash of a given string.

```php
StringUtility::hashMD5( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to hash. |


**Return Value:**

The MD5 hash of the input string.



---
### StringUtility::hashSHA

Generates a SHA-1 hash of a given string.

```php
StringUtility::hashSHA( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to hash. |


**Return Value:**

The SHA-1 hash of the input string.



---
### StringUtility::hashChecksum

Generates a checksum for a given string using SHA-1.

```php
StringUtility::hashChecksum( string string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to hash. |


**Return Value:**

The hashed checksum of the input string.



---
### StringUtility::validateChecksum

Validates a given string against a provided checksum.

```php
StringUtility::validateChecksum( string string, string checksum ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to validate. |
| `checksum` | **string** | The checksum to verify against. |


**Return Value:**

True if the string matches the checksum, false otherwise.



---
### StringUtility::slugify

Converts a string into a URL-friendly slug.

```php
StringUtility::slugify( string string ): string
```

This method transforms the input string into lowercase,
removes special characters, and replaces spaces with dashes.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | The input string to convert. |


**Return Value:**

The URL-friendly slug.



---
### StringUtility::interpolate

Interpolates variables into a string template.

```php
StringUtility::interpolate( string template, array variables ): string
```

This method replaces placeholders in the format {key} with
corresponding values from the provided associative array.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `template` | **string** | The string template with placeholders. |
| `variables` | **array** | An associative array of variables to interpolate. |


**Return Value:**

The string with variables interpolated.



---
### StringUtility::formatPhoneNumber

Formats a given phone number into a specified format.

```php
StringUtility::formatPhoneNumber( string number, string format ): string
```

This function accepts a phone number string in any format and
returns it in a standardized format based on the specified format string.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `number` | **string** | The input phone number to format. |
| `format` | **string** | The desired format for the phone number.
Supported formats include:
- &#039;(###) ###-####&#039;
- &#039;###-###-####&#039;
- &#039;###.###.####&#039;
- &#039;### ### ####&#039;
- &#039;###/###-####&#039;
- &#039;#######&#039;
- &#039;+1 (###) ###-####&#039;
- &#039;+1 ###-###-####&#039;
- &#039;+1 ###.###.####&#039;
- &#039;+1 ### ### ####&#039;
- &#039;+44 #### ### ###&#039;
- &#039;+49 ### #### ####&#039;
- &#039;0### ### ####&#039;
- &#039;###-##-####&#039;
- &#039;###.##.####&#039;
- &#039;###-###-###&#039;
- &#039;### ### ###&#039;
- &#039;###-###&#039;
- &#039;###.###&#039;
- &#039;### ###&#039; |


**Return Value:**

The formatted phone number or an error message.



---
### StringUtility::validatePhoneNumber

Validates a phone number.

```php
StringUtility::validatePhoneNumber( string number ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `number` | **string** | The phone number to validate. |


**Return Value:**

True if valid, false otherwise.



---
### StringUtility::validateEmail

Validates an email address.

```php
StringUtility::validateEmail( string email ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `email` | **string** | The email address to validate. |


**Return Value:**

True if valid, false otherwise.



---
### StringUtility::validateName

Validates a name.

```php
StringUtility::validateName( string name ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The name to validate. |


**Return Value:**

True if valid, false otherwise.



---
### StringUtility::validateURL

Validates a URL.

```php
StringUtility::validateURL( string url ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `url` | **string** | The URL to validate. |


**Return Value:**

True if valid, false otherwise.



---
### StringUtility::validateDate

Validates a date in YYYY-MM-DD format.

```php
StringUtility::validateDate( string date ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `date` | **string** | The date to validate. |


**Return Value:**

True if valid, false otherwise.



---
### StringUtility::validatePassword

Validates a password.

```php
StringUtility::validatePassword( string password ): bool
```

The password must be at least 8 characters long, contain at least one number,
one uppercase letter, and one lowercase letter.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `password` | **string** | The password to validate. |


**Return Value:**

True if valid, false otherwise.



---
### StringUtility::validateCreditCard

Validates a credit card number using the Luhn algorithm.

```php
StringUtility::validateCreditCard( string number ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `number` | **string** | The credit card number to validate. |


**Return Value:**

True if valid, false otherwise.



---
### StringUtility::validateUsername

Validates a username.

```php
StringUtility::validateUsername( string username ): bool
```

The username must be 3-15 characters long and can contain letters, numbers, and underscores.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `username` | **string** | The username to validate. |


**Return Value:**

True if valid, false otherwise.



---
### StringUtility::validatePostalCode

Validates a postal code.

```php
StringUtility::validatePostalCode( string postalCode ): bool
```

Supports US ZIP codes (5 or 9 digits) and Canadian postal codes (A1A 1A1).

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `postalCode` | **string** | The postal code to validate. |


**Return Value:**

True if valid, false otherwise.



---
### StringUtility::validateIP

Validates an IP address.

```php
StringUtility::validateIP( string ip ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `ip` | **string** | The IP address to validate. |


**Return Value:**

True if valid, false otherwise.



---
## TypesUtility

Class TypesUtility

A utility class for type checking and conversion.

* Full name: \PHPallas\Utilities\TypesUtility


### TypesUtility::getType

Get the type of a variable.

```php
TypesUtility::getType( mixed value ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

The type of the variable.



---
### TypesUtility::isArray

Check if the variable is an array.

```php
TypesUtility::isArray( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is an array, false otherwise.



---
### TypesUtility::isNotArray

Check if the variable is not an array.

```php
TypesUtility::isNotArray( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not an array, false otherwise.



---
### TypesUtility::isBoolean

Check if the variable is a boolean.

```php
TypesUtility::isBoolean( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is a boolean, false otherwise.



---
### TypesUtility::isNotBoolean

Check if the variable is not a boolean.

```php
TypesUtility::isNotBoolean( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not a boolean, false otherwise.



---
### TypesUtility::isBool

An alias to isBoolean()

```php
TypesUtility::isBool( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** |  |


**Return Value:**





---
### TypesUtility::isNotBool

An alias to isMotBoolean()

```php
TypesUtility::isNotBool( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** |  |


**Return Value:**





---
### TypesUtility::isCallable

Check if the variable is callable.

```php
TypesUtility::isCallable( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is callable, false otherwise.



---
### TypesUtility::isNotCallable

Check if the variable is not callable.

```php
TypesUtility::isNotCallable( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not callable, false otherwise.



---
### TypesUtility::isCountable

Check if the variable is countable.

```php
TypesUtility::isCountable( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is countable, false otherwise.



---
### TypesUtility::isNotCountable

Check if the variable is not countable.

```php
TypesUtility::isNotCountable( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is mot countable, false otherwise.



---
### TypesUtility::isFloat

Check if the variable is a float.

```php
TypesUtility::isFloat( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is a float, false otherwise.



---
### TypesUtility::isNotFloat

Check if the variable is not a float.

```php
TypesUtility::isNotFloat( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not a float, false otherwise.



---
### TypesUtility::isDouble

An alias to isFloat()

```php
TypesUtility::isDouble( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** |  |


**Return Value:**





---
### TypesUtility::isNotDouble

An alias to isNotFloat()

```php
TypesUtility::isNotDouble( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** |  |


**Return Value:**





---
### TypesUtility::isInteger

Check if the variable is an integer.

```php
TypesUtility::isInteger( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is an integer, false otherwise.



---
### TypesUtility::isNotInteger

Check if the variable is not an integer.

```php
TypesUtility::isNotInteger( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not an integer, false otherwise.



---
### TypesUtility::isInt

An alias to isInteger()

```php
TypesUtility::isInt( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** |  |


**Return Value:**





---
### TypesUtility::isNotInt

An alias to isNotInteger()

```php
TypesUtility::isNotInt( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** |  |


**Return Value:**





---
### TypesUtility::isIterable

Check if the variable is iterable.

```php
TypesUtility::isIterable( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is iterable, false otherwise.



---
### TypesUtility::isNotIterable

Check if the variable is not iterable.

```php
TypesUtility::isNotIterable( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not iterable, false otherwise.



---
### TypesUtility::isNull

Check if the variable is null.

```php
TypesUtility::isNull( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is null, false otherwise.



---
### TypesUtility::isNotNull

Check if the variable is not null.

```php
TypesUtility::isNotNull( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not null, false otherwise.



---
### TypesUtility::isNumeric

Check if the variable is numeric.

```php
TypesUtility::isNumeric( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is numeric, false otherwise.



---
### TypesUtility::isNotNumeric

Check if the variable is not numeric.

```php
TypesUtility::isNotNumeric( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not numeric, false otherwise.



---
### TypesUtility::isObject

Check if the variable is an object.

```php
TypesUtility::isObject( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is an object, false otherwise.



---
### TypesUtility::isNotObject

Check if the variable is not an object.

```php
TypesUtility::isNotObject( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not an object, false otherwise.



---
### TypesUtility::isResource

Check if the variable is a resource.

```php
TypesUtility::isResource( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is a resource, false otherwise.



---
### TypesUtility::isNotResource

Check if the variable is not a resource.

```php
TypesUtility::isNotResource( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not a resource, false otherwise.



---
### TypesUtility::isScalar

Check if the variable is a scalar.

```php
TypesUtility::isScalar( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is a scalar, false otherwise.



---
### TypesUtility::isNotScalar

Check if the variable is not a scalar.

```php
TypesUtility::isNotScalar( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is not a scalar, false otherwise.



---
### TypesUtility::isString

Check if the variable is a string.

```php
TypesUtility::isString( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is a string, false otherwise.



---
### TypesUtility::isNotString

Check if the variable is not a string.

```php
TypesUtility::isNotString( mixed value ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `value` | **mixed** | The variable to check. |


**Return Value:**

True if the variable is a string, false otherwise.



---
### TypesUtility::to

Convert a variable to a specified target type.

```php
TypesUtility::to( mixed variable, string targetType ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `variable` | **mixed** | The variable to convert. |
| `targetType` | **string** | The target type to convert to (string, int, float, bool, array, object). |


**Return Value:**

The converted variable.



---
### TypesUtility::toString

Convert a variable to a string.

```php
TypesUtility::toString( mixed variable ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `variable` | **mixed** | The variable to convert. |


**Return Value:**

The converted string.



---
### TypesUtility::toInteger

Convert a variable to an integer.

```php
TypesUtility::toInteger( mixed variable ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `variable` | **mixed** | The variable to convert. |


**Return Value:**

The converted integer.



---
### TypesUtility::toInt

An alias to toInteger()

```php
TypesUtility::toInt( mixed variable ): int
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `variable` | **mixed** |  |


**Return Value:**





---
### TypesUtility::toFloat

Convert a variable to a float.

```php
TypesUtility::toFloat( mixed variable ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `variable` | **mixed** | The variable to convert. |


**Return Value:**

The converted float.



---
### TypesUtility::toDouble

An alias to toFloat()

```php
TypesUtility::toDouble( mixed variable ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `variable` | **mixed** |  |


**Return Value:**





---
### TypesUtility::toBoolean

Convert a variable to a boolean.

```php
TypesUtility::toBoolean( mixed variable ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `variable` | **mixed** | The variable to convert. |


**Return Value:**

The converted boolean.



---
### TypesUtility::toBool

An alias to toBoolean()

```php
TypesUtility::toBool( mixed variable ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `variable` | **mixed** |  |


**Return Value:**





---
### TypesUtility::toArray

Convert a variable to an array.

```php
TypesUtility::toArray( mixed variable ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `variable` | **mixed** | The variable to convert. |


**Return Value:**

The converted array.



---
### TypesUtility::toObject

Convert a variable to an object.

```php
TypesUtility::toObject( mixed variable ): object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `variable` | **mixed** | The variable to convert. |


**Return Value:**

The converted object.

---

## Contributing

We welcome contributions! Please read our [Contributing Guidelines](CONTRIBUTING.md) for more information on how to get involved.

## Changelog

All notable changes to this project will be documented in the [CHANGELOG.md](CHANGELOG.md).

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

---

*Created with ❤️ and dedication by [PHPallas team](https://github.com/PHPallas)! 🌟*