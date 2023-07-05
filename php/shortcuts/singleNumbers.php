<?php
/*
This works with both the single numbers I and II problems.

*/

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        return array_search(1, array_count_values($nums));
    }
}