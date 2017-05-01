<?php namespace Istheweb\Connect\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('istheweb_connect_contacts', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 160);
            $table->string('email', 120);
            $table->integer('company_id')->unsigned()->nullable()->index();
            $table->string('phone', 24)->nullable();
            $table->string('position', 60)->nullable();
            $table->text('address')->nullable();
            $table->string('city', 60)->nullable();
            $table->string('state', 60)->nullable();
            $table->string('country', 60)->nullable();
            $table->string('zip_code')->nullable();

            $table->string('sn_facebook', 60)->nullable();
            $table->string('sn_twitter', 60)->nullable();
            $table->string('sn_linkedin', 60)->nullable();
            $table->string('sn_gplus', 60)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('istheweb_connect_contacts');
    }
}
