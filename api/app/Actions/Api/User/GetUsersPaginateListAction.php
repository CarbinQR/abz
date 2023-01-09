<?php

namespace App\Actions\Api\User;

use App\Repositories\User\UserRepository;

final class GetUsersPaginateListAction
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function execute(GetUsersPaginateListRequest $request): GetUsersPaginateListResponse|GetUsersOffsetPaginateListResponse
    {
        if ($request->getOffset()) {
            $offset = $request->getOffset();
            $count = $request->getCount();

            $usersListData = $this->userRepository->getOffsetPaginationList($offset, $count);

            $responseData['users'] = $usersListData['usersList'];
            $responseData['totalUsers'] = $usersListData['totalUsers'];
            $responseData['totalPages'] = round($usersListData['totalUsers'] / $count);
            $responseData['count'] = $count;
            $responseData['offset'] = $offset;
            $responseData['nextUrl'] = env('APP_URL')
                . '/api'
                . '/users'
                . '?offset=' . $offset + $count
                . '&count=' . $count;

            if (($offset - $count) > 0) {
                $responseData['prevUrl'] = env('APP_URL')
                    . '/api'
                    . '/users'
                    . '?offset=' . $offset - $count
                    . '&count=' . $count;
            } else {
                $responseData['prevUrl'] = null;
            }

            return new GetUsersOffsetPaginateListResponse($responseData);
        }

        return new GetUsersPaginateListResponse(
            $this->userRepository->getPaginationList($request->getCount())
        );
    }
}
