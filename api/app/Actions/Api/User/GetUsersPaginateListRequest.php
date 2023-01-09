<?php

namespace App\Actions\Api\User;

use App\Constants\User\UserConstants;

final class GetUsersPaginateListRequest
{
    private ?int $page;

    private ?int $offset;

    private ?int $count;

    public function __construct(?int $page, ?int $offset, ?int $count)
    {
        $this->page = $page;
        $this->offset = $offset;
        $this->count = $count ?: UserConstants::DEFAULT_PER_PAGE;
    }

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @return int|null
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }
}
