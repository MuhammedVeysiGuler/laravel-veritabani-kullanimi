<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{

    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->string('slug')->unique();
            $table->text('img_path')->nullable();
            $table->boolean('is_deleted')->default(0)->comment('If 0 -> not deleted, if 1 -> deleted');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('news');
    }
}
