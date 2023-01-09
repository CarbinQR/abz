<?php

namespace App\Actions\Api\Position;

use App\Repositories\Position\PositionRepository;

final class GetPositionListAction
{
    private PositionRepository $positionRepository;

    public function __construct(
        PositionRepository $positionRepository
    )
    {
        $this->positionRepository = $positionRepository;
    }

    public function execute(): GetPositionListResponse
    {
        return new GetPositionListResponse($this->positionRepository->getAll());
    }
}
