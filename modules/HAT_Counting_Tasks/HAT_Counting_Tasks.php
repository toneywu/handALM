<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
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
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/HAT_Counting_Tasks/HAT_Counting_Tasks_sugar.php');
class HAT_Counting_Tasks extends HAT_Counting_Tasks_sugar {
	
	function __construct(){
		parent::__construct();
	}

	function save($check_notify = FALSE){
		global $sugar_config;
		global $db;

		$beanBatch = BeanFactory::getBean('HAT_Counting_Batchs', $this->hat_counting_batchs_id_c);
		$this->name=$beanBatch->name;
			//拼接盘点任务名称
		$sql_loc="SELECT
		hal.`name` loc_name
		FROM
		hat_asset_locations hal
		WHERE
		1 = 1
		AND hal.id = '".$this->hat_asset_locations_id_c."'";
		$result_loc=$db->query($sql_loc);
		if($row_loc=$db->fetchByAssoc($result_loc)){
			if($row_loc["loc_name"]){
				$this->name=$row_loc["loc_name"].'-'.$this->name;
			}
		}

		$sql_org="SELECT
		hal.`name` org_name
		FROM
		accounts hal
		WHERE
		1 = 1
		AND hal.id = '".$this->account_id_c."'";
		$result_org=$db->query($sql_org);
		if($row_org=$db->fetchByAssoc($result_org)){
			if($row_org["org_name"]){
				$this->name=$row_org["org_name"].'-'.$this->name;
			}
		}

		$sql_code="SELECT
		hal.`name` code_name
		FROM
		haa_codes hal
		WHERE
		1 = 1
		AND hal.id = '".$this->haa_codes_id_c."'";
		$result_code=$db->query($sql_code);
		if($row_code=$db->fetchByAssoc($result_code)){
			if($row_code["code_name"]){
				$this->name=$row_code["code_name"].'-'.$this->name;
			}
		}

		$sql_cate="SELECT
		hal.`name` cate_name
		FROM
		aos_product_categories hal
		WHERE
		1 = 1
		AND hal.id = '".$this->aos_product_categories_id_c."'";
		$result_cate=$db->query($sql_cate);
		if($row_cate=$db->fetchByAssoc($result_cate)){
			if($row_cate["cate_name"]){
				$this->name=$row_cate["cate_name"].'-'.$this->name;
			}
		}

		$sql_user="SELECT
		(CONCAT_WS(',',hal.last_name,IF (hal.first_name = '',NULL,hal.first_name))) full_name
		FROM
		contacts hal
		WHERE
		1 = 1
		AND hal.id = '".$this->user_contacts_id_c."'";
		$result_user=$db->query($sql_user);
		if($row_user=$db->fetchByAssoc($result_user)){
			if($row_user["full_name"]){
				$this->name=$row_user["full_name"].'-'.$this->name;
			}
		}

		$sql_own="SELECT
		(CONCAT_WS(',',hal.last_name,IF (hal.first_name = '',NULL,hal.first_name))) full_name
		FROM
		contacts hal
		WHERE
		1 = 1
		AND hal.id = '".$this->own_contacts_id_c."'";
		$result_own=$db->query($sql_own);
		if($row_own=$db->fetchByAssoc($result_own)){
			if($row_own["full_name"]){
				$this->name=$row_own["full_name"].'-'.$this->name;
			}
		}


		if($this->task_number==''){
			
			$sql="SELECT
			MAX(hct.task_number) task_number_max,hcb.batch_number
			FROM
			hat_counting_tasks hct,hat_counting_batchs hcb
			WHERE
			hct.hat_counting_batchs_id_c ='".$_REQUEST["hat_counting_batchs_id_c"]."'
			and hcb.id = hct.hat_counting_batchs_id_c";
			$result=$db->query($sql);
			if($row=$db->fetchByAssoc($result)){
				if($row["task_number_max"]){
					$number=substr($row["task_number_max"], -2)+1;
					if($number<10){
						$number="0".$number;
					}
					$this->task_number=substr($row["task_number_max"],0,strlen($row["task_number_max"])-2).$number;

				}else{
					$this->task_number=$row["batch_number"].'01';
				}
			}
		}

		parent::save($check_notify);
	}
	
}
?>