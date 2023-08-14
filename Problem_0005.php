<?php
/**
 * You are given the heads of two sorted linked lists list1 and list2.
 * Merge the two lists into one sorted list. The list should be made by
 * splicing together the nodes of the first two lists.
 * Return the head of the merged linked list.
 */

/**
 * Definition for a singly-linked list.
 */
class ListNode {
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}


class Solution {

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        $sorted = new ListNode(); // The start of the sorted list
        $current = $sorted; // Pointer to move through the sorted list

        // In the first iteration, $current is pointing to $sorted, so setting
        // $current = $list->next, also sets $sorted = $list->next
        while ($list1 && $list2) {
            // The next element is the smaller in the current position of both lists
            if ($list1->val < $list2->val) {
                $current->next = $list1;
                $list1 = $list1->next;
            } else {
                $current->next = $list2;
                $list2 = $list2->next;
            }
            // Move the cursor to the next element of the list and move
            // to the next iteration to find the next again
            $current = $current->next;
        }

        // Link remaining, if any
        if ($list1 !== null) {
            $current->next = $list1;
        } else {
            $current->next = $list2;
        }

        return $sorted->next;
    }
}
