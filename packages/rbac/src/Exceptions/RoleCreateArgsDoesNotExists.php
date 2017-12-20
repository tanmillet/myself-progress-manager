<?php

namespace LucasRBAC\Permission\Exceptions;

use InvalidArgumentException;

/**
 * Class RoleCreateArgsDoesNotExists
 * Author Terry Lucas
 * @package LucasRBAC\Permission\Exceptions
 */
class RoleCreateArgsDoesNotExists extends InvalidArgumentException
{
    /**
     * @author Terry Lucas
     * @param string $roleName
     * @param string $guardName
     * @return static
     */
    public static function create(string $roleName, string $roleGuardName)
    {
        $errorMsg = isset($roleName) ? '' : 'A role [name] is not empty';
        $errorMsg .= isset($roleGuardName) ? '.' : ', A role [display_name] is not empty.';
        return new static($errorMsg);
    }
}
