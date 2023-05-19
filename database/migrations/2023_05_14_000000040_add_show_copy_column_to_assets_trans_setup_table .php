<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  AddShowCopyColumnToAssetsTransSetupTable extends Migration
{
    public function up()
    {
        Schema::table('fams_assets_trans_setup', function (Blueprint $table) {
            $table->boolean('show_copy')->default(0)->after('printing_copies');
        });
    }

    public function down()
    {
        Schema::table('fams_assets_trans_setup', function (Blueprint $table) {
            $table->dropColumn('show_copy');
        });
    }

}