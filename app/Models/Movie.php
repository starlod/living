<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

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

    protected static function boot()
    {
        parent::boot();

        self::deleted(function($model) {
            $model->onDeletedHandler();
        });
    }

    public function asset_path()
    {
        return asset('storage/' . $this->path);
    }

    private function onDeletedHandler()
    {
        Storage::delete('public/' . $this->path);
    }
}
