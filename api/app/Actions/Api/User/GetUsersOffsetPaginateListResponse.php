<?php

namespace App\Actions\Api\User;

use App\Http\Presenters\User\UserPresenter;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

final class GetUsersOffsetPaginateListResponse
{
    private array $paginateData;

    public function __construct(array $paginateData)
    {
        $this->paginateData = $paginateData;
    }

    public function getJsonResponse(): JsonResponse
    {
        return response()->json([
            "success" => true,
            "total_pages" => $this->paginateData['totalPages'],
            "total_users" => $this->paginateData['totalUsers'],
            "count" => $this->paginateData['count'],
            "offset" => $this->paginateData['offset'],
            "links" => [
                "next_url" => $this->paginateData['nextUrl'],
                "prev_url" => $this->paginateData['prevUrl'],
            ],
            "users" => (new UserPresenter())->presentCollection(
                collect($this->paginateData['users'])
            ),
        ]);
    }
}
