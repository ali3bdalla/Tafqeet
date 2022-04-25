<?php

namespace AliAbdalla\Tafqeet\Tests;

use AliAbdalla\Tafqeet\Core\Tafqeet;
use AliAbdalla\Tafqeet\Exceptions\InValidNumberException;
use PHPUnit\Framework\TestCase;

class InitValidationTest extends TestCase
{

    /**
     * Test throw exception For invalid numbers
     *
     * @test
     * @return void
     */
    public function it_can_throw_exception_for_invalid_numbers()
    {
        $this->expectException(InValidNumberException::class);
        Tafqeet::arablic('foo');
    }
}