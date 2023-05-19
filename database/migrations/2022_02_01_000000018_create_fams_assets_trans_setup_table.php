<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Amwal\FAMS\Models\FamsAssetsTransSetup;

class CreateFamsAssetsTransSetupTable extends Migration
{
    public function up()
    {
        Schema::create('fams_assets_trans_setup', function (Blueprint $table) {
            // 72 without timestamp
            $table->increments('setup_id');
            $table->string('code', 20);
            $table->integer('company_id')->unsigned();
            $table->string('category', 10)->nullable();
            $table->string('description', 100)->nullable();
            $table->string('short_description', 50)->nullable();
            $table->string('trans_no_formula', 50)->nullable();
            $table->tinyInteger('trans_no_length')->default(0);
            $table->tinyInteger('display_seq')->nullable();
            $table->string('from_dist', 10)->nullable();
            $table->string('to_dist', 10)->nullable();
            $table->string('trans_icon', 100)->nullable();
            $table->boolean('show_general_condition')->default(0);
            $table->text('default_general_condition');
            $table->boolean('show_price')->default(0);      //price
            $table->tinyInteger('price_type')->nullable();  //price
            $table->boolean('cost_effect')->default(0);     //effect
            $table->boolean('fin_effect')->default(0);      //effect
            $table->boolean('qty_effect')->default(0);      //effect
            $table->boolean('show_vir_asset_code')->default(0);
            // updates 24-8-2022
            $table->boolean('show_vir_general')->default(0);
            $table->boolean('show_vir_model')->default(0);
            $table->boolean('show_vir_consumption_and_warranty')->default(0);
            $table->boolean('show_vir_label_serial_reference')->default(0);
            // update 8-11-2022
            $table->boolean('enable_update_asset_specifications')->default(0);
            $table->boolean('show_act_asset_code')->default(0);
            $table->boolean('req_vir_asset_code')->default(0);
            $table->boolean('req_act_asset_code')->default(0);
            $table->boolean('req_vir_asset_detail')->default(0);
            $table->boolean('conv_vasset_to_actual')->default(0);
            $table->boolean('dep_on_trans')->default(0);
            $table->boolean('dependency_type')->default(0);
            $table->integer('dep_trans_id')->unsigned()->default(0);
            $table->boolean('auto_print')->default(0);
            $table->string('master_dw', 100)->nullable();
            $table->string('detailed_dw', 100)->nullable();
            $table->string('print_form', 100)->nullable();
            $table->string('finan_trans_code', 100)->nullable();
            $table->boolean('show_transport_info')->default(0);
            $table->boolean('show_expe_info')->default(0);
            $table->boolean('show_rep_code')->default(0);
            $table->boolean('reference_no_required')->default(0);
            $table->boolean('dlv_date_required')->default(0);
            $table->boolean('required_posting')->default(0);
            $table->boolean('allow_exceed_dep_qty')->default(0);
            $table->string('trans_rem', 200)->nullable();
            $table->tinyInteger('max_approval_level')->nullable();
            $table->tinyInteger('printing_copies')->nullable();

            $table->boolean('allow_duplicated_items')->default(0);
            $table->boolean('edit_item_description')->default(0);
            ////////////////////////////////////////////////////////////
            /// change from product to asset
            $table->boolean('show_asset_total_due')->default(0);
            $table->boolean('show_asset_net')->default(0);
            $table->boolean('show_asset_total')->default(0);
            $table->boolean('show_asset_vat')->default(0);
            $table->boolean('show_asset_vat_perc')->default(0);
            $table->boolean('show_asset_discount_amount')->default(0);
            $table->boolean('show_asset_discount_perc')->default(0);
            $table->boolean('show_asset_discount_total')->default(0);
            $table->boolean('show_asset_discount_trans')->default(0);
            $table->boolean('show_asset_discount_trans_perc')->default(0);
            //////////////////////////////////////////////////////////////
            $table->boolean('item_discount_in_detail_window')->default(0);
            $table->boolean('update_item_discount')->default(0);
            $table->boolean('remember_item_discount')->default(0);
            $table->boolean('allow_files_system')->default(0);
            $table->boolean('show_files_reference')->default(0);
            $table->boolean('allow_files_upload')->default(0);
            $table->boolean('allow_files_download')->default(0);
            $table->boolean('show_export')->default(0);
            $table->boolean('show_import')->default(0);
            $table->boolean('import_file')->default(0);
            $table->boolean('show_manual_ref')->default(0);
            $table->boolean('show_quot_date')->default(0);
            $table->boolean('show_category')->default(0);
            $table->boolean('change_qty')->default(0);
            $table->boolean('change_price')->default(0);
            // updates 14-8-2022
            $table->boolean('allow_zero_price')->default(0);

            // updates 30-8-2022
            $table->boolean('show_department')->default(0);
            $table->boolean('show_section')->default(0);

            // updates 28-3-2023
            $table->boolean('required_department')->default(0);
            $table->boolean('required_section')->default(0);

            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('amend_by')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('fams_assets_trans_setup');
    }

}