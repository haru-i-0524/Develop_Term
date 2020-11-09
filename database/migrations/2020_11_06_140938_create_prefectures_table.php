<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrefecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefectures', function (Blueprint $table) {
            // 都道府県名テーブル
            
            $table->increments('id');
            // 八地区区分のid
            $table->integer('region_id')->unsigned();
            // 都道府県コード
            $table->integer('code');
            // 都道府県名
            $table->string('name');
            // regionテーブルのid
            $table->foreign('region_id')->references('id')->on('regions'); //外部キー制約
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prefectures');
    }
}
