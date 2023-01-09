<?php

namespace App\Http\Presenters\Position;

use App\Models\Position;
use Illuminate\Support\Collection;

class PositionPresenter
{
    public function present(Position $model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
        ];
    }

    public function presentCollection(Collection $collection): array
    {
        return $collection
            ->map(
                function (Position $position) {
                    return $this->present($position);
                }
            )
            ->all();
    }
}
