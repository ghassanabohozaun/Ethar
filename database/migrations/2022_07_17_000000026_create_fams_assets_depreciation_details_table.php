<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsDepreciationDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_depreciation_details', function (Blueprint $table) {

            $table->increments('deprec_detail_id');
            $table->integer('deprec_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('asset_id')->unsigned();
            $table->integer('period_id')->unsigned();
            $table->integer('group_id')->unsigned()->nullable();
            $table->integer('type_id')->unsigned()->nullable();
            $table->smallInteger('fin_year')->unsigned()->default(0);
            $table->decimal('original_value', 13, 2)->default(0.00);
            $table->decimal('additional_value', 13, 2)->default(0.00);
            $table->decimal('book_value', 13, 2)->default(0.00);
            $table->decimal('prev_accum_depric', 13, 2)->default(0.00);
            $table->decimal('depric_rate', 5, 2)->default(0.00);
            $table->decimal('depric_value', 13, 2)->default(0.00);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::drop('fams_assets_depreciation_details');
    }

}