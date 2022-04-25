<?php

namespace AliAbdalla\Tafqeet\Tests;

use AliAbdalla\Tafqeet\Core\Tafqeet;
use PHPUnit\Framework\TestCase;

class TafqeetTest extends TestCase
{
    /**
     * It Can Convert numbers to arabic words
     *
     * @dataProvider sarArablicProvider
     * @test
     * @return void
     */
    public function it_can_arablic_numbers($expectedArablic, $number): void
    {
        $this->assertEquals($expectedArablic, Tafqeet::arablic($number, 'sar'));
    }


    /**
     * Set Of Arablic Sar Results
     *
     * @return array
     */
    public function sarArablicProvider()
    {
        return [
            ["فقط عشرة ريال لاغير", 10],
            ["فقط عشرة ريال وتسعة هللات لاغير", 10.9],
            ["فقط مائة ريال لاغير", 100],
            ["فقط مائة ريال وتسعة هللات لاغير", 100.9],
            ["فقط ألف ريال لاغير", 1000],
            ["فقط ألف وتسعمائة وتسعة وتسعون ريالاً وتسعة وتسعون هللة لاغير", 1999.99],
            ["فقط عشرة آلاف ريال لاغير", 10000],
            ["فقط تسعة عشر ألفًا وتسعمائة وتسعة وتسعون ريالاً وتسعة هللات لاغير", 19999.9],
            ["فقط تسعمائة ألف ريال لاغير", 900000],
            ["فقط تسعمائة وتسعة وتسعون ألفًا وتسعمائة وتسعة وتسعون ريالاً وتسعة وتسعون هللة لاغير", 999999.99],
        ];
    }
}