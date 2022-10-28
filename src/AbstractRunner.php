<?php

declare(strict_types=1);

namespace Ambimax\Runner;

use Ambimax\Runner\ArgumentBag\ArgumentBagInterface;
use RuntimeException;

abstract class AbstractRunner implements RunnerInterface
{
    protected ArgumentBagInterface $argumentBag;

    public function __construct(ArgumentBagInterface $argumentBag)
    {
        $this->setArgumentBag($argumentBag);
    }

    public function setArgumentBag(ArgumentBagInterface $argumentBag): RunnerInterface
    {
        if (!is_a($argumentBag, $this->getArgumentBagType())) {
            throw new RuntimeException('ArgumentBag for '.self::class.' needs to be of type: '.$this->getArgumentBagType());
        }
        $this->argumentBag = $argumentBag;

        return $this;
    }

    /**
     * @return class-string
     */
    public function getArgumentBagType(): string
    {
        return ArgumentBagInterface::class;
    }

    public function run(): void
    {
        if (empty($this->argumentBag)) {
            throw new RuntimeException('ArgumentBag must be set to run this runner');
        }
    }
}
