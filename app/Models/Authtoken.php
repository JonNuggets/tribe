<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $token
 * @property string $imei
 * @property string $expire_date
 * @property string $created_at
 * @property string $updated_at
 */
class Authtoken extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'token', 'imei', 'expire_date', 'created_at', 'updated_at'];

}
