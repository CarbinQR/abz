<?php

namespace App\Actions\Api\Token;

use App\Models\User;
use App\Repositories\Token\TokenRepository;
use App\Repositories\User\UserRepository;
use Carbon\Carbon;
use Laravel\Passport\Passport;

final class GenerateTokenAction
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(): GenerateTokenResponse
    {
        $user = new User();
        Passport::personalAccessTokensExpireIn(Carbon::now()->addMinutes(40));

        return new GenerateTokenResponse(
            $user->createToken('registrationToken')->token->id
        );
    }
}
