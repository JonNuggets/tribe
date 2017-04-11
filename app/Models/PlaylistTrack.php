<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $track_id
 * @property integer $playlist_id
 * @property string $created_at
 * @property string $updated_at
 */
class PlaylistTrack extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['track_id', 'playlist_id', 'created_at', 'updated_at'];

}
