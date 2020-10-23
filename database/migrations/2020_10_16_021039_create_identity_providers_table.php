<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentityProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identity_providers', function (Blueprint $table) {
            
            
            $table->unsignedBigInteger('user_id');
            // 外部キー制約 'users'テーブルの'id'を'user_id'とする
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('provider_id');
            $table->string('provider_name');
            // 複合キー
            $table->primary(['provider_name', 'provider_id']);
            // ユニーク制限
            $table->unique(['user_id', 'provider_name']);
            
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
        Schema::dropIfExists('identity_providers');
    }
}
