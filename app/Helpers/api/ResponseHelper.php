<?php

namespace App\Helpers\api;


class ResponseHelper
{
    public static function successResponse($data = null): array
    {
        return [
            'IsSuccess' => true,
            'data' => $data
        ];
    }

    public static function errorResponse($msg): array
    {
        return [
            'IsSuccess' => false,
            'message' => $msg
        ];
    }
}
