<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsBrandsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_brands', function (Blueprint $table)
        {
            $table->increments('brand_id');
            $table->integer('company_id')->unsigned();
            $table->string('description' , 100)->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('locked')->default(0);
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
         });
    }

    public function down()
    {
        Schema::drop('fams_brands');
    }

}