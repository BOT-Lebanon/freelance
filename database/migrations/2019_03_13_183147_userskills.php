<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Userskills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('userskills', function(Blueprint $table)
        {
            $table->increments('userskillId');
            $table->integer('resourceId');
            $table->string('resourceValue');
            $table->string('resourceType');
            $table->string('resourceAttribute');
            $table->integer('userId');
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
        //
        Schema::dropIfExists('userskills');
    }
}
