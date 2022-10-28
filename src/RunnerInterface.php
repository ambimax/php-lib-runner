<?php

declare(strict_types=1);

namespace Ambimax\Runner;

use Ambimax\Runner\ArgumentBag\ArgumentBagInterface;

interface RunnerInterface
{
    public function run(): void;

    public function setArgumentBag(ArgumentBagInterface $argumentBag): self;
}
