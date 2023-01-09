<?php

namespace App\Exceptions;

use Exception;

class EmailOrPhoneExistsException extends Exception
{
    public function render()
    {
        return response()->json(
            [
                "success" => false,
                "message" => "User with this phone or email already exist"
            ],
            409
        );
    }
}
