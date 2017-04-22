<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property integer $year
 * @property integer $author_id
 * @property integer $photo_id
 * @property boolean $published
 * @property string $statut
 * @property string $created_at
 * @property string $updated_at
 */
class Album extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'slug', 'year', 'author_id', 'photo_id', 'published', 'statut', 'created_at', 'updated_at'];

    /**
     * Get the phone record associated with the user.
     */
    public function photo()
    {
        return $this->belongsTo('App\Models\Photo', 'photo_id');
    }

}
