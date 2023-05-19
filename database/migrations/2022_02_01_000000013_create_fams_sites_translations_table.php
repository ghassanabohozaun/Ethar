<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsSitesTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_sites_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('site_id');
            $table->string('locale')->index();
            $table->string('description_name');
            $table->unique(['site_id', 'locale']);
            $table->foreign('site_id')->references('site_id')->on('fams_sites')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('fams_sites_translations');
    }

}