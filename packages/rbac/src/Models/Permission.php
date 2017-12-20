<?php

namespace LucasRBAC\Permission\Models;

// use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\PermissionRegistrar;
// use LucasRBAC\Permission\Traits\RefreshesPermissionCache;
// use Illuminate\Database\Eloquent\Relations\MorphToMany;
// use Spatie\Permission\Exceptions\PermissionDoesNotExist;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Spatie\Permission\Exceptions\PermissionAlreadyExists;
// use Spatie\Permission\Contracts\Permission as PermissionContract;

// class Permission extends Model implements PermissionContract
class Permission extends Model
{
    // use RefreshesPermissionCache;

    public $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        $attributes['guard_name'] = $attributes['guard_name'] ?? config('auth.defaults.guard');

        parent::__construct($attributes);

        $this->setTable(config('permission.table_names.permissions'));
    }

    public static function create(array $attributes = [])
    {
        $attributes['guard_name'] = $attributes['guard_name'] ?? config('auth.defaults.guard');

        if (static::getPermissions()->where('name', $attributes['name'])->where(
            'guard_name',
            $attributes['guard_name']
        )->first()
        ) {
            throw PermissionAlreadyExists::create($attributes['name'], $attributes['guard_name']);
        }

        if (app()::VERSION < '5.4') {
            return parent::create($attributes);
        }

        return static::query()->create($attributes);
    }

    /**
     * A permission can be applied to roles.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Role::class,
            'permission_role'
        );
    }

    /**
     * Find a permission by its name (and optionally guardName).
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @throws \Spatie\Permission\Exceptions\PermissionDoesNotExist
     *
     * @return \Spatie\Permission\Contracts\Permission
     */
    public static function findByName(string $name, $guardName = NULL): PermissionContract
    {
        $guardName = $guardName ?? config('auth.defaults.guard');

        $permission = static::getPermissions()->where('name', $name)->where('guard_name', $guardName)->first();

        if (!$permission) {
            throw PermissionDoesNotExist::create($name, $guardName);
        }

        return $permission;
    }

    /**
     * Get the current cached permissions.
     */
    protected static function getPermissions(): Collection
    {
        return app(PermissionRegistrar::class)->getPermissions();
    }
}
