<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('cost', 6, 2);
            $table->string('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('certificate')->nullable();            
            $table->string('language')->default('Português');
            $table->boolean('is_active')->default(false);
            $table->bigInteger('duration_id')->unsigned();
            $table->bigInteger('level_id')->unsigned();
            $table->foreign('duration_id')->references('id')->on('durations');
            $table->foreign('level_id')->references('id')->on('levels');
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
        Schema::dropIfExists('courses');
    }
}
