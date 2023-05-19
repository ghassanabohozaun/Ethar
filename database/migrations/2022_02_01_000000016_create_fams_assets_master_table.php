<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsMasterTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_master', function (Blueprint $table) {
            // 49 columns without asset_desc_o
            $table->increments('asset_id');
            $table->integer('company_id')->unsigned();
            $table->string('name', 100)->nullable();
            $table->string('asset_desc', 100)->nullable();
            $table->string('asset_code', 40)->nullable();
            $table->string('short_desc', 40)->nullable();
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->string('asset_spec', 800)->nullable();
            $table->date('purch_date')->nullable();
            $table->char('barcode_no', 30)->nullable();
            $table->integer('supplier_id')->unsigned()->default(0);
            $table->string('purch_inv_no', 15)->nullable();
            $table->string('serial_no', 45)->nullable();
            $table->string('reference_code', 30)->nullable();
            $table->string('manufact_name', 100)->nullable();
            $table->integer('model_id')->unsigned();
            $table->string('county_of_origin', 100)->nullable();
            $table->date('warranty_exp_date')->nullable();
            $table->string('remarks', 160)->nullable();
            $table->string('status')->nullable(); // A : active  , S : sold  , D :disposed , I : inactive
            $table->integer('asset_life')->unsigned()->nullable();
            $table->decimal('original_value', 13, 2)->default(0.00);
            $table->decimal('total_additions', 13, 2)->default(0.00);
            $table->decimal('salvage_value', 13, 2)->default(0.00);
            $table->decimal('market_value', 13, 2)->default(0.00);
            $table->decimal('books_value', 13, 2)->default(0.00);
            $table->string('dep_method', 12)->nullable();
            $table->decimal('dep_value', 13, 2)->default(0.00);
            $table->decimal('dep_percent', 5, 2)->default(0.00);
            $table->decimal('actual_value', 13, 2)->default(0.00);
            $table->decimal('accum_depric', 13, 2)->default(0.00);
            $table->integer('first_dep_period_id')->unsigned()->default(0); // new col
            $table->smallInteger('first_dep_fin_year')->default(0);
            $table->tinyInteger('first_dep_fin_period')->default(0);
            $table->decimal('accu_dep',13, 2)->default(0.00);
            $table->integer('last_dep_period_id')->unsigned()->default(0);  // new col
            $table->smallInteger('last_dep_fin_year')->default(0);
            $table->tinyInteger('last_dep_fin_period')->default(0);
            $table->integer('account_id')->unsigned()->default(0);   // remove
            $table->integer('analysis_code_id')->unsigned()->default(0);
            $table->string('label_type', 30)->nullable();
            $table->string('label_id', 30)->nullable();
            $table->decimal('last_trans_value', 13, 2)->default(0.00);
            $table->date('last_trans_date')->nullable();
            $table->string('last_trans_type', 100)->nullable();
            $table->integer('stop_ref_trans_id')->unsigned()->default(0);
            $table->integer('stop_ref_trans_no')->unsigned()->default(0);
            $table->integer('amend_by')->unsigned()->default(0);
            $table->boolean('virtual_asset_flag')->default(0);
            $table->boolean('polypart_flag')->default(0);
            $table->integer('no_of_parts')->unsigned()->default(0);
            $table->string('maint_contract_no', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('fams_assets_master');
    }

}