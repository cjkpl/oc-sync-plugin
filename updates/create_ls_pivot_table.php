<?php namespace Cjkpl\Sync\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLsPivotTable extends Migration
{
    public function up()
    {
        Schema::create('cjkpl_sync_lessons_students', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->integer('lesson_id')->unsigned()->index();
            $table->integer('student_id')->unsigned()->index();

            $table->primary(['lesson_id','student_id']);

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('visits')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('cjkpl_sync_lessons_students');
    }
}
