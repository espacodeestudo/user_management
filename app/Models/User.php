<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'phone',
    'address',
    'gender',
    'birth_date',
    'nationality',
    'password',
    'role'
];


    protected $hidden = ['password'];

    public $timestamps = true;
}
