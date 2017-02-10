<?php

namespace Fraudr;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer  id          guarded
 * @property string   nickname
 * @property string   email
 * @property string   password
 * @property integer  credits
 * @property string   remember_token hidden
 * @property mixed    created_at  hidden
 * @property mixed    updated_at  hidden
 */
class User extends Authenticatable
{
    use Notifiable, HasTimestamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'credits'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function getAvatar()
    {
        return app('avatar')->create($this->name)->toBase64();
    }
}
