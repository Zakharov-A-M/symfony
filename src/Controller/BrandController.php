<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Brand;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Services\BrandServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/brand")
 */
class BrandController extends AbstractController
{
    /**
     * @var BrandServiceInterface
     */
    private $brandService;

    public function __construct(BrandServiceInterface $brandService)
    {
        $this->brandService = $brandService;
    }

    /**
     * @Route("/", methods={"GET"})
     */
    public function list(Request $request): Response
    {
        $offset = $request->query->getInt('offset', 0);
        $limit = $request->query->getInt('limit', 10);
        $searchField = $request->query->get('search_field', '');
        $searchKeyword = $request->query->get('search_keyword', '');
        $result  = $this->brandService->list($offset, $limit, $searchField, $searchKeyword);

        return $this->json($result, Response::HTTP_OK);
    }

    /**
     * @Route("/{id}/", methods={"GET"})
     */
    public function read(int $id): Response
    {
        try {
            $brand = $this->brandService->load($id);
        } catch (\Exception $exception) {
            throw new BadRequestHttpException($exception->getMessage());
        }

        return new JsonResponse($brand->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/{id}/", methods={"DELETE"})
     */
    public function remove(int $id): Response
    {
        try {
            $brand = $this->brandService->load($id);
        } catch (\Exception $exception) {
            throw new BadRequestHttpException($exception->getMessage());
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($brand);
        $em->flush();

        return new JsonResponse(['status' => true], Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/", methods={"POST"})
     */
    public function create(Request $request): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();

        $brand = new Brand();
        $brand->setName($request->request->get('name'))->setIcon($request->request->get('icon'));

        $em->persist($brand);
        $em->flush();

        return new JsonResponse($brand->toArray(), Response::HTTP_CREATED);
    }

    /**
     * @Route("/{id}/", methods={"PATCH"})
     */
    public function edit(int $id, Request $request): JsonResponse
    {
        $info = [
            'name' => $request->request->get('name'),
            'icon' => $request->request->get('icon')
        ];

        try {
            $brand = $this->brandService->update($id, $info);
        } catch (\Exception $exception) {
            throw new BadRequestHttpException($exception->getMessage());
        }
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($brand);
        $em->flush();

        return new JsonResponse($brand->toArray(), Response::HTTP_CREATED);
    }


}
