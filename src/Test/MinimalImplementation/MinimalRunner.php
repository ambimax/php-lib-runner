<?php

declare(strict_types=1);

namespace Ambimax\Runner\Test\MinimalImplementation;

use Ambimax\Runner\AbstractRunner;
use Ambimax\Runner\Test\ArgumentBag\MinimalImplementation\MinimalArgumentBag;

class MinimalRunner extends AbstractRunner
{
    public function getArgumentBagType(): string
    {
        return MinimalArgumentBag::class;
    }

    public function run(): void
    {
    }
}
