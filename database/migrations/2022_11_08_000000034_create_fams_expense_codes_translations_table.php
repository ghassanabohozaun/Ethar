<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsExpenseCodesTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('fams_expense_codes_translations', function (Blueprint $table) {
            // 6 without timestamp
            $table->increments('id');
            $table->unsignedSmallInteger('expense_id');
            $table->string('locale')->index();
            $table->string('description_o', 200);
            $table->unique(['expense_id', 'locale']);
            $table->foreign('expense_id')->references('expense_id')->on('fams_expense_codes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('fams_expense_codes_translations');
    }

}


