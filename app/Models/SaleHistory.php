<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer  id          guarded
 * @property integer  user_id     hidden
 * @property User     user
 * @property integer  sale_id     hidden
 * @property Sale     sale
 * @property integer  credits
 * @property mixed    created_at  hidden
 * @property mixed    updated_at  hidden
 */
class SaleHistory extends Model
{
    use HasTimestamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'credits'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
