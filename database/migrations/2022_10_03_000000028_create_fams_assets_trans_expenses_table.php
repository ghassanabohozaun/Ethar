<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTransExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_trans_expenses', function (Blueprint $table) {
            // 15 without timestamp
            $table->increments('trans_expense_id');
            $table->integer('expense_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('branch_id')->unsigned()->default(0);
            $table->integer('trans_id')->unsigned()->default(0);
            $table->integer('trans_no')->unsigned()->default(0);
            $table->integer('expense_row')->unsigned()->default(0);
            $table->integer('detail_no')->unsigned()->default(0);
            $table->integer('asset_id')->unsigned();
            $table->decimal('expense_value', 13, 2)->default(0.00);
            $table->decimal('capitalize_value', 13, 2)->default(0.00);
            $table->decimal('capitalize_perc', 5, 2)->default(0.00);
            $table->integer('method_id')->unsigned()->default(0);
            $table->integer('agent_id')->unsigned()->default(0);
            $table->string('remark', 200)->nullable();
            $table->string('expense_attach', 200)->nullable();
            $table->integer('expense_attach_reference')->unsigned();
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('fams_assets_trans_expenses');
    }

}