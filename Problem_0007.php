<?php
/**
 * You are given an array prices where prices[i] is the price of a given stock on the ith day.
 * You want to maximize your profit by choosing a single day to buy one stock and choosing
 * a different day in the future to sell that stock.
 *
 * Return the maximum profit you can achieve from this transaction. If you cannot achieve
 * any profit, return 0.
 */

function maxProfit($prices) {
    $profit = 0;
    $buyPrice = $prices[0]; // Default the buy price at the first price
    $pricesCount = count($prices);

    for($i = 0; $i < $pricesCount; $i++) {
        // If this iteration price is lower, set as buy price
        if ($prices[$i] < $buyPrice) {
            $buyPrice = $prices[$i];
        }

        // Calculate the profit with the next price only if next price is higher than buy price
        $nextPriceKey = $i +1;
        if (array_key_exists($nextPriceKey, $prices) && $prices[$nextPriceKey] > $buyPrice) {
            $thisProfit = $prices[$nextPriceKey] - $buyPrice;

            // That this profit only if it is higher than the previous one
            $profit = ($thisProfit > $profit) ? $thisProfit : $profit;
        }
    }

    return $profit;
}