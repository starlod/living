<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0)->comment('ユーザーID');
            $table->string('status')->default(0)->comment('ステータス');
            $table->dateTime('login_at')->comment('ログイン日時');
            $table->string('agent')->comment('エージェント');
            $table->string('ip')->comment('IP');
            $table->text('errors')->nullable()->comment('エラー');
            $table->string('country_name')->nullable()->comment('国名');
            $table->string('country_code')->nullable()->comment('国コード');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_histories');
    }
}
