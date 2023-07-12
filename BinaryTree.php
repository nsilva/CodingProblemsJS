<?php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0) {
        $this->val = $val;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree {
    public $root;

    public function __construct() {
        $this->root = null;
    }

    public function insert($val) {
        $newNode = new TreeNode($val);

        if ($this->root === null) {
            $this->root = $newNode;
        } else {
            $this->insertNode($this->root, $newNode);
        }
    }

    private function insertNode(&$node, &$newNode) {
        if ($node === null) {
            $node = $newNode;
            return;
        }

        if ($newNode->val < $node->val) {
            $this->insertNode($node->left, $newNode);
        } else {
            $this->insertNode($node->right, $newNode);
        }
    }

    public function printTree() {
        $this->printNode($this->root, 0);
    }

    private function printNode($node, $level) {
        if ($node === null) {
            return;
        }

        $this->printNode($node->right, $level + 1);

        if ($level > 0) {
            echo str_repeat('     ', $level - 1);
            echo '  |--- ';
        }

        echo $node->val . PHP_EOL;

        $this->printNode($node->left, $level + 1);
    }
}

$tree = new BinaryTree();
$tree->insert(5);
$tree->insert(3);
$tree->insert(7);
$tree->insert(2);
$tree->insert(4);
$tree->insert(6);
$tree->insert(8);
$tree->insert(2);
$tree->insert(6);
$tree->insert(1);
$tree->insert(5);
$tree->insert(3);
$tree->insert(4);
$tree->insert(9);
$tree->insert(7);

$tree->printTree();
