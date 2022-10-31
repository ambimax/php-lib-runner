<?php

declare(strict_types=1);

namespace Ambimax\Runner;

use Ambimax\Runner\ArgumentBag\ArgumentBagInterface;

/**
 * @template T of ArgumentBag\ArgumentBagInterface
 */
interface RunnerInterface
{
    public function run(): void;

    /**
     * @param T $argumentBag
     * @return self<T>
     */
    public function setArgumentBag(ArgumentBagInterface $argumentBag): self;

    /**
     * @return class-string<T>
     */
    public function getArgumentBagType(): string;
}
