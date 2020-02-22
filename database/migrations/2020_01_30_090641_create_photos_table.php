<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id')->unsigned()->index();
            $table->string('image_path')->nullable();
            $table->string('comment');
            $table->integer('user_id')->nullable();
            $table->timestamps();
            
            // 外部キー設定
            $table->foreign('cat_id')->references('id')->on('cats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
