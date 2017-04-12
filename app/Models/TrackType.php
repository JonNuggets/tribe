<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 */
class TrackType extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'slug', 'created_at', 'updated_at'];

}
