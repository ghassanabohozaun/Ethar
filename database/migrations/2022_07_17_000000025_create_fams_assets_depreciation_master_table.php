<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsDepreciationMasterTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_depreciation_master', function (Blueprint $table) {
            $table->increments('deprec_id');
            $table->integer('company_id')->unsigned();
            $table->integer('period_id')->unsigned();                       // new col
            $table->smallInteger('fin_year')->unsigned()->default(0);
            $table->integer('calc_by')->unsigned()->default(0);
            $table->date('calc_date')->nullable();
            $table->integer('journal_id')->unsigned()->default(0);
            $table->string('status')->nullable(); // O : OPEN  , C : CLOSE  // after remigrate
            $table->boolean('calculate')->default(0);
            $table->string('depreciation_calc_to', 30)->nullable();
            $table->integer('group_id')->unsigned()->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::drop('fams_assets_depreciation_master');
    }

}