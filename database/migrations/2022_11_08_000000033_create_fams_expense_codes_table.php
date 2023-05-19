<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamsExpenseCodesTable extends Migration
{
    public function up()
    {
        Schema::create('fams_expense_codes', function (Blueprint $table) {
            // 6 without timestamp
            $table->smallIncrements('expense_id');
            $table->integer('company_id')->unsigned();
            $table->string('description', 200);
            $table->smallInteger('method_id')->unsigned();
            $table->integer('account_id')->unsigned()->default(0);
            $table->boolean('locked')->default(0);
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('fams_expense_codes');
    }

}


