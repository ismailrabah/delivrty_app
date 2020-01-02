<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityTimeSpansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_time_spans', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cities_id')->unsigned();
            $table->foreign('cities_id')->references('id')->on('cities')->onDelete('CASCADE');
            $table->bigInteger('time_spans_id')->unsigned()->index();
            $table->foreign('time_spans_id')->references('id')->on('time_spans')->onDelete('cascade');
            $table->boolean("active");
            $table->timestamps();
            // $table->primary(['cities_id', 'time_spans_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_time_spans');
    }
}
