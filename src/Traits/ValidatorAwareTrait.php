<?php

namespace App\Traits;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use App\Exceptions\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Trait ValidatorAwareTrait
 */
trait ValidatorAwareTrait
{
    /** @var ValidatorInterface */
    private $validator;

    /**
     * @param ValidatorInterface $validator
     */
    public function setValidator(ValidatorInterface $validator): void
    {
        $this->validator = $validator;
    }

    /**
     * @param $input
     */
    public function validate($input): void
    {
        /** @var ConstraintViolationListInterface $errors */
        $errors = $this->validator->validate($input);

        if (count($errors) > 0) {
            $errorList = [];
            foreach ($errors as $error) {
                $errorList[$error->getPropertyPath()] = $error->getMessage();
            }

            throw new ValidationException($errorList);
        }
    }

}