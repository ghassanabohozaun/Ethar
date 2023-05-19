<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsLocationsTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_locations_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('location_id');
            $table->string('locale')->index();
            $table->string('description_name');
            $table->unique(['location_id', 'locale']);
            $table->foreign('location_id')->references('location_id')->on('fams_locations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('fams_locations_translations');
    }

}