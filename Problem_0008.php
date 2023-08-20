<?php
/**
 * Given the root of a binary tree, invert the tree, and return its root.
 *
 * An inverted tree is considered as a tree where the left and right branches are exchanged
 */

class TreeNode {
     public $val = null;
     public $left = null;
     public $right = null;

     function __construct($val = 0, $left = null, $right = null) {
         $this->val = $val;
         $this->left = $left;
         $this->right = $right;
     }
 }

 function invertTree(TreeNode $root) {
    if (!$root->val) {
        return $root;
    }

    $temp = $root->left;
    $root->left = $root->right;
    $root->right = $temp;

    invertTree($root->left);
    invertTree($root->right);

    return $root;
 }