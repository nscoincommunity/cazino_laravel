<?php

namespace jeremykenedy\LaravelRoles\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Support\Str;

trait RoleHasRelations
{
    /**
     * Role belongs to many permissions.
     *
     * @return BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(config('roles.models.permission'))->withTimestamps();
    }
	
	/**
     * Get all permissions as collection.
     *
     * @return Collection
     */
    public function getPermissions()
    {
        return (!$this->permissions) ? $this->permissions = $this->rolePermissions()->get()->merge($this->userPermissions()->get()) : $this->permissions;
    }

    /**
     * Role belongs to many users.
     *
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'))->withTimestamps();
    }

    /**
     * Attach permission to a role.
     *
     * @param int|Permission $permission
     * @return int|bool
     */
    public function attachPermission($permission)
    {
        return (!$this->permissions()->get()->contains($permission)) ? $this->permissions()->attach($permission) : true;
    }

    /**
     * Detach permission from a role.
     *
     * @param int|Permission $permission
     * @return int
     */
    public function detachPermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

    /**
     * Detach all permissions.
     *
     * @return int
     */
    public function detachAllPermissions()
    {
        return $this->permissions()->detach();
    }

    /**
     * Sync permissions for a role.
     *
     * @param array|Permission[]|Collection $permissions
     * @return array
     */
    public function syncPermissions($permissions)
    {
        return $this->permissions()->sync($permissions);
    }
	
	/**
     * Check if the role has at least one of the given permissions.
     *
     * @param int|string|array $permission
     * @return bool
     */
    public function hasOnePermission($permission)
    {
        foreach ($this->getArrayFrom($permission) as $permission) {
            if ($this->checkPermission($permission)) {
                return true;
            }
        }

        return false;
    }
	
	/**
     * Check if the user has a permission.
     *
     * @param int|string $permission
     * @return bool
     */
    public function checkPermission($permission)
    {
        return $this->getPermissions()->contains(function ($value) use ($permission) {
            return $permission == $value->id || Str::is($permission, $value->slug);
        });
    }
	
	/**
     * Get an array from argument.
     *
     * @param int|string|array $argument
     * @return array
     */
    private function getArrayFrom($argument)
    {
        return (!is_array($argument)) ? preg_split('/ ?[,|] ?/', $argument) : $argument;
    }
}
