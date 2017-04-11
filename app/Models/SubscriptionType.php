<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $offer
 * @property string $currency
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 */
class SubscriptionType extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'offer', 'currency', 'price', 'created_at', 'updated_at'];

}
