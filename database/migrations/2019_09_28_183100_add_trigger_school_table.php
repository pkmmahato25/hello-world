<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix="SCH";
        DB::unprepared('
        CREATE DEFINER = CURRENT_USER TRIGGER `unique_school_request_codes_after_insert` 
        BEFORE INSERT ON `schools`
        FOR EACH ROW 
        BEGIN 
        declare ready int default 0; 
        declare rnd_str text; 
        if(new.school_code is null or new.school_code="") then
           while not ready do 
            set rnd_str := concat("RCB",lpad(conv(floor(rand()*pow(36,8)), 10, 36), 8, 0)); 
            if not exists (select * from schools where school_code = rnd_str) then 
              set new.school_code = rnd_str; 
              set ready := 1; 
            end if; 
           end while; 
        end if; 
      END
');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
