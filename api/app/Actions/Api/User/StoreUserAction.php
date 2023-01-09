<?php

namespace App\Actions\Api\User;

use App\Exceptions\EmailOrPhoneExistsException;
use App\Models\User;
use App\Repositories\Position\PositionRepository;
use App\Repositories\User\UserRepository;
use App\Services\Tinypng\TinypngClient;
use Illuminate\Support\Facades\Hash;

final class StoreUserAction
{
    private UserRepository $userRepository;

    private PositionRepository $positionRepository;

    private TinypngClient $tinypngClient;

    public function __construct(
        UserRepository     $userRepository,
        PositionRepository $positionRepository,
        TinypngClient      $tinypngClient,
    )
    {
        $this->userRepository = $userRepository;
        $this->positionRepository = $positionRepository;
        $this->tinypngClient = $tinypngClient;
    }

    public function execute(StoreUserRequest $request): StoreUserResponse
    {
        $this->checkExistPhoneOrEmail(
            $request->getPhone(),
            $request->getEmail()
        );

        $user = new User();

        $user->phone = $request->getPhone();
        $user->name = $request->getName();
        $user->email = $request->getEmail();
        $user->password_hash = Hash::make($request->getPassword());

        $imagePath = $this->tinypngClient->optimizeImage($request->getImage());

        $user->photo = $imagePath;

        $position = $this->positionRepository->getById(
            $request->getPositionId()
        );


        return new StoreUserResponse(
            $this->userRepository->storeAndSyncPosition($position, $user)
        );
    }

    public function checkExistPhoneOrEmail(string $phone, string $email): bool
    {
        return $this->userRepository->findByPhoneOrEmail($phone, $email) ? throw new EmailOrPhoneExistsException() : false;
    }
}
