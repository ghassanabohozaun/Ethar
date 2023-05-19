<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_groups', function (Blueprint $table) {
            $table->increments('group_id');
            $table->integer('company_id')->unsigned();
            $table->string('description', 100)->nullable();
            $table->integer('purchase_account_id')->unsigned()->default(0);
            $table->integer('sales_account_id')->unsigned()->default(0);
            $table->integer('depreciation_account_id')->unsigned()->default(0);
            $table->integer('dispose_account_id')->unsigned()->default(0);
            $table->integer('accum_depreciation_account_id')->unsigned()->default(0);
            $table->integer('addition_account_id')->unsigned()->default(0);
            $table->integer('analysis_code_id')->unsigned()->default(0);
            $table->string('assets_code_prefix', 30)->nullable();
            $table->boolean('status')->default(0);
            $table->integer('amend_by')->unsigned()->default(0);
            $table->integer('virtual_asset_id')->unsigned();
            $table->integer('asset_life')->unsigned()->nullable();
            $table->decimal('dep_percent', 5, 2)->default(0.00);
            $table->string('label_type', 30)->nullable();
            $table->string('group_code', 40)->nullable();
            $table->string('dep_method', 12)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('fams_assets_groups');
    }

}