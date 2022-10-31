<?php

namespace Ambimax\Runner\Test\ArgumentBag;

use Ambimax\Runner\ArgumentBag\ArgumentValidationException;
use Ambimax\Runner\ArgumentBag\MultipleArgumentValidationException;
use PHPUnit\Framework\TestCase;

class MultipleArgumentValidationExceptionTest extends TestCase
{
    public function testConstructor(): void
    {
        $exceptions = [
            new ArgumentValidationException('arg1', 'msg1'),
            new ArgumentValidationException('arg2', 'msg2'),
            new ArgumentValidationException('arg3', 'msg3'),
        ];

        $multipleException = new MultipleArgumentValidationException($exceptions);

        $this->assertSame("One or more exceptions occurred during argument validation:\nError while validation of arg1: msg1\nError while validation of arg2: msg2\nError while validation of arg3: msg3\n", $multipleException->getMessage());
    }
}
