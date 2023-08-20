<?php
/**
 * Given a string s, find the length of the longest substring without repeating characters.
 */

function lengthOfLongestSubstring($s) {
    $longest = [];
    $current = [];
    $length = strlen($s);

    for ($i = 0; $i < $length; $i++) {
        // Special case for space, it cannot be used as array key
        $char = ($s[$i] === ' ') ? 'space' : $s[$i];

        // If the current character already exists in the current map...
        if (array_key_exists($char, $current)) {

            // compare with the length of the longest...
            if (count($current) > count($longest)) {
                $longest = $current;
            }
            // Remove all the characters from current to the repeated character
            // and use is as the new starting point
            $index = array_search($char, array_keys($current));
            if ($index !== false) {
                $current = array_slice($current, $index + 1);
            }
            $current[$char] = $char;
        } else {
            // If it is not in the current map, add the current character as a key
            $current[$char] = $char;
        }
    }

    // If the longest substring is found after the last reset, $longest will not be replaced, so
    // we check before return
    $currentCount = count($current);
    $longestCount = count($longest);
    return ($longestCount > $currentCount) ? $longestCount : $currentCount;
}

lengthOfLongestSubstring('dvhtmjdfertyhnmjylopmn');