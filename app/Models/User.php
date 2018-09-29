<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements LogsActivityInterface
{
    use LogsActivity;

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


    /*############################################################################################*/

    //   $user->AssignRole('admin'); // guard will be default
    //   $user->AssignRole('admin', 'api'); // explcitly setting the guard

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

    /*############################################################################################*/

    public function getActivityDescriptionForEvent($eventName)
    {
        $class_name = explode('\\' , get_class($this));
        $model_name = $class_name[2];

        if ($eventName == 'created')
        {
            return 'created ' . '|' . ' id => ' . $this->id . ' @ ' . $model_name;
        }

        if ($eventName == 'updated')
        {
            return 'updated ' . '|' . ' id => ' . $this->id . ' @ ' . $model_name;
        }

        if ($eventName == 'deleted')
        {
            return 'deleted ' . '|' . ' id => ' . $this->id . ' @ ' . $model_name;
        }

        return '';
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
