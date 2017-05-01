<?php namespace Istheweb\Connect\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateInboxesTable extends Migration
{
    public function up()
    {
        Schema::create('istheweb_connect_inboxes', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 160);
            $table->string('email', 120);
            $table->string('phone', 24)->nullable();
            $table->string('subject', 60)->nullable();
            $table->string('company', 60)->nullable();
            $table->text('message')->nullable();
            $table->smallInteger('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('istheweb_connect_inboxes');
    }
}
