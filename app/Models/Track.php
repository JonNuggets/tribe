<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $duration
 * @property integer $track_type_id
 * @property integer $author_id
 * @property integer $album_id
 * @property integer $photo_id
 * @property string $url
 * @property integer $year
 * @property integer $hits
 * @property string $statut
 * @property string $created_at
 * @property string $updated_at
 * @property Rate[] $rates
 * @property StreamLog[] $streamLogs
 */
class Track extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'slug', 'duration', 'track_type_id', 'author_id', 'album_id', 'photo_id', 'url', 'year', 'hits', 'statut', 'created_at', 'updated_at'];


    /**
     * Get the phone record associated with the user.
     */
    public function photo()
    {
        return $this->belongsTo('App\Models\Photo', 'photo_id');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function album()
    {
        return $this->belongsTo('App\Models\Album', 'album_id');
    }

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
}
