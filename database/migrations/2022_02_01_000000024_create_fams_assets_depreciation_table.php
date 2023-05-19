<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsDepreciationTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_depreciation', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->integer('asset_id')->unsigned();
            $table->integer('period_id')->unsigned();                       // new col
            $table->smallInteger('fin_year')->unsigned()->default(0);
            $table->tinyInteger('fin_period')->unsigned()->default(0);
            $table->integer('ref_trans_id')->unsigned();
            $table->integer('ref_trans_no')->unsigned();
            $table->decimal('original_value', 13, 2)->default(0.00);
            $table->decimal('additional_value', 13, 2)->default(0.00);
            $table->decimal('prev_accum_depric', 13, 2)->default(0.00);
            $table->decimal('depric_rate', 5, 2)->default(0.00);            // i think must be decimal('depric_rate', 5, 2)
            $table->decimal('depric_value', 13, 2)->default(0.00);
            $table->integer('calc_by')->unsigned()->default(0);
            $table->date('calc_date')->nullable();
            $table->boolean('posted')->default(0);
            $table->integer('posted_by')->unsigned()->default(0);
            $table->date('posting_date')->nullable();
            $table->integer('journal_id')->unsigned()->default(0);
            $table->smallInteger('finan_year')->default(0);                 // we must check this
            $table->tinyInteger('finan_period')->default(0);                // we must check this
            $table->boolean('calculate')->default(0);
            $table->decimal('book_value', 13, 2)->default(0.00);

            //$table->integer('amend_by')->unsigned()->default(0);
            //$table->timestamps();
        });

    }

    public function down()
    {
        Schema::drop('fams_assets_depreciation');
    }

}