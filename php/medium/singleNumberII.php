<?php
/*
Given an integer array nums where every element appears three times except for one, which appears exactly once. Find the single element and return it.

You must implement a solution with a linear runtime complexity and use only constant extra space.

Example 1:

Input: nums = [2,2,3,2]
Output: 3
Example 2:

Input: nums = [0,1,0,1,0,1,99]
Output: 99

Constraints:

1 <= nums.length <= 3 * 104
-231 <= nums[i] <= 231 - 1
Each element in nums appears exactly three times except for one element which appears once.

*/

class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        // I'm going to take an approach of bit manipulation
        $ones = 0;
        $twos = 0;
        $threes = 0;

        foreach ($nums as $num) {
            $twos |= $ones & $num;
            $ones ^= $num;
            $threes = $ones & $twos;
            // clearing the bits in ones and twos that are already set in threes
            $ones &= ~$threes;
            $twos &= ~$threes;
        }

        return $ones;
    }
}

/*
// Test case
$solution = new Solution();

$nums = [2, 2, 3, 2];
echo $solution->singleNumber($nums);

$nums = [0, 1, 0, 1, 0, 1, 99];
echo $solution->singleNumber($nums);
*/

?>