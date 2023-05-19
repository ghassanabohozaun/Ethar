<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsAssetsTransFilesTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_trans_files', function (Blueprint $table) {
            // 9 without timestamp
            $table->increments('file_id');
            $table->integer('company_id')->unsigned();
            $table->string('model_name', 200);
            $table->integer('model_id')->unsigned(); // trans_id previously
            $table->integer('admin_id')->unsigned();
            $table->integer('file_ref')->unsigned()->default(0);
            $table->string('file_name', 191);
            $table->string('file_path', 191)->nullable();
            $table->string('file_type', 10)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('fams_assets_trans_files');
    }

}