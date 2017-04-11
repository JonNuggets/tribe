<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 */
class Playlist extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'created_at', 'updated_at'];

}
