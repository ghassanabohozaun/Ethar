<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTransVirtualsTable extends Migration
{
    public function up()
    {

        Schema::create('fams_assets_trans_virtuals', function (Blueprint $table) {
            // 26 without timestamp
            $table->increments('virtual_id');
            $table->integer('setup_id')->unsigned();
            $table->integer('trans_id')->unsigned();
            $table->integer('detail_id')->unsigned();
            $table->integer('trans_no')->unsigned();
            $table->smallInteger('detail_no')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('asset_id')->unsigned();
            $table->string('asset_desc', 100)->nullable();
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->string('manufact_name', 100)->nullable();
            $table->integer('model_id')->unsigned();
            $table->string('county_of_origin', 100)->nullable();
            $table->date('warranty_exp')->nullable();
            $table->integer('asset_life')->unsigned()->nullable();
            $table->string('dep_method', 12)->nullable();
            $table->decimal('dep_value', 13, 2)->default(0.00);
            $table->decimal('dep_percent', 13, 2)->default(0.00);
            $table->integer('first_dep_period_id')->unsigned()->default(0);
            $table->boolean('polypart_flag')->default(0);
            $table->integer('no_of_parts')->unsigned()->default(0);
            $table->integer('brand_id')->unsigned();
            $table->string('asset_spec', 800)->nullable();
            $table->integer('amend_by')->unsigned()->default(0);
            $table->integer('warranty_exp_value')->unsigned()->nullable();
            $table->string('label_id', 30)->nullable();
            $table->string('serial_no', 45)->nullable();
            $table->string('reference_code', 45)->nullable();
            $table->integer('analysis_code_id')->unsigned()->default(0);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::drop('fams_assets_trans_virtuals');
    }

}