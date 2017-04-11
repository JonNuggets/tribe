<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $phone
 * @property string $fcbk_id
 * @property string $fcbk_access_token
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $login_hash
 * @property boolean $active
 * @property integer $profile_id
 * @property string $created_at
 * @property string $updated_at
 * @property Rate[] $rates
 * @property StreamLog[] $streamLogs
 */
class User extends Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'lastname', 'phone', 'fcbk_id', 'fcbk_access_token', 'username', 'email', 'password', 'remember_token', 'login_hash', 'active', 'profile_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rates()
    {
        return $this->hasMany('App\Models\Rate');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function streamLogs()
    {
        return $this->hasMany('App\Models\StreamLog');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
