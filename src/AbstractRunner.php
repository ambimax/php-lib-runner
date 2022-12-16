<?php

declare(strict_types=1);

namespace Ambimax\Runner;

use Ambimax\Runner\ArgumentBag\ArgumentBagInterface;

/**
 * @template T of ArgumentBag\ArgumentBagInterface
 *
 * @implements RunnerInterface<T>
 */
abstract class AbstractRunner implements RunnerInterface
{
    /**
     * @var T
     */
    protected ArgumentBagInterface $argumentBag;

    /**
     * @param T $argumentBag
     */
    public function __construct(ArgumentBagInterface $argumentBag)
    {
        $this->setArgumentBag($argumentBag);
    }

    /**
     * @param T $argumentBag
     *
     * @return self<T>
     */
    public function setArgumentBag(ArgumentBagInterface $argumentBag): self
    {
        if (!is_a($argumentBag, $this->getArgumentBagType())) {
            throw new \RuntimeException('ArgumentBag for '.self::class.' needs to be of type: '.$this->getArgumentBagType());
        }
        $this->argumentBag = $argumentBag;

        return $this;
    }

    /**
     * @return mixed
     */
    protected function getArgument(string $argument)
    {
        return $this->argumentBag->getArgument($argument);
    }
}
