<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    public $timestamps = true;

    
    public function following()
    {
        return $this->belongsToMany(
            self::class,
            'follows',
            'follower_id',
            'following_id'
        );
    }

   
    public function followers()
    {
        return $this->belongsToMany(
            self::class,
            'follows',
            'following_id',
            'follower_id'
        );
    }
}
