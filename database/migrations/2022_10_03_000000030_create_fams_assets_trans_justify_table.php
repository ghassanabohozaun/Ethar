<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTransJustifyTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_trans_justify', function (Blueprint $table) {
            // 13 without timestamp
            $table->increments('justify_id');
            $table->integer('company_id')->unsigned();
            $table->integer('trans_id')->unsigned()->default(0);
            $table->integer('branch_id')->unsigned()->default(0);
            $table->integer('trans_no')->unsigned()->default(0);
            $table->integer('detail_id')->unsigned();
            $table->integer('detail_no')->unsigned();
            $table->integer('asset_id')->unsigned();
            $table->integer('reason_id')->unsigned()->default(0);
            $table->text('justification')->nullable();
            $table->text('remarks')->nullable();
            $table->date('committee_meet_date');
            $table->time('committee_meet_time');
            $table->text('attachments')->nullable();
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('fams_assets_trans_justify');
    }

}