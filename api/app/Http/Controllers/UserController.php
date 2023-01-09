<?php

namespace App\Http\Controllers;

use App\Http\Presenters\Position\PositionPresenter;
use App\Repositories\Position\PositionRepository;
use Illuminate\View\View;

class UserController extends Controller
{
    public function returnSignUpPage(
        PositionRepository $positionRepository,
        PositionPresenter  $positionPresenter
    ): View
    {
        $positions = $positionRepository->getAll();

        return view(
            'pages.sign-up',
            ['positions' => $positionPresenter->toArray($positions)]
        );
    }
}
