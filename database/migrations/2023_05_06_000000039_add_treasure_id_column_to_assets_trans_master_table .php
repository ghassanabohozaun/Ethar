<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  AddTreasureIdColumnToAssetsTransMasterTable extends Migration
{
    public function up()
    {
        Schema::table('fams_assets_trans_master', function (Blueprint $table) {
            $table->integer('representative_id')->unsigned()->after('sales_rep');
            $table->integer('treasure_id')->unsigned()->after('sales_rep');
        });
    }

    public function down()
    {
        Schema::table('fams_assets_trans_master', function (Blueprint $table) {
            $table->dropColumn('representative_id');
            $table->dropColumn('representative_id');
        });
    }

}