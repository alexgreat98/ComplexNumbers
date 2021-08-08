<?php

namespace App;

use Exception;
use InvalidArgumentException;

/**
 * Complex Number object.
 *
 * @package Complex
 *
 * @method Complex add(...$complexValues)
 * @method Complex subtract(...$complexValues)
 * @method Complex multiply(...$complexValues)
 * @method Complex divide(...$complexValues)
 */
class Complex
{
    protected $realPart = 0.0;

    protected $imaginaryPart = 0.0;

    /**
     * Complex constructor.
     *
     * @param float|numeric|array $realPart
     * @param null  $imaginaryPart
     */
    public function __construct($realPart = 0.0, $imaginaryPart = null)
    {
        if ($imaginaryPart === null) {
            if (is_array($realPart)) {
                [$realPart, $imaginaryPart] = array_values($realPart) + [0.0, 0.0];
            }else if (is_numeric($realPart) || is_float($realPart)) {
                $imaginaryPart = 0.0;
            }
        }

        $this->realPart      = $realPart;
        $this->imaginaryPart = $imaginaryPart;
    }

    /**
     * @param mixed $complex The value to validate
     *
     * @return    Complex
     * @throws    Exception    If the argument isn't a Complex number
     */
    public static function validateComplexArgument($complex): Complex
    {
        if (is_scalar($complex) || is_array($complex)) {
            $complex = new Complex($complex);
        } elseif (!is_object($complex) || !($complex instanceof Complex)) {
            throw new Exception('Value is not a valid complex number');
        }

        return $complex;
    }

    /**
     * Gets the real part of this complex number
     *
     * @return Float
     */
    public function getReal(): float
    {
        return $this->realPart;
    }

    /**
     * Gets the imaginary part of this complex number
     *
     * @return Float
     */
    public function getImaginary(): float
    {
        return $this->imaginaryPart;
    }

    /**
     * Returns the result of the function call or operation
     *
     * @return    Complex|float
     * @throws    Exception|InvalidArgumentException
     */
    public function __call($functionName, $arguments)
    {
        $functionName = strtolower(str_replace('_', '', $functionName));

        return Operations::$functionName($this, ...$arguments);
    }
}
