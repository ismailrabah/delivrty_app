<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcludeDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclude_dates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('city_time_spans_id')->unsigned()->index();
            $table->foreign('city_time_spans_id')->references('id')->on('city_time_spans')->onDelete('cascade');
            $table->date("date_from");
            $table->date("date_to");
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
        Schema::dropIfExists('exclude_dates');
    }
}
