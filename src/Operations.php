<?php

namespace App;

use Exception;
use InvalidArgumentException;

class Operations
{
    /**
     * @param array of integer|float|Complex  $complexValues
     *
     * @return Complex
     * @throws Exception
     */
    public static function add(...$complexValues): Complex
    {
        if (count($complexValues) < 2) {
            throw new Exception('This function requires at least 2 arguments');
        }

        $base   = array_shift($complexValues);
        $result = clone Complex::validateComplexArgument($base);

        foreach ($complexValues as $complex) {
            $complex = Complex::validateComplexArgument($complex);

            $real      = $result->getReal() + $complex->getReal();
            $imaginary = $result->getImaginary() + $complex->getImaginary();

            $result = new Complex(
                $real,
                $imaginary
            );
        }

        return $result;
    }

    /**
     * @param array of integer|float|Complex  $complexValues
     *
     * @return Complex
     * @throws Exception
     */
    public static function subtract(...$complexValues): Complex
    {
        if (count($complexValues) < 2) {
            throw new Exception('This function requires at least 2 arguments');
        }

        $base   = array_shift($complexValues);
        $result = clone Complex::validateComplexArgument($base);

        foreach ($complexValues as $complex) {
            $complex = Complex::validateComplexArgument($complex);

            $real      = $result->getReal() - $complex->getReal();
            $imaginary = $result->getImaginary() - $complex->getImaginary();

            $result = new Complex(
                $real,
                $imaginary
            );
        }

        return $result;
    }

    /**
     * @param array of integer|float|Complex $complexValues
     *
     * @return Complex
     * @throws Exception
     */
    public static function multiply(...$complexValues): Complex
    {
        if (count($complexValues) < 2) {
            throw new Exception('This function requires at least 2 arguments');
        }

        $base   = array_shift($complexValues);
        $result = clone Complex::validateComplexArgument($base);

        foreach ($complexValues as $complex) {
            $complex = Complex::validateComplexArgument($complex);

            $real      = ($result->getReal() * $complex->getReal()) -
                ($result->getImaginary() * $complex->getImaginary());
            $imaginary = ($result->getReal() * $complex->getImaginary()) +
                ($result->getImaginary() * $complex->getReal());

            $result = new Complex(
                $real,
                $imaginary
            );
        }

        return $result;
    }

    /**
     * Divides two or more complex numbers
     *
     * @param array of string|integer|float|Complex    $complexValues   The numbers to divide
     *
     * @return    Complex
     * @throws Exception
     */
    public static function divide(...$complexValues): Complex
    {
        if (count($complexValues) < 2) {
            throw new Exception('This function requires at least 2 arguments');
        }

        $base   = array_shift($complexValues);
        $result = clone Complex::validateComplexArgument($base);

        foreach ($complexValues as $complex) {
            $complex = Complex::validateComplexArgument($complex);


            if ($complex->getReal() == 0.0 && $complex->getImaginary() == 0.0) {
                throw new InvalidArgumentException('Division by zero');
            }

            $delta1 = ($result->getReal() * $complex->getReal()) +
                ($result->getImaginary() * $complex->getImaginary());
            $delta2 = ($result->getImaginary() * $complex->getReal()) -
                ($result->getReal() * $complex->getImaginary());
            $delta3 = ($complex->getReal() * $complex->getReal()) +
                ($complex->getImaginary() * $complex->getImaginary());

            $real      = $delta1 / $delta3;
            $imaginary = $delta2 / $delta3;

            $result = new Complex(
                $real,
                $imaginary
            );
        }

        return $result;
    }
}
