<?php namespace Siada\Deals\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDealsTable extends Migration
{

    public function up()
    {
        Schema::create('siada_deals_deals', function($table)
        {
            Schema::dropIfExists('siada_deals_deals');
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->text('address');
            $table->text('text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siada_deals_deals');
    }

}
