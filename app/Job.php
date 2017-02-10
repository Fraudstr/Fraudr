<?php

namespace Fraudr;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Concerns\ValidatesAttributes;

/**
 * @property integer  id          guarded
 * @property integer  user_id     hidden
 * @property User     user
 * @property string   title
 * @property string   description
 * @property integer  bounty
 * @property \DateTime closes_at
 * @property mixed    created_at  hidden
 * @property mixed    updated_at  hidden
 * @property mixed    deleted_at  hidden
 */
class Job extends Model
{
    use HasTimestamps, SoftDeletes, ValidatesAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'bounty', 'closes_at', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getDateFormat()
    {
        return 'Y/m/d';
    }
}
