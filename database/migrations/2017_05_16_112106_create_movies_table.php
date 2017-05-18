<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('ファイル名（拡張子を除く）');
            $table->string('status')->default('public')->comment('ステータス');
            $table->string('title')->nullable()->comment('動画タイトル');
            $table->string('path')->comment('ファイルパス');
            $table->string('extension')->comment('拡張子');
            $table->integer('size')->default(0)->comment('動画サイズ（byte）');
            $table->integer('time')->default(0)->comment('動画時間（分）');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
