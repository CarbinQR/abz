<?php

namespace App\Repositories\Position;

use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;

class PositionRepository
{
    public function getAll(): Collection
    {
        return Position::all();
    }

    public function getById(int $positionId): Position
    {
        $position = Position::find($positionId);

        if(!$position) {
            throw new \Exception('Position not found by ID: ' . $positionId);
        }

        return $position;
    }
}
