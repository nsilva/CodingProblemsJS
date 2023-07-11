<?php
/**
 * Given a list of numbers and a number k, return whether any two numbers from the list add up to k.
 * For example, given [10, 15, 3, 7] and k of 17, return true since 10 + 7 is 17.
 */

function arrayHasPairSum(int $target, array $values): bool
{
    // Base case, we don't have at least two elements
    if (count($values) < 2)
        return false;

    // For each element, we will find the complement and store it
    $complements = [];
    foreach ($values as $value) {
        $complement = $target - $value;

        if (in_array($value, $complements)) {
            return true;
        }

        $complements[] = $complement;
    }

    return false;
}

$values = [18, 9, 14, 8, 7];
$target = 20;

var_dump(arrayHasPairSum($target, $values));