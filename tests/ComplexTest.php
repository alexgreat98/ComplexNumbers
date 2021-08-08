<?php


use App\Complex;
use PHPUnit\Framework\TestCase;

/**
 * Class ComplexTest
 */
class ComplexTest extends TestCase
{
    /**
     * Test instance
     */
    public function testInstance()
    {
        $complex = new Complex();
        $this->assertInstanceOf(Complex::class, $complex);

        $this->assertEquals(0.0, $complex->getReal());
        $this->assertEquals(0.0, $complex->getImaginary());
    }

    /**
     * Test instance with one argument
     */
    public function testInstanceWithArgument()
    {
        $complexObject = new Complex(2.56);

        $this->assertEquals(2.56, $complexObject->getReal());
        $this->assertEquals(0.0, $complexObject->getImaginary());
    }

    /**
     * Test instance with arguments
     */
    public function testInstanceWithArguments()
    {
        $complexObject = new Complex(2.56, 1.47);

        $this->assertEquals(2.56, $complexObject->getReal());
        $this->assertEquals(1.47, $complexObject->getImaginary());
    }

    /**
     * Test instance argument type array
     */
    public function testInstantiateWithArray()
    {
        $complexObject = new Complex(
            [2.56, -1.47]
        );

        $this->assertEquals(2.56, $complexObject->getReal());

        $this->assertEquals(-1.47, $complexObject->getImaginary());
    }
}
