<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $nickname
 * @property string $slug
 * @property integer $photo_id
 * @property string $statut
 * @property string $created_at
 * @property string $updated_at
 */
class Author extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'nickname', 'slug', 'photo_id', 'statut', 'created_at', 'updated_at'];

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tracks()
    {
        return $this->hasMany('App\Models\Track');
    }

}
