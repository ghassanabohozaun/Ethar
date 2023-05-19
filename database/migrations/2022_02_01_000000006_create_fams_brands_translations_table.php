<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsBrandsTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_brands_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('brand_id');
            $table->string('locale')->index();
            $table->string('description_name');
            $table->unique(['brand_id', 'locale']);
            $table->foreign('brand_id')->references('brand_id')->on('fams_brands')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('fams_brands_translations');
    }

}