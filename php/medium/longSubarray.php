<?php
/*
Given a binary array nums, you should delete one element from it.

Return the size of the longest non-empty subarray containing only 1's in the resulting array. Return 0 if there is no such subarray.

Example 1:

Input: nums = [1,1,0,1]
Output: 3
Explanation: After deleting the number in position 2, [1,1,1] contains 3 numbers with value of 1's.
Example 2:

Input: nums = [0,1,1,1,0,1,1,0,1]
Output: 5
Explanation: After deleting the number in position 4, [0,1,1,1,1,1,0,1] longest subarray with value of 1's is [1,1,1,1,1].
Example 3:

Input: nums = [1,1,1]
Output: 2
Explanation: You must delete one element.

Constraints:

1 <= nums.length <= 105
nums[i] is either 0 or 1.

*/

class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestSubarray($nums) {
        $n = count($nums);
        $maxLen = 0;
        $leftOnes = 0;
        $rightOnes = 0;
        
        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] == 1) {
                $leftOnes++;
            } else {
                // Reset the rightOnes count
                $rightOnes = $leftOnes;
                // Reset the leftOnes count
                $leftOnes = 0;
            }
            
            // Update the maximum length
            $maxLen = max($maxLen, $leftOnes + $rightOnes);
        }
        
        // If the entire array consists of 1's, subtract 1 from the maximum length
        if ($maxLen == $n) {
            $maxLen--;
        }
        
        return $maxLen;
    }
}

/*
// Test case

$solution = new Solution();
$nums = [0, 1, 1, 1, 0, 1, 1, 0, 1];
echo $solution->longestSubarray($nums);

*/

?>