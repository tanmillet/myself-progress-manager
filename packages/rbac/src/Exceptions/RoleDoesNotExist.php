<?php

namespace LucasRBAC\Permission\Exceptions;

use InvalidArgumentException;

class RoleDoesNotExist extends InvalidArgumentException
{
    public static function create(string $roleName)
    {
        return new static("There is no role named `{$roleName}`.");
    }
}
