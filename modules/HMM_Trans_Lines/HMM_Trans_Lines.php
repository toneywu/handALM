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
require_once('modules/HMM_Trans_Lines/HMM_Trans_Lines_sugar.php');
class HMM_Trans_Lines extends HMM_Trans_Lines_sugar {

	function save($check_notify=false){
		//在保存之前通过getNumbering生成WO编号
		// 用于产生自动编号
    	if ($this->name=='TBD' || $this->name=='') {
    		$bean_site = BeanFactory::getBean('HAM_Maint_Sites',$this->ham_maint_sites_id);
			$bean_numbering = BeanFactory::getBean('HAA_Numbering_Rule',$bean_site->hmm_trans_lines_haa_numbering_rule_id);

			if (!empty($bean_numbering)) {
			    //取得当前的编号
			    $this->name = $bean_numbering->nextval;
			    //预生成下一个编号，并保存在$bean_numbering中
			    $current_number    =    $bean_numbering->current_number +1;
		        $current_numberstr = "".$current_number;
		        $padding_str ="";
		        for($i=0; $i<$bean_numbering->min_num_strlength; $i++) {
		        	$padding_str =  $padding_str+ "0";
		        }

		        $padding_str = substr($padding_str,0, strlen($padding_str) - strlen($current_numberstr)) + $current_numberstr;
		        $nextval_str = $bean_numbering->perfix.$padding_str;
		        $bean_numbering->current_number = $current_number;
				$bean_numbering->nextval = $nextval_str;
				$bean_numbering->save();
	    	}
		}

		//在保存时，生成HISTORY记录
		if ($_POST['record']=="") { //如果是新的Class，则没有ID，则进一步预分配ID
			$_POST['record'] = create_guid();
			$this->id = $_POST['record'];
			$this->new_with_id = true;
		}



		$bean_trans_history = BeanFactory::getBean('HMM_Trans_History')->retrieve_by_string_fields(array('hmm_trans_lines_id'=>($this->id)));
		if (empty($bean_trans_history)) {
			//如果没有HISTORY数据，则开始添加数据
			//如果已有有HISTORY则不做处理
			//INV_IN, INV_OUT, INV_TRANSFER, INV_WO
			$bean_trans_history = BeanFactory::getBean('HMM_Trans_History');
			$bean_trans_history->hmm_trans_lines_id = $this->id;
			$bean_trans_history->ham_maint_sites_id = $this->ham_maint_sites_id;
			$bean_trans_history->hat_event_type_id = $this->hat_event_type_id;
			$bean_trans_history->item_id = $this->item_id;
			$bean_trans_history->hmm_mo_requests_id = $this->hmm_mo_requests_id;
			$bean_trans_history->ham_woop_id = $this->ham_woop_id;
			$bean_trans_history->trans_date = $this->trans_date;
			$bean_trans_history->secondary_uom_id = $this->secondary_uom_id;
			$bean_trans_history->primary_uom_id = $this->primary_uom_id;
			$bean_trans_history->name = $this->name;
			$bean_trans_history->basic_type = $this->trans_basic_type;
			$bean_trans_history->description = $this->description;

				$GLOBALS['log']->debug("bean_trans_history saved for trans line".$this->id.' type='.$this->trans_basic_type);

			if ($this->trans_basic_type=="INV_IN") {
				//入库，写入正数量
				$bean_trans_history->primary_qty = $this->primary_qty;
				$bean_trans_history->secondary_qty = $this->secondary_qty;
				$bean_trans_history->location_id = $this->to_location_id;
				$bean_trans_history->locator_id = $this->to_locator_id;
				$bean_trans_history->save();

			} elseif($this->trans_basic_type=="INV_OUT" || $this->trans_basic_type=="INV_WO") {
				//出库及发料写入负数量
				$bean_trans_history->primary_qty = -($this->primary_qty);
				$bean_trans_history->secondary_qty = -($this->secondary_qty);
				$bean_trans_history->location_id = $this->from_location_id;
				$bean_trans_history->locator_id = $this->from_locator_id;
				$bean_trans_history->save();

			} elseif ($this->trans_basic_type=="INV_TRANSFER") {
				//转移写入一个正数量一个负数量
				//先写入当前的出库
				$bean_trans_history->primary_qty = -($this->primary_qty);
				$bean_trans_history->secondary_qty = -($this->secondary_qty);
				$bean_trans_history->location_id = $this->from_location_id;
				$bean_trans_history->locator_id = $this->from_locator_id;
				//再写入新的入库
				$bean_trans_history2 = BeanFactory::getBean('HMM_Trans_History');
				$bean_trans_history2->hmm_trans_lines_id = $this->id;
				$bean_trans_history2->ham_maint_sites_id = $this->ham_maint_sites_id;
				$bean_trans_history2->hat_event_type_id = $this->hat_event_type_id;
				$bean_trans_history2->item_id = $this->item_id;
				$bean_trans_history2->hmm_mo_requests_id = $this->hmm_mo_requests_id;
				$bean_trans_history2->ham_woop_id = $this->ham_woop_id;
				$bean_trans_history2->trans_date = $this->trans_date;
				$bean_trans_history2->secondary_uom_id = $this->secondary_uom_id;
				$bean_trans_history2->primary_uom_id = $this->primary_uom_id;
				$bean_trans_history2->name = $this->name;
				$bean_trans_history2->basic_type = $this->trans_basic_type;
				$bean_trans_history2->primary_qty = ($this->primary_qty);
				$bean_trans_history2->secondary_qty = ($this->secondary_qty);
				$bean_trans_history2->location_id = $this->to_location_id;
				$bean_trans_history2->locator_id = $this->to_locator_id;


				$bean_trans_history->save();
				$bean_trans_history2->save();


			}

		}

		parent::save($check_notify); //保存主体
	}

	function __construct(){
		parent::__construct();
	}

}
?>