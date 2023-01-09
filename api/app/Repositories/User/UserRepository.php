<?php

namespace App\Repositories\User;

use App\Models\Position;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository
{
    public function storeAndSyncPosition(Position $position, User $user): User
    {
        $position->users()->save($user);

        return $user;
    }

    public function findByPhoneOrEmail(string $phone, string $email): ?User
    {
        return User::where('phone', $phone)->orWhere('email', $email)->first();
    }

    public function getPaginationList(int $count): LengthAwarePaginator
    {
        return User::orderBy('id', 'desc')->paginate($count);
    }

    public function getOffsetPaginationList(int $offset, int $count): array
    {
        return [
            'totalUsers' => User::select("id")->count(),
            'usersList' => User::skip($offset)->take($count)->orderBy('id', 'desc')->get()
        ];
    }

    public function getById(int $userId): ?User
    {
        return User::find($userId);
    }
}
