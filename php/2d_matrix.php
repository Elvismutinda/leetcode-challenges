<?php

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

        $m = count($matrix);
        $n = count($matrix[0]);

        $left = 0;
        $right = $m * $n - 1;

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