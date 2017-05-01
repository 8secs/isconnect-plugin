<?php namespace Istheweb\Connect\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCalendarsTable extends Migration
{
    public function up()
    {
        Schema::create('istheweb_connect_calendars', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 160);
            $table->string('color', 18)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('istheweb_connect_calendars');
    }
}
