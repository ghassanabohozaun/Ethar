<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTypesTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_types_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('type_id');
            $table->string('locale')->index();
            $table->string('type_desc_name');
            $table->unique(['type_id', 'locale']);
            $table->foreign('type_id')->references('type_id')->on('fams_assets_types')->onDelete('cascade');
         });
    }

    public function down()
    {
        Schema::drop('fams_assets_types_translations');
    }

}