<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsMasterTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_master_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('asset_id');
            $table->string('locale')->index();
            $table->string('name_o');
            $table->unique(['asset_id', 'locale']);
            $table->foreign('asset_id')->references('asset_id')->on('fams_assets_master')->onDelete('cascade');
         });
    }

    public function down()
    {
        Schema::drop('fams_assets_master_translations');
    }

}