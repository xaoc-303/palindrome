<?php

function intPalindrome($str)
{
    $str = preg_replace('/[^a-zA-Zа-яА-Я]/ui', '', $str);
    $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
    $strLen = mb_strlen($str);

    if ($strLen < 3) {
        return 0;
    }

    $strReverse = (function() use ($str, $strLen) {
        $r = '';
        for ($i = $strLen; $i >= 0; $i--) {
            $r .= mb_substr($str, $i, 1);
        }
        return $r;
    })();

    return $str == $strReverse ? $strLen : 0;
}

function intPalindrome1($str)
{
    $str = preg_replace('/[^a-zA-Zа-яА-Я]/ui', '', $str);
    $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
    $strLen = mb_strlen($str);

    $i = 0;
    $iEnd = intdiv($strLen, 2);

    while (1) {
        $cStart = mb_substr($str, $i, 1);
        $cEnd = mb_substr($str, -1 - $i, 1);
        $i++;

        if ($cStart != $cEnd) {
            return 0;
        }

        if ($i > $iEnd) {
            return $strLen;
        }
    }
}

function findLargestSubPalindrome($str)
{
    $largestPalindrome = '';
    $largestPalindromeInt = 0;

    $len = mb_strlen($str);
    for ($j = 0; $j < $len - 2; $j++) {

        $count = mb_strlen($str);
        $iBegin = ($largestPalindromeInt - 3 < 0) ? 3 : $largestPalindromeInt;
        for ($i = $iBegin; $i < $count + 1; $i++) {

            $substr = mb_substr($str, 0, $i);
            $intPalindrome = intPalindrome($substr);
            if ($intPalindrome > $largestPalindromeInt) {
                $largestPalindrome = $substr;
                $largestPalindromeInt = $intPalindrome;
            }
        }

        $str = mb_substr($str, 1);
    }

    return $largestPalindrome;
}

function check($str)
{
    if (intPalindrome($str) > 0) {
        return $str;
    }

    $subPalindrome = findLargestSubPalindrome($str);
    if (mb_strlen($subPalindrome) > 0) {
        return $subPalindrome;
    }

    return mb_substr($str, 0, 1);
}
