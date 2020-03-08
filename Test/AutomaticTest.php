<?php
use PHPUnit\Framework\TestCase;

class AutomaticTest extends TestCase
{
    public function testTrue()
    {
        $this->assertTrue(true);
    }
    
    public function testFalse()
    {
        $this->assertTrue(false);
    }
}