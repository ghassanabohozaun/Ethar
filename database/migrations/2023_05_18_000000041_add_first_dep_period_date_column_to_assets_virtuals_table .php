<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class  AddFirstDepPeriodDateColumnToAssetsVirtualsTable extends Migration
{
    public function up()
    {
        Schema::table('fams_assets_master', function (Blueprint $table) {
            $table->date('first_dep_period_date')->nullable()->after('first_dep_period_id');
            $table->date('last_dep_period_date')->nullable()->after('last_dep_period_id');
        });

        Schema::table('fams_assets_trans_virtuals', function (Blueprint $table) {
            $table->date('first_dep_period_date')->nullable()->after('first_dep_period_id');
        });



    }

    public function down()
    {

        Schema::table('fams_assets_master', function (Blueprint $table) {
            $table->dropColumn('first_dep_period_date');
            $table->dropColumn('last_dep_period_date');
        });

        Schema::table('fams_assets_trans_virtuals', function (Blueprint $table) {
            $table->dropColumn('first_dep_period_date');
        });



    }

}