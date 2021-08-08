<?php


use App\Complex;
use PHPUnit\Framework\TestCase;

/**
 * Tests operations with complex numbers
 *
 * Class ComplexOperationTest
 */
class ComplexOperationTest extends TestCase
{
    public function testAdd()
    {
        $complex = new Complex(1.23, 4.56);
        $result = $complex->add(
            new Complex(2.34, 5.67)
        );

        $expected = new Complex(3.57, 10.23);
        $this->assertEquals(new Complex(1.23, 4.56), $complex);
        $this->assertEquals($expected->getReal(), $result->getReal());
        $this->assertEquals($expected->getImaginary(), $result->getImaginary());
    }

    public function testSubtraction()
    {
        $complex = new Complex(7.23, 6.56);
        $result = $complex->subtract(
            new Complex(2.34, 5.67)
        );

        $expected = new Complex(4.890000000000001, 0.8899999999999997);
        $this->assertEquals(new Complex(7.23, 6.56), $complex);
        $this->assertEquals($expected->getReal(), $result->getReal());
        $this->assertEquals($expected->getImaginary(), $result->getImaginary());
    }

    public function testMultiplication()
    {
        $complex = new Complex(7.23, 6.56);
        $result = $complex->multiply(
            new Complex(2.34, 5.67)
        );

        $expected = new Complex(-20.277, 56.344500000000004);
        $this->assertEquals(new Complex(7.23, 6.56), $complex);
        $this->assertEquals($expected->getReal(), $result->getReal());
        $this->assertEquals($expected->getImaginary(), $result->getImaginary());
    }

    public function testDivision()
    {
        $complex = new Complex(7.23, 6.56);
        $result = $complex->divide(
            new Complex(2.34, 5.67)
        );

        $expected = new Complex(1.438249013275924, -0.6815691902882431);
        $this->assertEquals(new Complex(7.23, 6.56), $complex);
        $this->assertEquals($expected->getReal(), $result->getReal());
        $this->assertEquals($expected->getImaginary(), $result->getImaginary());
    }
}
