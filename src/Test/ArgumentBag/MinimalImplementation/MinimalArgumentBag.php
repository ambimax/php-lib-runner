<?php

declare(strict_types=1);

namespace Ambimax\Runner\Test\ArgumentBag\MinimalImplementation;

use Ambimax\Runner\ArgumentBag\ArgumentBagInterface;

class MinimalArgumentBag implements ArgumentBagInterface
{
    public function getArgument(string $argument)
    {
        return $argument;
    }
}
