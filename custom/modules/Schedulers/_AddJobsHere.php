<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2016 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

/**
 * Set up an array of Jobs with the appropriate metadata
 * 'jobName' => array (
 *        'X' => 'name',
 * )
 * 'X' should be an increment of 1
 * 'name' should be the EXACT name of your function
 *
 * Your function should not be passed any parameters
 * Always  return a Boolean. If it does not the Job will not terminate itself
 * after completion, and the webserver will be forced to time-out that Job instance.
 * DO NOT USE sugar_cleanup(); in your function flow or includes.  this will
 * break Schedulers.  That function is called at the foot of cron.php
 */

/**
 * This array provides the Schedulers admin interface with values for its "Job"
 * dropdown menu.
 */
require_once ("custom/modules/Schedulers/SoapUtil.php");
array_push($job_strings, 'custom_job');
array_push($job_strings, 'sync_jt_accounts');
array_push($job_strings, 'sync_jt_products');
array_push($job_strings, 'sync_jt_contracts');
array_push($job_strings, 'sync_jt_po_infos');
array_push($job_strings, 'sync_xr_accounts');
array_push($job_strings, 'sync_xr_products');
array_push($job_strings, 'sync_xr_contracts');
array_push($job_strings, 'sync_xr_po_infos');

/**
 * Job 0 refreshes all job schedulers at midnight
 * DEPRECATED
 */
function custom_job() {
	echo "测试成功";
	$GLOBALS['log']->error("测试成功");
	//$soap_util_bean = new SoapUtil();
	//$result = $soap_util_bean->call_soap_ws("CUSTOMER","JT");
	return true;
}

function sync_jt_accounts() {
	global $db;
	$soap_util_bean = new SoapUtil();
	$json_array = $soap_util_bean->call_soap_ws("CUSTOMER", "JT");
	$GLOBALS['log']->infor("begin to sync jt customer data");
	//$GLOBALS['log']->infor($json_array);
	//处理数据
	$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
		'code' => 'ChinaCache'
	));
	
	$GLOBALS['log']->infor("frameWorkId=" . $frame_bean->id);
	$GLOBALS['log']->infor(count($json_array));
	
	$custom_type = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
				'code_type' => 'accounts_business_type',
				'name' => '外部客户'));

	$num = count($json_array);
	for ($i = 0; $i < $num; ++ $i) {

		$record = $json_array[$i];
		$customer_id_val = $record['CUSTOMER_ID'];
		$customer_name_val = $record['CUSTOMER_NAME'];
		$known_as_val = $record['KNOWN_AS'];
		$customer_class_val = $record['CUSTOMER_CLASS'];
		$country_val = $record['COUNTRY'];
		$province_val = $record['PROVINCE'];
		$city_val = $record['CITY'];
		$county_val = $record['COUNTY'];
		$address_val = $record['ADDRESS'];
		$owning_su_code_val = $record['OWNING_SU_CODE'];
		$owning_su_desc_val = $record['OWNING_SU_DESC'];
		$salers_id_val = $record['SALERS_ID'];
		$salers_name_val = $record['SALERS_NAME'];
		$salers_email_val = $record['SALERS_EMAIL'];
		$customer_business_val = $record['CUSTOMER_BUSINESS'];
		$organization_class_val = $record['ORGANIZATION_CLASS'];
		$sql = 'SELECT count(1) cnt FROM accounts INNER JOIN accounts_cstm WHERE accounts.id = accounts_cstm.id_c and accounts.deleted=0 AND accounts_cstm.organization_number_c ="' . $customer_id_val . '"';
		$result = $db->query($sql);
		$rows = 0;
		while ($resule_asset = $db->fetchByAssoc($result)) {
			$rows = $resule_asset['cnt'];
		}
		if ($rows == 0) {
			//业务类型默认为一般客户，给相应字段设置ID值
			if ($custom_type) {
				$customer_bean->haa_codes_id1_c = $custom_type->id;
			}
			// ERP别名设置给组织简称
			if (!empty ($known_as_val)) {
				$customer_bean->name = $known_as_val;
			} else {
				$customer_bean->name = $customer_name_val;
			}
			// ERP客户名称设置给组织全称
			$customer_bean->full_name_c = $customer_name_val;
			// ERP客户ID设置给组织#
			$customer_bean->organization_number_c = $customer_id_val;
			// 组织类型默认为外部
			$customer_bean->org_type_c = "EXTERNAL";
			// 根据ERP SU名称寻找对应组织ID，设置给销售组织（基础数据，正式上线时需要先导入资源系统）
			$check_sell_orgs_sql = 'SELECT accounts.id  FROM accounts INNER JOIN accounts_cstm WHERE accounts.id = accounts_cstm.id_c and accounts.deleted=0 AND accounts_cstm.full_name_c ="' . $owning_su_desc_val . '"';
			$check_sell_orgs_result = $db->query($check_sell_orgs_sql);
			while ($resule_asset = $db->fetchByAssoc($check_sell_orgs_result)) {
				$customer_bean->account_id_c = $resule_asset["id"];
			}
			$check_contacts_sql = 'SELECT contacts.id  FROM contacts INNER JOIN contacts_cstm WHERE contacts.id = contacts_cstm.id_c and contacts.deleted=0 AND contacts_cstm.chinese_name_c ="' . $salers_id_val . '"';
			$check_contacts_result = $db->query($check_contacts_sql);
			while ($resule_asset = $db->fetchByAssoc($check_contacts_result)) {
				$customer_bean->contact_id_c = $resule_asset["id"];
			}

			// 将ERP 销售员Email设置给负责人备注
			$customer_bean->responsible_person_note_c = $salers_email_val;
			// 将ERP 客户类别赋值给组织级别（基础数据，正式上线时需要先导入资源系统）
			$check_customer_level = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
				'code_type' => 'accounts_level',
				'name' => $organization_class_val
			));
			if ($check_customer_level) {
				$customer_bean->haa_codes_id_c = $check_customer_level->id;
			}
			$customer_bean->service_note_c = $organization_class_val;
			$customer_bean->is_le_c = "0";
			$customer_bean->is_customer_c = "1";
			$customer_bean->billing_address_street = $address_val;
			$customer_bean->billing_address_city = $city_val;
			$customer_bean->billing_address_state = $province_val;
			$customer_bean->billing_address_country = $country_val;
			$customer_bean->shipping_address_street = $address_val;
			$customer_bean->shipping_address_city = $city_val;
			$customer_bean->shipping_address_state = $province_val;
			$customer_bean->shipping_address_country = $country_val;
			$customer_bean->attribute2_c = $salers_name_val;
			$customer_bean->attribute3_c = $salers_email_val;
			$customer_bean->attribute1_c = $owning_su_desc_val;
			$customer_bean->sales_note_c = $customer_business_val;
			$customer_bean->haa_frameworks_id_c = $frame_bean->id;
			
			$account_id = create_guid();
			$insert_sql = 'insert into accounts(id,name,billing_address_street,billing_address_city,billing_address_state,billing_address_country,shipping_address_street,shipping_address_city,shipping_address_state,shipping_address_country)
						value("' . $account_id . '","' . $customer_bean->name . '","' . $address_val . '","' . $city_val . '","' . $province_val . '","' . $country_val . '","' . $address_val . '","' . $city_val . '","' . $province_val . '","' . $country_val . '") ';
			$insert_result = $db->query($insert_sql);

			$insert_cstm_sql = 'insert into accounts_cstm(id_c,
									         haa_codes_id1_c,full_name_c,organization_number_c,org_type_c,account_id_c,
									         responsible_person_note_c,haa_codes_id_c,is_le_c,is_customer_c,attribute2_c,attribute3_c,attribute1_c,haa_frameworks_id_c,sales_note_c,service_note_c,contact_id_c)
										     value("' . $account_id . '","' . $customer_bean->haa_codes_id1_c . '","' . $customer_bean->full_name_c . '","' . $customer_bean->organization_number_c . '","' . $customer_bean->org_type_c . '","' . $customer_bean->account_id_c . '","' . $customer_bean->responsible_person_note_c . '","' . $customer_bean->haa_codes_id_c . '","' . $customer_bean->is_le_c . '","' . $customer_bean->is_customer_c . '","' . $customer_bean->attribute2_c . '","' . $customer_bean->attribute3_c . '","' . $customer_bean->attribute1_c . '","' . $frame_bean->id . '","' . $customer_bean->sales_note_c . '","' . $customer_bean->service_note_c . '","'.$customer_bean->contact_id_c.'") ';
			$insert_cstm_result = $db->query($insert_cstm_sql);
			
			$GLOBALS['log']->infor("insert_cstm_sql = " . $insert_cstm_sql);
		} else {
			$sql = 'SELECT accounts.id  FROM accounts INNER JOIN accounts_cstm WHERE accounts.id = accounts_cstm.id_c and accounts.deleted=0 AND accounts_cstm.organization_number_c ="' . $customer_id_val . '"';
			$result = $db->query($sql);
			while ($resule_asset = $db->fetchByAssoc($result)) {
				$contacts_cstm_id = $resule_asset["id"];
			}
			
			if(!empty($known_as_val)||$known_as_val!=""){
				$customer_bean->name = $known_as_val;
				$customer_bean->full_name_c = $customer_name_val;
			}else{
				$customer_bean->name = $customer_name_val;
				$customer_bean->full_name_c = $customer_name_val;
			}			
			$check_contacts_sql = 'SELECT contacts.id  FROM contacts INNER JOIN contacts_cstm WHERE contacts.id = contacts_cstm.id_c and contacts.deleted=0 AND contacts_cstm.chinese_name_c ="' . $salers_id_val . '"';
			$check_contacts_result = $db->query($check_contacts_sql);
			while ($resule_asset = $db->fetchByAssoc($check_contacts_result)) {
				$customer_bean->contact_id_c = $resule_asset["id"];
			}
			
			$update_cstm_sql = 'update accounts_cstm a set a.full_name_c="'.$customer_bean->full_name_c.'",a.contact_id_c="'.$customer_bean->contact_id_c.'" where a.id_c="'.$contacts_cstm_id.'"';
			$result = $db->query($update_cstm_sql);
			$GLOBALS['log']->infor("update_cstm_sql=".$update_cstm_sql);
			
			$update_sql = 'update accounts a set a.name="'.$customer_bean->name.'" where a.id="'.$contacts_cstm_id.'"';
			$result = $db->query($update_sql);
			$GLOBALS['log']->infor("update_sql=".$update_sql);
		}
	}
	$GLOBALS['log']->infor("end   sync jt customer data");
	return true;
}

function sync_jt_contracts() {
	global $db;
	$soap_util_bean = new SoapUtil();
	$json_array = $soap_util_bean->call_soap_ws("CONTRACT", "JT",'2014-01-01','2014-02-01');
	$GLOBALS['log']->infor("begin to sync jt contracts data");
	//$GLOBALS['log']->infor($json_array);
	
	$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
		'code' => 'ChinaCache'
		
	));
	
	$contract_fix_type = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
		'code_type' => 'contract_type',
		'code_tag'=>'JT'
	));
	$GLOBALS['log']->infor(count($json_array));
	//处理数据
	foreach ($json_array as $key => $record) {
		$h_contract_header_id_val = $record['CONTRACT_HEADER_ID'];
		$org_id_val = $record['ORG_ID'];
		$org_name_val = $record['ORG_NAME'];
		$instance_name_val = $record['INSTANCE_NAME'];
		$sold_to_org_id_val = $record['SOLD_TO_ORG_ID'];
		$sold_to_org_name_val = $record['SOLD_TO_ORG_NAME'];
		$sale_unit_val = $record['SALE_UNIT'];
		$salesrep_id_val = $record['SALESREP_ID'];
		$salesrep_name_val = $record['SALESREP_NAME'];
		$h_start_date_active_val = $record['START_DATE_ACTIVE'];
		$h_end_date_active_val = $record['END_DATE_ACTIVE'];
		$contract_type_val = $record['CONTRACT_TYPE'];
		$order_number_val = $record['ORDER_NUMBER'];
		$order_type_name_val = $record['ORDER_TYPE_NAME'];
		$sales_document_name_val = $record['SALES_DOCUMENT_NAME'];
		$flow_status_name_val = $record['FLOW_STATUS_NAME'];
		$frame_contract_num_val = $record['FRAME_CONTRACT_NUM'];
		//判断是否数据库是否已经存在这个合同 如果存在则不插入

		$sql = 'SELECT count(1) cnt FROM aos_contracts INNER JOIN aos_contracts_cstm WHERE aos_contracts.id = aos_contracts_cstm.id_c and aos_contracts.deleted=0 AND aos_contracts_cstm.data_source_id_c ="' . $h_contract_header_id_val . '"';
		$result = $db->query($sql);
		$rows = 0;
		$GLOBALS['log']->infor("check_sql  = " . $sql);
		while ($resule_asset = $db->fetchByAssoc($result)) {
			$rows = $resule_asset['cnt'];
		}
		
		if ($rows == 0) {
			$newBean->data_source_id_c = $h_contract_header_id_val;
			//通过商业机会找商业机会的relatedId
			$opportunities_sql = 'SELECT opportunities.id  FROM opportunities  WHERE opportunities.deleted=0 and opportunities.name ="' . $org_name_val . '"';
			$opportunities_result = $db->query($opportunities_sql);
			while ($opportunities_record = $db->fetchByAssoc($opportunities_result)) {
				$record_val = $opportunities_record['id'];
				$newBean->opportunity_id = $record_val;
			}
			//通过客户名称找客户的relatedId
			$contract_account_sql = 'SELECT accounts.id  FROM accounts  WHERE accounts.deleted=0 and accounts.name ="' . $sold_to_org_name_val . '"';
			$contract_account_result = $db->query($contract_account_sql);
			while ($contract_account_record = $db->fetchByAssoc($contract_account_result)) {
				$record_val = $contract_account_record['id'];
				$newBean->contract_account_id = $record_val;
			}
			//business_type
			$business_sql = 'SELECT haa_codes.id  FROM haa_codes  WHERE haa_codes.name ="' . $sale_unit_val . '"';
			$business_result = $db->query($business_sql);
			while ($business_record = $db->fetchByAssoc($business_result)) {
				$record_val = $business_record['id'];
				$newBean->haa_codes_id1_c = $record_val;
			}

			//salesrep_name
			$users_sql = 'SELECT users.id  FROM users  WHERE users.last_name ="' . $salesrep_name_val . '"';
			$users_result = $db->query($users_sql);
			while ($users_record = $db->fetchByAssoc($users_result)) {
				$record_val = $users_record['id'];
				$newBean->assigned_user_id = $record_val;
			}

			//Media Type
			$media_type_sql = 'SELECT haa_codes.id  FROM haa_codes  WHERE haa_codes.name ="' . $contract_type_val . '"';
			$media_type_result = $db->query($media_type_sql);
			while ($media_type_record = $db->fetchByAssoc($media_type_result)) {
				$record_val = $media_type_record['id'];
				$newBean->haa_codes_id2_c = $record_val;
			}

			//TYPE
			/*$type_sql = 'SELECT haa_codes.id  FROM haa_codes  WHERE haa_codes.name ="' . $order_type_name_val . '"';
			$type_result = $db->query($type_sql);
			while ($type_record = $db->fetchByAssoc($type_result)) {
				$record_val = $type_record['id'];
				$newBean->haa_codes_id_c = $record_val;
			}*/
			$newBean->haa_codes_id_c=$contract_fix_type;
			//revision
			$revision_sql = 'SELECT hpr_am_roles.id  FROM hpr_am_roles  WHERE hpr_am_roles.name ="' . $frame_contract_num_val . '"';
			$revision_result = $db->query($revision_sql);
			while ($revision_record = $db->fetchByAssoc($revision_result)) {
				$record_val = $revision_record['id'];
				$newBean->contract_revision_c = $record_val;
			}
			
			$newBean->name = $sales_document_name_val;
			$status_code = array_search($flow_status_name_val, $app_list_strings['contract_type_list'], true);
			$newBean->status = $status_code;
			$newBean->contract_number_c = $order_number_val;
			$newBean->start_date = $h_start_date_active_val;
			$newBean->end_date = $h_end_date_active_val;
			
			if($h_end_date_active_val==""||empty($h_end_date_active_val)){
				$newBean->end_date=null;
			}
			$newBean->data_source_id_c = $h_contract_header_id_val;
			$newBean->attribute1_c = $order_type_name_val;
			$newBean->attribute2_c = $sale_unit_val;
			$newBean->attribute3_c = $contract_type_val;
			//$newBean->attribute4_c=$sales_document_name_val;
			$newBean->attribute4_c = $flow_status_name_val;
			$newBean->attribute5_c = $frame_contract_num_val;
			$newBean->attribute6_c = $salesrep_name_val;
			$newBean->haa_frameworks_id_c = $frame_bean->id;
			$contact_id = create_guid();
		    //$newBean->save();
			$insert_sql = 'insert into aos_contracts(
			     id
				,name
				,status
				,opportunity_id
				,contract_account_id
				,start_date
				,end_date
				,assigned_user_id)
				 value(
				 "' . $contact_id . 
				 '","' . $newBean->name . 
				 '","' . $status . 
				 '","' . $newBean->opportunity_id . 
				 '","' . $newBean->contract_account_id.'"';
			
			if(!empty($newBean->start_date)){
				$insert_sql =$insert_sql.',"'.$newBean->start_date.'"';
			}else{
				$insert_sql =$insert_sql.',NULL,';
			}
			
			if(!empty($newBean->end_date)){
				$insert_sql =$insert_sql.',"'.$newBean->end_date.'"';
			}else{
				$insert_sql =$insert_sql.',NULL';
			}
			
			$insert_sql =$insert_sql.',"'.$newBean->assigned_user_id.'")';	 
			$insert_result = $db->query($insert_sql);
			
			$insert_cstm_sql = 'insert into aos_contracts_cstm(
			     id_c
				,haa_codes_id1_c
				,haa_codes_id2_c
				,haa_codes_id_c
				,contract_revision_c
				,contract_number_c
				,data_source_id_c
				,attribute1_c
				,attribute2_c
				,attribute3_c
				,attribute4_c
				,attribute5_c
				,attribute6_c
				,haa_frameworks_id_c)
				 value(
				 "' . $contact_id . 
				 '","' . $newBean->haa_codes_id1_c . 
				 '","' . $newBean->haa_codes_id2_c . 
				 '","' . $newBean->haa_codes_id_c.'"';
			if($newBean->revision_c==""||empty($newBean->revision_c)){
				$insert_cstm_sql=$insert_cstm_sql.',NULL';
			}else{
				$insert_cstm_sql=$insert_cstm_sql.',"' . $newBean->revision_c.'"';
			}
			
			$insert_cstm_sql=$insert_cstm_sql.',"' . $order_number_val . 
				 '","' . $newBean->data_source_id_c . 
				 '","' . $order_type_name_val . 
				 '","' . $newBean->attribute2_c . 
				 '","' . $newBean->attribute3_c . 
				 '","' . $newBean->attribute4_c . 
				 '","' . $newBean->attribute5_c . 
				 '","' . $newBean->attribute6_c . 
				 '","'.$frame_bean->id.'") ';	 
			$insert_cstm_result = $db->query($insert_cstm_sql);
			
			$GLOBALS['log']->infor("insert_cstm_sql = " . $insert_cstm_sql);
			
			$GLOBALS['log']->infor("header_id = " . $newBean->id . ",header_name=" . $sales_document_name_val . ",org_name_val=" . $org_name_val . ",sold_to_org_name_val" . $sold_to_org_name_val . ",sale_unit_val=" . $sale_unit_val . ",salesrep_name_val=" . $salesrep_name_val . ",contract_type_val=" . $contract_type_val . ",order_type_name_val" . $order_type_name_val . ",frame_contract_num_val=" . $frame_contract_num_val . ",start_date=" . $h_start_date_active_val);
			
			foreach ($record['LINES'] as $line_key => $line_value) {
				$contract_line_id_val = $line_value['CONTRACT_LINE_ID'];
				$line_num_val = $line_value['LINE_NUM'];
				$contract_header_id_val = $line_value['CONTRACT_HEADER_ID'];
				$item_number_val = $line_value['ITEM_NUMBER'];
				$inventory_item_id_val = $line_value['INVENTORY_ITEM_ID'];
				$inventory_item_name_val = $line_value['INVENTORY_ITEM_NAME'];
				$parent_description_val = $line_value['PARENT_DESCRIPTION'];
				$open_type_val = $line_value['OPEN_TYPE'];
				$uom_code_val = $line_value['UOM_CODE'];
				$quantity_val = $line_value['QUANTITY'];
				$start_date_active_val = $line_value['START_DATE_ACTIVE'];
				$end_date_active_val = $line_value['END_DATE_ACTIVE'];
				$formula_type_code_val = $line_value['FORMULA_TYPE_CODE'];
				$GLOBALS['log']->infor("line_id= " . $contract_line_id_val . ",LINE_NUMBER=" . $line_num_val . ",item_number_val=" . $item_number_val . ",inventory_item_name_val=" . $inventory_item_name_val."producty_quantity= ".$quantity_val);
				
				$sql = 'SELECT count(1) cnt FROM aos_products_quotes INNER JOIN aos_products_quotes_cstm WHERE aos_products_quotes.id = aos_products_quotes_cstm.id_c and aos_products_quotes.deleted=0 AND aos_products_quotes_cstm.product_source_id_c ="' . $contract_line_id_val . '" and aos_products_quotes.parent_id="'.$contact_id.'"';
				$result = $db->query($sql);
				$rows = 0;
				while ($resule_asset = $db->fetchByAssoc($result)) {
					$rows = $resule_asset['cnt'];
				}
				if ($rows == 0) {
					$newLineBean = BeanFactory :: getBean('AOS_Products_Quotes');
					$newLineBean->parent_id = $newBean->id;
					$newLineBean->data_source_id_c = $contract_line_id_val;
					$newLineBean->name = $inventory_item_name_val;
					//INVENTORY_ITEM_name
					$item_list_sql = 'SELECT aos_products.id  FROM aos_products  WHERE aos_products.deleted=0 and aos_products.part_number ="' . $item_number_val . '"';
					$item_list_result = $db->query($item_list_sql);
					while ($item_list_record = $db->fetchByAssoc($item_list_result)) {
						$record_val = $item_list_record['id'];
						$newLineBean->product_id = $record_val;
					}
					
					
					$newLineBean->product_discount = $parent_description_val;
					if(empty($parent_description_val)){
						$newLineBean->product_discount =null;
					}
					$newLineBean->vat_amt = $open_type_val;
					$newLineBean->product_qty = $quantity_val;
					$newLineBean->effective_start_c = $start_date_active_val;
					$newLineBean->effective_end_c = $end_date_active_val;
					$newLineBean->parent_type = 'AOS_Contracts';
					$newLineBean->product_source_id_c = $contract_line_id_val;
					$aos_products_quotes_id = create_guid();
					$insert_sql = 'insert into aos_products_quotes(
									 id
									,name
									,product_id
									,description
									,vat_amt
									,product_qty
									,item_description
									,parent_id
									,parent_type)
									 value(
									 "' . $aos_products_quotes_id . 
									 '","' . $inventory_item_name_val . 
									 '","' . $newLineBean->product_id . 
									 '","' . $newLineBean->product_discount . 
									 '","' . $newLineBean->vat_amt . 
									 '","' . $newLineBean->product_qty . 
									  '","' . $formula_type_code_val . 
									  '","' . $contact_id . 
									  '","' . $newLineBean->parent_type .
									 '") ';
						$insert_result = $db->query($insert_sql);
						$GLOBALS['log']->infor("effective_end_c=".$newLineBean->effective_end_c);
						$insert_cstm_sql = 'insert into aos_products_quotes_cstm(
							 id_c
							,effective_start_c
							,effective_end_c
							,product_source_id_c
							)
							 value(
							 "' . $aos_products_quotes_id . 
							 '","' . $start_date_active_val . 
							 '","' . $end_date_active_val . 
							 '","' . $newLineBean->product_source_id_c . 
							 '") ';
						$insert_cstm_result = $db->query($insert_cstm_sql);
				}
			}
			
		}else{
			//更新合同状态
			$status_code = array_search($flow_status_name_val, $app_list_strings['contract_type_list'], true);
			$sql = 'SELECT aos_contracts.id cnt FROM aos_contracts INNER JOIN aos_contracts_cstm WHERE aos_contracts.id = aos_contracts_cstm.id_c and aos_contracts.deleted=0 AND aos_contracts_cstm.data_source_id_c ="' . $h_contract_header_id_val . '"';
			$result = $db->query($sql);
			while ($resule_asset = $db->fetchByAssoc($result)) {
				$contract_id = $resule_asset['id'];
			}
			$contract_bean = BeanFactory::getBean('AOS_Contracts',$contract_id);
			if($contract_bean->status!=$status_code){
				$contract_bean->status=$status_code;
				$contract_bean->save();
			}
		}
	}
	$GLOBALS['log']->infor("end   sync jt contracts data");
	return true;
}

function sync_jt_po_infos() {
	global $db;
	$soap_util_bean = new SoapUtil();
	$json_array = $soap_util_bean->call_soap_ws("PO", "JT",'2010-01-01','2016-12-31');
	$GLOBALS['log']->infor("begin to sync jt PO Infos data");
	//$GLOBALS['log']->infor($json_array);
	//业务框架
	$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
		'code' => 'ChinaCache'
	));
	$frame_id = $frame_bean->id;

	//处理数据
	if (count($json_array) > 0) {
		foreach ($json_array as $key => $record) {
			$po_header_id_val = $record['PO_HEADER_ID'];
			$po_number_val = $record['PO_NUMBER'];
			$vendor_name_val = $record['VENDOR_NAME'];
			$comments_val = $record['COMMENTS'];
			$org_name_val = $record['ORG_NAME'];
			$instance_name_val = $record['INSTANCE_NAME'];

			foreach ($record['LINES'] as $line_key => $line_value) {

				//判断是否数据库是否已经存在这个订单行 如果存在则不插入
				$po_line_id_val = $line_value['PO_LINE_ID'];
				$line_num_val = $line_value['LINE_NUM'];
				$po_header_id_val = $line_value['PO_HEADER_ID'];
				$inventory_item_id_val = $line_value['ITEM_ID'];
				$item_num_val = $line_value['ITEM_NUM'];
				$item_description_val = $line_value['ITEM_DESCRIPTION'];
				$unit_val = $line_value['UNIT'];
				$quantity_val = $line_value['QUANTITY'];
				$unit_price_val = $line_value['UNIT_PRICE'];
				$category_name_val = $line_value['CATEGORY_NAME'];
				$prod_code_val = $line_value['PROD_CODE'];
				$prod_name_val = $line_value['PROD_NAME'];
				$cost_center_dis = $line_value['COST_CENTER'];
				
				$cost_center_bean = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
													'code_type' => 'asset_main_cost_center',
													'name' => cost_center_dis));
				
				$need_by_val = $line_value['NEED_BY'];

				$GLOBALS['log']->infor("header_id   = " . $po_header_id_val . ',line_number=' . $line_num_val . ",item_name=" . $line_num_val . ",line_id=" . $po_line_id_val."cost_center=".$cost_center);

				$check_exists = BeanFactory :: getBean('HAT_Asset_Sources')->get_full_list('', "hat_asset_sources.source_id = '$po_line_id_val'");

				if ($check_exists == 0) {
					$newLineBean = BeanFactory :: newBean('HAT_Asset_Sources');
					$newLineBean->name = $po_number_val . ':' . $line_num_val;
					$newLineBean->header_num = $po_number_val;
					$newLineBean->supplier_desc = $vendor_name_val;
					$newLineBean->description = $item_description_val;
					$newLineBean->source_type = $instance_name_val;
					$newLineBean->line_num = $line_num_val;
					$newLineBean->item_num = $item_num_val;
					$newLineBean->line_qty = $quantity_val;
					$newLineBean->line_price = $unit_price_val;
					$newLineBean->source_reference = $prod_name_val;
					$newLineBean->haa_frameworks_id = $frame_id;
					$newLineBean->source_id = $po_line_id_val;
					$newLineBean->haa_frameworks_id = $frame_bean->id;
					$newLineBean->cost_center = $cost_center_bean->id;
					$newLineBean->need_by = $need_by_val;
					$newLineBean->save();
				}
			}
		}
	}
	$GLOBALS['log']->infor("end   sync JT PO Infos data");
	return true;
}

function sync_xr_accounts() {
	global $db;
	$soap_util_bean = new SoapUtil();
	$json_array = $soap_util_bean->call_soap_ws("CUSTOMER", "XR");
	$GLOBALS['log']->infor("begin to sync xr customer data");
	//$GLOBALS['log']->infor($json_array);
	$custom_type = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
				'code_type' => 'accounts_business_type',
				'name' => '外部客户'));
	
	$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
		'code' => 'ChinaCache'));
		
	$num = count($json_array);
	for ($i = 0; $i < $num; ++ $i) {
		$record = $json_array[$i];
		$customer_id_val = $record['CUSTOMER_ID'];
		$customer_name_val = $record['CUSTOMER_NAME'];
		$known_as_val = $record['KNOWN_AS'];
		$customer_class_val = $record['CUSTOMER_CLASS'];
		$country_val = $record['COUNTRY'];
		$province_val = $record['PROVINCE'];
		$city_val = $record['CITY'];
		$county_val = $record['COUNTY'];
		$address_val = $record['ADDRESS'];
		$owning_su_code_val = $record['OWNING_SU_CODE'];
		$owning_su_desc_val = $record['OWNING_SU_DESC'];
		$salers_id_val = $record['SALERS_ID'];
		$salers_name_val = $record['SALERS_NAME'];
		$salers_email_val = $record['SALERS_EMAIL'];
		$customer_business_val = $record['CUSTOMER_BUSINESS'];
		$organization_class_val = $record['ORGANIZATION_CLASS'];
		$sql = 'SELECT count(1) cnt FROM accounts INNER JOIN accounts_cstm WHERE accounts.id = accounts_cstm.id_c and accounts.deleted=0 AND accounts_cstm.organization_number_c ="' . $customer_id_val . '"';
		$result = $db->query($sql);
		$rows = 0;
		while ($resule_asset = $db->fetchByAssoc($result)) {
			$rows = $resule_asset['cnt'];
		}
		//是否创建客户
		if ($rows == 0) {
			//业务类型默认为一般客户，给相应字段设置ID值
			if ($custom_type) {
				$customer_bean->haa_codes_id1_c = $custom_type->id;
			}
			// ERP别名设置给组织简称
			if (!empty ($known_as_val)) {
				$customer_bean->name = $known_as_val;
			} else {
				$customer_bean->name = $customer_name_val;
			}
			// ERP客户名称设置给组织全称
			$customer_bean->full_name_c = $customer_name_val;
			// ERP客户ID设置给组织#
			$customer_bean->organization_number_c = $customer_id_val;
			// 组织类型默认为外部
			$customer_bean->org_type_c = "EXTERNAL";
			// 根据ERP SU名称寻找对应组织ID，设置给销售组织（基础数据，正式上线时需要先导入资源系统）
			$check_sell_orgs_sql = 'SELECT accounts.id  FROM accounts INNER JOIN accounts_cstm WHERE accounts.id = accounts_cstm.id_c and accounts.deleted=0 AND accounts_cstm.full_name_c ="' . $owning_su_desc_val . '"';
			$check_sell_orgs_result = $db->query($check_sell_orgs_sql);
			while ($resule_asset = $db->fetchByAssoc($check_sell_orgs_result)) {
				$customer_bean->account_id_c = $resule_asset["id"];
			}
			$check_contacts_sql = 'SELECT contacts.id  FROM contacts INNER JOIN contacts_cstm WHERE contacts.id = contacts_cstm.id_c and contacts.deleted=0 AND contacts_cstm.chinese_name_c ="' . $salers_id_val . '"';
			$check_contacts_result = $db->query($check_contacts_sql);
			while ($resule_asset = $db->fetchByAssoc($check_contacts_result)) {
				$customer_bean->contact_id_c = $resule_asset["id"];
			}

			// 将ERP 销售员Email设置给负责人备注
			$customer_bean->responsible_person_note_c = $salers_email_val;
			// 将ERP 客户类别赋值给组织级别（基础数据，正式上线时需要先导入资源系统）
			$check_customer_level = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
				'code_type' => 'accounts_level',
				'name' => $organization_class_val
			));
			if ($check_customer_level) {
				$customer_bean->haa_codes_id_c = $check_customer_level->id;
			}
			$customer_bean->service_note_c = $organization_class_val;
			$customer_bean->is_le_c = "0";
			$customer_bean->is_customer_c = "1";
			$customer_bean->billing_address_street = $address_val;
			$customer_bean->billing_address_city = $city_val;
			$customer_bean->billing_address_state = $province_val;
			$customer_bean->billing_address_country = $country_val;
			$customer_bean->shipping_address_street = $address_val;
			$customer_bean->shipping_address_city = $city_val;
			$customer_bean->shipping_address_state = $province_val;
			$customer_bean->shipping_address_country = $country_val;
			$customer_bean->attribute2_c = $salers_name_val;
			$customer_bean->attribute3_c = $salers_email_val;
			$customer_bean->attribute1_c = $owning_su_desc_val;
			$customer_bean->sales_note_c = $customer_business_val;
			$customer_bean->haa_frameworks_id_c = $frame_bean->id;
			
			$account_id = create_guid();
			$insert_sql = 'insert into accounts(id,name,billing_address_street,billing_address_city,billing_address_state,billing_address_country,shipping_address_street,shipping_address_city,shipping_address_state,shipping_address_country)
						value("' . $account_id . '","' . $customer_bean->name . '","' . $address_val . '","' . $city_val . '","' . $province_val . '","' . $country_val . '","' . $address_val . '","' . $city_val . '","' . $province_val . '","' . $country_val . '") ';
			$insert_result = $db->query($insert_sql);

			$insert_cstm_sql = 'insert into accounts_cstm(id_c,
									         haa_codes_id1_c,full_name_c,organization_number_c,org_type_c,account_id_c,
									         responsible_person_note_c,haa_codes_id_c,is_le_c,is_customer_c,attribute2_c,attribute3_c,attribute1_c,haa_frameworks_id_c,sales_note_c,service_note_c,contact_id_c)
										     value("' . $account_id . '","' . $customer_bean->haa_codes_id1_c . '","' . $customer_bean->full_name_c . '","' . $customer_bean->organization_number_c . '","' . $customer_bean->org_type_c . '","' . $customer_bean->account_id_c . '","' . $customer_bean->responsible_person_note_c . '","' . $customer_bean->haa_codes_id_c . '","' . $customer_bean->is_le_c . '","' . $customer_bean->is_customer_c . '","' . $customer_bean->attribute2_c . '","' . $customer_bean->attribute3_c . '","' . $customer_bean->attribute1_c . '","' . $frame_bean->id . '","' . $customer_bean->sales_note_c . '","' . $customer_bean->service_note_c . '","'.$customer_bean->contact_id_c.'") ';
			$insert_cstm_result = $db->query($insert_cstm_sql);
			
			$GLOBALS['log']->infor("insert_cstm_sql = " . $insert_cstm_sql);
		} else {
			$sql = 'SELECT accounts.id  FROM accounts INNER JOIN accounts_cstm WHERE accounts.id = accounts_cstm.id_c and accounts.deleted=0 AND accounts_cstm.organization_number_c ="' . $customer_id_val . '"';
			$result = $db->query($sql);
			while ($resule_asset = $db->fetchByAssoc($result)) {
				$contacts_cstm_id = $resule_asset["id"];
			}
			
			if(!empty($known_as_val)||$known_as_val!=""){
				$customer_bean->name = $known_as_val;
				$customer_bean->full_name_c = $customer_name_val;
			}else{
				$customer_bean->name = $customer_name_val;
				$customer_bean->full_name_c = $customer_name_val;
			}
			
			$check_contacts_sql = 'SELECT contacts.id  FROM contacts INNER JOIN contacts_cstm WHERE contacts.id = contacts_cstm.id_c and contacts.deleted=0 AND contacts_cstm.chinese_name_c ="' . $salers_id_val . '"';
			$check_contacts_result = $db->query($check_contacts_sql);
			while ($resule_asset = $db->fetchByAssoc($check_contacts_result)) {
				$customer_bean->contact_id_c = $resule_asset["id"];
			}
			$update_cstm_sql = 'update accounts_cstm a set a.full_name_c="'.$customer_bean->full_name_c.'",a.contact_id_c="'.$customer_bean->contact_id_c.'" where a.id_c="'.$contacts_cstm_id.'"';
			$GLOBALS['log']->infor("update_cstm_sql=".$update_cstm_sql);
			$result = $db->query($update_cstm_sql);
			
			$update_sql = 'update accounts a set a.name="'.$customer_bean->name.'" where a.id="'.$contacts_cstm_id.'"';
			$GLOBALS['log']->infor("update_sql=".$update_sql);
			$result = $db->query($update_sql);
		}
	}
	$GLOBALS['log']->infor("end   sync xr customer data");
	return true;
}

function sync_xr_products() {
	global $db;
	$soap_util_bean = new SoapUtil();
	$json_array = $soap_util_bean->call_soap_ws("PRODUCT", "XR");
	$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
		'code' => 'ChinaCache'));
	$GLOBALS['log']->infor("begin to sync xr products data");
		//$GLOBALS['log']->infor($json_array);
	//处理数据
	foreach ($json_array as $key => $record) {	
			
			foreach ($record as $record_key => $record_value) {
				
				$product_code_val   = $record['PRODUCT_CODE'];
				$product_id_val     = $record['PRODUCT_ID'];
				$product_name_val   = $record['PRODUCT_NAME'];
				$item_category_val  = $record['ITEM_CATEGORY'];
				$product_status_name_val = $record['PRODUCT_STATUS_NAME'];
				$item_number_val         = $record['ITEM_NUMBER'];
				$parent_product          = $record['PARENT_PRODUCT'];
				$primary_uom_code        = $record['PRIMARY_UOM_CODE'];
				
				$check_product           = BeanFactory :: getBean('AOS_Products')->get_full_list('', "aos_products.part_number = '".$product_code_val."'");
				
				$GLOBALS['log']->infor('Product_Name= ' . $product_name_val .'product_code = ' . $product_code_val.',item_number = ' . $item_number_val.",UOM=".$primary_uom_code);
				
				//是否创建产品类别
				if (count($check_product) == 0) {
					$product_bean = BeanFactory :: newBean("AOS_Products");
					$product_bean->name = $product_name_val;
					$product_bean->part_number = $product_code_val;
					$product_bean->url = $product_status_name_val;
					$product_bean->haa_uom_id_c = $uom_id;
					$product_bean->haa_frameworks_id_c = $frame_bean->id;
					//来源字段********
					$product_bean->data_source_code_c = 'EBS';
					$product_bean->data_source_reference_c = 'PRO_PRODUCT_BASE_INFO';
					$product_bean->data_source_id_c = $product_id_val;
					$product_bean->description = $parent_product;
					//*********
					$check_product_category = BeanFactory :: getBean('AOS_Product_Categories')->get_full_list('', "aos_product_categories.name = '{$item_category_val}'");
					
					//是否创建产品类别
					if (count($check_product_category) == 0) {
						$product_category = BeanFactory :: newBean("AOS_Product_Categories");
						$product_category->name = $item_category_val;
						//数据来源
						$product_category->data_source_code_c = 'EBS';
						$product_category->data_source_reference_c = 'PRO_PRODUCT_BASE_INFO';
						$product_category->data_source_id_c = $item_category_val;
						//
						$product_category->save();
						$product_bean->aos_product_category_id = $product_category->id;
					} else {
						$product_bean->aos_product_category_id = $check_product_category[0]->id;
					}
					
					//通过单位找到单位的id
					$uom_bean = BeanFactory :: getBean('HAA_UOM')->retrieve_by_string_fields(array (
										    'name' => $primary_uom_code
					));	
					$product_bean->haa_uom_id_c=$uom_bean->id;
					if (empty($uom_bean)){
						$GLOBALS['log']->infor("单位为空 请先维护".$primary_uom_code);
					}
					$product_id = create_guid();
					$insert_sql = 'insert into aos_products(
									 id
									,name
									,url
									,part_number
									,aos_product_category_id
									,description)
									 value(
									 "' . $product_id . 
									 '","' . $product_name_val . 
									 '","' . $product_status_name_val . 
									 '","' . $product_code_val . 
									 '","' . $product_bean->aos_product_category_id . 
									 '","' . $parent_product . 
									 '") ';
					$insert_result = $db->query($insert_sql);
					$GLOBALS['log']->infor("product_sql  = ".insert_result);
					$insert_cstm_sql = 'insert into aos_products_cstm(
									 id_c
									,haa_uom_id_c
									,haa_frameworks_id_c
									,data_source_code_c
									,data_source_reference_c
									,data_source_id_c)
									 value(
									 "' . $product_id . 
									 '","' . $product_bean->haa_uom_id_c . 
									 '","' . $frame_bean->id . 
									 '","' . $product_bean->data_source_code_c . 
									 '","' . $product_bean->data_source_reference_c . 
									 '","' . $product_bean->data_source_id_c . 
									 '") ';
					$insert_cstm_result = $db->query($insert_cstm_sql);
					$GLOBALS['log']->infor("product_cstm_ql  = ".insert_cstm_sql);
				}else{
					$product_bean = $check_product[0];
					$product_bean->name=$product_name_val;
					$product_bean->save();
				}
			}
		}
	$GLOBALS['log']->infor("end sync xr products data");
	return true;
}

function sync_xr_contracts() {
	global $db;
	$soap_util_bean = new SoapUtil();
	$json_array = $soap_util_bean->call_soap_ws("CONTRACT", "XR");
	$GLOBALS['log']->infor("begin to sync xr contracts data");
	//$GLOBALS['log']->infor($json_array);
	$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
		'code' => 'ChinaCache'
	));
	$contract_fix_type = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
		'code_type' => 'contract_type',
		'code_tag'=>'XR',
	));
	$GLOBALS['log']->infor($frame_bean->id);
	//处理数据
	//$GLOBALS['log']->infor(count($json_array));
	foreach ($json_array as $key => $record) {
		$GLOBALS['log']->infor("record");
		$h_contract_header_id_val = $record['CONTRACT_HEADER_ID'];
		$org_id_val = $record['ORG_ID'];
		$org_name_val = $record['ORG_NAME'];
		$instance_name_val = $record['INSTANCE_NAME'];
		$sold_to_org_id_val = $record['SOLD_TO_ORG_ID'];
		$sold_to_org_name_val = $record['SOLD_TO_ORG_NAME'];
		$sale_unit_val = $record['SALE_UNIT'];
		$salesrep_id_val = $record['SALESREP_ID'];
		$salesrep_name_val = $record['SALESREP_NAME'];
		$h_start_date_active_val = $record['START_DATE_ACTIVE'];
		$h_end_date_active_val = $record['END_DATE_ACTIVE'];
		$contract_type_val = $record['CONTRACT_TYPE'];
		$order_number_val = $record['ORDER_NUMBER'];
		$order_type_name_val = $record['ORDER_TYPE_NAME'];
		$sales_document_name_val = $record['SALES_DOCUMENT_NAME'];
		$flow_status_name_val = $record['FLOW_STATUS_NAME'];
		$frame_contract_num_val = $record['FRAME_CONTRACT_NUM'];
		//判断是否数据库是否已经存在这个合同 如果存在则不插入
		$sql = 'SELECT count(1) cnt FROM aos_contracts INNER JOIN aos_contracts_cstm WHERE aos_contracts.id = aos_contracts_cstm.id_c and aos_contracts.deleted=0 AND aos_contracts_cstm.data_source_id_c ="' . $h_contract_header_id_val . '"';
		$result = $db->query($sql);
		$rows = 0;
		$GLOBALS['log']->infor("sql = ".$sql);
		while ($resule_asset = $db->fetchByAssoc($result)) {
			$rows = $resule_asset['cnt'];
		}
		
		if ($rows == 0) {
			$newBean->data_source_id_c = $h_contract_header_id_val;
			//通过商业机会找商业机会的relatedId
			$opportunities_sql = 'SELECT opportunities.id  FROM opportunities  WHERE opportunities.deleted=0 and opportunities.name ="' . $org_name_val . '"';
			$opportunities_result = $db->query($opportunities_sql);
			while ($opportunities_record = $db->fetchByAssoc($opportunities_result)) {
				$record_val = $opportunities_record['id'];
				$newBean->opportunity_id = $record_val;
			}

			//通过客户名称找客户的relatedId
			$contract_account_sql = 'SELECT accounts.id  FROM accounts  WHERE accounts.deleted=0 and accounts.name ="' . $sold_to_org_name_val . '"';
			$contract_account_result = $db->query($contract_account_sql);
			while ($contract_account_record = $db->fetchByAssoc($contract_account_result)) {
				$record_val = $contract_account_record['id'];
				$newBean->contract_account_id = $record_val;
			}
			//business_type
			$business_sql = 'SELECT haa_codes.id  FROM haa_codes  WHERE haa_codes.name ="' . $sale_unit_val . '"';
			$business_result = $db->query($business_sql);
			while ($business_record = $db->fetchByAssoc($business_result)) {
				$record_val = $business_record['id'];
				$newBean->haa_codes_id1_c = $record_val;
			}

			//salesrep_name
			$users_sql = 'SELECT users.id  FROM users  WHERE users.last_name ="' . $salesrep_name_val . '"';
			$users_result = $db->query($users_sql);
			while ($users_record = $db->fetchByAssoc($users_result)) {
				$record_val = $users_record['id'];
				$newBean->assigned_user_id = $record_val;
			}
			//Media Type
			$media_type_sql = 'SELECT haa_codes.id  FROM haa_codes  WHERE haa_codes.name ="' . $contract_type_val . '"';
			$media_type_result = $db->query($media_type_sql);
			while ($media_type_record = $db->fetchByAssoc($media_type_result)) {
				$record_val = $media_type_record['id'];
				$newBean->haa_codes_id2_c = $record_val;
			}
			//TYPE
			//$type_sql = 'SELECT haa_codes.id  FROM haa_codes  WHERE haa_codes.name ="' . $order_type_name_val . '"';
			/*$type_sql = 'SELECT haa_codes.id  FROM haa_codes  WHERE haa_codes.code_type ="contract_type" and haa_codes.name="欣润"';
			$type_result = $db->query($type_sql);
			while ($type_record = $db->fetchByAssoc($type_result)) {
				$record_val = $type_record['id'];
				$newBean->haa_codes_id_c = $record_val;
			}*/
			$newBean->haa_codes_id_c = $contract_fix_type->id;
			//revision
			$revision_sql = 'SELECT hpr_am_roles.id  FROM hpr_am_roles  WHERE hpr_am_roles.name ="' . $frame_contract_num_val . '"';
			$revision_result = $db->query($revision_sql);
			while ($revision_record = $db->fetchByAssoc($revision_result)) {
				$record_val = $revision_record['id'];
				$newBean->contract_revision_c = $record_val;
			}
			$newBean->name = $sales_document_name_val;
			$status_code = array_search($flow_status_name_val, $app_list_strings['contract_type_list'], true);
			$newBean->status = $status_code;
			$newBean->contract_number_c = $order_number_val;
			$newBean->start_date = $h_start_date_active_val;
			$newBean->end_date = $h_end_date_active_val;
			$newBean->data_source_id_c = $h_contract_header_id_val;
			$newBean->attribute1_c = $order_type_name_val;
			$newBean->attribute2_c = $sale_unit_val;
			$newBean->attribute3_c = $contract_type_val;
			$newBean->attribute4_c = $flow_status_name_val;
			$newBean->attribute5_c = $frame_contract_num_val;
			$newBean->attribute6_c = $salesrep_name_val;
			$newBean->haa_frameworks_id_c = $frame_bean->id;
			$contact_id = create_guid();
			$insert_sql = 'insert into aos_contracts(
			     id
				,name
				,status
				,opportunity_id
				,contract_account_id
				,start_date
				,end_date
				,assigned_user_id)
				 value(
				 "' . $contact_id . 
				 '","' . $sales_document_name_val . 
				 '","' . $status . 
				 '","' . $newBean->opportunity_id . 
				 '","' . $newBean->contract_account_id . 
				 '","' . $newBean->start_date . 
				 '","' . $newBean->end_date . 
				 '","' . $newBean->assigned_user_id . 
				 '") ';
			$insert_result = $db->query($insert_sql);
			if(empty($newBean->revision_c)){
				$newBean->revision_c=0;
			}
			$insert_cstm_sql = 'insert into aos_contracts_cstm(
			     id_c
				,haa_codes_id1_c
				,haa_codes_id2_c
				,haa_codes_id_c
				,contract_revision_c
				,contract_number_c
				,data_source_id_c
				,attribute1_c
				,attribute2_c
				,attribute3_c
				,attribute4_c
				,attribute5_c
				,attribute6_c
				,haa_frameworks_id_c)
				 value(
				 "' . $contact_id . 
				 '","' . $newBean->haa_codes_id1_c . 
				 '","' . $newBean->haa_codes_id2_c . 
				 '","' . $newBean->haa_codes_id_c . 
				 '","' . $newBean->revision_c . 
				 '","' . $order_number_val . 
				 '","' . $newBean->data_source_id_c . 
				 '","' . $newBean->attribute1_c . 
				 '","' . $newBean->attribute2_c . 
				 '","' . $newBean->attribute3_c . 
				 '","' . $newBean->attribute4_c . 
				 '","' . $newBean->attribute5_c . 
				 '","' . $newBean->attribute6_c . 
				 '","'.$frame_bean->id.'") ';
			$insert_cstm_result = $db->query($insert_cstm_sql);
			$GLOBALS['log']->infor("insert_cstm_sql = " . $insert_cstm_sql);
			
			$GLOBALS['log']->infor("header_id = " . $newBean->id . ",header_name=" . $sales_document_name_val . ",org_name_val=" . $org_name_val . ",sold_to_org_name_val" . $sold_to_org_name_val . ",sale_unit_val=" . $sale_unit_val . ",salesrep_name_val=" . $salesrep_name_val . ",contract_type_val=" . $contract_type_val . ",order_type_name_val" . $order_type_name_val . ",frame_contract_num_val=" . $frame_contract_num_val . ",start_date=" . $h_start_date_active_val);
			foreach ($record['LINES'] as $line_key => $line_value) {
				$contract_line_id_val = $line_value['CONTRACT_LINE_ID'];
				$line_num_val = $line_value['LINE_NUM'];
				$contract_header_id_val = $line_value['CONTRACT_HEADER_ID'];
				$item_number_val = $line_value['ITEM_NUMBER'];
				$inventory_item_id_val = $line_value['INVENTORY_ITEM_ID'];
				$inventory_item_name_val = $line_value['INVENTORY_ITEM_NAME'];
				$parent_description_val = $line_value['PARENT_DESCRIPTION'];
				$open_type_val = $line_value['OPEN_TYPE'];
				$uom_code_val = $line_value['UOM_CODE'];
				$quantity_val = $line_value['QUANTITY'];
				$start_date_active_val = $line_value['START_DATE_ACTIVE'];
				$end_date_active_val = $line_value['END_DATE_ACTIVE'];
				$formula_type_code_val = $line_value['FORMULA_TYPE_CODE'];
				$GLOBALS['log']->infor("line_id= " . $contract_line_id_val . ",LINE_NUMBER=" . $line_num_val . ",item_number_val=" . $item_number_val . ",inventory_item_name_val=" . $inventory_item_name_val."producty_quantity= ".$quantity_val);
				//$check_line_exists = BeanFactory :: getBean('AOS_Products_Quotes')->get_full_list('', "aos_products_quotes.product_source_id_c = '$contract_line_id_val'");
				
				$sql = 'SELECT count(1) cnt FROM aos_products_quotes INNER JOIN aos_products_quotes_cstm WHERE aos_products_quotes.id = aos_products_quotes_cstm.id_c and aos_products_quotes.deleted=0 AND aos_products_quotes_cstm.product_source_id_c ="' . $contract_line_id_val . '"';
				$result = $db->query($sql);
				$rows = 0;
				$GLOBALS['log']->infor("line_sql=".$sql );
				while ($resule_asset = $db->fetchByAssoc($result)) {
					$rows = $resule_asset['cnt'];
				}
				if ($rows == 0) {
					$newLineBean = BeanFactory :: getBean('AOS_Products_Quotes');
					$newLineBean->parent_id = $newBean->id;
					$newLineBean->data_source_id_c = $contract_line_id_val;
					$newLineBean->name = $inventory_item_name_val;
					//INVENTORY_ITEM_name
					/*$item_list = BeanFactory :: getBean('AOS_Products')->get_full_list('', "aos_products.part_number = '$item_number_val'");
					if (count($item_list) != 0) {
						$newLineBean->product_id = $item_list[0]->id;
					}*/
					$item_list_sql = 'SELECT aos_products.id  FROM aos_products  WHERE aos_products.deleted=0 and aos_products.part_number ="' . $item_number_val . '"';
					$item_list_result = $db->query($item_list_sql);
					while ($item_list_record = $db->fetchByAssoc($item_list_result)) {
						$record_val = $item_list_record['id'];
						$newLineBean->product_id = $record_val;
					}
					
					
					$newLineBean->product_discount = $parent_description_val;
					if(empty($parent_description_val)){
						$newLineBean->product_discount =null;
					}
					$newLineBean->vat_amt = $open_type_val;
					$newLineBean->product_qty = $quantity_val;
					$newLineBean->effective_start_c = $start_date_active_val;
					$newLineBean->effective_end_c = $end_date_active_val;
					$newLineBean->parent_type = 'AOS_Contracts';
					$newLineBean->product_source_id_c = $contract_line_id_val;
					//$newLineBean->save();
					$aos_products_quotes_id = create_guid();
					$insert_sql = 'insert into aos_products_quotes(
									 id
									,name
									,product_id
									,description
									,product_qty
									,item_description
									,parent_id
									,parent_type)
									 value(
									 "' . $aos_products_quotes_id . 
									 '","' . $inventory_item_name_val . 
									 '","' . $newLineBean->product_id . 
									 '","' . $newLineBean->product_discount . 
									 '","' . $newLineBean->product_qty . 
									  '","' . $formula_type_code_val . 
									  '","' . $contact_id . 
									 '","' . $newLineBean->parent_type .
									 '") ';
						$insert_result = $db->query($insert_sql);
						$GLOBALS['log']->infor("insert_aos_products_quotes_sql=".$insert_sql);
						$insert_cstm_sql = 'insert into aos_products_quotes_cstm(
							 id_c
							,effective_start_c
							,effective_end_c
							,product_source_id_c
							)
							 value(
							 "' . $aos_products_quotes_id . 
							 '","' . $start_date_active_val . 
							 '","' . $end_date_active_val . 
							 '","' . $newLineBean->product_source_id_c . 
							 '") ';
						$insert_cstm_result = $db->query($insert_cstm_sql);
				}
			}
			
		}else{
			//更新合同状态
			$status_code = array_search($flow_status_name_val, $app_list_strings['contract_type_list'], true);
			$sql = 'SELECT aos_contracts.id cnt FROM aos_contracts INNER JOIN aos_contracts_cstm WHERE aos_contracts.id = aos_contracts_cstm.id_c and aos_contracts.deleted=0 AND aos_contracts_cstm.data_source_id_c ="' . $h_contract_header_id_val . '"';
			$result = $db->query($sql);
			while ($resule_asset = $db->fetchByAssoc($result)) {
				$contract_id = $resule_asset['id'];
			}
			$contract_bean = BeanFactory::getBean('AOS_Contracts',$contract_id);
			if($contract_bean->status!=$status_code){
				$contract_bean->status=$status_code;
				$contract_bean->save();
			}
		}
	
	}
	$GLOBALS['log']->infor("end   sync xr contracts data");
	return true;
}

function sync_xr_po_infos() {
	global $db;
	$soap_util_bean = new SoapUtil();
	$json_array = $soap_util_bean->call_soap_ws("PO", "XR");
	$GLOBALS['log']->infor("begin to sync xr PO Infos data");
	//$GLOBALS['log']->infor($json_array);
	//业务框架
	$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
		'code' => 'ChinaCache'
	));
	$frame_id = $frame_bean->id;

	//处理数据
	if (count($json_array) > 0) {
		foreach ($json_array as $key => $record) {
			$po_header_id_val = $record['PO_HEADER_ID'];
			$po_number_val = $record['PO_NUMBER'];
			$vendor_name_val = $record['VENDOR_NAME'];
			$comments_val = $record['COMMENTS'];
			$org_name_val = $record['ORG_NAME'];
			$instance_name_val = $record['INSTANCE_NAME'];
			$item_num_val = $line_value['ITEM_NUM'];

			foreach ($record['LINES'] as $line_key => $line_value) {
				//判断是否数据库是否已经存在这个订单行 如果存在则不插入
				$po_line_id_val = $line_value['PO_LINE_ID'];
				$line_num_val = $line_value['LINE_NUM'];
				$po_header_id_val = $line_value['PO_HEADER_ID'];
				$inventory_item_id_val = $line_value['ITEM_ID'];
				$item_description_val = $line_value['ITEM_DESCRIPTION'];
				$unit_val = $line_value['UNIT'];
				$quantity_val = $line_value['QUANTITY'];
				$unit_price_val = $line_value['UNIT_PRICE'];
				$category_name_val = $line_value['CATEGORY_NAME'];
				$prod_code_val = $line_value['PROD_CODE'];
				$prod_name_val = $line_value['PROD_NAME'];
				$need_by_val = $line_value['NEED_BY'];
				$cost_center_dis = $line_value['COST_CENTER'];
				
				$cost_center_bean = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
													'code_type' => 'asset_main_cost_center',
													'name' => cost_center_dis));

				$GLOBALS['log']->infor("header_id   = " . $po_header_id_val . ',line_number=' . $line_num_val . ",item_name=" . $line_num_val . ",line_id=" . $po_line_id_val);

				$check_exists = BeanFactory :: getBean('HAT_Asset_Sources')->get_full_list('', "hat_asset_sources.source_id = '$po_line_id_val'");

				if ($check_exists == 0) {
					$newLineBean = BeanFactory :: newBean('HAT_Asset_Sources');
					$newLineBean->name = $po_number_val . ':' . $line_num_val;
					$newLineBean->header_num = $po_number_val;
					$newLineBean->supplier_desc = $vendor_name_val;
					$newLineBean->description = $item_description_val;
					$newLineBean->source_type = $instance_name_val;
					$newLineBean->line_num = $line_num_val;
					$newLineBean->item_num = $item_num_val;
					$newLineBean->line_qty = $quantity_val;
					$newLineBean->line_price = $unit_price_val;
					$newLineBean->source_reference = $prod_name_val;
					$newLineBean->haa_frameworks_id = $frame_id;
					$newLineBean->source_id = $po_line_id_val;
					$newLineBean->haa_frameworks_id = $frame_bean->id;
					$newLineBean->cost_center = $cost_center_bean->id;
					$newLineBean->need_by = $need_by_val;
					$newLineBean->save();
				}
			}
		}
}
		$GLOBALS['log']->infor("end sync xr PO Infos data");
		return true;
	}


?>
