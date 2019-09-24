<?php
namespace Tests;
use Core\Core;
use PHPUnit\Framework\TestCase;

class coreTest extends TestCase
{

    public function testWorks()
    {
        $this->assertFileExists(__DIR__.'/../index.php');
        $this->assertClassHasAttribute(Core::class);
    }
}