<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_locations', function (Blueprint $table) {
            $table->increments('location_id');
            $table->integer('company_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->string('description', 100)->nullable();
            $table->integer('site_id')->unsigned();
            $table->integer('building_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('division_id')->unsigned();
            $table->string('phone_no', 50)->nullable();
            $table->string('contact_person', 50)->nullable();
            $table->boolean('status')->default(0);
            $table->string('room', 10)->nullable();
            $table->string('floor', 10)->nullable();
            $table->string('block_no', 20)->nullable();
            $table->integer('cost_center_id')->unsigned()->default(0);
            $table->integer('store_id')->unsigned()->default(0);
            $table->string('xcoordination', 15)->nullable();
            $table->string('ycoordination', 15)->nullable();
            $table->string('gps', 200)->nullable();
            $table->decimal('last_trans_value', 13, 2)->default(0.00);
            $table->date('last_trans_date')->nullable();
            $table->string('last_trans_type', 100)->nullable();
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::drop('fams_locations');
    }

}