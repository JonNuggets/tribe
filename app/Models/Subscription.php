<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $subscription_type_id
 * @property string $starting_date
 * @property string $ending_date
 * @property integer $current_value
 * @property string $created_at
 * @property string $updated_at
 */
class Subscription extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'subscription_type_id', 'starting_date', 'ending_date', 'current_value', 'created_at', 'updated_at'];

}
