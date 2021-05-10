<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment_specializations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('completion'); //tentar usar nas views {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}
            $table->double('grade', 3, 2);
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
        Schema::dropIfExists('enrollment_specializations');
    }
}
