<?php

namespace App\Actions\Api\User;

use App\Http\Presenters\User\UserPresenter;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetUsersPaginateListResponse
{
    private LengthAwarePaginator $usersList;

    public function __construct(LengthAwarePaginator $usersList)
    {
        $this->usersList = $usersList;
    }

    public function getUsers(): array
    {
        $paginateData = $this->usersList->toArray();

        return $paginateData["data"];
    }

    public function getJsonResponse(): JsonResponse
    {
        return response()->json([
            "success" => true,
            "page" => $this->usersList->currentPage(),
            "total_pages" => $this->usersList->lastPage(),
            "total_users" => $this->usersList->total(),
            "count" => $this->usersList->perPage(),
            "links" => [
                "next_url" => $this->usersList->nextPageUrl() . '&count=' . $this->usersList->perPage(),
                "prev_url" => $this->usersList->previousPageUrl() . '&count=' . $this->usersList->perPage(),
            ],
            "users" => (new UserPresenter())->presentCollection(
                collect($this->usersList->items())
            ),
        ]);
    }
}
