<?php

namespace App\Actions\Api\User;

use App\Repositories\User\UserRepository;

final class GetUserAction
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function execute(GetUserRequest $request): GetUserResponse
    {
        return new GetUserResponse(
            $this->userRepository->getById($request->getUid())
        );
    }
}
