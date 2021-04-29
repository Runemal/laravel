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
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', '50');
            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('name');
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', '50');
            $table->text('description')
                ->nullable(true);
            $table->string('source', '100');
            $table->dateTime('publish_date')
                ->nullable(true);
            $table->boolean('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('status');
            $table->integer('category_id')->unsigned()->default(1);
            $table->foreign('category_id')->references('id')->on('category');
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
        Schema::dropIfExists('news');
        Schema::dropIfExists('category');
        Schema::dropIfExists('status');
    }
}
