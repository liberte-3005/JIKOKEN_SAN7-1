<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        if (!Schema::hasTable('targets')) {
            Schema::create('targets', function (Blueprint $table) {
                $table->id();
                //追加 user_idの作成
                $table->unsignedBigInteger('user_id');
                $table->text('big')->nullable();
                $table->text('middle')->nullable();
                $table->timestamps();
                //追加　user_idに外部キー制約をつけますよ。usersテーブルのidカラムを参照してそのカラムがなくなったらカスケード的に処理します。
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('targets');
    }
}
