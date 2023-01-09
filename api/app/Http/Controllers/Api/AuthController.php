<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\Token\GenerateTokenAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function generateToken(GenerateTokenAction $action): JsonResponse
    {
        return $action->execute()->getJsonResponse();
    }
}
