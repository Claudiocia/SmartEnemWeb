<?php

namespace SmartEnem\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use SmartEnem\Notifications\DefaultResetPassowrdNotification;

class User extends Authenticatable implements TableInterface
{
    use Notifiable;

    const ROLE_ADMIN=1;
    const ROLE_CLIENT=2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'smartphone', 'regid', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function passwordGenerate($password = null)
    {
        $random = Str::random(8);
        return !$password ? bcrypt($random) : bcrypt($password);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new DefaultResetPassowrdNotification($token));
    }

    public function getTableHeaders()
    {
        return ['Id', 'Nome', 'Email', 'Tel'];
    }

    public function getValueForHeader($header)
    {
       switch ($header){
           case 'Id':
               return $this->id;
           case 'Nome':
               return $this->name;
           case 'Email':
               return $this->email;
           case 'Tel':
               return $this->smartphone;
       }
    }
}
