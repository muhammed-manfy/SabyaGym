<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setttings', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->String('site_name');
            $table->String('phone_number');
            $table->string('email');
            $table->String('address');
            $table->String('open_days');
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
        Schema::dropIfExists('setttings');
    }
}
