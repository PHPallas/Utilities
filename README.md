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
| [**Polyfill**](#Polyfill) |  |
| [Polyfill::mb_str_pad](#Polyfillmb_str_pad) |  |
| [Polyfill::mb_strlen](#Polyfillmb_strlen) |  |
| [Polyfill::mb_internal_encoding](#Polyfillmb_internal_encoding) |  |
| [Polyfill::iconv](#Polyfilliconv) |  |
| [Polyfill::mb_split](#Polyfillmb_split) |  |
| [Polyfill::mb_str_split](#Polyfillmb_str_split) |  |
| [Polyfill::mb_substr](#Polyfillmb_substr) |  |
| [Polyfill::mb_trim](#Polyfillmb_trim) |  |
| [Polyfill::mb_ltrim](#Polyfillmb_ltrim) |  |
| [Polyfill::mb_rtrim](#Polyfillmb_rtrim) |  |
| [Polyfill::mb_strpos](#Polyfillmb_strpos) |  |
| [Polyfill::mb_strrev](#Polyfillmb_strrev) |  |
| [Polyfill::mb_str_shuffle](#Polyfillmb_str_shuffle) |  |
| [Polyfill::chr](#Polyfillchr) |  |
| [Polyfill::polyfill_mb_detect_encoding](#Polyfillpolyfill_mb_detect_encoding) |  |
| [Polyfill::mb_detect_encoding](#Polyfillmb_detect_encoding) |  |
| [Polyfill::mb_detect_order](#Polyfillmb_detect_order) |  |
| [Polyfill::ord](#Polyfillord) |  |
| [Polyfill::mb_ord](#Polyfillmb_ord) |  |
| [Polyfill::str_contains](#Polyfillstr_contains) |  |
| [Polyfill::str_starts_with](#Polyfillstr_starts_with) |  |
| [Polyfill::str_ends_with](#Polyfillstr_ends_with) |  |
| [Polyfill::mb_chr](#Polyfillmb_chr) |  |
| [Polyfill::mb_convert_encoding](#Polyfillmb_convert_encoding) |  |
| [Polyfill::mb_check_encoding](#Polyfillmb_check_encoding) |  |
| [Polyfill::password_verify](#Polyfillpassword_verify) |  |
| [Polyfill::password_hash](#Polyfillpassword_hash) |  |
| [**SqlUtility**](#SqlUtility) |  |
| [SqlUtility::selectQuery](#SqlUtilityselectQuery) | selectQuery is a versatile function that dynamically builds a SQL SELECTstatement based on the provided parameters. It handles various SQL syntaxdifferences across multiple database systems, ensuring that the correctsyntax is used for limiting results, grouping, ordering, and filteringdata. The method is designed to be flexible and reusable for differentdatabase interactions. |
| [SqlUtility::updateQuery](#SqlUtilityupdateQuery) | The updateQuery method is a flexible function that constructs a SQLUPDATE statement dynamically based on the provided parameters. It handlesthe creation of the SET and WHERE clauses, ensuring proper parameterbinding to prevent SQL injection. This method is designed to be reusablefor updating rows in different tables with varying conditions. |
| [SqlUtility::deleteQuery](#SqlUtilitydeleteQuery) | The deleteQuery method is a straightforward function that constructs aSQL DELETE statement dynamically based on the provided parameters. Itbuilds the WHERE clause to specify which rows to delete, ensuring properparameter binding to prevent SQL injection. This method is designed to bereusable for deleting records from different tables based on variousconditions. |
| [SqlUtility::insertQuery](#SqlUtilityinsertQuery) | This function is designed to handle both single-row and multi-rowinserts into a database table. It dynamically constructs the SQL queryand ensures that parameter names are unique to prevent conflicts duringexecution. |
| [SqlUtility::unionQuery](#SqlUtilityunionQuery) |  |
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
| [StringUtility::hashMD5](#StringUtilityhashMD5) | Generates an MD5 hash of a given string. |
| [StringUtility::hashSHA](#StringUtilityhashSHA) | Generates a SHA-1 hash of a given string. |
| [StringUtility::hashChecksum](#StringUtilityhashChecksum) | Generates a checksum for a given string using SHA-1. |
| [StringUtility::validateChecksum](#StringUtilityvalidateChecksum) | Validates a given string against a provided checksum. |
| [**TypesUtility**](#TypesUtility) | Class TypesUtility |
| [TypesUtility::getType](#TypesUtilitygetType) | Get the type of a variable. |
| [TypesUtility::isArray](#TypesUtilityisArray) | Check if the variable is an array. |
| [TypesUtility::isBoolean](#TypesUtilityisBoolean) | Check if the variable is a boolean. |
| [TypesUtility::isCallable](#TypesUtilityisCallable) | Check if the variable is callable. |
| [TypesUtility::isCountable](#TypesUtilityisCountable) | Check if the variable is countable. |
| [TypesUtility::isFloat](#TypesUtilityisFloat) | Check if the variable is a float. |
| [TypesUtility::isInteger](#TypesUtilityisInteger) | Check if the variable is an integer. |
| [TypesUtility::isIterable](#TypesUtilityisIterable) | Check if the variable is iterable. |
| [TypesUtility::isNull](#TypesUtilityisNull) | Check if the variable is null. |
| [TypesUtility::isNumeric](#TypesUtilityisNumeric) | Check if the variable is numeric. |
| [TypesUtility::isObject](#TypesUtilityisObject) | Check if the variable is an object. |
| [TypesUtility::isResource](#TypesUtilityisResource) | Check if the variable is a resource. |
| [TypesUtility::isScalar](#TypesUtilityisScalar) | Check if the variable is a scalar. |
| [TypesUtility::isString](#TypesUtilityisString) | Check if the variable is a string. |
| [TypesUtility::to](#TypesUtilityto) | Convert a variable to a specified target type. |
| [TypesUtility::toString](#TypesUtilitytoString) | Convert a variable to a string. |
| [TypesUtility::toInteger](#TypesUtilitytoInteger) | Convert a variable to an integer. |
| [TypesUtility::toFloat](#TypesUtilitytoFloat) | Convert a variable to a float. |
| [TypesUtility::toBoolean](#TypesUtilitytoBoolean) | Convert a variable to a boolean. |
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

## Contributing

We welcome contributions! Please read our [Contributing Guidelines](CONTRIBUTING.md) for more information on how to get involved.

## Changelog

All notable changes to this project will be documented in the [CHANGELOG.md](CHANGELOG.md).

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

---

*Created with ❤️ and dedication by [PHPallas team](https://github.com/PHPallas)! 🌟*