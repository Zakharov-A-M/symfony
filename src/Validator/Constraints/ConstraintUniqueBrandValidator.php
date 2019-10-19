<?php

namespace App\Validator\Constraints;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Brand;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Class ConstraintUniqueBrandValidator
 */
class ConstraintUniqueBrandValidator extends ConstraintValidator
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof ConstraintUniqueBrand) {
            throw new UnexpectedTypeException($constraint, ConstraintUniqueBrand::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        $brands = $this->entityManager->getRepository(Brand::class)->findBy(['name' => $value]);

        if (count($brands) > 0) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}