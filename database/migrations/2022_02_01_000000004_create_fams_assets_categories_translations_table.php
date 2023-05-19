<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsCategoriesTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_categories_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('locale')->index();
            $table->string('category_desc_name');
            $table->unique(['category_id', 'locale']);
            $table->foreign('category_id')->references('category_id')->on('fams_assets_categories')->onDelete('cascade');
         });
    }

    public function down()
    {
        Schema::drop('fams_assets_categories_translations');
    }

}