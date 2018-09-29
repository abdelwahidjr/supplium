<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens , Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'name' ,
            'email' ,
            'password' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
        = [
            'password' ,
            'remember_token' ,
        ];


//        $user->AssignRole('admin'); // guard will be default
//        $user->AssignRole('admin', 'api'); // explcitly setting the guard

    public function AssignRole($roles , string $guard = null)
    {
        if ($guard)
        {
            $roles = is_string($roles) ? [$roles] : $roles;
            $guard = $guard ?: $this->getDefaultGuardName();

            $roles = collect($roles)->flatten()->map(function ($role) use (
                $guard
            )
            {
                return $this->GetStoredRole($role , $guard);
            })->each(function ($role)
            {
                $this->ensureModelSharesGuard($role);
            })->all();

            $this->roles()->saveMany($roles);

            $this->forgetCachedPermissions();

        }

        return $this;

    }

    protected function GetStoredRole($role , string $guard) : Role
    {
        if (is_string($role))
        {
            return app(Role::class)->findByName($role , $guard);
        }

        return $role;
    }


    public function company()
    {
        return $this->belongsToMany(Company::class)->withTimestamps();
    }

    public function setting()
    {
        return $this->hasOne(Setting::class);
    }

}
