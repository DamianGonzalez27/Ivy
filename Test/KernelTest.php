<?php declare(strict_types=1);
require __DIR__ . "/../Core/Kernel.php";
use PHPUnit\Framework\TestCase;
use Core\Kernel;

class KernelTest extends TestCase
{
    private $kernel;

    //Get instance to class
    protected function setUp()
    {
        $this->kernel = new Kernel;
    }

    //Destruct the class
    protected function tearDown()
    {
        $this->kernel = null;
    }

    public function testAdd()
    {
        $result = $this->kernel->run(2,2);
        $this->assertEquals(3, $result);
    }

}