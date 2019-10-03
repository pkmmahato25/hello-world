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
            $table->String('name_thar');
            $table->String('section_class');
            $table->String('roll_no');
            $table->date('admission_date');
            $table->date('nepali_date');
            $table->date('english_date');
            $table->String('age');
            $table->String('sex');
            $table->String('student_type');
            $table->String('religion');
            $table->String('mother_tongue');
            $table->String('caste_detail');
            $table->String('father_name');
            $table->String('mother_name');
            $table->String('GrandFather_name');
            $table->String('Guradian_name');
            $table->String('zone');
            $table->String('village_town');
            $table->String('district');
            $table->String('ward');
            $table->String('temporary_address');
            $table->String('contact_number');
            $table->String('remarks');
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
