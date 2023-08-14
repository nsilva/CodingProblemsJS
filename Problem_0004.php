<?php
/**
 * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the
 * input string is valid.
 *
 * An input string is valid if:
 * Open brackets must be closed by the same type of brackets.
 * Open brackets must be closed in the correct order.
 * Every close bracket has a corresponding open bracket of the same type.
 *
 * Example 1:
 * Input: s = "()"
 * Output: true
 *
 * Input: s = "()[]{}"
 * Output: true
 *
 * Example 3:
 * Input: s = "(]"
 * Output: false
 */

function isValid(string $string):bool
{
    // First check: if the string length is not even, the string is not valid
    $length = strlen($string);

    if ($length % 2 != 0) {
        return false;
    }

    $charMap = ['(' => ')', '{' => '}', '[' => ']'];
    $closingCharStack = [];

    for ($i = 0; $i < $length; $i++) {
        if (array_key_exists($string[$i], $charMap)) {
            // If char is a key in $charMap(an opening char), store it in the closing chars stack
            $closingCharStack[] = $charMap[$string[$i]];
        } else {
            // If not an opening char, pull the last from the closing stack and it
            // should be the same as the current char in the loop
            $closingChar = array_pop($closingCharStack);
            if ($string[$i] !== $closingChar) {
                return false;
            }
        }
    }

    return count($closingCharStack) == 0;
}

var_dump(isValid("()"));
var_dump(isValid("()[]{}"));
var_dump(isValid("(]"));