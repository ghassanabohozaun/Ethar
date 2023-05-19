<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsBuildingsTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_buildings_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('building_id');
            $table->string('locale')->index();
            $table->string('description_name');
            $table->unique(['building_id', 'locale']);
            $table->foreign('building_id')->references('building_id')->on('fams_buildings')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::drop('fams_buildings_translations');
    }

}