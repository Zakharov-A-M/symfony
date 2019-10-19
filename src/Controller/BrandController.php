<?php

namespace App\Controller;

use App\ApiResponseDTO\Brand;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Services\BrandService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Exceptions\ValidationException;

/**
 * @Route("/brand")
 */
class BrandController extends AbstractController
{
    /** @var BrandService */
    private $brandService;

    /**
     * BrandController constructor.
     *
     * @param BrandService $brandService
     */
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    /**
     * @Route("/show", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $result  = $this->brandService->getListBrand(
            $request->query->get('page', 1),
            $request->query->get('limit', 10),
            $request->query->get('search')
        );

        return $this->json($result, JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/create", methods={"POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        /** @var Brand $input */
        $input = $this->get('serializer')->deserialize(
            $request->getContent(),
            Brand::class,
            'json'
        );

        try {
            $this->brandService->createBrand($input);
        } catch (ValidationException $exception) {
            return $this->json(['errors' => $exception->getErrors()], JsonResponse::HTTP_BAD_REQUEST);
        }

        return $this->json(['payload' => 'Done save!'], JsonResponse::HTTP_OK);
    }
}
