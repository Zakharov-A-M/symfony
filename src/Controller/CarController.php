<?php

namespace App\Controller;

use App\Entity\Cars;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CarController extends AbstractController
{
    /**
     * @Route("/new/car", name="car")
     */
    public function index(ValidatorInterface $validator): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $car = new Cars();
        $car->setName('Volvo');
        $car->setPrice(2000);
        $car->setPower(550);
        $car->setDescription('Компания «Ауди» была основана в 1909 Августом Хорьхом.');

        $errors = $validator->validate($car);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        $entityManager->persist($car);
        $entityManager->flush();

        return new Response('Saved new car with id '.$car->getId());

    }
}
