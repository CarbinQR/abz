<?php

namespace App\Actions\Api\User;

use App\Http\Presenters\User\UserPresenter;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetUserResponse
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
            "user" => (new UserPresenter())->present($this->user),
        ]);
    }
}
