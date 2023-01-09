<?php

namespace App\Actions\Api\Position;

use App\Http\Presenters\Position\PositionPresenter;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

final class GetPositionListResponse
{
    private Collection $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function getJsonResponse(): JsonResponse
    {
        return response()->json([
            "success" => true,
            "positions" => (new PositionPresenter())->presentCollection($this->collection),
        ]);
    }
}
