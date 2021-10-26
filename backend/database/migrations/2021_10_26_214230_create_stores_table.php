<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('出店店舗名');
            $table->text('remark')->nullable()->comment('備考');
            $table->string('period')->default('')->comment('出店期間');
            $table->text('thumbnail_url')->nullable()->comment('出店画像URL');
            $table->timestamps();
            $table->string('category')->nullable()->comment('カテゴリ');
            $table->string('prefecture');
            $table->string('city');
            $table->string('town');
            $table->string('opening_hours');
            $table->string('closing_time');
            $table->string('postalcode1');
            $table->string('postalcode2');
            $table->string('period1');
            $table->string('period2');
            $table->text('addressRemark');
            $table->string('rate')->default('0');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stores');
    }
}
