<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTransSetupTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_trans_setup_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('setup_id');
            $table->string('locale')->index();
            $table->string('description_name');
            $table->string('short_description_name');
            $table->unique(['setup_id', 'locale']);
            $table->foreign('setup_id')->references('setup_id')->on('fams_assets_trans_setup')->onDelete('cascade');
         });
    }

    public function down()
    {
        Schema::drop('fams_assets_trans_setup_translations');
    }

}