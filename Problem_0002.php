<?php
/**
 * Given an array of integers, return a new array such that each element at index i of the new array is the product
 * of all the numbers in the original array except the one at i.
 *
 * For example, if our input was [1, 2, 3, 4, 5], the expected output would be [120, 60, 40, 30, 24]. If our input
 * was [3, 2, 1], the expected output would be [2, 3, 6].
 */

function buildArrayOfProducts(array $baseArray): array
{
    $targetArray = [];
    $arrayLength = count($baseArray);

    // Base case: Array needs at least 3 elements
    if ($arrayLength < 3)
        return $baseArray;

    /**
     * By looping from left to right and right to left, the extremes will
     * have the final values, that is why the $accumulator is initialized with 1 (x * 1 = x)
     */
    // Accumulator will accumulate the product of each value
    $accumulator = 1;

    // Loop from left to right saving the accumulated product in $targetArray.
    // Update the accumulated for next iteration
    foreach ($baseArray as $index => $value) {
        $targetArray[$index] = $accumulator;
        $accumulator *= $value;
    }

    // Accumulator will accumulate the product of each value
    $accumulator = 1;
    // Loop from right to left multiplying the accumulator by the accumulated value
    // from the previous loop. Update the accumulated for next iteration
    for ($i = $arrayLength -1; $i >= 0; $i--) {
        $targetArray[$i] *= $accumulator;
        $accumulator *= $baseArray[$i];
    }

    return $targetArray;
}

var_dump(buildArrayOfProducts([5, 4, 2, 6, 1]));