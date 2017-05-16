<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = [
        'name',         // ファイル名
        'title',        // 動画タイトル
        'path',         // ファイルパス
        'size',         // 動画サイズ（byte）
        'time',         // 動画時間（分）
    ];

    public function asset_path()
    {
        return asset('storage/' . $this->path);
    }
}
