<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateFamsUpdateBalanceTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $insertTrigger = <<<SQL
            CREATE TRIGGER trig_fams_trans_update_balance
            BEFORE UPDATE ON fams_assets_trans_master
            FOR EACH ROW
            BEGIN
                DECLARE finEffect int(1);

                SELECT `fin_effect` INTO finEffect FROM `fams_assets_trans_setup` WHERE `setup_id` = NEW.setup_id;

                /* update balance when post */
                IF finEffect = 1 AND (OLD.status != 'P' AND NEW.status = 'P') THEN 
                    /* update credit balance */
                    IF NEW.from_dist = 'CS' THEN
                        UPDATE `org_clients` 
                        SET 
                            `curr_bal_credit` = COALESCE(`curr_bal_credit`, 0) + NEW.trans_due, 
                            `curr_bal_credit_fc` = COALESCE(`curr_bal_credit_fc`, 0) + NEW.trans_due_fc
                        WHERE `client_id` = NEW.from_id;
                        /* update sub client */
                        IF COALESCE(NEW.from_sub_id,0) > 0 THEN
                            UPDATE `org_sub_clients` 
                            SET 
                                `curr_bal_credit` = COALESCE(`curr_bal_credit`, 0) + NEW.trans_due, 
                                `curr_bal_credit_fc` = COALESCE(`curr_bal_credit_fc`, 0) + NEW.trans_due_fc
                            WHERE `sub_client_id` = NEW.from_sub_id;
                        END IF;
                    END IF;
                    IF NEW.from_dist = 'SP' THEN
                        UPDATE `org_suppliers` 
                        SET 
                            `curr_bal_credit` = COALESCE(`curr_bal_credit`, 0) + NEW.trans_due, 
                            `curr_bal_credit_fc` = COALESCE(`curr_bal_credit_fc`, 0) + NEW.trans_due_fc
                        WHERE `supplier_id` = NEW.from_id;
                    END IF;

                    /* update debit balance */
                    IF NEW.to_dist = 'CS' THEN
                        UPDATE `org_clients` 
                        SET 
                            `curr_bal_debit` = COALESCE(`curr_bal_debit`, 0) + NEW.trans_due, 
                            `curr_bal_debit_fc` = COALESCE(`curr_bal_debit_fc`, 0) + NEW.trans_due_fc
                        WHERE `client_id` = NEW.to_id;
                        /* update sub client */
                        IF COALESCE(NEW.to_sub_id,0) > 0 THEN
                            UPDATE `org_sub_clients` 
                            SET 
                                `curr_bal_debit` = COALESCE(`curr_bal_debit`, 0) + NEW.trans_due, 
                                `curr_bal_debit_fc` = COALESCE(`curr_bal_debit_fc`, 0) + NEW.trans_due_fc
                            WHERE `sub_client_id` = NEW.to_sub_id;
                        END IF;
                    END IF;
                    IF NEW.to_dist = 'SP' THEN
                        UPDATE `org_suppliers` 
                        SET 
                            `curr_bal_debit` = COALESCE(`curr_bal_debit`, 0) + NEW.trans_due, 
                            `curr_bal_debit_fc` = COALESCE(`curr_bal_debit_fc`, 0) + NEW.trans_due_fc
                        WHERE `supplier_id` = NEW.to_id;
                    END IF;
                END IF;

                /* update balance when unpost */
                IF finEffect = 1 AND (OLD.status = 'P' AND NEW.status != 'P') THEN 
                    /* update credit balance */
                    IF NEW.from_dist = 'CS' THEN
                        UPDATE `org_clients` 
                        SET 
                            `curr_bal_credit` = COALESCE(`curr_bal_credit`, 0) - NEW.trans_due, 
                            `curr_bal_credit_fc` = COALESCE(`curr_bal_credit_fc`, 0) - NEW.trans_due_fc
                        WHERE `client_id` = NEW.from_id;
                        /* update sub client */
                        IF COALESCE(NEW.from_sub_id,0) > 0 THEN
                            UPDATE `org_sub_clients` 
                            SET 
                                `curr_bal_credit` = COALESCE(`curr_bal_credit`, 0) - NEW.trans_due, 
                                `curr_bal_credit_fc` = COALESCE(`curr_bal_credit_fc`, 0) - NEW.trans_due_fc
                            WHERE `sub_client_id` = NEW.from_sub_id;
                        END IF;
                    END IF;
                    IF NEW.from_dist = 'SP' THEN
                        UPDATE `org_suppliers` 
                        SET 
                            `curr_bal_credit` = COALESCE(`curr_bal_credit`, 0) - NEW.trans_due, 
                            `curr_bal_credit_fc` = COALESCE(`curr_bal_credit_fc`, 0) - NEW.trans_due_fc
                        WHERE `supplier_id` = NEW.from_id;
                    END IF;

                    /* update debit balance */
                    IF NEW.to_dist = 'CS' THEN
                        UPDATE `org_clients` 
                        SET 
                            `curr_bal_debit` = COALESCE(`curr_bal_debit`, 0) - NEW.trans_due, 
                            `curr_bal_debit_fc` = COALESCE(`curr_bal_debit_fc`, 0) - NEW.trans_due_fc
                        WHERE `client_id` = NEW.to_id;
                        /* update sub client */
                        IF COALESCE(NEW.to_sub_id,0) > 0 THEN
                            UPDATE `org_sub_clients` 
                            SET 
                                `curr_bal_debit` = COALESCE(`curr_bal_debit`, 0) - NEW.trans_due, 
                                `curr_bal_debit_fc` = COALESCE(`curr_bal_debit_fc`, 0) - NEW.trans_due_fc
                            WHERE `sub_client_id` = NEW.to_sub_id;
                        END IF;
                    END IF;
                    IF NEW.to_dist = 'SP' THEN
                        UPDATE `org_suppliers` 
                        SET 
                            `curr_bal_debit` = COALESCE(`curr_bal_debit`, 0) - NEW.trans_due, 
                            `curr_bal_debit_fc` = COALESCE(`curr_bal_debit_fc`, 0) - NEW.trans_due_fc
                        WHERE `supplier_id` = NEW.to_id;
                    END IF;
                END IF;                
            END;
SQL;

        DB::unprepared($insertTrigger);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trig_fams_trans_update_balance;');
    }
}
