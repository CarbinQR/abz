<?php

namespace App\Actions\Api\User;

use Illuminate\Http\UploadedFile;

final class StoreUserRequest
{
    private string $name;

    private string $password;

    private string $email;

    private string $phone;

    private int $positionId;

    private UploadedFile $image;

    public function __construct(
        string $name,
        string $password,
        string $email,
        string $phone,
        int    $positionId,
        UploadedFile $image
    )
    {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->positionId = $positionId;
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return int
     */
    public function getPositionId(): int
    {
        return $this->positionId;
    }

    /**
     * @return UploadedFile
     */
    public function getImage(): UploadedFile
    {
        return $this->image;
    }
}
