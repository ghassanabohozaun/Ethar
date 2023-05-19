<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTransVirtualsTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_trans_virtuals_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('virtual_id');
            $table->string('locale')->index();
            $table->string('asset_desc_name');
            $table->unique(['virtual_id', 'locale']);
            $table->foreign('virtual_id')->references('virtual_id')->on('fams_assets_trans_virtuals')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::drop('fams_assets_trans_virtuals_translations');
    }

}