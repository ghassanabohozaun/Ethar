<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTransJustifyCommitteeTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_trans_justify_committee', function (Blueprint $table) {
            // 13 without timestamp
            $table->increments('committee_id');
            $table->integer('company_id')->unsigned();
            $table->integer('branch_id')->unsigned()->default(0);
            $table->integer('trans_id')->unsigned()->default(0);
            $table->integer('trans_no')->unsigned()->default(0);
            $table->integer('detail_no')->unsigned()->default(0);
            $table->integer('employee_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->integer('verification_code_id')->unsigned();
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('fams_assets_trans_justify_committee');
    }

}