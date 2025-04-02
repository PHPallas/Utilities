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

## Utilities

| Method | Description |
|--------|-------------|
| [**ArrayUtility**](dddddd#ArrayUtility) |  |
| [ArrayUtility::create](dddddd#ArrayUtilitycreate) | Creates an array of given elements |
| [ArrayUtility::createRandom](dddddd#ArrayUtilitycreateRandom) | Creates an array of randon numbers between 1 and 100. |
| [ArrayUtility::createRange](dddddd#ArrayUtilitycreateRange) | Creates an array containing a range of float or integer numericals |
| [ArrayUtility::createByValue](dddddd#ArrayUtilitycreateByValue) | Creates an one dimension array of given size includes elements withsimilar value |
| [ArrayUtility::createZeroArray](dddddd#ArrayUtilitycreateZeroArray) | Creates an one dimension array of given size that all elements are zero. |
| [ArrayUtility::createNullArray](dddddd#ArrayUtilitycreateNullArray) | Createss an one dimension array of given size that all elements are null. |
| [ArrayUtility::createEmpty](dddddd#ArrayUtilitycreateEmpty) | Creates an empty array |
| [ArrayUtility::createByKeys](dddddd#ArrayUtilitycreateByKeys) | Creates an array with given keys, all elements have similar value |
| [ArrayUtility::createMatrixArray](dddddd#ArrayUtilitycreateMatrixArray) | Creates a two dimension array of given rows and columns that all elementsare equal to given value. |
| [ArrayUtility::createTableArray](dddddd#ArrayUtilitycreateTableArray) | Creates a two dimension array of given rows and column names that allelements  are of equal value. |
| [ArrayUtility::createPairs](dddddd#ArrayUtilitycreatePairs) | Creates an `array` by using the values from the `keys` array as keys andthe values from the `values` array as the corresponding values. |
| [ArrayUtility::get](dddddd#ArrayUtilityget) | Get array items, supporting dot notation |
| [ArrayUtility::getKeys](dddddd#ArrayUtilitygetKeys) | Get all keys of an array |
| [ArrayUtility::getFirstKey](dddddd#ArrayUtilitygetFirstKey) | Gets the first key of an array |
| [ArrayUtility::getLastKey](dddddd#ArrayUtilitygetLastKey) | Gets the last key of an array |
| [ArrayUtility::getFirst](dddddd#ArrayUtilitygetFirst) | Gets the first element of an array |
| [ArrayUtility::getLast](dddddd#ArrayUtilitygetLast) | Gets the last element of an array |
| [ArrayUtility::getSubset](dddddd#ArrayUtilitygetSubset) | Get a subset of an array by giving keys |
| [ArrayUtility::getColumns](dddddd#ArrayUtilitygetColumns) | Get a subset of two-dimensions array by keys |
| [ArrayUtility::getFiltered](dddddd#ArrayUtilitygetFiltered) | Get a subset of array elements using a callback filter function |
| [ArrayUtility::set](dddddd#ArrayUtilityset) | Set array items, supporting dot notation |
| [ArrayUtility::has](dddddd#ArrayUtilityhas) | Check if an array includes a given value |
| [ArrayUtility::hasKey](dddddd#ArrayUtilityhasKey) | Checks if the given key or index exists in the array |
| [ArrayUtility::add](dddddd#ArrayUtilityadd) | An acronym to addToEnd() |
| [ArrayUtility::addToEnd](dddddd#ArrayUtilityaddToEnd) | Append elements into the end of an array |
| [ArrayUtility::addToStart](dddddd#ArrayUtilityaddToStart) | Prepend elements into the start of an array |
| [ArrayUtility::dropFromStart](dddddd#ArrayUtilitydropFromStart) | Drop n first element(s) of an array |
| [ArrayUtility::dropFirst](dddddd#ArrayUtilitydropFirst) | Drop the forst element of an array |
| [ArrayUtility::dropFromEnd](dddddd#ArrayUtilitydropFromEnd) | Drop n last element(s) of an array |
| [ArrayUtility::dropLast](dddddd#ArrayUtilitydropLast) | Drops the last element from an array |
| [ArrayUtility::dropKey](dddddd#ArrayUtilitydropKey) | Drops an element from an array by key, supporting dot notation |
| [ArrayUtility::drop](dddddd#ArrayUtilitydrop) | Drops all elements of an array that has a value equal to the given value |
| [ArrayUtility::transform](dddddd#ArrayUtilitytransform) | Applies a transform callable to all elements of an array |
| [ArrayUtility::transformToUppercaseKeys](dddddd#ArrayUtilitytransformToUppercaseKeys) | Transform the case of all keys in an array to the UPPER_CASE |
| [ArrayUtility::transformToLowercaseKeys](dddddd#ArrayUtilitytransformToLowercaseKeys) | Transform the case of all keys in an array to lower_case |
| [ArrayUtility::transformToLowercase](dddddd#ArrayUtilitytransformToLowercase) | Transform all elements of an array to lower_case |
| [ArrayUtility::transformToUppercase](dddddd#ArrayUtilitytransformToUppercase) | Transform all elements of an array to UPPER_CASE |
| [ArrayUtility::transformFlip](dddddd#ArrayUtilitytransformFlip) | Exchanges all keys with their associated values in an array |
| [ArrayUtility::isAssociative](dddddd#ArrayUtilityisAssociative) | Checks if an array is associative |
| [ArrayUtility::isEmpty](dddddd#ArrayUtilityisEmpty) | Checks if an array is empty |
| [ArrayUtility::isSameAs](dddddd#ArrayUtilityisSameAs) | Compare two arrays and check if are same |
| [ArrayUtility::isEligibleTo](dddddd#ArrayUtilityisEligibleTo) | Checks a condition against all element of an array |
| [ArrayUtility::isString](dddddd#ArrayUtilityisString) | Checks if an array elements all are string |
| [ArrayUtility::isBoolean](dddddd#ArrayUtilityisBoolean) | Checks if an array elements all are boolean |
| [ArrayUtility::isCallable](dddddd#ArrayUtilityisCallable) | Checks if an array elements all are callable |
| [ArrayUtility::isCountable](dddddd#ArrayUtilityisCountable) | Checks if an array elements all are countable |
| [ArrayUtility::isIterable](dddddd#ArrayUtilityisIterable) | Checks if an array elements all are iterable |
| [ArrayUtility::isNumeric](dddddd#ArrayUtilityisNumeric) | Checks if an array elements all are numeric |
| [ArrayUtility::isScalar](dddddd#ArrayUtilityisScalar) | Checks if an array elements all are scalar |
| [ArrayUtility::isFloat](dddddd#ArrayUtilityisFloat) | Checks if an array elements all are float |
| [ArrayUtility::isNull](dddddd#ArrayUtilityisNull) | Checks if an array elements all are null |
| [ArrayUtility::isObject](dddddd#ArrayUtilityisObject) | Checks if an array elements all are object |
| [ArrayUtility::isArray](dddddd#ArrayUtilityisArray) | Checks if an array elements all are array |
| [ArrayUtility::isInstanceOf](dddddd#ArrayUtilityisInstanceOf) | Checks if an array elements all are of given class |
| [ArrayUtility::estimateSize](dddddd#ArrayUtilityestimateSize) | Get total number of elements inside an array |
| [ArrayUtility::estimateCounts](dddddd#ArrayUtilityestimateCounts) | Get count of distinct values inside an array |
| [ArrayUtility::estimateSum](dddddd#ArrayUtilityestimateSum) | Calculate the sum of values in an array |
| [ArrayUtility::merge](dddddd#ArrayUtilitymerge) | Merge one or more arrays |
| [ArrayUtility::mergeInDepth](dddddd#ArrayUtilitymergeInDepth) | Merge one or more arrays recursively |
| [ArrayUtility::split](dddddd#ArrayUtilitysplit) | Split an array into chunks |
| [ArrayUtility::sort](dddddd#ArrayUtilitysort) | Sort elements of an array |
| [ArrayUtility::sortRandom](dddddd#ArrayUtilitysortRandom) | Shuffles (randomizes the order of the elements in) an array. |
| [**BooleanUtility**](dddddd#BooleanUtility) | Class BooleanUtility |
| [BooleanUtility::fromString](dddddd#BooleanUtilityfromString) | Converts a string to a boolean value. |
| [BooleanUtility::toString](dddddd#BooleanUtilitytoString) | Converts a boolean value to its string representation. |
| [BooleanUtility::areEqual](dddddd#BooleanUtilityareEqual) | Checks if two boolean values are equal. |
| [BooleanUtility::isTrue](dddddd#BooleanUtilityisTrue) | Checks if a boolean is TRUE. |
| [BooleanUtility::isFalse](dddddd#BooleanUtilityisFalse) | Checks if a boolean is FALSE. |
| [BooleanUtility::not](dddddd#BooleanUtilitynot) | Negates a boolean value. |
| [BooleanUtility::gnot](dddddd#BooleanUtilitygnot) | Performs a logical NOT operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::and](dddddd#BooleanUtilityand) | Performs a logical AND operation on two boolean values. |
| [BooleanUtility::gand](dddddd#BooleanUtilitygand) | Performs a logical AND operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::nand](dddddd#BooleanUtilitynand) | Performs a logical NAND operation on two boolean values. |
| [BooleanUtility::gnand](dddddd#BooleanUtilitygnand) | Performs a logical NAND operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::or](dddddd#BooleanUtilityor) | Performs a logical OR operation on two boolean values. |
| [BooleanUtility::gor](dddddd#BooleanUtilitygor) | Performs a logical OR operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::nor](dddddd#BooleanUtilitynor) | Performs a logical NOR operation on two boolean values. |
| [BooleanUtility::gnor](dddddd#BooleanUtilitygnor) | Performs a logical NOR operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::xor](dddddd#BooleanUtilityxor) | Performs a logical XOR operation on two boolean values. |
| [BooleanUtility::gxor](dddddd#BooleanUtilitygxor) | Performs a logical XOR operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::xnor](dddddd#BooleanUtilityxnor) | Performs a logical XNOR operation on two boolean values. |
| [BooleanUtility::gxnor](dddddd#BooleanUtilitygxnor) | Performs a logical XNOR operation on an array of boolean values or a variable number of boolean arguments. |
| [BooleanUtility::nxor](dddddd#BooleanUtilitynxor) | Alias for xnor |
| [BooleanUtility::xand](dddddd#BooleanUtilityxand) | Alias for xnor |
| [BooleanUtility::gnxor](dddddd#BooleanUtilitygnxor) | Alias for gxnor |
| [BooleanUtility::gxand](dddddd#BooleanUtilitygxand) | Alias for gxnor |
| [**DateTime**](dddddd#DateTime) |  |
| [DateTime::getComponents](dddddd#DateTimegetComponents) | Summary of toString |
| [DateTime::isLeapSolarHijri](dddddd#DateTimeisLeapSolarHijri) | Checks if a Solar Hijri year is leap year |
| [**MathUtility**](dddddd#MathUtility) | Class MathUtilityA utility class for common mathematical and physical constants. |
| [MathUtility::round](dddddd#MathUtilityround) | Round to the nearest integer. |
| [MathUtility::floor](dddddd#MathUtilityfloor) | Floor: Round down to the nearest integer. |
| [MathUtility::ceil](dddddd#MathUtilityceil) | Ceil: Round up to the nearest integer. |
| [MathUtility::truncate](dddddd#MathUtilitytruncate) | Truncate: Remove decimal part without rounding. |
| [MathUtility::roundHalfUp](dddddd#MathUtilityroundHalfUp) | Round Half Up. |
| [MathUtility::roundHalfDown](dddddd#MathUtilityroundHalfDown) | Round Half Down. |
| [MathUtility::roundHalfToEven](dddddd#MathUtilityroundHalfToEven) | Bankers&#039; Rounding (Round Half to Even). |
| [MathUtility::randomInt](dddddd#MathUtilityrandomInt) | Generate a random integer between the given min and max values. |
| [MathUtility::randomFloat](dddddd#MathUtilityrandomFloat) | Generate a random float between the given min and max values. |
| [MathUtility::estimateSimpleInterest](dddddd#MathUtilityestimateSimpleInterest) | Estimate simple interest. |
| [MathUtility::estimateCompoundInterest](dddddd#MathUtilityestimateCompoundInterest) | Estimate compound interest. |
| [MathUtility::estimateFutureValue](dddddd#MathUtilityestimateFutureValue) | Estimate the future value of an investment. |
| [MathUtility::estimatePresentValue](dddddd#MathUtilityestimatePresentValue) | Estimate the present value of a future amount. |
| [MathUtility::estimateLoanPayment](dddddd#MathUtilityestimateLoanPayment) | Estimate monthly loan payment. |
| [MathUtility::estimateTotalPayment](dddddd#MathUtilityestimateTotalPayment) | Estimate the total amount paid over the life of the loan. |
| [MathUtility::estimateTotalInterest](dddddd#MathUtilityestimateTotalInterest) | Estimate the total interest paid over the life of the loan. |
| [MathUtility::estimateAPR](dddddd#MathUtilityestimateAPR) | Estimate the Annual Percentage Rate (APR). |
| [MathUtility::estimateEAR](dddddd#MathUtilityestimateEAR) | Estimate the Effective Annual Rate (EAR). |
| [MathUtility::generateAmortizationSchedule](dddddd#MathUtilitygenerateAmortizationSchedule) | Generate a loan amortization schedule. |
| [MathUtility::estimateLoanPayoffTime](dddddd#MathUtilityestimateLoanPayoffTime) | Estimate the loan payoff time in months. |
| [MathUtility::estimateNPV](dddddd#MathUtilityestimateNPV) | Estimate the Net Present Value (NPV) of cash flows. |
| [MathUtility::compareLoans](dddddd#MathUtilitycompareLoans) | Compare two loans based on total cost. |
| [MathUtility::addVectors](dddddd#MathUtilityaddVectors) | Add two vectors element-wise |
| [MathUtility::subtractVectors](dddddd#MathUtilitysubtractVectors) | Subtract two vectors element-wise |
| [MathUtility::scalarMultiply](dddddd#MathUtilityscalarMultiply) | Multiply vector by scalar |
| [MathUtility::normalize](dddddd#MathUtilitynormalize) | Normalize vector (convert to unit vector) |
| [MathUtility::magnitude](dddddd#MathUtilitymagnitude) | Calculate vector magnitude (Euclidean norm) |
| [MathUtility::dotProduct](dddddd#MathUtilitydotProduct) | Dot product of two vectors |
| [MathUtility::angleBetween](dddddd#MathUtilityangleBetween) | Calculate angle between two vectors in radians |
| [MathUtility::vectorSum](dddddd#MathUtilityvectorSum) | Calculate sum of vector elements |
| [MathUtility::vectorAvg](dddddd#MathUtilityvectorAvg) | Calculate average of vector elements |
| [MathUtility::vectorMin](dddddd#MathUtilityvectorMin) | Find minimum value in vector |
| [MathUtility::vectorMax](dddddd#MathUtilityvectorMax) | Find maximum value in vector |
| [MathUtility::crossProduct1D](dddddd#MathUtilitycrossProduct1D) | 1D cross product (returns scalar value) |
| [MathUtility::projection](dddddd#MathUtilityprojection) | Project vector A onto vector B |
| [MathUtility::vectorAppend](dddddd#MathUtilityvectorAppend) | Append value to vector (modifies original vector) |
| [MathUtility::vectorReverse](dddddd#MathUtilityvectorReverse) | Reverse vector elements |
| [MathUtility::sin](dddddd#MathUtilitysin) | Calculates the sine of an angle. |
| [MathUtility::cos](dddddd#MathUtilitycos) | Calculates the cosine of an angle. |
| [MathUtility::tan](dddddd#MathUtilitytan) | Calculates the tangent of an angle. |
| [MathUtility::asin](dddddd#MathUtilityasin) | Calculates the arcsine (inverse sine) of a value. |
| [MathUtility::acos](dddddd#MathUtilityacos) | Calculates the arccosine (inverse cosine) of a value. |
| [MathUtility::atan](dddddd#MathUtilityatan) | Calculates the arctangent (inverse tangent) of a value. |
| [MathUtility::atan2](dddddd#MathUtilityatan2) | Calculates the arctangent of y/x, using the signs of the arguments to determine the quadrant of the result. |
| [MathUtility::sinh](dddddd#MathUtilitysinh) | Calculates the hyperbolic sine of a value. |
| [MathUtility::cosh](dddddd#MathUtilitycosh) | Calculates the hyperbolic cosine of a value. |
| [MathUtility::tanh](dddddd#MathUtilitytanh) | Calculates the hyperbolic tangent of a value. |
| [MathUtility::asinh](dddddd#MathUtilityasinh) | Calculates the inverse hyperbolic sine of a value. |
| [MathUtility::acosh](dddddd#MathUtilityacosh) | Calculates the inverse hyperbolic cosine of a value. |
| [MathUtility::atanh](dddddd#MathUtilityatanh) | Calculates the inverse hyperbolic tangent of a value. |
| [MathUtility::deg2rad](dddddd#MathUtilitydeg2rad) | Converts an angle from degrees to radians. |
| [MathUtility::rad2deg](dddddd#MathUtilityrad2deg) | Converts an angle from radians to degrees. |
| [MathUtility::exponential](dddddd#MathUtilityexponential) | Calculate the exponential of a number. |
| [MathUtility::naturalLog](dddddd#MathUtilitynaturalLog) | Calculate the natural logarithm of a number. |
| [MathUtility::logBase10](dddddd#MathUtilitylogBase10) | Calculate the base 10 logarithm of a number. |
| [MathUtility::logBase2](dddddd#MathUtilitylogBase2) | Calculate the base 2 logarithm of a number. |
| [MathUtility::logBase](dddddd#MathUtilitylogBase) | Calculate the logarithm of a number with an arbitrary base. |
| [MathUtility::changeBase](dddddd#MathUtilitychangeBase) | Change the base of a logarithm from one base to another. |
| [MathUtility::inverseNaturalLog](dddddd#MathUtilityinverseNaturalLog) | Calculate the inverse of the natural logarithm. |
| [MathUtility::inverseLogBase10](dddddd#MathUtilityinverseLogBase10) | Calculate the inverse of the base 10 logarithm. |
| [MathUtility::inverseLogBase2](dddddd#MathUtilityinverseLogBase2) | Calculate the inverse of the base 2 logarithm. |
| [MathUtility::exponentialGrowth](dddddd#MathUtilityexponentialGrowth) | Calculate exponential growth. |
| [MathUtility::exponentialDecay](dddddd#MathUtilityexponentialDecay) | Calculate exponential decay. |
| [MathUtility::power](dddddd#MathUtilitypower) | Calculate the power of a base raised to an exponent. |
| [MathUtility::solveExponentialEquation](dddddd#MathUtilitysolveExponentialEquation) | Solve for x in the equation a^x = b. |
| [MathUtility::logFactorial](dddddd#MathUtilitylogFactorial) | Calculate the logarithm of a factorial (log(n!)). |
| [MathUtility::addMatrix](dddddd#MathUtilityaddMatrix) | Add two matrices. |
| [MathUtility::subtractMatrix](dddddd#MathUtilitysubtractMatrix) | Subtract two matrices. |
| [MathUtility::multiplyMatrix](dddddd#MathUtilitymultiplyMatrix) | Multiply two matrices. |
| [MathUtility::inverseMatrix](dddddd#MathUtilityinverseMatrix) | Calculate the inverse of a matrix. |
| [MathUtility::eigenvaluesMatrix](dddddd#MathUtilityeigenvaluesMatrix) | Get the eigenvalues of a matrix (simplified for 2x2 matrices). |
| [MathUtility::luDecompositionMatrix](dddddd#MathUtilityluDecompositionMatrix) | Perform LU decomposition of a matrix. |
| [MathUtility::qrDecompositionMatrix](dddddd#MathUtilityqrDecompositionMatrix) | Perform QR decomposition of a matrix using Gram-Schmidt process. |
| [MathUtility::subsetMatrix](dddddd#MathUtilitysubsetMatrix) | Get a subset of a matrix. |
| [MathUtility::mean](dddddd#MathUtilitymean) | Calculate the mean of an array of numbers. |
| [MathUtility::median](dddddd#MathUtilitymedian) | Calculate the median of an array of numbers. |
| [MathUtility::mode](dddddd#MathUtilitymode) | Calculate the mode of an array of numbers. |
| [MathUtility::variance](dddddd#MathUtilityvariance) | Calculate the sample variance of an array of numbers. |
| [MathUtility::populationVariance](dddddd#MathUtilitypopulationVariance) | Calculate the population variance of an array of numbers. |
| [MathUtility::standardDeviation](dddddd#MathUtilitystandardDeviation) | Calculate the sample standard deviation of an array of numbers. |
| [MathUtility::populationStandardDeviation](dddddd#MathUtilitypopulationStandardDeviation) | Calculate the population standard deviation of an array of numbers. |
| [MathUtility::correlation](dddddd#MathUtilitycorrelation) | Calculate the correlation coefficient between two variables. |
| [MathUtility::multipleLinearRegression](dddddd#MathUtilitymultipleLinearRegression) | Perform multiple linear regression to calculate coefficients. |
| [MathUtility::normalDistributionPDF](dddddd#MathUtilitynormalDistributionPDF) | Calculate the normal distribution PDF. |
| [MathUtility::normalDistributionCDF](dddddd#MathUtilitynormalDistributionCDF) | Calculate the normal distribution CDF. |
| [MathUtility::binomialProbability](dddddd#MathUtilitybinomialProbability) | Calculate the binomial probability. |
| [MathUtility::poissonDistribution](dddddd#MathUtilitypoissonDistribution) | Calculate the Poisson distribution PDF. |
| [MathUtility::exponentialDistributionPDF](dddddd#MathUtilityexponentialDistributionPDF) | Calculate the exponential distribution PDF. |
| [MathUtility::exponentialDistributionCDF](dddddd#MathUtilityexponentialDistributionCDF) | Calculate the exponential distribution CDF. |
| [MathUtility::uniformDistributionPDF](dddddd#MathUtilityuniformDistributionPDF) | Calculate the uniform distribution PDF. |
| [MathUtility::uniformDistributionCDF](dddddd#MathUtilityuniformDistributionCDF) | Calculate the uniform distribution CDF. |
| [MathUtility::skewness](dddddd#MathUtilityskewness) | Calculate the sample skewness of an array of numbers. |
| [MathUtility::kurtosis](dddddd#MathUtilitykurtosis) | Calculate the sample kurtosis of an array of numbers. |
| [MathUtility::gcd](dddddd#MathUtilitygcd) | Calculate the greatest common divisor (GCD) of two numbers. |
| [MathUtility::lcm](dddddd#MathUtilitylcm) | Calculate the least common multiple (LCM) of two numbers. |
| [MathUtility::isPrime](dddddd#MathUtilityisPrime) | Check if a number is prime. |
| [MathUtility::generatePrimes](dddddd#MathUtilitygeneratePrimes) | Generate a list of prime numbers up to a given limit. |
| [MathUtility::fibonacci](dddddd#MathUtilityfibonacci) | Calculate the Fibonacci number at a given position. |
| [MathUtility::isPerfectSquare](dddddd#MathUtilityisPerfectSquare) | Check if a number is a perfect square. |
| [MathUtility::primeFactorization](dddddd#MathUtilityprimeFactorization) | Find the prime factorization of a number. |
| [MathUtility::sumOfDivisors](dddddd#MathUtilitysumOfDivisors) | Calculate the sum of divisors of a number. |
| [MathUtility::eulerTotient](dddddd#MathUtilityeulerTotient) | Calculate Euler&#039;s Totient function for a given number. |
| [MathUtility::areCoprime](dddddd#MathUtilityareCoprime) | Check if two numbers are coprime (i.e., their GCD is 1). |
| [MathUtility::generatePerfectNumbers](dddddd#MathUtilitygeneratePerfectNumbers) | Generate a list of perfect numbers up to a given limit. |
| [MathUtility::differentiate](dddddd#MathUtilitydifferentiate) |  |
| [MathUtility::integrate](dddddd#MathUtilityintegrate) |  |
| [MathUtility::evaluate](dddddd#MathUtilityevaluate) |  |
| [MathUtility::findQuadraticRoots](dddddd#MathUtilityfindQuadraticRoots) |  |
| [MathUtility::limit](dddddd#MathUtilitylimit) |  |
| [MathUtility::taylorSeries](dddddd#MathUtilitytaylorSeries) |  |
| [MathUtility::numericalIntegration](dddddd#MathUtilitynumericalIntegration) |  |
| [MathUtility::partialDerivative](dddddd#MathUtilitypartialDerivative) |  |
| [MathUtility::gradient](dddddd#MathUtilitygradient) |  |
| [MathUtility::secondDerivative](dddddd#MathUtilitysecondDerivative) |  |
| [MathUtility::findLocalExtrema](dddddd#MathUtilityfindLocalExtrema) |  |
| [MathUtility::areaUnderCurve](dddddd#MathUtilityareaUnderCurve) |  |
| [MathUtility::areaOfCircle](dddddd#MathUtilityareaOfCircle) | Calculate the area of a circle. |
| [MathUtility::circumferenceOfCircle](dddddd#MathUtilitycircumferenceOfCircle) | Calculate the circumference of a circle. |
| [MathUtility::areaOfRectangle](dddddd#MathUtilityareaOfRectangle) | Calculate the area of a rectangle. |
| [MathUtility::perimeterOfRectangle](dddddd#MathUtilityperimeterOfRectangle) | Calculate the perimeter of a rectangle. |
| [MathUtility::areaOfTriangle](dddddd#MathUtilityareaOfTriangle) | Calculate the area of a triangle. |
| [MathUtility::perimeterOfTriangle](dddddd#MathUtilityperimeterOfTriangle) | Calculate the perimeter of a triangle (assuming it&#039;s a right triangle). |
| [MathUtility::areaOfSquare](dddddd#MathUtilityareaOfSquare) | Calculate the area of a square. |
| [MathUtility::perimeterOfSquare](dddddd#MathUtilityperimeterOfSquare) | Calculate the perimeter of a square. |
| [MathUtility::volumeOfCube](dddddd#MathUtilityvolumeOfCube) | Calculate the volume of a cube. |
| [MathUtility::surfaceAreaOfCube](dddddd#MathUtilitysurfaceAreaOfCube) | Calculate the surface area of a cube. |
| [MathUtility::volumeOfRectangularPrism](dddddd#MathUtilityvolumeOfRectangularPrism) | Calculate the volume of a rectangular prism. |
| [MathUtility::surfaceAreaOfRectangularPrism](dddddd#MathUtilitysurfaceAreaOfRectangularPrism) | Calculate the surface area of a rectangular prism. |
| [MathUtility::areaOfTrapezoid](dddddd#MathUtilityareaOfTrapezoid) | Calculate the area of a trapezoid. |
| [MathUtility::areaOfParallelogram](dddddd#MathUtilityareaOfParallelogram) | Calculate the area of a parallelogram. |
| [MathUtility::areaOfEllipse](dddddd#MathUtilityareaOfEllipse) | Calculate the area of an ellipse. |
| [MathUtility::circumferenceOfEllipse](dddddd#MathUtilitycircumferenceOfEllipse) | Calculate the circumference of an ellipse (approximation). |
| [**PHP**](dddddd#PHP) |  |
| [PHP::version](dddddd#PHPversion) | Get PHP version |
| [PHP::versionID](dddddd#PHPversionID) | Get PHP version as a number |
| [PHP::versionMajor](dddddd#PHPversionMajor) | Get PHP major version |
| [PHP::versionMinor](dddddd#PHPversionMinor) | Get PHP minor Version |
| [PHP::versionRelease](dddddd#PHPversionRelease) | Get PHP release version |
| [**Polyfill**](dddddd#Polyfill) |  |
| [Polyfill::mb_str_pad](dddddd#Polyfillmb_str_pad) |  |
| [Polyfill::mb_strlen](dddddd#Polyfillmb_strlen) |  |
| [Polyfill::mb_internal_encoding](dddddd#Polyfillmb_internal_encoding) |  |
| [Polyfill::iconv](dddddd#Polyfilliconv) |  |
| [Polyfill::mb_split](dddddd#Polyfillmb_split) |  |
| [Polyfill::mb_str_split](dddddd#Polyfillmb_str_split) |  |
| [Polyfill::mb_substr](dddddd#Polyfillmb_substr) |  |
| [Polyfill::mb_trim](dddddd#Polyfillmb_trim) |  |
| [Polyfill::mb_ltrim](dddddd#Polyfillmb_ltrim) |  |
| [Polyfill::mb_rtrim](dddddd#Polyfillmb_rtrim) |  |
| [Polyfill::mb_strpos](dddddd#Polyfillmb_strpos) |  |
| [Polyfill::mb_strrev](dddddd#Polyfillmb_strrev) |  |
| [Polyfill::mb_str_shuffle](dddddd#Polyfillmb_str_shuffle) |  |
| [Polyfill::chr](dddddd#Polyfillchr) |  |
| [Polyfill::polyfill_mb_detect_encoding](dddddd#Polyfillpolyfill_mb_detect_encoding) |  |
| [Polyfill::mb_detect_encoding](dddddd#Polyfillmb_detect_encoding) |  |
| [Polyfill::mb_detect_order](dddddd#Polyfillmb_detect_order) |  |
| [Polyfill::ord](dddddd#Polyfillord) |  |
| [Polyfill::mb_ord](dddddd#Polyfillmb_ord) |  |
| [Polyfill::str_contains](dddddd#Polyfillstr_contains) |  |
| [Polyfill::str_starts_with](dddddd#Polyfillstr_starts_with) |  |
| [Polyfill::str_ends_with](dddddd#Polyfillstr_ends_with) |  |
| [Polyfill::mb_chr](dddddd#Polyfillmb_chr) |  |
| [Polyfill::mb_convert_encoding](dddddd#Polyfillmb_convert_encoding) |  |
| [Polyfill::mb_check_encoding](dddddd#Polyfillmb_check_encoding) |  |
| [Polyfill::password_verify](dddddd#Polyfillpassword_verify) |  |
| [Polyfill::password_hash](dddddd#Polyfillpassword_hash) |  |
| [**SqlUtility**](dddddd#SqlUtility) |  |
| [SqlUtility::selectQuery](dddddd#SqlUtilityselectQuery) | selectQuery is a versatile function that dynamically builds a SQL SELECTstatement based on the provided parameters. It handles various SQL syntaxdifferences across multiple database systems, ensuring that the correctsyntax is used for limiting results, grouping, ordering, and filteringdata. The method is designed to be flexible and reusable for differentdatabase interactions. |
| [SqlUtility::updateQuery](dddddd#SqlUtilityupdateQuery) | The updateQuery method is a flexible function that constructs a SQLUPDATE statement dynamically based on the provided parameters. It handlesthe creation of the SET and WHERE clauses, ensuring proper parameterbinding to prevent SQL injection. This method is designed to be reusablefor updating rows in different tables with varying conditions. |
| [SqlUtility::deleteQuery](dddddd#SqlUtilitydeleteQuery) | The deleteQuery method is a straightforward function that constructs aSQL DELETE statement dynamically based on the provided parameters. Itbuilds the WHERE clause to specify which rows to delete, ensuring properparameter binding to prevent SQL injection. This method is designed to bereusable for deleting records from different tables based on variousconditions. |
| [SqlUtility::insertQuery](dddddd#SqlUtilityinsertQuery) | This function is designed to handle both single-row and multi-rowinserts into a database table. It dynamically constructs the SQL queryand ensures that parameter names are unique to prevent conflicts duringexecution. |
| [SqlUtility::unionQuery](dddddd#SqlUtilityunionQuery) |  |
| [SqlUtility::buildOrderClause](dddddd#SqlUtilitybuildOrderClause) |  |
| [SqlUtility::buildWhereClause](dddddd#SqlUtilitybuildWhereClause) |  |
| [**StringUtility**](dddddd#StringUtility) | Class StringUtility |
| [StringUtility::create](dddddd#StringUtilitycreate) | Creates a string consisting of a specified character repeated to a givenlength. |
| [StringUtility::createRandom](dddddd#StringUtilitycreateRandom) | Generates a random string of a specified length using the providedcharacters. |
| [StringUtility::createByRepeat](dddddd#StringUtilitycreateByRepeat) | Repeats a given string a specified number of times. |
| [StringUtility::get](dddddd#StringUtilityget) | Retrieves a character from a string at a specified index. |
| [StringUtility::getSubset](dddddd#StringUtilitygetSubset) | Retrieves a subset of a string starting from a given index. |
| [StringUtility::getSegment](dddddd#StringUtilitygetSegment) | Retrieves a segment of a string between two specified indices. |
| [StringUtility::set](dddddd#StringUtilityset) | Sets a character at a specified index in the given string. |
| [StringUtility::setReplace](dddddd#StringUtilitysetReplace) | Replaces occurrences of a substring within a string. |
| [StringUtility::setInStart](dddddd#StringUtilitysetInStart) | Pads the string on the left with a specified character to a given length. |
| [StringUtility::setInEnd](dddddd#StringUtilitysetInEnd) | Pads the string on the right with a specified character to a given length. |
| [StringUtility::hasPhrase](dddddd#StringUtilityhasPhrase) | Checks if a specified phrase exists within a given string. |
| [StringUtility::addToStart](dddddd#StringUtilityaddToStart) | Adds a specified value to the start of the given string. |
| [StringUtility::addToEnd](dddddd#StringUtilityaddToEnd) | Adds a specified value to the end of the given string. |
| [StringUtility::addToCenter](dddddd#StringUtilityaddToCenter) | Adds a specified value to the center of the given string. |
| [StringUtility::addEvenly](dddddd#StringUtilityaddEvenly) | Adds a specified value evenly throughout the given string. |
| [StringUtility::drop](dddddd#StringUtilitydrop) | Drops specified characters from the given string. |
| [StringUtility::dropFirst](dddddd#StringUtilitydropFirst) | Drops the first character from the given string. |
| [StringUtility::dropLast](dddddd#StringUtilitydropLast) | Drops the last character from the given string. |
| [StringUtility::dropNth](dddddd#StringUtilitydropNth) | Drops the character at the specified index from the given string. |
| [StringUtility::dropFromSides](dddddd#StringUtilitydropFromSides) | Drops specified characters from both ends of the given string. |
| [StringUtility::dropFromStart](dddddd#StringUtilitydropFromStart) | Drops specified characters from the start of the given string. |
| [StringUtility::dropFromEnd](dddddd#StringUtilitydropFromEnd) | Drops specified characters from the end of the given string. |
| [StringUtility::dropSeparator](dddddd#StringUtilitydropSeparator) | Drops specified separators from the given string. |
| [StringUtility::dropSpace](dddddd#StringUtilitydropSpace) | Drops all spaces from the given string. |
| [StringUtility::dropExtras](dddddd#StringUtilitydropExtras) | Truncates a string to a specified length and appends ellipsis if needed. |
| [StringUtility::transformToReverse](dddddd#StringUtilitytransformToReverse) | Transforms the given string to its reverse. |
| [StringUtility::transformToShuffle](dddddd#StringUtilitytransformToShuffle) | Transforms the given string by shuffling its characters. |
| [StringUtility::transformToNoTag](dddddd#StringUtilitytransformToNoTag) | Transforms the given string by stripping HTML and PHP tags. |
| [StringUtility::transformToLowercase](dddddd#StringUtilitytransformToLowercase) | Transforms the given string to lowercase. |
| [StringUtility::transformToUppercase](dddddd#StringUtilitytransformToUppercase) | Transforms the given string to uppercase. |
| [StringUtility::transformToLowercaseFirst](dddddd#StringUtilitytransformToLowercaseFirst) | Transforms the given string to lowercase, capitalizing the first character. |
| [StringUtility::transformToUppercaseFirst](dddddd#StringUtilitytransformToUppercaseFirst) | Transforms the given string to uppercase, capitalizing the first character. |
| [StringUtility::transformToCapital](dddddd#StringUtilitytransformToCapital) | Capitalizes the first letter of each word in the string. |
| [StringUtility::transformToFlatcase](dddddd#StringUtilitytransformToFlatcase) | Transforms the given string to flatcase. |
| [StringUtility::transformToPascalCase](dddddd#StringUtilitytransformToPascalCase) | Transforms the given string to PascalCase. |
| [StringUtility::transformToCamelcase](dddddd#StringUtilitytransformToCamelcase) | Transforms the given string to camelCase. |
| [StringUtility::transformToSnakecase](dddddd#StringUtilitytransformToSnakecase) | Transforms the given string to snake_case. |
| [StringUtility::transformToMacrocase](dddddd#StringUtilitytransformToMacrocase) | Transforms the given string to MACROCASE. |
| [StringUtility::transformToPascalSnakecase](dddddd#StringUtilitytransformToPascalSnakecase) | Transforms the given string to Pascal_Snake_Case. |
| [StringUtility::transformToCamelSnakecase](dddddd#StringUtilitytransformToCamelSnakecase) | Transforms the given string to camel_snake_case. |
| [StringUtility::transformToKebabcase](dddddd#StringUtilitytransformToKebabcase) | Transforms the given string to kebab-case. |
| [StringUtility::transformToCobolcase](dddddd#StringUtilitytransformToCobolcase) | Transforms the given string to COBOLCASE. |
| [StringUtility::transformToTraincase](dddddd#StringUtilitytransformToTraincase) | Transforms the given string to train-case. |
| [StringUtility::transformToMetaphone](dddddd#StringUtilitytransformToMetaphone) | Transforms the given string to its metaphone representation. |
| [StringUtility::transformToSoundex](dddddd#StringUtilitytransformToSoundex) | Transforms the given string to its soundex representation. |
| [StringUtility::isEqualTo](dddddd#StringUtilityisEqualTo) | Checks if two strings are equal. |
| [StringUtility::isSameAs](dddddd#StringUtilityisSameAs) | Checks if two strings are equal, ignoring case. |
| [StringUtility::isStartedBy](dddddd#StringUtilityisStartedBy) | Checks if a string starts with a given substring. |
| [StringUtility::isEndedWith](dddddd#StringUtilityisEndedWith) | Checks if a string ends with a given substring. |
| [StringUtility::isPalindrome](dddddd#StringUtilityisPalindrome) | Checks if a string is a palindrome. |
| [StringUtility::estimateLength](dddddd#StringUtilityestimateLength) | Estimates the length of a string. |
| [StringUtility::estimateCounts](dddddd#StringUtilityestimateCounts) | Estimates the counts of each character in a string. |
| [StringUtility::estimateSimilarity](dddddd#StringUtilityestimateSimilarity) | Compares two strings and returns a similarity score. |
| [StringUtility::merge](dddddd#StringUtilitymerge) | Merges multiple strings into a single string using a specified separator. |
| [StringUtility::split](dddddd#StringUtilitysplit) | Splits a string into segments of specified length. |
| [StringUtility::splitBy](dddddd#StringUtilitysplitBy) | Splits a string by a specified separator. |
| [StringUtility::toHex](dddddd#StringUtilitytoHex) | Converts a string to its hexadecimal representation. |
| [StringUtility::fromHex](dddddd#StringUtilityfromHex) | Converts a hexadecimal string back to its original form. |
| [StringUtility::toAscii](dddddd#StringUtilitytoAscii) | Converts a character to its ASCII value. |
| [StringUtility::fromAscii](dddddd#StringUtilityfromAscii) | Converts an ASCII value back to its corresponding character. |
| [StringUtility::toFormat](dddddd#StringUtilitytoFormat) | Formats values into a string according to a specified format. |
| [StringUtility::fromFormat](dddddd#StringUtilityfromFormat) | Parses a string according to a specified format. |
| [StringUtility::toArray](dddddd#StringUtilitytoArray) | Converts a string into an array of its characters. |
| [StringUtility::toArrayWithSeparator](dddddd#StringUtilitytoArrayWithSeparator) | Converts a string into an array using a custom separator. |
| [StringUtility::fromArray](dddddd#StringUtilityfromArray) | Converts an array of strings back into a single string. |
| [StringUtility::toInteger](dddddd#StringUtilitytoInteger) | Converts a string to an integer. |
| [StringUtility::fromInteger](dddddd#StringUtilityfromInteger) | Converts an integer back to a string. |
| [StringUtility::toFloat](dddddd#StringUtilitytoFloat) | Converts a string to a float. |
| [StringUtility::fromFloat](dddddd#StringUtilityfromFloat) | Converts a float back to a string. |
| [StringUtility::toBoolean](dddddd#StringUtilitytoBoolean) | Converts a string to a boolean value. |
| [StringUtility::fromBoolean](dddddd#StringUtilityfromBoolean) | Converts a boolean value to its string representation. |
| [StringUtility::inRot](dddddd#StringUtilityinRot) | Encodes a string using ROT13. |
| [StringUtility::ofRot](dddddd#StringUtilityofRot) | Decodes a string using ROT13. |
| [StringUtility::inSlashes](dddddd#StringUtilityinSlashes) | Escapes special characters in a string using slashes. |
| [StringUtility::ofSlashes](dddddd#StringUtilityofSlashes) | Unescapes special characters in a string. |
| [StringUtility::inUU](dddddd#StringUtilityinUU) | Encodes a string using UU encoding. |
| [StringUtility::ofUU](dddddd#StringUtilityofUU) | Decodes a UU encoded string. |
| [StringUtility::inSafeCharacters](dddddd#StringUtilityinSafeCharacters) | Converts special characters to HTML entities. |
| [StringUtility::ofSafeCharacters](dddddd#StringUtilityofSafeCharacters) | Converts HTML entities back to their corresponding characters. |
| [StringUtility::inHtmlEntities](dddddd#StringUtilityinHtmlEntities) | Converts special characters to HTML entities with quotes. |
| [StringUtility::ofHtmlEntities](dddddd#StringUtilityofHtmlEntities) | Converts HTML entities back to their corresponding characters with quotes. |
| [StringUtility::hashMD5](dddddd#StringUtilityhashMD5) | Generates an MD5 hash of a given string. |
| [StringUtility::hashSHA](dddddd#StringUtilityhashSHA) | Generates a SHA-1 hash of a given string. |
| [StringUtility::hashChecksum](dddddd#StringUtilityhashChecksum) | Generates a checksum for a given string using SHA-1. |
| [StringUtility::validateChecksum](dddddd#StringUtilityvalidateChecksum) | Validates a given string against a provided checksum. |
| [**TypesUtility**](dddddd#TypesUtility) | Class TypesUtility |
| [TypesUtility::getType](dddddd#TypesUtilitygetType) | Get the type of a variable. |
| [TypesUtility::isArray](dddddd#TypesUtilityisArray) | Check if the variable is an array. |
| [TypesUtility::isBoolean](dddddd#TypesUtilityisBoolean) | Check if the variable is a boolean. |
| [TypesUtility::isCallable](dddddd#TypesUtilityisCallable) | Check if the variable is callable. |
| [TypesUtility::isCountable](dddddd#TypesUtilityisCountable) | Check if the variable is countable. |
| [TypesUtility::isFloat](dddddd#TypesUtilityisFloat) | Check if the variable is a float. |
| [TypesUtility::isInteger](dddddd#TypesUtilityisInteger) | Check if the variable is an integer. |
| [TypesUtility::isIterable](dddddd#TypesUtilityisIterable) | Check if the variable is iterable. |
| [TypesUtility::isNull](dddddd#TypesUtilityisNull) | Check if the variable is null. |
| [TypesUtility::isNumeric](dddddd#TypesUtilityisNumeric) | Check if the variable is numeric. |
| [TypesUtility::isObject](dddddd#TypesUtilityisObject) | Check if the variable is an object. |
| [TypesUtility::isResource](dddddd#TypesUtilityisResource) | Check if the variable is a resource. |
| [TypesUtility::isScalar](dddddd#TypesUtilityisScalar) | Check if the variable is a scalar. |
| [TypesUtility::isString](dddddd#TypesUtilityisString) | Check if the variable is a string. |
| [TypesUtility::to](dddddd#TypesUtilityto) | Convert a variable to a specified target type. |
| [TypesUtility::toString](dddddd#TypesUtilitytoString) | Convert a variable to a string. |
| [TypesUtility::toInteger](dddddd#TypesUtilitytoInteger) | Convert a variable to an integer. |
| [TypesUtility::toFloat](dddddd#TypesUtilitytoFloat) | Convert a variable to a float. |
| [TypesUtility::toBoolean](dddddd#TypesUtilitytoBoolean) | Convert a variable to a boolean. |
| [TypesUtility::toArray](dddddd#TypesUtilitytoArray) | Convert a variable to an array. |
| [TypesUtility::toObject](dddddd#TypesUtilitytoObject) | Convert a variable to an object. |


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

## Contributing

We welcome contributions! Please read our [Contributing Guidelines](CONTRIBUTING.md) for more information on how to get involved.

## Changelog

All notable changes to this project will be documented in the [CHANGELOG.md](CHANGELOG.md).

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

---

*Created with ❤️ and dedication by [PHPallas team](https://github.com/PHPallas)! 🌟*