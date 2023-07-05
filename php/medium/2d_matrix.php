<?php
/* 
You are given an m x n integer matrix matrix with the following two properties:

Each row is sorted in non-decreasing order.
The first integer of each row is greater than the last integer of the previous row.
Given an integer target, return true if target is in matrix or false otherwise.

You must write a solution in O(log(m * n)) time complexity.

Example 1:

Input: matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 3
Output: true

Example 2:

Input: matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 13
Output: false

Constraints:

m == matrix.length
n == matrix[i].length
1 <= m, n <= 100
-104 <= matrix[i][j], target <= 104

*/

class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        if (empty($matrix) || empty($matrix[0])) {
            return false;
        }

        // matrix dimensions
        $m = count($matrix);
        $n = count($matrix[0]);

        // initializing binary search bounds(left and right pointers)
        $left = 0; // leftmost index
        $right = $m * $n - 1; // rightmost index

        while ($left <= $right) {
            $mid = (int)(($left + $right) / 2);
            $row = (int)($mid / $n);
            $col = $mid % $n;

            $num = $matrix[$row][$col];

            if ($num == $target) {
                return true;
            } elseif ($num < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return false;
    }
}


/*

// Test case

$matrix = [
    [1,3,5,7],
    [10,11,16,20],
    [23,30,34,50]
];

$target = 3;
$result = searchMatrix($matrix, $target);
echo $result ? "true" : "false";

$target = 13;
$result = searchMatrix($matrix, $target);
echo $result ? "true" : "false";

*/

?>