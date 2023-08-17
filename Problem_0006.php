<?php
/**
 * A phrase is a palindrome if, after converting all uppercase letters into lowercase
 * letters and removing all non-alphanumeric characters, it reads the same forward and
 * backward. Alphanumeric characters include letters and numbers.
 *
 * Given a string s, return true if it is a palindrome, or false otherwise.
 */

function isPalindrome($s) {
    $s = strtoupper(preg_replace('/[^A-Za-z0-9]/i', '', $s));
    $reverse =  strrev($s);

    return $s == $reverse;
}

var_dump(isPalindrome("ab_a"));