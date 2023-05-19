<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTransMasterTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_trans_master', function (Blueprint $table) {
            // 44 without timestamp
            $table->increments('trans_id');
            $table->integer('setup_id')->unsigned();
            $table->integer('trans_no')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('division_id')->unsigned();
            $table->date('trans_date')->nullable();
            $table->string('trans_ref', 30)->nullable();
            $table->string('status', 1)->nullable(); // N : NEW  , P : POST , A : APPROVE  //<======== status
            $table->string('from_dist', 10)->nullable();
            $table->integer('from_id')->unsigned()->default(0);
            $table->integer('from_sub_id')->unsigned()->default(0);
            $table->string('to_dist', 10)->nullable();
            $table->integer('to_id')->unsigned()->default(0);
            $table->integer('to_sub_id')->unsigned()->default(0);
            $table->integer('contract_id')->unsigned()->default(0);
            $table->string('sales_rep', 10)->nullable();
            $table->string('trans_remark', 300)->nullable();
            $table->decimal('trans_total', 13, 2)->default(0.00);
            $table->decimal('trans_net', 13, 2)->default(0.00);
            $table->decimal('discount_perc', 5, 2)->default(0.00); //<======== percentage
            $table->decimal('discount_amount', 13, 2)->default(0.00);
            $table->decimal('vat_total', 13, 2)->default(0.00);
            $table->decimal('trans_due', 13, 2)->default(0.00);
            $table->decimal('trans_due_fc', 13, 2)->default(0);
            $table->decimal('trans_paid', 13, 2)->default(0.00);
            $table->decimal('trans_paid_fc', 13, 2)->default(0);
            $table->integer('currency_id')->default(0);
            $table->boolean('show_base_currency')->default(0);
            $table->decimal('rate', 24, 12)->default(0);
            $table->decimal('trans_cost', 20, 8)->default(0); //<======== cost
            $table->decimal('discount_trans_perc', 5, 2)->default(0.00); //<======== percentage
            $table->decimal('discount_trans', 13, 2)->default(0.00);
            $table->string('payment_type', 2)->nullable();
            $table->string('payment_method', 2)->nullable();
            $table->string('payment_methods', 300)->nullable();
            $table->integer('validity_days')->nullable();
            $table->string('delivery_period', 100)->nullable();
            $table->text('general_condition');
            $table->string('trans_dep_ref', 300)->nullable();
            $table->integer('trans_file_ref')->unsigned();
            $table->string('trans_dep', 1000)->nullable();
            $table->tinyInteger('trans_detail_count')->default(0);
            $table->decimal('trans_qty', 13, 2)->default(0);
            $table->decimal('trans_used_qty', 13, 2)->default(0);
            $table->boolean('gl_journal_status')->default(0);
            $table->integer('gl_journal_id')->default(0);
            $table->integer('gl_period_id')->default(0);
            $table->smallInteger('gl_fin_year')->nullable();
            $table->smallInteger('gl_fin_period')->nullable();
            $table->integer('gl_trans_no')->default(0);
            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::drop('fams_assets_trans_master');
    }

}