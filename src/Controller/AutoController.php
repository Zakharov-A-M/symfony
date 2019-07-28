<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;


class AutoController extends AbstractController
{
    /**
     * Get list auto
     *
     * @return Response
     */
    public function getListCar()
    {
        $cars = [
            'Audi' => 'Audi',
            'BMW' => 'BMW',
            'Daewoo' => 'Daewoo',
            'Kia' => 'Kia',
            'Subaru' => 'Subaru'
        ];

        $url = $this->generateUrl('cars_about', [
                'slug' => 200
            ]
        );

       return $this->redirectToRoute('cars_list_new_route');

       /* return $this->render('auto/view.html.twig', [
            'cars' => $cars,
            'url' => $url
        ]);*/
    }

    /**
     * @Route("/route/auto", name="cars_list_new_route")
     */
    public function getListNewRouting()
    {
        $cars = [
            'Jeep' => 'Jeep',
            'Mercedes-Benz' => 'Mercedes-Benz',
            'Nissan' => 'Nissan',
            'Chevrolet' => 'Chevrolet',
            'Mazda' => 'Mazda'
        ];

        return new Response(
            '<html><body>List auto: ' . json_encode($cars) . '</body></html>'
        );
    }

    /**
     * @return Response
     */
    public function about(): Response
    {
        return new Response(
            '<html><body>Power auto: 220W <br></body></html>'
        );
    }

    /**
     * Matches /cars exactly
     *
     * @Route("/cars", name="cars_list")
     */
    public function list()
    {
        $cars = [
            'Jeep' => 'Jeep',
            'Mercedes-Benz' => 'Mercedes-Benz',
            'Nissan' => 'Nissan',
            'Chevrolet' => 'Chevrolet',
            'Mazda' => 'Mazda'
        ];

        return new Response(
            '<html><body>List auto: ' . json_encode($cars) . '</body></html>'
        );
    }

    /**
     * @Route("/cars/{slug}", name="cars_show")
     * @param string $slug
     * @return Response
     */
    public function show(string $slug)
    {
        return new Response(
            '<html><body>List auto: ' . $slug . '</body></html>'
        );
    }

    /**
     * @Route("/cars/{id<\d+>?220}", name="cars_about")
     * @param int $id
     * @return Response
     */
    public function aboutCar(int $id): Response
    {
        return new Response(
            '<html><body>Power auto: Power more '. $id .'W <br></body></html>'
        );
    }

}