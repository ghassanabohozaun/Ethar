<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsModelsTable extends Migration
{

    public function up()
    {
        Schema::create('fams_models', function (Blueprint $table)
        {
            $table->increments('model_id');
            $table->integer('company_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->string('description' , 100)->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('locked')->default(0);
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
         });
    }

    public function down()
    {
        Schema::drop('fams_models');
    }

}