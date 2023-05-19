<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class  AddSomeColumnsToTables extends Migration
{
    public function up()
    {
        Schema::table('fams_assets_master', function (Blueprint $table) {
            $table->decimal('annual_dep_amount', 13, 2)->default(0.00)->after('dep_percent');
            $table->integer('annual_asset_life')->unsigned()->default(0)->after('asset_life');
        });

        Schema::table('fams_assets_trans_virtuals', function (Blueprint $table) {
            $table->decimal('annual_dep_amount', 13, 2)->default(0.00)->after('dep_percent');
            $table->integer('annual_asset_life')->unsigned()->default(0)->after('asset_life');
        });

        Schema::table('fams_assets_groups', function (Blueprint $table) {
            $table->integer('annual_asset_life')->unsigned()->default(0)->after('asset_life');
        });

    }

    public function down()
    {

        Schema::table('fams_assets_master', function (Blueprint $table) {
            $table->dropColumn('annual_dep_amount');
            $table->dropColumn('annual_asset_life');
        });

        Schema::table('fams_assets_trans_virtuals', function (Blueprint $table) {
            $table->dropColumn('annual_dep_amount');
            $table->dropColumn('annual_asset_life');
        });

        Schema::table('fams_assets_groups', function (Blueprint $table) {
            $table->dropColumn('annual_asset_life');
        });

    }

}