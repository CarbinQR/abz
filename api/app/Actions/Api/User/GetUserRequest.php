<?php

namespace App\Actions\Api\User;

use App\Constants\User\UserConstants;

final class GetUserRequest
{
    private int $uid;

    public function __construct(int $uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return int|null
     */
    public function getUid(): int
    {
        return $this->uid;
    }
}
