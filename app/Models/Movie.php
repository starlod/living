<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = [
        'name',         // ファイル名（拡張子を除く）
        'status',       // ステータス
        'title',        // 動画タイトル
        'path',         // ファイルパス(storage/movies からの相対パス)
        'extension',    // 拡張子
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

    public function assetThumbnails()
    {
        return asset('storage/movies/' . $this->path);
    }

    public function assetMovie()
    {
        return asset('storage/movies/' . $this->path);
    }

    public function prev()
    {
        return self::find($this->id - 1);
    }

    public function next()
    {
        return self::find($this->id + 1);
    }

    private function onDeletedHandler()
    {
        Storage::delete('public/movies/' . $this->path);
    }
}
