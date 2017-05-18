<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * ユーザー存在確認
     *
     * @param  array  $data
     * @return User
     */
    public static function isExists(array $data)
    {
        return self::where('name', $data['name'])
            ->orWhere('email', $data['email'])
            ->exists();
    }

    /**
     * ユーザー新規作成
     *
     * @param  array  $data
     * @return User
     */
    public static function add(array $data)
    {
        return self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
