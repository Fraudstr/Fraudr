<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer  id          guarded
 * @property integer  user_id     hidden
 * @property User     user
 * @property integer  job_id    hidden
 * @property Job      job
 * @property mixed    created_at  hidden
 * @property mixed    updated_at  hidden
 * @property mixed    deleted_at  hidden
 */
class Offer extends Model
{
    use HasTimestamps, SoftDeletes;

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
