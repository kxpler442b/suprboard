<?php

declare(strict_types = 1);

namespace App\Support\Enum;

enum AuthStatus
{
    case AUTH_FAILED;
    case AUTH_SUCCESS;
}