<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_grades', function (Blueprint $table) {
            $table->id();
            $table->string('id_no')->nullable();
            $table->integer('class_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('english')->nullable();
            $table->integer('mathematics')->nullable();
            $table->integer('further_math')->nullable();
            $table->integer('hausa')->nullable();
            $table->integer('basic_science')->nullable();
            $table->integer('basic_tech')->nullable();
            $table->integer('social_studies')->nullable();
            $table->integer('islamic_studies')->nullable();
            $table->integer('creative_art')->nullable();
            $table->integer('arabic')->nullable();
            $table->string('term')->nullable();
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
        Schema::dropIfExists('student_grades');
    }
}
