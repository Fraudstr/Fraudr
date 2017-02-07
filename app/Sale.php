<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer  id          guarded
 * @property integer  user_id     hidden
 * @property User     user
 * @property integer  credits
 * @property double   price
 * @property mixed    created_at  hidden
 * @property mixed    updated_at  hidden
 */
class Sale extends Model
{
    use HasTimestamps, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'credits'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
