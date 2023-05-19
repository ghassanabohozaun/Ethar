<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsDisposeSaleReasonsTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_dispose_sale_reasons_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reason_id');
            $table->string('locale')->index();
            $table->string('description_name');
            $table->unique(['reason_id', 'locale']);
            $table->foreign('reason_id')->references('reason_id')->on('fams_dispose_sale_reasons')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('fams_dispose_sale_reasons_translations');
    }

}