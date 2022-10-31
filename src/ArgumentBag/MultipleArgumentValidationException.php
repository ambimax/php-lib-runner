<?php

declare(strict_types=1);

namespace Ambimax\Runner\ArgumentBag;

use Exception;
use Throwable;

class MultipleArgumentValidationException extends Exception
{
    /**
     * @param ArgumentValidationException[] $exceptions
     */
    public function __construct(array $exceptions, int $code = 0, Throwable $previous = null)
    {
        $message = "One or more exceptions occurred during argument validation:\n";
        foreach ($exceptions as $exception) {
            $message .= $exception->getMessage()."\n";
        }
        parent::__construct($message, $code, $previous);
    }
}
