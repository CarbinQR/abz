<?php

namespace App\Actions\Api\User;

use App\Models\User;
use Illuminate\Http\JsonResponse;

final class StoreUserResponse
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getJsonResponse(): JsonResponse
    {
        return response()->json([
            "success" => true,
            "user_id" => $this->user->id,
            "message" => "New user successfully registered"
        ]);
    }
}
