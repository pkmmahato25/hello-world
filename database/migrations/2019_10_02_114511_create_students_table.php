<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->String('id_number');
            $table->date('effective_from');
            $table->String('name');
            $table->String('thar');
            $table->integer('section_id')->unsigned()->nullable();
            // $table->foreign('section_id')->references('id')->on('section');
            $table->integer('class_id')->unsigned()->nullable();
            // $table->foreign('class_id')->references('id')->on('class');
            $table->integer('school_id')->unsigned()->nullable();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->String('roll_no');
            $table->date('admission_date');
            $table->date('nepali_date');
            $table->date('english_date');
            $table->integer('age')->unsigned()->nullable();
            $table->integer('sex')->unsigned()->nullable();
            $table->integer('student_type')->unsigned()->nullable();
            $table->integer('religion')->unsigned()->nullable();
            $table->integer('mother_tongue')->unsigned()->nullable();
            $table->String('caste_detail')->nullable();
            $table->String('father_name');
            $table->String('mother_name');
            $table->String('grandfather_name')->nullable();
            $table->String('guradian_name')->nullable();
            $table->String('zone')->nullable();
            $table->String('village_town');
            $table->String('district');
            $table->String('ward');
            $table->String('temporary_address')->nullable();
            $table->bigInteger('contact_number')->unsigned()->nullable();
            $table->String('remarks')->nullable();
            $table->string('image')->default('student.png');
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
        Schema::dropIfExists('students');
    }
}
