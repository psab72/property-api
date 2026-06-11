<?php

namespace App\Controller;

use App\Service\PropertyAggregatorService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController
{
    #[Route('/properties', methods: ['GET'])]
    public function index(
        Request $request,
        PropertyAggregatorService $service
    ): JsonResponse {

        $properties = $service->getProperties();

        $page = max(1, (int) $request->query->get('page', 1));
        $limit = max(1, (int) $request->query->get('limit', 10));

        $paginatedData = array_slice(
            $properties,
            ($page - 1) * $limit,
            $limit
        );

        return new JsonResponse([
            'success' => true,
            'page' => $page,
            'limit' => $limit,
            'total' => count($properties),
            'data' => $paginatedData
        ]);
    }
}