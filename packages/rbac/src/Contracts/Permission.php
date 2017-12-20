<?php

namespace LucasRBAC\Permission\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Author Terry Lucas
 * Interface Permission
 * @package LucasRBAC\Permission\Contracts
 */
interface Permission
{
    /**
     * @author Terry Lucas
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany;

    /**
     * @author Terry Lucas
     * @param string $name
     * @param $guardName
     * @return Permission
     */
    public static function findByName(string $name, $guardName): Permission;
}
