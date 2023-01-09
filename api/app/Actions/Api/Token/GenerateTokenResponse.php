<?php

namespace App\Actions\Api\Token;

use Illuminate\Http\JsonResponse;

final class GenerateTokenResponse
{
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function getJsonResponse(): JsonResponse
    {
        return response()->json([
            "success" => true,
            "token" => $this->token
        ]);
    }
}
