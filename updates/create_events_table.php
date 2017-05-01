<?php namespace Istheweb\Connect\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('istheweb_connect_events', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 80);
            $table->integer('calendar_id')->unsigned()->nullable()->index();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->text('description')->nullable();
            $table->string('organizer')->nullable();
            $table->string('address')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('istheweb_connect_events');
    }
}
