<?php

namespace LucasRBAC\Permission\Exceptions;

use InvalidArgumentException;

/**
 * Class RoleAlreadyExists
 * Author Terry Lucas
 * @package LucasRBAC\Permission\Exceptions
 */
class RoleAlreadyExists extends InvalidArgumentException
{
    /**
     * @author Terry Lucas
     * @param string $roleName
     * @param string $guardName
     * @return static
     */
    public static function create(string $roleName, string $guardName)
    {
        return new static("A role `{$roleName}` already exists for guard `{$guardName}`.");
    }
}
