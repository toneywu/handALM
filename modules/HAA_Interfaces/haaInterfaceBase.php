<?php
/**
 * Advanced OpenSales, Advanced, robust set of sales modules.
 * @package Advanced OpenSales for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */


class haaInterfaceBase {

	var $interfaceBaseIndo = array();
	var $interfaceProcessReturn = array();
	var $interfaceProcessClass;
	var $interfaceId='';

	function initInterfaceSetup($ifaceId) {
		global $db;
		
		$sql = "SELECT
		a.auth_key,
		a.auth_user_name,
		a.execute_func_files,
		a.execute_func_name,
		a.interface_type,
		a.interface_code,
		a.own_module,
		a.parameter_info,
		a.haa_codes_id_c,
		a.service_url
		FROM
		haa_interfaces a
		WHERE
		a.id ='" . $ifaceId . "'";

		$sqlresult = $db->query($sql);
		while ($resultrow = $db->fetchByAssoc($sqlresult)) {

			$this->interfaceBaseIndo=$resultrow;
			$this->interfaceId=$ifaceId;
		}
	}

	function execute_Interface_Processor($paramsArray) {
		global $db;
		global $timedate;
		$ifaceId=$paramsArray[0];
		if ($this->interfaceId==''){
			$this->initInterfaceSetup($ifaceId);
		}

		$execute_func_files=$this->interfaceBaseIndo ["execute_func_files"];

		$execute_func_name=$this->interfaceBaseIndo ["execute_func_name"];
		$systemId=$this->interfaceBaseIndo ["haa_codes_id_c"];
		$codeBean=BeanFactory::getBean('HAA_Codes',$systemId);
		if($codeBean){
			$systemCode=$codeBean->code_tag;
		}
		$instance_loc='';
		if(isset($_SESSION["current_framework_code"])){
			$instance_loc='iface_files/'.$_SESSION["current_framework_code"].'/'.$systemCode.'/';
			$include_file='modules/HAA_Interfaces/'.$instance_loc.$execute_func_files.'.php';
		} 
		if(!file_exists($include_file)){
			$instance_loc='iface_files/PUBLIC/'.$systemCode.'/';
			$include_file='modules/HAA_Interfaces/'.$instance_loc.$execute_func_files.'.php';
		}
		if(!file_exists($include_file)){
			die('未能在服务器路径下找到接口执行文件，请联系技术运维人员。');
		}

		require_once($include_file);

		$this->interfaceProcessClass = new $execute_func_files();

		$this->interfaceProcessReturn = $this->interfaceProcessClass->$execute_func_name($paramsArray);
		
		if($this->interfaceProcessReturn["return_status"]=='0'){
			$interfaceLog = BeanFactory::getBean('HAA_Interface_Logs');
			$interfaceLog->haa_interface_id_c =$ifaceId;
			$interfaceLog->seq = $db->getOne("SELECT ifnull(MAX(seq),0)+1 FROM haa_interface_logs where haa_interface_id_c='".$ifaceId."'");

			$interfaceLog->save(false);
				
			$interface = BeanFactory::getBean('HAA_Interfaces',$ifaceId);
			$interface ->last_sync_date=$timedate->nowDb();
			$interface ->save(false);
		}
	}
}
?>
