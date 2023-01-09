<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\User\GetUserAction;
use App\Actions\Api\User\GetUserRequest;
use App\Actions\Api\User\GetUsersPaginateListAction;
use App\Actions\Api\User\GetUsersPaginateListRequest;
use App\Actions\Api\User\StoreUserAction;
use App\Actions\Api\User\StoreUserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserGetPaginateListRequest;
use App\Http\Requests\User\UserStoreRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function store(
        UserStoreRequest $request,
        StoreUserAction  $action
    ): JsonResponse
    {
        return $action->execute(
            new StoreUserRequest(
                $request->input('name'),
                $request->input('password'),
                $request->input('email'),
                $request->input('phone'),
                $request->input('position_id'),
                $request->file('file')
            )
        )->getJsonResponse();
    }

    public function getPaginateList(
        GetUsersPaginateListAction $action,
        UserGetPaginateListRequest $request
    ): JsonResponse
    {
        return $action->execute(
            new GetUsersPaginateListRequest(
                (int)$request->get('page'),
                (int)$request->get('offset'),
                (int)$request->get('count')
            )
        )->getJsonResponse();
    }

    public function get(GetUserAction $action, string $uid): JsonResponse
    {
        return $action->execute(new GetUserRequest((int)$uid))->getJsonResponse();
    }
}
