<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer  id          guarded
 * @property integer  user_id     hidden
 * @property User     user
 * @property integer  offer_id    hidden
 * @property Offer    offer
 * @property string   title
 * @property string   body
 * @property integer  rating
 * @property mixed    created_at  hidden
 * @property mixed    updated_at  hidden
 */
class Review extends Model
{
    use HasTimestamps, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'bounty', 'closes_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
