<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsGroupsTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_groups_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('group_id');
            $table->string('locale')->index();
            $table->string('description_name');
            $table->unique(['group_id', 'locale']);
            $table->foreign('group_id')->references('group_id')->on('fams_assets_groups')->onDelete('cascade');
         });
    }

    public function down()
    {
        Schema::drop('fams_assets_groups_translations');
    }

}