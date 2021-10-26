<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id()->comment('レビューID');
            $table->bigInteger('user_id')->unsigned()->default(0)->index('reviews_user_id_foreign')->comment('ユーザーID');
            $table->bigInteger('store_id')->unsigned()->default(0)->comment('店舗ID');
            $table->text('comment')->comment('コメント');
            $table->integer('rate')->default(0)->comment('レビュー評価');
            $table->timestamps();
            $table->string('title')->default('')->comment('レビュータイトル');
            $table->string('thumbnail_url')->default('')->comment('画像');
            $table->string('user_name');
            $table->string('reviewDt');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reviews');
    }
}
