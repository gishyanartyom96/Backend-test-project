<?php

namespace App\Exceptions;

use Exception;

class SavingErrorException extends Exception
{
    public function getStatus(): int
    {
        return ExceptionConsts::SAVING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return $this->getMessage();
    }
}
