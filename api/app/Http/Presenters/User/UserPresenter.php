<?php

namespace App\Http\Presenters\User;

use App\Models\User;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection;

class UserPresenter
{
    public function present(User $model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'email' => $model->email,
            'phone' => $model->phone,
            'photo' => $model->photo,
            'position' => $model->position->name,
            'position_id' => $model->position_id,
            'registration_timestamp' => $model->registration_timestamp,
        ];
    }

    public function presentCollection(Collection $collection): array
    {
        return $collection
            ->map(
                function (User $user) {
                    return $this->present($user);
                }
            )
            ->all();
    }
}
