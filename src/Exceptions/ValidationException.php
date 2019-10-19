<?php

namespace App\Exceptions;

use RuntimeException;

/**
 * Class ValidationException
 */
class ValidationException extends RuntimeException
{
    /** @var array */
    private $error;

    /**
     * @param array $errors
     */
    public function __construct(array $errors)
    {
        parent::__construct();

        $this->error = $errors;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->error;
    }

}