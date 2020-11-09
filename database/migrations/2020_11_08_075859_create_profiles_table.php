<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
             // (profile_)id
            $table->bigIncrements('id');
            // 外部キー　user_id
            $table->unsignedBiginteger('user_id')->unique();
            // 外部キー制約 'users'テーブルの'id'を'user_id'とする
            $table->foreign('user_id')->references('id')->on('users');
            // 表示名
            $table->string('displayname');
            // 性別
            $table->tinyInteger('gender');
            // 誕生日　
            $table->date('birthday');
            // 外部キー 都道府県名 ID
            $table->unsignedInteger('pref_code');
            // 自己紹介
            $table->string('introduction');
            // プロフィール画像
            $table->string('image_path')->nullable();
            
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
        Schema::dropIfExists('profiles');
    }
}
