<?php


function binarySearch(array $array, int $value) {
    $arraySize = count($array);

    if (array_slice($array, $arraySize -1, 1)[0] < $value) {
        return null;
    }

    if ($arraySize == 1) {
        return $array;
    }

    $arrayHalf = ceil($arraySize / 2);
    $arrayLeft = array_slice($array, 0, $arrayHalf, true);
    $arrayRight = array_slice($array, $arrayHalf, $arraySize - 1, true);
    //list($arrayLeft, $arrayRight) = array_chunk($array, ceil($arraySize/2));

    if (end($arrayLeft) >= $value) {
        return binarySearch($arrayLeft, $value);
    }

    if (current($arrayRight) <= $value) {
        return binarySearch($arrayRight, $value);
    }
}
var_dump(binarySearch(range(1, 100), 96));