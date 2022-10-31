<?php

namespace Ambimax\Runner\Test;

use Ambimax\Runner\AbstractRunner;
use Ambimax\Runner\ArgumentBag\ArgumentBagInterface;
use Ambimax\Runner\Test\ArgumentBag\MinimalImplementation\MinimalArgumentBag;
use Ambimax\Runner\Test\MinimalImplementation\MinimalRunner;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class AbstractRunnerTest extends TestCase
{
    public function testSetArgumentBag(): void
    {
        $argumentBag = new MinimalArgumentBag();
        $runner = new MinimalRunner($argumentBag);

        $reflection = new \ReflectionClass(AbstractRunner::class);
        $property = $reflection->getProperty('argumentBag');
        $property->setAccessible(true);

        $this->assertSame($argumentBag, $property->getValue($runner));
    }

    public function testSetArgumentBagChangedType(): void
    {
        $runner = $this->getMockBuilder(MinimalRunner::class)
                       ->disableOriginalConstructor()
                       ->getMockForAbstractClass();

        $reflection = new \ReflectionClass(AbstractRunner::class);
        $property = $reflection->getProperty('argumentBag');
        $property->setAccessible(true);

        $argumentBag = new MinimalArgumentBag();
        $runner->setArgumentBag($argumentBag);
        $this->assertSame($argumentBag, $property->getValue($runner));

        $argumentBag = $this->createMock(ArgumentBagInterface::class);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('ArgumentBag for Ambimax\Runner\AbstractRunner needs to be of type: Ambimax\Runner\Test\ArgumentBag\MinimalImplementation\MinimalArgumentBag');

        // @phpstan-ignore-next-line
        $runner->setArgumentBag($argumentBag);
    }
}
