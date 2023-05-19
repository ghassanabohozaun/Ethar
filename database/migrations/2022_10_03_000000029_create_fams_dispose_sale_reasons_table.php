<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsDisposeSaleReasonsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_dispose_sale_reasons', function (Blueprint $table) {
            // 6 without timestamp
            $table->increments('reason_id');
            $table->integer('company_id')->unsigned();
            $table->string('description', 100)->nullable();
            $table->boolean('status')->default(0);
            $table->string('use_for')->nullable(); // A- all  D- dispose S-sale
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('fams_dispose_sale_reasons');
    }

}