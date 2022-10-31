<?php

namespace Ambimax\Runner\Test\ArgumentBag;

use Ambimax\Runner\ArgumentBag\ArgumentValidationException;
use PHPUnit\Framework\TestCase;

class ArgumentValidationExceptionTest extends TestCase
{
    public function testConstructor(): void
    {
        $exception = new ArgumentValidationException('argument', 'testmsg');

        $this->assertSame('Error while validation of argument: testmsg', $exception->getMessage());
    }
}
