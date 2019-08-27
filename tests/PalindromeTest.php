<?php

use PHPUnit\Framework\TestCase;

/**
 * Class PalindromeTest
 *
 * @example php vendor/bin/phpunit tests/PalindromeTest.php
 */
class PalindromeTest extends TestCase
{
    public function palindromeData()
    {
        return [
            ["Sum summus mus", "Sum summus mus"],
            ["А роза упала на лапу Азора", "А роза упала на лапу Азора"],
            ["Я иду с мечем судия", "Я иду с мечем судия"],
            ["О, лета тело!", "О, лета тело!"],
            ["Я - арка края", "Я - арка края"],
            ["Я - ака края - я1арк", " края - я1арк"],
            ["Я - ка ярко", "Я"],
            ["Тоторо", "Тот"],
        ];
    }

    /**
     * @dataProvider palindromeData
     */
    public function testPalindrome($str, $result)
    {
        $this->assertSame(check($str), $result);
    }
}
