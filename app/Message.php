<?php

namespace Fraudr;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer  id          guarded
 * @property boolean  accepted
 * @property boolean  filled
 * @property integer  user_id     hidden
 * @property User     user
 * @property integer  offer_id    hidden
 * @property Offer    offer
 * @property string   filename
 * @property mixed    created_at  hidden
 * @property mixed    updated_at  hidden
 */
class Message extends Model
{
    use HasTimestamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'accepted', 'filled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
