<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\Position\GetPositionListAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PositionController extends Controller
{
    public function getList(GetPositionListAction $action,
    ): JsonResponse
    {
        return $action->execute()->getJsonResponse();
    }
}
