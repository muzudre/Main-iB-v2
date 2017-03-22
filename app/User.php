<?php

namespace App;


use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use Backpack\PermissionManager\app\Models\Role;
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admin';
    
    protected $fillable = [
        'name', 'email', 'roles' ,'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
        /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isUser(){
        return ($this->hasRole()->count()) ? true : false;
    }

    public function hasRole($role)
    {
        // return in_array($this->roles, $role);
    }

}
