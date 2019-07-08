<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';	
        });
        Schema::table('news', function (Blueprint $table) {
            $table->bigInteger('writer_id')->unsigned()->nullable(false);
            $table->foreign('writer_id')
                ->references('id')
                ->on('writers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}