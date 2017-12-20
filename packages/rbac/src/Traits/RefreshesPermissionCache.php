<?php

namespace LucasRBAC\Permission\Traits;

use LucasRBAC\Permission\PermissionRegistrar;

trait RefreshesPermissionCache
{
    public static function bootRefreshesPermissionCache()
    {
        static::saved(function () {
            app(PermissionRegistrar::class)->forgetCachedPermissions();
        });

        //static self
        static::deleted(function () {
            app(PermissionRegistrar::class)->forgetCachedPermissions();
        });
    }
}
