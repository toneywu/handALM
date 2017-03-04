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
require_once('modules/HIT_IP_Subnets/HIT_IP_Subnets_sugar.php');
class HIT_IP_Subnets extends HIT_IP_Subnets_sugar {


	function get_list_view_data() {
		//refer to the task module as an example
		//or refer to the asset module as the first customzation module with this feature
		global $app_list_strings, $timedate, $db;

		$IP_Fields = $this->get_list_view_array();

		/*$sel = "SELECT hia.id sum_ip_a_qty FROM hit_ip_allocations hia WHERE hia.hit_ip_subnets_id = '".$this->id."' AND hia.`deleted`=0	AND (hia.`date_from`='' OR hia.`date_from` IS NULL OR hia.date_from>=CURDATE()) AND (hia.`date_to`='' OR hia.`date_to` IS NULL OR hia.`date_to`<=CURDATE())";*/
		$sel = "SELECT hia.id sum_ip_a_qty FROM hit_ip_allocations hia WHERE hia.hit_ip_subnets_id = '".$this->id."' AND hia.`deleted`=0 AND (hia.status !='UNEFFECTIVE' or hia.status is null)";


		$beanSEL = $db->query($sel);
		$SUM_IP_ALLOCATED_QTY=0;

		$IP_Fields['STATUS'] = '<span class="color_asset_status_Idle">'.translate('LBL_UNASSIGNED','HIT_IP').'</span>';
		$IP_Fields['COLOR_TAG'] = 'Idle';

	    while ( $result = $db->fetchByAssoc($beanSEL) ) {
	    	if (!empty ($result['sum_ip_a_qty'])) {
				$IP_Fields['STATUS'] = '<span class="color_asset_status_InService">'.translate('LBL_ASSIGNED','HIT_IP').'</span>';
				$IP_Fields['COLOR_TAG'] = 'InService';
			}
		}

		return $IP_Fields;
	}


	function __construct(){
		parent::__construct();
	}

}
?>