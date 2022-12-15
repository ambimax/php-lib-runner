<?php

declare(strict_types=1);

namespace Ambimax\Runner\ArgumentBag;

class ArgumentValidationException extends \Exception
{
    public function __construct(string $argument, string $message, int $code = 0, \Throwable $previous = null)
    {
        $message = 'Error while validation of '.$argument.': '.$message;
        parent::__construct($message, $code, $previous);
    }
}
