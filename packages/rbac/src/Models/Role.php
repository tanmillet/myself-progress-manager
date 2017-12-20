<?php

namespace LucasRBAC\Permission\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use LucasRBAC\Permission\Exceptions\RoleCreateArgsDoesNotExists;
use LucasRBAC\Permission\Traits\HasPermissions;
use LucasRBAC\Permission\Exceptions\RoleDoesNotExist;
use LucasRBAC\Permission\Exceptions\GuardDoesNotMatch;
use LucasRBAC\Permission\Exceptions\RoleAlreadyExists;
use LucasRBAC\Permission\Contracts\Role as RoleContract;
use LucasRBAC\Permission\Traits\RefreshesPermissionCache;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Role
 * Author Terry Lucas
 * @package LucasRBAC\Permission\Models
 */
class Role extends Model implements RoleContract
{
    use HasPermissions;
    use RefreshesPermissionCache;

    /**
     * @author Terry Lucas
     * @var array
     */
    protected $guarded = [
        'id',
        'updated_at',
        'created_at',
    ];

    public $fillable = [
        'display_name',
        'name',
    ];

    /**
     * @author Terry Lucas
     * Role constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable('roles');
    }

    /**
     * @author Terry Lucas
     * @param array $attributes
     * @return $this|Model
     */
    public static function create(array $attributes = [])
    {
        if (!isset($attributes['display_name']) || !isset($attributes['name'])) {
            throw RoleCreateArgsDoesNotExists::create($attributes['name'], $attributes['display_name']);
        }

        if (static::where('name', $attributes['name'])->where('display_name', $attributes['display_name'])->first()) {
            throw RoleAlreadyExists::create($attributes['name'], $attributes['display_name']);
        }

        if (app()::VERSION < '5.4') {
            return parent::create($attributes);
        }


        return static::query()->create($attributes);
    }

    /**
     * A role may be given various permissions.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            Permission::class,
            'permission_role'
        );
    }

    /**
     * A role may be given various users.
     * @author Terry Lucas
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'role_user'
        );
    }

    /**
     * Find a role by its name and guard name.
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @return \LucasRBAC\Permission\Contracts\Role|\LucasRBAC\Permission\Models\Role
     *
     * @throws \LucasRBAC\Permission\Exceptions\RoleDoesNotExist
     */
    public static function findByName(string $name, $guardName = NULL): RoleContract
    {
        $guardName = $guardName ?? config('auth.defaults.guard');

        $role = static::where('name', $name)->where('display_name', $guardName)->first();

        if (!$role) {
            throw RoleDoesNotExist::create($name);
        }

        return $role;
    }
}
