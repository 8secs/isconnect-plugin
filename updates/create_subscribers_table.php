<?php namespace Istheweb\Connect\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('istheweb_connect_subscribers', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 160);
            $table->string('email', 120);
            $table->integer('statistics')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('istheweb_connect_subscribers');
    }
}
