<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer  id          guarded
 * @property string   title
 * @property string   description
 * @property integer  bounty
 * @property mixed    closes_at
 * @property mixed    deleted_at  hidden
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
