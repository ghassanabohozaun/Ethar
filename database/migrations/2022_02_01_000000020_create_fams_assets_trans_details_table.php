<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTransDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_trans_details', function (Blueprint $table) {
            // 39 without timestamp
            $table->increments('detail_id');
            $table->integer('setup_id')->unsigned();
            $table->integer('trans_id')->unsigned();
            $table->integer('trans_no')->unsigned();
            $table->smallInteger('detail_no')->unsigned(); // to link trans details with virtual
            $table->integer('company_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('asset_id')->unsigned();
            $table->integer('trans_row')->unsigned();
            $table->string('status', 1)->nullable(); // N : NEW  , P : POST , A : APPROVE
            $table->string('squ_code', 10)->nullable();
            $table->string('serial_no', 30)->nullable();
            $table->integer('uom')->unsigned()->nullable();
            $table->decimal('qty', 13, 2)->default(0.00);
            $table->decimal('unit_price', 13, 2)->default(0.00);
            $table->decimal('unit_price_fc', 13, 2)->default(0.00);
            $table->decimal('asset_total', 13, 2)->default(0.00);
            $table->decimal('asset_net', 13, 2)->default(0.00);
            $table->decimal('discount_perc', 5, 2)->default(0.00);
            $table->decimal('discount_amount', 13, 2)->default(0.00);
            $table->decimal('discount_trans_perc', 5, 2)->default(0.00);
            $table->decimal('discount_trans', 13, 2)->default(0.00);
            $table->decimal('add_value', 13, 2)->default(0.00);
            $table->decimal('cost_price', 13, 2)->default(0.00);
            $table->decimal('min_sale_price', 13, 2)->default(0.00);
            $table->decimal('contract_perc', 5, 2)->default(0.00);
            $table->decimal('exceeded_total', 13, 2)->default(0.00);
            $table->integer('dep_detail_id')->unsigned()->nullable();
            $table->decimal('dep_qty', 13, 2)->default(0.00);
            $table->integer('dep_uom')->unsigned()->nullable();
            $table->integer('dep_trans_id')->unsigned()->nullable();
            $table->integer('dep_trans_no')->unsigned()->nullable();
            $table->string('dep_hosp', 10)->nullable();
            $table->integer('dep_branch')->unsigned()->nullable();
            $table->integer('dep_trans_row')->unsigned()->nullable(); // dep_asset_id
            $table->decimal('used_qty', 13, 2)->default(0.00);
            $table->decimal('vat_perc', 5, 2)->default(0.00);
            $table->decimal('vat_value', 13, 2)->default(0.00);
            $table->boolean('vat_flag')->default(0);
            $table->string('remark', 300)->nullable();
            $table->text('description');
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('fams_assets_trans_details');
    }

}