<?php

namespace App\Exceptions;

use Exception;

class ExpiredTokenException extends Exception
{
    public function render()
    {
        return response()->json(
            [
                "success" => false,
                "message" => "The token expired."
            ],
            401
        );
    }
}
