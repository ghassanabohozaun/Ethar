<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateGlIntegrationTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $insertTrigger = <<<SQL
            CREATE TRIGGER trig_fams_trans_gl_integration
            BEFORE UPDATE ON fams_assets_trans_master
            FOR EACH ROW
            fams_trans_gl_integration:BEGIN
                DECLARE done INT DEFAULT FALSE;
                DECLARE finEffect int(1);
                DECLARE qtyEffect int(1);
                DECLARE trnsCategory varchar(2);
                DECLARE trnsDesc varchar(100) CHARACTER SET utf8;
                DECLARE periodId int(10);
                DECLARE finYear int(4);
                DECLARE finPeriod int(2);
                DECLARE maxJournalNo bigint(20);
                DECLARE maxJournalAnnualNo bigint(20);
                DECLARE lastJournalId int(10);
                DECLARE journalPostFlag tinyint(1);
                DECLARE integId int(10);
                DECLARE bookId int(10);
                DECLARE defRemark varchar(200) CHARACTER SET utf8;
                DECLARE rowNo int(11);
                /* trans var */
                DECLARE companyId int(10);
                DECLARE companyCostCenterId int(10);
                DECLARE branchId int(10);
                DECLARE branchCostCenterId int(10);
                DECLARE setupId int(10);
                DECLARE transId int(10);
                DECLARE transNo int(11);
                DECLARE transDate datetime;
                DECLARE amendBy int(10);
                DECLARE createdBy int(10);
                DECLARE transTotal decimal(15,2);
                DECLARE discountAmount decimal(15,2);
                DECLARE discountTrans decimal(15,2);
                DECLARE transNet decimal(15,2);
                DECLARE transDue decimal(15,2);
                DECLARE transCost decimal(15,2);
                DECLARE transRemark varchar(300) CHARACTER SET utf8;
                DECLARE expensesTotal decimal(15,2);
                DECLARE transVat decimal(15,2);
                DECLARE paymentType varchar(10);
                DECLARE fromDist varchar(10);
                DECLARE fromId int(10);
                DECLARE fromName varchar(200) CHARACTER SET utf8;
                DECLARE fromAccountId int(10);
                DECLARE fromCostCenterId int(10);
                DECLARE fromAnalysisCodeId int(10);
                DECLARE toDist varchar(10);
                DECLARE toId int(10);
                DECLARE toName varchar(200) CHARACTER SET utf8;
                DECLARE toAccountId int(10);
                DECLARE toCostCenterId int(10);
                DECLARE toAnalysisCodeId int(10);

                /* integration detail var */
                DECLARE intAccountType varchar(10);
                DECLARE intAccountId int(10);
                DECLARE intAccountCode varchar(50);
                DECLARE intCostCenterType varchar(10);
                DECLARE intCostCenterId int(10);
                DECLARE intCostCenterCode varchar(50);
                DECLARE intAnalysisCodeType varchar(10);
                DECLARE intAnalysisCodeId int(10);
                DECLARE intAnalysisCode varchar(50);
                DECLARE intDebitSource varchar(2);
                DECLARE intCreditSource varchar(2);
                DECLARE intPercent decimal(5,2);
                DECLARE intDetRemark varchar(200) CHARACTER SET utf8;
                /* insert vars */
                DECLARE accountId int(10);
                DECLARE accountCode varchar(50);
                DECLARE costCenterId int(10);
                DECLARE costCenterCode varchar(50);
                DECLARE analysisCodeId int(10);
                DECLARE analysisCode varchar(50);
                DECLARE debitAmount decimal(15,2);
                DECLARE creditAmount decimal(15,2);
                DECLARE totalDebitAmount decimal(15,2);
                DECLARE totalCreditAmount decimal(15,2);
                DECLARE detailsCount int(2);
                DECLARE detTypes varchar(50);
                DECLARE detSource varchar(50);
                DECLARE detRemark varchar(200) CHARACTER SET utf8;
                /* trns details vars */
                DECLARE detailRow int(10);
                DECLARE detailAssetId int(10);

                DECLARE detailAssetName varchar(200) CHARACTER SET utf8;
                DECLARE detailAssetAnalysisCodeId int(10);
                DECLARE detailAssetGroupId int(10);
                DECLARE detailAssetGroupName varchar(200) CHARACTER SET utf8;
                DECLARE detailAssetGroupPurchasesAccountId int(10);
                DECLARE detailAssetGroupSalesAccountId int(10);
                DECLARE detailAssetGroupDepreciationAccountId int(10);
                DECLARE detailAssetGroupDisposalAccountId int(10);
                DECLARE detailAssetGroupAccumulatedAccountId int(10);
                DECLARE detailAssetGroupAdditionAccountId int(10);
                DECLARE detailBookValue decimal(13,2);
                DECLARE detailQty decimal(13,2);
                DECLARE detailTotal decimal(15,2);
                DECLARE detailNet decimal(15,2);
                DECLARE detailExpenses decimal(8,2);
                DECLARE detailDiscountAmount decimal(15,2);
                DECLARE detailDiscountTrns decimal(15,2);
                DECLARE detailCost decimal(15,2);
                DECLARE detailVat decimal(15,2);
                DECLARE detailAddValue decimal(13,2);
                /* expenses details */
                DECLARE expValue decimal(8,2);
                DECLARE expCapitalizeValue decimal(8,2);
                DECLARE expRemark varchar(200) CHARACTER SET utf8;
                DECLARE trigError CONDITION FOR SQLSTATE 'HY000';

                DECLARE trnsDetails CURSOR FOR SELECT `asset_id`, `qty`, `asset_total`, `asset_net`, `discount_amount`, `discount_trans`, `cost_price`, `add_value`, `vat_value`, `trans_row` FROM `fams_assets_trans_details`  WHERE `trans_id` = transId;
                /*DECLARE expTrans CURSOR FOR SELECT `fams_trns_expenses_master`.`expense_value`, `fams_trns_expenses_master`.`remark`, `ms_expenses`.`account_id` FROM `fams_trns_expenses_master` LEFT JOIN `ms_expenses` ON `fams_trns_expenses_master`.`expense_id` = `ms_expenses`.`expense_id` WHERE `fams_trns_expenses_master`.`company_id` = companyId AND `fams_trns_expenses_master`.`branch_id` = branchId AND `fams_trns_expenses_master`.`trans_id` = transId;*/
                /*DECLARE expDetails CURSOR FOR SELECT `fams_trns_expenses_detail`.`expense_value`, `fams_trns_expenses_detail`.`remark`, `ms_expenses`.`account_id` FROM `fams_trns_expenses_detail` LEFT JOIN `ms_expenses` ON `fams_trns_expenses_detail`.`expense_id` = `ms_expenses`.`expense_id` WHERE `fams_trns_expenses_detail`.`company_id` = companyId AND `fams_trns_expenses_detail`.`branch_id` = branchId AND `fams_trns_expenses_detail`.`trans_id` = transId AND `fams_trns_expenses_detail`.`detail_row` = detailRow;*/
                DECLARE addExpDetails CURSOR FOR SELECT `fams_assets_trans_expenses`.`expense_value`, `fams_assets_trans_expenses`.`capitalize_value`, `fams_assets_trans_expenses`.`remark`, `fams_expense_codes`.`account_id` FROM `fams_assets_trans_expenses` LEFT JOIN `fams_expense_codes` ON `fams_assets_trans_expenses`.`expense_id` = `fams_expense_codes`.`expense_id` WHERE `fams_assets_trans_expenses`.`company_id` = companyId AND `fams_assets_trans_expenses`.`branch_id` = branchId AND `fams_assets_trans_expenses`.`trans_id` = transId AND `fams_assets_trans_expenses`.`detail_no` = detailRow;
                DECLARE intDetails CURSOR FOR SELECT `account_type`, `account_id`, `account_code`, `cost_center_type`, `cost_center_id`, `cost_center_code`, `analysis_code_type`, `analysis_code_id`, `analysis_code`, `debit_source`, `credit_source`, `percent`, `remark` FROM `gl_integ_details` WHERE `integ_id` = integId;
                DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

                IF (COALESCE(OLD.gl_journal_status, 0) = 0 AND COALESCE(NEW.gl_journal_status, 0) = 1) THEN

                    SET companyId = OLD.company_id;
                    SET branchId = OLD.branch_id;
                    SET setupId = OLD.setup_id;
                    SET transId = OLD.trans_id;
                    SET transNo = OLD.trans_no;
                    SET transDate = OLD.trans_date;
                    SET fromDist = OLD.from_dist;
                    SET fromId = OLD.from_id;
                    SET toDist = OLD.to_dist;
                    SET toId = OLD.to_id;
                    SET transTotal = OLD.trans_total;
                    SET discountAmount = OLD.discount_amount;
                    SET discountTrans = OLD.discount_trans;
                    SET transNet = OLD.trans_net;
                    SET transDue = OLD.trans_due;
                    SET transCost = OLD.trans_cost;
                    SET transRemark = OLD.trans_remark;
                    /*SET expensesTotal = OLD.expenses_total;*/
                    SET transVat = OLD.vat_total;
                    SET paymentType = OLD.payment_type;
                    SET amendBy = OLD.amend_by;
                    SET createdBy = OLD.created_by;

                    SELECT `fin_effect`, `qty_effect`, 'FA', `description` INTO finEffect, qtyEffect, trnsCategory, trnsDesc FROM `fams_assets_trans_setup` WHERE `setup_id` = setupId;

                    IF finEffect = 1 OR qtyEffect = 1 THEN
                        SELECT COALESCE(`period_id`, 0), `fin_year`, `fin_period` INTO periodId, finYear, finPeriod FROM `gl_financial_periods` WHERE DATE(gstart_date) <= DATE(transDate) AND DATE(gend_date) >= DATE(transDate) LIMIT 1;

                        IF periodId > 0 THEN
                            SET detailsCount = 0;
                            SELECT COALESCE(`integ_id`, 0), `book_id`, `defult_remark` INTO integId, bookId, defRemark FROM `gl_integ_master` WHERE `company_id` = companyId AND `module` = trnsCategory AND `transaction_id` = setupId AND `payment_type` = paymentType LIMIT 1;

                            IF integId > 0 THEN SELECT COUNT(*) INTO detailsCount FROM `gl_integ_details` WHERE `integ_id` = integId; END IF;

                            IF detailsCount > 0 THEN
                                SELECT `cost_center_id` INTO companyCostCenterId FROM `org_companies` WHERE company_id = companyId;
                                SELECT `cost_center_id` INTO branchCostCenterId FROM `org_company_branches` WHERE branch_id = branchId;

                                IF COALESCE(fromId,0) > 0 THEN 
                                    IF     fromDist = 'CS' THEN SELECT `name`, `account_id`, 0, `analysis_code_id` INTO fromName, fromAccountId, fromCostCenterId, fromAnalysisCodeId FROM `org_clients` WHERE `client_id` = fromId;
                                    ELSEIF fromDist = 'SP' THEN SELECT `name`, `account_id`, 0, `analysis_code_id` INTO fromName, fromAccountId, fromCostCenterId, fromAnalysisCodeId FROM `org_suppliers` WHERE `supplier_id` = fromId;
                                    ELSEIF fromDist = 'LC' THEN SELECT `description`, 0, `cost_center_id`, 0   INTO fromName, fromAccountId, fromCostCenterId, fromAnalysisCodeId FROM `fams_locations` WHERE `location_id` = fromId;
                                    END IF;
                                END IF;

                                IF COALESCE(toId,0) > 0 THEN 
                                    IF     toDist = 'CS' THEN SELECT `name`, `account_id`, 0, `analysis_code_id` INTO toName, toAccountId, toCostCenterId, toAnalysisCodeId FROM `org_clients` WHERE `client_id` = toId;
                                    ELSEIF toDist = 'SP' THEN SELECT `name`, `account_id`, 0, `analysis_code_id` INTO toName, toAccountId, toCostCenterId, toAnalysisCodeId FROM `org_suppliers` WHERE `supplier_id` = toId;
                                    ELSEIF toDist = 'LC' THEN SELECT `description`, 0, `cost_center_id`, 0   INTO toName, toAccountId, toCostCenterId, toAnalysisCodeId FROM `fams_locations` WHERE `location_id` = toId;
                                    END IF;
                                END IF;

                                SET companyCostCenterId = COALESCE(companyCostCenterId, 0);
                                SET branchCostCenterId = COALESCE(branchCostCenterId, 0);
                                SET fromName = COALESCE(fromName, '');
                                SET fromAccountId = COALESCE(fromAccountId, 0);
                                SET fromCostCenterId = COALESCE(fromCostCenterId, 0);
                                SET fromAnalysisCodeId = COALESCE(fromAnalysisCodeId, 0);
                                SET toName = COALESCE(toName, '');
                                SET toAccountId = COALESCE(toAccountId, 0);
                                SET toCostCenterId = COALESCE(toCostCenterId, 0);
                                SET toAnalysisCodeId = COALESCE(toAnalysisCodeId, 0);
                                SET defRemark = REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(defRemark, '{trnsDesc}', trnsDesc), '{transNo}', transNo), '{transDate}', transDate), '{transRemark}', transRemark), '{transId}', transId), '{fromName}', fromName), '{toName}', toName), '{transNet}', transNet);
                                SET totalDebitAmount = 0;
                                SET totalCreditAmount = 0;
                                SET rowNo = 0;
                                SET lastJournalId = 0;

                                IF COALESCE(OLD.gl_journal_id,0) > 0 THEN
                                    IF OLD.gl_period_id = periodId THEN
                                        SELECT `journal_id`, `trns_no`, `annual_no`, `post_flag` INTO lastJournalId, maxJournalNo, maxJournalAnnualNo, journalPostFlag FROM `gl_journals` WHERE `journal_id` = OLD.gl_journal_id;
                                    ELSE
                                        SELECT `journal_id`, `trns_no`, `annual_no`, `post_flag` INTO lastJournalId, maxJournalNo, maxJournalAnnualNo, journalPostFlag 
                                        FROM `gl_journals` 
                                        WHERE `ref_trns_module` = trnsCategory AND `ref_trns_id` = transId AND `period_id` = periodId
                                        LIMIT 1;
                                    END IF;

                                    IF COALESCE(lastJournalId, 0) > 0 THEN
                                        IF COALESCE(journalPostFlag, 0) = 1 THEN LEAVE fams_trans_gl_integration; END IF;

                                        UPDATE `gl_journals` SET 
                                        `branch_id` = branchId, 
                                        `trns_date` = DATE(transDate), 
                                        `book_id` = bookId, 
                                        `remark` = defRemark, 
                                        `amend_by` = amendBy, 
                                        `ref_setup_id` = setupId, 
                                        `ref_trns_id` = transId, 
                                        `ref_trns_no` = transNo, 
                                        `ref_trns_module` = trnsCategory, 
                                        `updated_at` = NOW() 
                                        WHERE `journal_id` = lastJournalId;
                                    END IF;
                                END IF;

                                IF COALESCE(lastJournalId,0) = 0 THEN 
                                    SELECT COALESCE(MAX(`trns_no`), 0) INTO maxJournalNo FROM `gl_journals` WHERE `period_id` = periodId;
                                    SELECT COALESCE(MAX(`annual_no`), 0) INTO maxJournalAnnualNo FROM `gl_journals` WHERE `fin_year` = finYear;
                                    SET maxJournalNo = maxJournalNo+1;
                                    SET maxJournalAnnualNo = maxJournalAnnualNo+1;

                                    INSERT INTO `gl_journals`
                                    (`company_id`, `branch_id`, `trns_no`, `trns_date`, `annual_no`, `period_id`, `fin_year`, `fin_period`, `book_id`, `remark`, `auto_journal`, `ref_setup_id`, `ref_trns_id`,`ref_trns_no`, `ref_trns_module`, `amend_by`, `created_by`, `created_at`, `updated_at`)
                                    VALUES
                                    (companyId, branchId, maxJournalNo, DATE(transDate), maxJournalAnnualNo, periodId, finYear, finPeriod, bookId, defRemark, 1, setupId, transId, transNo, trnsCategory, amendBy, createdBy, NOW(), NOW());

                                    SELECT LAST_INSERT_ID() INTO lastJournalId;
                                END IF;

                                /*OPEN integration details;*/
                                SET done = FALSE;
                                OPEN intDetails;
                                    read_loop: LOOP
                                        FETCH intDetails INTO intAccountType, intAccountId, intAccountCode, intCostCenterType, intCostCenterId, intCostCenterCode, intAnalysisCodeType, intAnalysisCodeId, intAnalysisCode, intDebitSource, intCreditSource, intPercent, intDetRemark;

                                        IF done THEN LEAVE read_loop; END IF;

                                        SET detTypes = CONCAT(intAccountType, ',', intCostCenterType, ',', intAnalysisCodeType);
                                        SET detSource = CONCAT(intDebitSource, ',', intCreditSource);

                                        IF (FIND_IN_SET('ASSET', detTypes) > 0 OR FIND_IN_SET('GPURCH', detTypes) > 0 OR FIND_IN_SET('GSALES', detTypes) > 0 OR FIND_IN_SET('GDEPRIC', detTypes) > 0 OR FIND_IN_SET('GDESPOSE', detTypes) > 0 OR FIND_IN_SET('GACCUM', detTypes) > 0 OR FIND_IN_SET('GADD', detTypes) > 0 OR FIND_IN_SET('AEXPENSE', detTypes) > 0) THEN
                                            OPEN trnsDetails;
                                                details_loop: LOOP
                                                    FETCH trnsDetails INTO detailAssetId, detailQty, detailTotal, detailNet, detailDiscountAmount, detailDiscountTrns, detailCost, detailAddValue, detailVat, detailRow;

                                                    IF done THEN LEAVE details_loop; END IF;

                                                    /* set asset data */
                                                    SELECT `name`, `analysis_code_id`, `group_id`, `books_value` INTO detailAssetName, detailAssetAnalysisCodeId, detailAssetGroupId, detailBookValue FROM `fams_assets_master` WHERE `asset_id` = detailAssetId;

                                                    IF COALESCE(detailAssetGroupId, 0) > 0 THEN
                                                        SELECT `description`, `purchase_account_id`, `sales_account_id`, `depreciation_account_id`, `dispose_account_id`, `accum_depreciation_account_id`, `addition_account_id`
                                                        INTO detailAssetGroupName, detailAssetGroupPurchasesAccountId, detailAssetGroupSalesAccountId, detailAssetGroupDepreciationAccountId, detailAssetGroupDisposalAccountId, detailAssetGroupAccumulatedAccountId, detailAssetGroupAdditionAccountId 
                                                        FROM `fams_assets_groups` 
                                                        WHERE `group_id` = detailAssetGroupId;
                                                    END IF;

                                                    SET detailAssetName = COALESCE(detailAssetName, '');
                                                    SET detailAssetAnalysisCodeId = COALESCE(detailAssetAnalysisCodeId, 0);
                                                    SET detailAssetGroupName = COALESCE(detailAssetGroupName, '');
                                                    SET detailAssetGroupPurchasesAccountId = COALESCE(detailAssetGroupPurchasesAccountId, 0);
                                                    SET detailAssetGroupSalesAccountId = COALESCE(detailAssetGroupSalesAccountId, 0);
                                                    SET detailAssetGroupDepreciationAccountId = COALESCE(detailAssetGroupDepreciationAccountId, 0);
                                                    SET detailAssetGroupDisposalAccountId = COALESCE(detailAssetGroupDisposalAccountId, 0);
                                                    SET detailAssetGroupAccumulatedAccountId = COALESCE(detailAssetGroupAccumulatedAccountId, 0);
                                                    SET detailAssetGroupAdditionAccountId = COALESCE(detailAssetGroupAdditionAccountId, 0);

                                                    /* start processing details */
                                                    SET debitAmount = 0;
                                                    SET creditAmount = 0;
                                                    SET accountId = 0;
                                                    SET accountCode = '';
                                                    SET costCenterId = 0;
                                                    SET costCenterCode = '';
                                                    SET analysisCodeId = 0;
                                                    SET analysisCode = '';
                                                    SET detRemark = '';

                                                    /* find account data */
                                                    IF intAccountType = 'FIX' THEN
                                                        SET accountId = intAccountId;
                                                        SET accountCode = intAccountCode;
                                                    ELSE
                                                        IF intAccountType = 'FROM' THEN SET accountId = fromAccountId;
                                                        ELSEIF intAccountType = 'TO' THEN SET accountId = toAccountId;
                                                        ELSEIF intAccountType = 'GPURCH' THEN SET accountId = detailAssetGroupPurchasesAccountId;
                                                        ELSEIF intAccountType = 'GSALES' THEN SET accountId = detailAssetGroupSalesAccountId;
                                                        ELSEIF intAccountType = 'GDEPRIC' THEN SET accountId = detailAssetGroupDepreciationAccountId;
                                                        ELSEIF intAccountType = 'GDESPOSE' THEN SET accountId = detailAssetGroupDisposalAccountId;
                                                        ELSEIF intAccountType = 'GACCUM' THEN SET accountId = detailAssetGroupAccumulatedAccountId;
                                                        ELSEIF intAccountType = 'GADD' THEN SET accountId = detailAssetGroupAdditionAccountId;
                                                        END IF;

                                                        IF COALESCE(accountId, 0) > 0 THEN
                                                            SELECT `account_code` INTO accountCode FROM `gl_chart_of_account` WHERE `account_id` = accountId;
                                                        END IF;
                                                    END IF;

                                                    /* find cost center data */
                                                    IF intCostCenterType = 'FIX' THEN
                                                        SET costCenterId = intCostCenterId;
                                                        SET costCenterCode = intCostCenterCode;
                                                    ELSE
                                                        IF intCostCenterType = 'FROM' THEN SET costCenterId = fromCostCenterId;
                                                        ELSEIF intCostCenterType = 'TO' THEN SET costCenterId = toCostCenterId;
                                                        ELSEIF intCostCenterType = 'COMPANY' THEN SET costCenterId = companyCostCenterId;
                                                        ELSEIF intCostCenterType = 'BRANCH' THEN SET costCenterId = branchCostCenterId;
                                                        END IF;

                                                        IF COALESCE(costCenterId, 0) > 0 THEN
                                                            SELECT `cost_center_code` INTO costCenterCode FROM `gl_chart_of_cost_center` WHERE `cost_center_id` = costCenterId;
                                                        END IF;
                                                    END IF;

                                                    /* find analysis code data */
                                                    IF intAnalysisCodeType = 'FIX' THEN
                                                        SET analysisCodeId = intAnalysisCodeId;
                                                        SET analysisCode = intAnalysisCode;
                                                    ELSE
                                                        IF intAnalysisCodeType = 'FROM' THEN SET analysisCodeId = fromAnalysisCodeId;
                                                        ELSEIF intAnalysisCodeType = 'TO' THEN SET analysisCodeId = toAnalysisCodeId;
                                                        ELSEIF intCostCenterType = 'ASSET' THEN SET analysisCodeId = detailAssetAnalysisCodeId;
                                                        END IF;

                                                        IF COALESCE(analysisCodeId, 0) > 0 THEN
                                                            SELECT `analysis_code` INTO analysisCode FROM `gl_analysis_codes` WHERE `analysis_code_id` = analysisCodeId;
                                                        END IF;
                                                    END IF;

                                                    /* find debit and credit amount */
                                                    IF     intDebitSource = 'TO' THEN SET debitAmount = detailTotal;
                                                    ELSEIF intDebitSource = 'DI' THEN SET debitAmount = detailDiscountAmount+detailDiscountTrns;
                                                    ELSEIF intDebitSource = 'NT' THEN SET debitAmount = detailNet;
                                                    ELSEIF intDebitSource = 'VT' THEN SET debitAmount = detailVat;
                                                    ELSEIF intDebitSource = 'DU' THEN SET debitAmount = detailNet+detailVat;
                                                    ELSEIF intDebitSource = 'CO' THEN SET debitAmount = detailCost*detailQty;
                                                    ELSEIF intDebitSource = 'BK' THEN SET debitAmount = detailBookValue;
                                                    ELSEIF intDebitSource = 'PR' THEN SET debitAmount = detailNet-detailBookValue;
                                                    ELSEIF intDebitSource = 'AC' THEN SET debitAmount = detailAddValue;
                                                    /*ELSEIF intDebitSource = 'EX' THEN SET debitAmount = detailExpenses;
                                                    ELSEIF intDebitSource = 'NX' THEN SET debitAmount = detailNet+detailExpenses;*/
                                                    END IF;

                                                    IF     intCreditSource = 'TO' THEN SET creditAmount = detailTotal;
                                                    ELSEIF intCreditSource = 'DI' THEN SET creditAmount = detailDiscountAmount+detailDiscountTrns;
                                                    ELSEIF intCreditSource = 'NT' THEN SET creditAmount = detailNet;
                                                    ELSEIF intCreditSource = 'VT' THEN SET creditAmount = detailVat;
                                                    ELSEIF intCreditSource = 'DU' THEN SET creditAmount = detailNet+detailVat;
                                                    ELSEIF intCreditSource = 'CO' THEN SET creditAmount = detailCost*detailQty;
                                                    ELSEIF intCreditSource = 'BK' THEN SET creditAmount = detailBookValue;
                                                    ELSEIF intCreditSource = 'PR' THEN SET creditAmount = detailNet-detailBookValue;
                                                    ELSEIF intCreditSource = 'AE' THEN SET creditAmount = 0;
                                                    ELSEIF intCreditSource = 'AC' THEN SET creditAmount = detailAddValue;
                                                    /*ELSEIF intCreditSource = 'EX' THEN SET creditAmount = detailExpenses;
                                                    ELSEIF intCreditSource = 'NX' THEN SET creditAmount = detailNet+detailExpenses;*/
                                                    END IF;

                                                    SET done = FALSE;

                                                    IF intAccountType = 'AEXPENSE' THEN
                                                        OPEN addExpDetails;
                                                            expense_loop: LOOP
                                                                FETCH addExpDetails INTO expValue, expCapitalizeValue, expRemark, accountId;

                                                                IF done THEN LEAVE expense_loop; END IF;

                                                                IF intDebitSource = 'AE' THEN SET debitAmount = expValue; 
                                                                ELSEIF intDebitSource = 'AC' THEN SET debitAmount = expCapitalizeValue;
                                                                END IF;

                                                                IF intCreditSource = 'AE' THEN SET creditAmount = expValue; 
                                                                ELSEIF intDebitSource = 'AC' THEN SET creditAmount = expCapitalizeValue;
                                                                END IF;

                                                                /** check if both debit and credit is zero */
                                                                IF debitAmount = 0 AND creditAmount = 0 THEN ITERATE expense_loop; END IF;

                                                                IF COALESCE(accountId, 0) > 0 THEN
                                                                    SELECT `account_code` INTO accountCode FROM `gl_chart_of_account` WHERE `account_id` = accountId;
                                                                END IF;

                                                                SET rowNo = rowNo+1;
                                                                SET accountId = COALESCE(accountId, 0);
                                                                SET costCenterId = COALESCE(costCenterId, 0);
                                                                SET analysisCodeId = COALESCE(analysisCodeId, 0);
                                                                SET debitAmount = debitAmount * (intPercent/100);
                                                                SET creditAmount = creditAmount * (intPercent/100);
                                                                SET totalDebitAmount = totalDebitAmount+debitAmount;
                                                                SET totalCreditAmount = totalCreditAmount+creditAmount;
                                                                SET detRemark = REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(intDetRemark, '{trnsDesc}', trnsDesc), '{transNo}', transNo), '{transId}', transId), '{detailExpenses}', detailExpenses), '{detailItemName}', detailAssetName), '{detailItemGroupName}', detailAssetGroupName), '{detailExpenseRemark}', expRemark), '{detailNet}', detailNet);
                                                                SET done = FALSE;

                                                                IF accountId = 0 OR costCenterId = 0 THEN
                                                                    SIGNAL trigError SET MESSAGE_TEXT = 'GL_INTEGRATION_ERROR_CHECK_ACCOUNT_AND_COST_CENTER', MYSQL_ERRNO = 1644;
                                                                END IF;

                                                                INSERT INTO `gl_journals_details`
                                                                (`company_id`, `journal_id`, `trns_no`, `period_id`, `fin_year`, `fin_period`, `row_no`, `account_id`, `cost_center_id`, `analysis_code_id`, `account_code`, `cost_center_code`, `analysis_code`, `debit_amount`, `credit_amount`, `currency_id`, `remark`, `amend_by`, `created_by`, `created_at`, `updated_at`)
                                                                VALUES
                                                                (companyId, lastJournalId, maxJournalNo, periodId, finYear, finPeriod, rowNo, accountId, costCenterId, analysisCodeId, accountCode, costCenterCode, analysisCode, debitAmount, creditAmount, 0, detRemark, amendBy, createdBy, NOW(), NOW());
                                                            END LOOP;
                                                        CLOSE addExpDetails;
                                                        SET done = FALSE;
                                                        ITERATE details_loop;
                                                    ELSE
                                                        /** check if both debit and credit is zero */
                                                        IF debitAmount = 0 AND creditAmount = 0 THEN ITERATE details_loop; END IF;

                                                        SET rowNo = rowNo+1;
                                                        SET accountId = COALESCE(accountId, 0);
                                                        SET costCenterId = COALESCE(costCenterId, 0);
                                                        SET analysisCodeId = COALESCE(analysisCodeId, 0);
                                                        SET debitAmount = debitAmount * (intPercent/100);
                                                        SET creditAmount = creditAmount * (intPercent/100);
                                                        SET totalDebitAmount = totalDebitAmount + debitAmount;
                                                        SET totalCreditAmount = totalCreditAmount + creditAmount;                                                    
                                                        SET detRemark = REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(intDetRemark, '{trnsDesc}', trnsDesc), '{transNo}', transNo), '{transId}', transId), '{detailNet}', detailNet), '{detailItemName}', detailAssetName), '{detailItemGroupName}', detailAssetGroupName), '{detailExpenses}', detailExpenses);

                                                        IF accountId = 0 OR costCenterId = 0 THEN
                                                            SIGNAL trigError SET MESSAGE_TEXT = 'GL_INTEGRATION_ERROR_CHECK_ACCOUNT_AND_COST_CENTER', MYSQL_ERRNO = 1644;
                                                        END IF;

                                                        INSERT INTO `gl_journals_details`
                                                        (`company_id`, `journal_id`, `trns_no`, `period_id`, `fin_year`, `fin_period`, `row_no`, `account_id`, `cost_center_id`, `analysis_code_id`, `account_code`, `cost_center_code`, `analysis_code`, `debit_amount`, `credit_amount`, `currency_id`, `remark`, `amend_by`, `created_by`, `created_at`, `updated_at`)
                                                        VALUES
                                                        (companyId, lastJournalId, maxJournalNo, periodId, finYear, finPeriod, rowNo, accountId, costCenterId, analysisCodeId, accountCode, costCenterCode, analysisCode, debitAmount, creditAmount, 0, detRemark, amendBy, createdBy, NOW(), NOW());
                                                    END IF;
                                                END LOOP;
                                            CLOSE trnsDetails;
                                            SET done = FALSE;
                                            ITERATE read_loop;
                                        ELSE
                                            SET rowNo = rowNo+1;
                                            SET debitAmount = 0;
                                            SET creditAmount = 0;
                                            SET accountId = 0;
                                            SET accountCode = '';
                                            SET costCenterId = 0;
                                            SET costCenterCode = '';
                                            SET analysisCodeId = 0;
                                            SET analysisCode = '';
                                            SET detRemark = '';

                                            /* find debit and credit amount */
                                            IF     intDebitSource = 'TO' THEN SET debitAmount = transTotal;
                                            ELSEIF intDebitSource = 'DI' THEN SET debitAmount = discountAmount+discountTrans;
                                            ELSEIF intDebitSource = 'NT' THEN SET debitAmount = transNet;
                                            ELSEIF intDebitSource = 'VT' THEN SET debitAmount = transVat;
                                            ELSEIF intDebitSource = 'DU' THEN SET debitAmount = transDue;
                                            ELSEIF intDebitSource = 'CO' THEN SET debitAmount = transCost;
                                            ELSEIF intDebitSource = 'BK' THEN SET debitAmount = 0;
                                            ELSEIF intDebitSource = 'PR' THEN SET debitAmount = 0;
                                            ELSEIF intDebitSource = 'AE' THEN SET debitAmount = 0;
                                            ELSEIF intDebitSource = 'AC' THEN SET debitAmount = 0;
                                            /*ELSEIF intDebitSource = 'EX' THEN SET debitAmount = expensesTotal;
                                            ELSEIF intDebitSource = 'NX' THEN SET debitAmount = transNet+expensesTotal;*/
                                            END IF;

                                            IF     intCreditSource = 'TO' THEN SET creditAmount = transTotal;
                                            ELSEIF intCreditSource = 'DI' THEN SET creditAmount = discountAmount+discountTrans;
                                            ELSEIF intCreditSource = 'NT' THEN SET creditAmount = transNet;
                                            ELSEIF intCreditSource = 'VT' THEN SET creditAmount = transVat;
                                            ELSEIF intCreditSource = 'DU' THEN SET creditAmount = transDue;
                                            ELSEIF intCreditSource = 'CO' THEN SET creditAmount = transCost;
                                            ELSEIF intCreditSource = 'BK' THEN SET creditAmount = 0;
                                            ELSEIF intCreditSource = 'PR' THEN SET creditAmount = 0;
                                            ELSEIF intCreditSource = 'AE' THEN SET creditAmount = 0;
                                            ELSEIF intCreditSource = 'AC' THEN SET creditAmount = 0;
                                            /*ELSEIF intCreditSource = 'EX' THEN SET creditAmount = expensesTotal;
                                            ELSEIF intCreditSource = 'NX' THEN SET creditAmount = transNet+expensesTotal;*/
                                            END IF;

                                            /* find account data */
                                            IF intAccountType = 'FIX' THEN
                                                SET accountId = intAccountId;
                                                SET accountCode = intAccountCode;
                                            ELSE
                                                IF intAccountType = 'FROM' THEN SET accountId = fromAccountId;
                                                ELSEIF intAccountType = 'TO' THEN SET accountId = toAccountId;
                                                END IF;

                                                IF COALESCE(accountId, 0) > 0 THEN
                                                    SELECT `account_code` INTO accountCode FROM `gl_chart_of_account` WHERE `account_id` = accountId;
                                                END IF;
                                            END IF;

                                            /* find cost center data */
                                            IF intCostCenterType = 'FIX' THEN
                                                SET costCenterId = intCostCenterId;
                                                SET costCenterCode = intCostCenterCode;
                                            ELSE
                                                IF intCostCenterType = 'FROM' THEN SET costCenterId = fromCostCenterId;
                                                ELSEIF intCostCenterType = 'TO' THEN SET costCenterId = toCostCenterId;
                                                ELSEIF intCostCenterType = 'COMPANY' THEN SET costCenterId = companyCostCenterId;
                                                ELSEIF intCostCenterType = 'BRANCH' THEN SET costCenterId = branchCostCenterId;
                                                END IF;

                                                IF COALESCE(costCenterId, 0) > 0 THEN
                                                    SELECT `cost_center_code` INTO costCenterCode FROM `gl_chart_of_cost_center` WHERE `cost_center_id` = costCenterId;
                                                END IF;
                                            END IF;

                                            /* find analysis code data */
                                            IF intAnalysisCodeType = 'FIX' THEN
                                                SET analysisCodeId = intAnalysisCodeId;
                                                SET analysisCode = intAnalysisCode;
                                            ELSE
                                                IF intAnalysisCodeType = 'FROM' THEN SET analysisCodeId = fromAnalysisCodeId;
                                                ELSEIF intAnalysisCodeType = 'TO' THEN SET analysisCodeId = toAnalysisCodeId;
                                                END IF;

                                                IF COALESCE(analysisCodeId, 0) > 0 THEN
                                                    SELECT `analysis_code` INTO analysisCode FROM `gl_analysis_codes` WHERE `analysis_code_id` = analysisCodeId;
                                                END IF;
                                            END IF;

                                            SET done = FALSE;

                                            /** check if both debit and credit is zero */
                                            IF debitAmount = 0 AND creditAmount = 0 THEN ITERATE read_loop; END IF;

                                            SET accountId = COALESCE(accountId, 0);
                                            SET costCenterId = COALESCE(costCenterId, 0);
                                            SET analysisCodeId = COALESCE(analysisCodeId, 0);
                                            SET debitAmount = debitAmount * (intPercent/100);
                                            SET creditAmount = creditAmount * (intPercent/100);
                                            SET totalDebitAmount = totalDebitAmount + debitAmount;
                                            SET totalCreditAmount = totalCreditAmount + creditAmount;
                                            SET detRemark = REPLACE(REPLACE(REPLACE(REPLACE(intDetRemark, '{trnsDesc}', trnsDesc), '{transNo}', transNo), '{transId}', transId), '{detailNet}', transNet);

                                            IF accountId = 0 OR costCenterId = 0 THEN
                                                SIGNAL trigError SET MESSAGE_TEXT = 'GL_INTEGRATION_ERROR_CHECK_ACCOUNT_AND_COST_CENTER', MYSQL_ERRNO = 1644;
                                            END IF;

                                            INSERT INTO `gl_journals_details`
                                            (`company_id`, `journal_id`, `trns_no`, `period_id`, `fin_year`, `fin_period`, `row_no`, `account_id`, `cost_center_id`, `analysis_code_id`, `account_code`, `cost_center_code`, `analysis_code`, `debit_amount`, `credit_amount`, `currency_id`, `remark`, `amend_by`, `created_by`, `created_at`, `updated_at`)
                                            VALUES
                                            (companyId, lastJournalId, maxJournalNo, periodId, finYear, finPeriod, rowNo, accountId, costCenterId, analysisCodeId, accountCode, costCenterCode, analysisCode, debitAmount, creditAmount, 0, detRemark, amendBy, createdBy, NOW(), NOW());

                                        END IF;
                                    END LOOP;
                                CLOSE intDetails;

                                UPDATE `gl_journals` SET `total_debit` = totalDebitAmount, `total_credit` = totalCreditAmount, `balanced_flag` = IF(totalDebitAmount=totalCreditAmount,1,0) WHERE `journal_id` = lastJournalId;

                                SET NEW.gl_journal_id = lastJournalId;
                                SET NEW.gl_period_id = periodId;
                                SET NEW.gl_fin_year = finYear;
                                SET NEW.gl_fin_period = finPeriod;
                                SET NEW.gl_trans_no = maxJournalNo;
                            END IF;
                        ELSE
                            SIGNAL trigError SET MESSAGE_TEXT = 'PERIOD_IN_GL_NOT_FOUND_ERROR', MYSQL_ERRNO = 1644;
                        END IF;
                    END IF;
                END IF;

                IF (COALESCE(OLD.gl_journal_status, 0) = 1 AND COALESCE(NEW.gl_journal_status, 0) = 0) THEN
                    IF COALESCE(OLD.gl_journal_id,0) > 0 THEN
                        SELECT `journal_id`, `trns_no`, `annual_no`, `post_flag` INTO lastJournalId, maxJournalNo, maxJournalAnnualNo, journalPostFlag FROM `gl_journals` WHERE `journal_id` = OLD.gl_journal_id;

                        -- IF COALESCE(journalPostFlag, 0) = 1 THEN LEAVE fams_trans_gl_integration; END IF;
                        IF COALESCE(journalPostFlag, 0) = 1 THEN SIGNAL trigError SET MESSAGE_TEXT = 'UNPOST_GL_JOURNAL_FIRST_ERROR', MYSQL_ERRNO = 1644; END IF;

                        DELETE FROM `gl_journals_details` WHERE `journal_id` = lastJournalId;

                        UPDATE `gl_journals` SET
                        `total_debit` = 0,
                        `total_credit` = 0,
                        `balanced_flag` = 0,
                        `remark` = 'Canceled',
                        `amend_by` = amendBy,
                        `updated_at` = NOW()
                        WHERE `journal_id` = lastJournalId;
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
        DB::unprepared('DROP TRIGGER IF EXISTS trig_fams_trans_gl_integration;');
    }
}
