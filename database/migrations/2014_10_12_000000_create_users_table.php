<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            // Primarykey
            $table->bigIncrements('id');
            
            // ユーザー名
            $table->string('name');
            
            // メールアドレス 重複 ×,　null ○,
            $table->string('email')->unique()->nullable();
            
            // パスワード null ○,
            $table->string('password')->nullable();
            
            // 自動ログイン用トークン
            $table->rememberToken();
            
            // 作成日時、更新日時
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
        Schema::dropIfExists('users');
    }
}
