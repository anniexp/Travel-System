<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name');            
            $table->String('date');
            $table->String('duration');
            $table->unsignedBigInteger('organisator_id');
            $table->foreign('organisator_id')->references('id')->on('Organisators');            
            $table->unsignedBigInteger('typeOfTransport_id');
            $table->foreign('typeOfTransport_id')->references('id')->on('type_of_transports');
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
            Schema::table('Holiday', function (Blueprint $table) {
            $table->dropForeign('Holiday_organisator_id_foreign');
            $table->dropColumn('organisator_id');
            $table->dropForeign('Holiday_typeOfTransport_id_foreign');
            $table->dropColumn('typeoftransport_id');
                    });

    }   
}
