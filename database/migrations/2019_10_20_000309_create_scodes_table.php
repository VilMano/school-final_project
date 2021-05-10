<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->boolean('is_active')->default(true);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('specialization_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('specialization_id')->references('id')->on('specializations');
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
        Schema::dropIfExists('scodes');
    }
}
