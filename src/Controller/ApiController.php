<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Controller;

use App\Service\HistoryService;
use App\Validator\InputValidator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('api')]
class ApiController  extends AbstractController
{
    private InputValidator $inputValidator;

    private HistoryService $historyService;

    public function __construct(InputValidator $inputValidator, HistoryService $historyService)
    {
        $this->inputValidator = $inputValidator;
        $this->historyService = $historyService;
    }

    #[Route('/exchange/values', name: "postValues", methods: ['POST'])]
    public function postValues(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!($this->inputValidator->validate($data))) {
            return new JsonResponse(['error' => 'Incorrect input parameters'], 400);
        }

        $history = $this->historyService->postValues($data);

        return new JsonResponse(['message' => $history], 200);
    }

}