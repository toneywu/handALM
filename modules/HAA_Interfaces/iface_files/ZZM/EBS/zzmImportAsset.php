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
class zzmImportAsset {
	//入口函数
	function importMain($paramsArray) {
		global $db;
		$return=array();
		$interfaceHeaderId=$paramsArray[1];

		$return["return_status"]='0';
		$return["msg_data"]='';
		$return["rtn_key"]='';
		$return["rtn_attr1"]='';
		$return["rtn_attr2"]='';
		$return["rtn_attr3"]='';
		$return["rtn_attr4"]='';
		$return["rtn_attr5"]='';
		$return["rtn_attr6"]='';
		$return["rtn_attr7"]='';
		$return["rtn_attr8"]='';

		//todo
		$beanLines = BeanFactory::getBean('HAA_Integration_Interface_Lines')->get_full_list('id',"haa_integration_interface_lines.haa_integration_interface_headers_id_c='".$interfaceHeaderId."'");
		$beanHeaders =  BeanFactory::getBean('HAA_Integration_Interface_Headers',$interfaceHeaderId);
		$status_cnt=0;
		$msg_header='';
		if (isset($beanLines)) {
			foreach ($beanLines as $beanLine) {
				if(isset($beanHeaders)){
					$beanDatas = BeanFactory::getBean('HAT_Assets')->retrieve_by_string_fields(array (
						'asset_number' => $beanLine->value3,
						'haa_frameworks_id' => $beanHeaders->haa_frameworks_id_c,
						));
					$data_id="";
					if($beanDatas){
						$data_id=$beanDatas->id;
					}
					$modulesArray=array(
						'id' => $data_id,
						'frameworks' => $beanHeaders->haa_frameworks_id_c,
						'value1' => $beanLine->value1,
						'value2' => $beanLine->value2,
						'value3' => $beanLine->value3,
						'value4' => $beanLine->value4,
						'value5' => $beanLine->value5,
						'value6' => $beanLine->value6,
						'value7' => $beanLine->value7,
						'value8' => $beanLine->value8,
						'value9' => $beanLine->value9,
						'value10' => $beanLine->value10,
						'value11' => $beanLine->value11,
						'value12' => $beanLine->value12,
						'value13' => $beanLine->value13,
						);
					$module_return=array();
					$module_return=$this->setModule($modulesArray);
					$lineArray=array(
						'id' => $beanLine->id,
						'status' => $module_return['status_return'],
						'msg' => $module_return['msg'],
						);
					$line_return=$this->updateLine($lineArray);
					if($line_return['status']=='E'){
						$status_cnt=1;
						$msg_header=$line_return['msg'].'line_id='.$beanLine->id;
						break;
					}
				}
			}
		}
		$date_sql="select now() time;";
		$result_date = $db->query($date_sql);
		$row_time = $db->fetchByAssoc($result_date);
		$beanHeaders->process_date=$row_time['time'];
		if($status_cnt==0){
			$status_header='S';
		}else{
			$status_header='IE';
		}
		$beanHeaders->process_status=$status_header;
		$beanHeaders->process_message=$msg_header;
		$beanHeaders->save();
		if ($status_header!='S'){
			$return['return_status']='1';
			$return['msg_data']=$msg_header;
		}
		return $return;
	}

	function setModule($modulesArray){
		global $app_list_strings;
		//根据id是否为空判断更新还是新增
		$status_return='E';
		$msg='处理资产信息时出错';
		$module_return=array(
			'status_return'=> $status_return,
			'msg' => $msg,
			);
		if($modulesArray['value1']){
			$beanParent = BeanFactory::getBean('AOS_Products')->retrieve_by_string_fields(array (
				'name' => $modulesArray['value1'],
				'haa_frameworks_id_c' => $modulesArray['frameworks'],
				));
			if($beanParent){
				$aos_products_id=$beanParent->id;
			}else{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配产品资产组';
				return $module_return;
			}
		}else{
			$module_return['status_return']='E';
			$module_return['msg']='产品资产组为空';
			return $module_return;
		}
		$aos_product_categories_id='';
		if($modulesArray['value2']){
			$beanParent = BeanFactory::getBean('AOS_Product_Categories')->retrieve_by_string_fields(array (
				'name' => $modulesArray['value2'],
				));
			if($beanParent){
				$aos_product_categories_id=$beanParent->id;
			}else{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配资产类别';
				return $module_return;
			}
		}
		if($modulesArray['value5']){
			$enable_fa=1;
			$beanParent = BeanFactory::getBean('HFA_Fixed_Assets')->retrieve_by_string_fields(array (
				'name' => $modulesArray['value5'],
				'haa_frameworks_id' => $modulesArray['frameworks'],
				));
			if($beanParent){
				$fixed_asset_id=$beanParent->id;
			}else{
				$beanAssets = BeanFactory::newBean('HFA_Fixed_Assets');
				$beanAssets->haa_frameworks_id=$modulesArray['frameworks'];
				$beanAssets->name=$modulesArray['value5'];
				$beanAssets->save();
				$fixed_asset_id=$beanAssets->id;
			}
		}else{
			$enable_fa=0;
			$fixed_asset_id='';
		}
		$using_org_id='';
		if($modulesArray['value6']){
			$beanParent = BeanFactory::getBean('Accounts')->retrieve_by_string_fields(array (
				'name' => $modulesArray['value6'],
				'haa_frameworks_id_c' => $modulesArray['frameworks'],
				));
			if($beanParent){
				$using_org_id=$beanParent->id;
			}else{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配使用部门或使用组织';
				return $module_return;
			}
		}
		$major_owning_dept_id='';
		if($modulesArray['value7']){
			$beanParent = BeanFactory::getBean('Accounts')->retrieve_by_string_fields(array (
				'name' => $modulesArray['value7'],
				'haa_frameworks_id_c' => $modulesArray['frameworks'],
				));
			if($beanParent){
				$major_owning_dept_id=$beanParent->id;
			}else{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配归口管理部门或专业归口组织';
				return $module_return;
			}
		}
		$owning_org_id='';
		if($modulesArray['value8']){
			$beanParent = BeanFactory::getBean('Accounts')->retrieve_by_string_fields(array (
				'name' => $modulesArray['value8'],
				'haa_frameworks_id_c' => $modulesArray['frameworks'],
				));
			if($beanParent){
				$owning_org_id=$beanParent->id;
			}else{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配所属组织';
				return $module_return;
			}
		}
		$hat_asset_locations_hat_assetshat_asset_locations_ida='';
		if($modulesArray['value9']){
				$beanParent = BeanFactory::getBean('HAT_Asset_Locations')->get_full_list('id',"hat_asset_locations.name='".$modulesArray['value9']."' AND EXISTS (
				SELECT
				*
				FROM
				ham_maint_sites
				WHERE
				ham_maint_sites.id = hat_asset_locations.ham_maint_sites_id
				AND ham_maint_sites.haa_frameworks_id = '".$modulesArray['frameworks']."')");
			if(isset($beanParent)){
				foreach ($beanParent as $beanParents) {
					$hat_asset_locations_hat_assetshat_asset_locations_ida=$beanParents->id;
				}
			}else{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配地点或资产位置';
				return $module_return;
			}
		}
		$asset_status='';
		if($modulesArray['value10']){
			$match_value=0;
			foreach ($app_list_strings['hat_asset_status_list'] as $key => $value) {
				if($value==$modulesArray['value10']){
					$asset_status=$key;
					$match_value=1;
				}
			}
			if($match_value==0){
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配状态或使用状态';
				return $module_return;
			}
		}
		$using_person_id='';
		if($modulesArray['value11']){
			$beanParent = BeanFactory::getBean('Contacts')->retrieve_by_string_fields(array (
				'employee_number_c' => $modulesArray['value11'],
				'haa_frameworks_id_c' => $modulesArray['frameworks'],
				));
			if($beanParent){
				$using_person_id=$beanParent->id;
			}else{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配使用人';
				return $module_return;
			}
		}
		$owning_person_id='';
		if($modulesArray['value12']){
			$beanParent = BeanFactory::getBean('Contacts')->retrieve_by_string_fields(array (
				'employee_number_c' => $modulesArray['value12'],
				'haa_frameworks_id_c' => $modulesArray['frameworks'],
				));
			if($beanParent){
				$owning_person_id=$beanParent->id;
			}else{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配管理人或所属人';
				return $module_return;
			}
		}
		
		if($modulesArray['id']){
			$beanModules = BeanFactory::getBean('HAT_Assets',$modulesArray['id']);
		}else{
			$beanModules = BeanFactory::newBean('HAT_Assets');
			$beanModules->haa_frameworks_id=$modulesArray['frameworks'];
		}
		$beanModules->aos_products_id=$aos_products_id;
		$beanModules->aos_product_categories_id=$aos_product_categories_id;
		$beanModules->asset_number=$modulesArray['value3'];
		$beanModules->asset_name=$modulesArray['value4'];
		$beanModules->asset_desc=$modulesArray['value4'];
		$beanModules->name=$modulesArray['value4'];
		$beanModules->enable_fa=$enable_fa;
		$beanModules->fixed_asset_id=$fixed_asset_id;
		$beanModules->using_org_id=$using_org_id;
		$beanModules->major_owning_dept_id=$major_owning_dept_id;
		$beanModules->owning_org_id=$owning_org_id;
		$beanModules->hat_asset_locations_hat_assetshat_asset_locations_ida=$hat_asset_locations_hat_assetshat_asset_locations_ida;
		$beanModules->asset_status=$asset_status;
		$beanModules->using_person_id=$using_person_id;
		$beanModules->owning_person_id=$owning_person_id;
		$beanModules->save();
		$module_return['status_return']='S';
		$module_return['msg']='';

		return $module_return;
	}
	function updateLine($lineArray){
		$line_return=array(
			'status' => 'E',
			'msg' => '更新行信息失败,line_id='.$lineArray['id'],
			);
		
		$beanLines =  BeanFactory::getBean('HAA_Integration_Interface_Lines',$lineArray['id']);
		$beanLines->line_status=$lineArray['status'];
		$beanLines->process_message=$lineArray['msg'];
		$beanLines->save();
		$line_return['status']=$lineArray['status'];
		$line_return['msg']=$lineArray['msg'];
		return $line_return;
	}
}
?>
