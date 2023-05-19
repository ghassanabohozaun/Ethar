<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTypesTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_types', function (Blueprint $table)
        {
            $table->increments('type_id');
            $table->integer('company_id')->unsigned();
            $table->string('type_desc' , 100)->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('locked')->default(0);
            $table->integer('amend_by')->unsigned()->default(0);

            // updates 14-8-2022
            $table->string('type_code', 40)->nullable();

            $table->timestamps();
         });

    }

    public function down()
    {
        Schema::drop('fams_assets_types');
    }

}