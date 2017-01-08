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
require_once('modules/HIT_IP/HIT_IP_sugar.php');
class HIT_IP extends HIT_IP_sugar {

	function get_list_view_data() {
		//refer to the task module as an example
		//or refer to the asset module as the first customzation module with this feature
		global $app_list_strings, $timedate, $db;
		global $mod_strings, $app_strings;

		$IP_Fields = $this->get_list_view_array();

		//计算当前IP子网的数量
		$sel = "SELECT count(*) sum_ip_qty FROM hit_ip_subnets WHERE hit_ip_subnets.`deleted`=0 AND hit_ip_subnets.`parent_hit_ip_id` ='".$this->id."'";
		$beanSEL = $db->query($sel);
        $COUNT_SUBNET_QTY = 0;
	    while ( $result = $db->fetchByAssoc($beanSEL) ) {
	    	if (!empty ($result['sum_ip_qty']))
				$COUNT_SUBNET_QTY = $result['sum_ip_qty'];

		}
        
		//2016-12-30 
        $SUM_IP_QTY = 256;

        /*var_dump($sel);
        var_dump($result['sum_ip_qty']);
        var_dump($COUNT_SUBNET_QTY);*/

		if ($COUNT_SUBNET_QTY == 0 ) {
			$IP_Fields['STATUS'] = translate('LBL_UNDEFINED','HIT_IP');
			$IP_Fields['COLOR_TAG'] = 'OutOfService';

		} else {
			//计算当前子网已经分派的IP数量，
			$sel = "SELECT sum(ip_qty) sum_ip_a_qty FROM hit_ip_subnets his WHERE his.deleted = 0 AND his.parent_hit_ip_id = '".$this->id."' AND his.ip_type != 0
			AND (his.purpose != '' OR 
			EXISTS 
		(SELECT 1 FROM hit_ip_allocations hia WHERE (hia.accurate_ip = his.id  OR hia.hit_ip_subnets_id = his.id) AND hia.`deleted`=0
		AND (hia.`date_from`='' OR hia.`date_from` IS NULL OR hia.date_from>=CURDATE())
		AND (hia.`date_to`='' OR hia.`date_to` IS NULL OR hia.`date_to`<=CURDATE())))";

			$beanSEL = $db->query($sel);
			$SUM_IP_ALLOCATED_QTY=0;

		    while ( $result = $db->fetchByAssoc($beanSEL) ) {
		    	if (!empty ($result['sum_ip_a_qty']))
					$SUM_IP_ALLOCATED_QTY .= $result['sum_ip_a_qty'];

			}
			//var_dump($sel);
			$sel1 = "SELECT COUNT(*) sum_ip_a_qty FROM hit_ip_subnets his WHERE his.deleted = 0 AND his.parent_hit_ip_id = '".$this->id."' AND his.ip_type != 1
			AND (
			EXISTS 
		(SELECT 1 FROM hit_ip_allocations hia WHERE (hia.accurate_ip = his.id  OR hia.hit_ip_subnets_id = his.id) AND hia.`deleted`=0
		AND (hia.`date_from`='' OR hia.`date_from` IS NULL OR hia.date_from>=CURDATE())
		AND (hia.`date_to`='' OR hia.`date_to` IS NULL OR hia.`date_to`<=CURDATE())))";

			/*$sel1 = "SELECT COUNT(*) sum_ip_a_qty FROM hit_ip_subnets his WHERE his.deleted = 0 AND his.parent_hit_ip_id = '".$this->id."' AND his.ip_type = 0";*/
            $beanSEL1 = $db->query($sel1);
            $result1 = $db->fetchByAssoc($beanSEL1);
            $SUM_IP_ALLOCATED_QTY  +=  $result1['sum_ip_a_qty'];

            //var_dump($sel1);
            /*$sel2 = "SELECT sum(ip_qty) sum_ip_a_qty FROM hit_ip_subnets his WHERE his.deleted = 0 AND his.parent_hit_ip_id = '".$this->id."' AND his.purpose != ''";
            $beanSEL2 = $db->query($sel2);
            $result2 = $db->fetchByAssoc($beanSEL2);
            $SUM_IP_ALLOCATED_QTY  +=  $result2['sum_ip_a_qty'];
            
            var_dump($sel2);*/
            //var_dump($SUM_IP_ALLOCATED_QTY);
			if ($SUM_IP_ALLOCATED_QTY==0) {
				$IP_Fields['STATUS'] = translate('LBL_UNASSIGNED','HIT_IP');
				$IP_Fields['COLOR_TAG'] = 'Idle';

			} else {
				$IP_Fields['STATUS'] = (round(($SUM_IP_ALLOCATED_QTY/$SUM_IP_QTY),4) * 100)."% ".translate('LBL_ASSIGNED','HIT_IP');
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