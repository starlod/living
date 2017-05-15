<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    public $timestamps = false;
    protected $table = 'login_histories';

    protected $fillable = [
        'user_id',              // ユーザーID
        'status',               // ステータス
        'login_at',             // ログイン日時
        'agent',                // エージェント
        'ip',                   // IP
        'errors',               // エラー
        'country_name',         // 国名
        'country_code',         // 国コード
    ];
}
