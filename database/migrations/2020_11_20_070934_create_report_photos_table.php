<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_photos', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            // 外部キー　report_id
            $table->unsignedBiginteger('report_id');
            // 外部キー制約 'reports'テーブルの'id'を'report_id'とする
            $table->foreign('report_id')->references('id')->on('reports');
            // コメント
            $table->string('img_name');
            // 写真 
            $table->string('report_path');
            
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
        Schema::dropIfExists('report_photos');
    }
}
