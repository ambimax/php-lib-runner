<?php

declare(strict_types=1);

namespace Ambimax\Runner\ArgumentBag;

interface ArgumentBagInterface
{
    /**
     * @return mixed
     */
    public function getArgument(string $argument);
}
