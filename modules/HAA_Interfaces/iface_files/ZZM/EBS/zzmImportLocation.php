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
class zzmImportLocation {
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
		$beanLines = BeanFactory::getBean('HAA_Integration_Interface_Lines')->get_full_list('id',"haa_integration_interface_lines.haa_integration_interface_headers_id_c='".$interfaceHeaderId."' and haa_integration_interface_lines.line_status!='S'");
		$beanHeaders =  BeanFactory::getBean('HAA_Integration_Interface_Headers',$interfaceHeaderId);
		$status_cnt=0;
		$msg_header='';
		if (isset($beanLines)) {
			foreach ($beanLines as $beanLine) {
				if(isset($beanHeaders)){
					$beanDatas = BeanFactory::getBean('HAT_Asset_Locations')->get_full_list('id',"hat_asset_locations.name='".$beanLine->value2."' AND EXISTS (
						SELECT
						*
						FROM
						ham_maint_sites
						WHERE
						ham_maint_sites.id = hat_asset_locations.ham_maint_sites_id
						AND ham_maint_sites.haa_frameworks_id = '".$beanHeaders->haa_frameworks_id_c."')");
					$data_id="";
					if(isset($beanDatas)){
						foreach ($beanDatas as $beanData) {
							$data_id=$beanData->id;
						}
					}
					$modulesArray=array(
						'id' => $data_id,
						'frameworks' => $beanHeaders->haa_frameworks_id_c,
						'value1' => $beanLine->value1,
						'value2' => $beanLine->value2,
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
		//根据id是否为空判断更新还是新增
		$status_return='E';
		$msg='处理地点信息时出错';
		$module_return=array(
			'status_return'=> $status_return,
			'msg' => $msg,
			);
		$parent_location_id='';
		if($modulesArray['value1']){
			$beanParent = BeanFactory::getBean('HAT_Asset_Locations')->get_full_list('id',"hat_asset_locations.name='".$modulesArray['value1']."' AND EXISTS (
				SELECT
				*
				FROM
				ham_maint_sites
				WHERE
				ham_maint_sites.id = hat_asset_locations.ham_maint_sites_id
				AND ham_maint_sites.haa_frameworks_id = '".$modulesArray['frameworks']."')");
			if(isset($beanParent)){
				foreach ($beanParent as $beanParents) {
					$parent_location_id=$beanParents->id;
				}
			}else{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配父位置节点';
				return $module_return;
			}
		}
		if($modulesArray['id']){
			$beanModules = BeanFactory::getBean('HAT_Asset_Locations',$modulesArray['id']);
		}else{
			$beanModules = BeanFactory::newBean('HAT_Asset_Locations');
			$beanMaint = BeanFactory::getBean('HAM_Maint_Sites')->retrieve_by_string_fields(array (
				'title' => 'default',
				'haa_frameworks_id' => $modulesArray['frameworks'],
				));
			if($beanMaint){
				$beanModules->ham_maint_sites_id=$beanMaint->id;
			}else
			{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配维护地点/区域';
				return $module_return;
			}
			$beanCode = BeanFactory::getBean('HAA_Codes')->retrieve_by_string_fields(array (
				'code_type' => 'asset_location_type',
				'haa_frameworks_id' => $modulesArray['frameworks'],
				'code_tag' => 'default',
				));
			if($beanCode){
				$beanModules->code_asset_location_type=$beanCode->id;
			}else{
				$module_return['status_return']='E';
				$module_return['msg']='无法匹配位置类型';
				return $module_return;
			}
			$beanModules->asset_node=1;
			$beanModules->maint_node=1;
			$beanModules->inventory_mode='NONE';
		}
		$beanModules->parent_location_id=$parent_location_id;
		$beanModules->name=$accountsArray['value2'];
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
