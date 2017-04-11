<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $track_id
 * @property integer $user_id
 * @property integer $value
 * @property string $updated_at
 * @property string $created_at
 * @property Track $track
 * @property User $user
 */
class Rate extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['track_id', 'user_id', 'value', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function track()
    {
        return $this->belongsTo('App\Models\Track');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
