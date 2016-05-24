<?php namespace Siada\Sendgrid\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('siada_sendgrid_users', function($table)
        {
            Schema::dropIfExists('siada_sendgrid_users');
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siada_sendgrid_users');
    }

}
