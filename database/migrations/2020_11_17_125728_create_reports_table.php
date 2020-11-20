<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            // (report_)id
            $table->bigIncrements('id');
            // user_id
            $table->unsignedBiginteger('user_id');
            // usersテーブルのidをuser_idとする
            $table->foreign('user_id')->references('id')->on('users');
            // shop_name
            $table->string('shop_name');
            // postal_code
            $table->string('postal_code')->nullable();
            // pref_codeとprefecture
            $table->unsignedInteger('pref_code');
            $table->string('prefecture');
            // city
            $table->string('city');
            // address 番地以下
            $table->string('address')->nullable();
            // TEL
            $table->string('tel')->nullable();
            // URL
            $table->text('url')->nullable();
            // title
            $table->string('title');
            // body
            $table->string('body');
            
            $table->timestamps();
            // delete_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
