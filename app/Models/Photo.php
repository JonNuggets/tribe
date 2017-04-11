<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $url
 * @property string $name
 * @property string $size
 * @property string $created_at
 * @property string $updated_at
 * @property string $extension
 * @property string $dimension_height
 * @property string $dimension_width
 */
class Photo extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['url', 'name', 'size', 'created_at', 'updated_at', 'extension', 'dimension_height', 'dimension_width'];

}
