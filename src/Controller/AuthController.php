<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AuthController
{
    #[Route('/login', methods: ['POST'])]
    public function login(): JsonResponse
    {
        // handled automatically by LexikJWT
        return $this->json([
            'token' => 'demo-token'
        ]);
    }
}