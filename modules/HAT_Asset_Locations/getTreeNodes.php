<?php
/**
 * 本文件被js/editview_treeview.js调用，在点击树节点时调用本文件，返回一个Jason形式的子节点信息
 * 本文件参数有@id，@type[location or asset]
 * 返回的JASON示例：
 * {"node":[{"id":"92a3dde3-47a1-7467-8e26-56b74a8bed37","html":" V-SH01 : Shanghai Hongqiao Area","type":"location"},{"id":"1f790755-182c-d9bd-9e9e-56b74a64455c","html":" V-SH02 : Shanghai Pudong Area","type":"location"}]}

可以用以下方法测试：index.php?module=HAT_Asset_Locations&action=getTreeNodes&return_module=HAT_Asset_Locations&return_action=index&type=using_org_business_type

Functional Location
	location--> asset

Owning Org
	owning_org_top-->owning_org_top-->own_org-->(grouped_contact)-->(grouped_product)-->asset

Using Org
	using_org_top-->using_org_top-->using_org-->(grouped_contact)-->(grouped_product)-->asset



 */



error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

global $db;
$txt_jason ='';

$current_framework=(isset($_SESSION["current_framework"]))?$_SESSION["current_framework"]:"";

require_once('modules/HAT_Asset_Locations/getTreeNodeList.php');//所有的默认搜索都从这个文件进行处理
//require_once('modules/HAT_Asset_Locations/getTreeviewSearch.php');//所有附加的搜索这个文件进行处理


if($_REQUEST['type']=="location") { //如果是Locationg来源，需要读取子位置和子资产（Asset来源只需要子资产）
        $sel_sub_location ="SELECT 
                            `hat_asset_locations`.id,
                            `hat_asset_locations`.name,
                            `hat_asset_locations`.location_title,
                            `hat_asset_locations`.location_icon
                          FROM
                            hat_asset_locations,
                            ham_maint_sites
                          WHERE hat_asset_locations.deleted = 0";
        if (isset($_REQUEST['site_id'])&&$_REQUEST['site_id']!="undefined"&&$_REQUEST['site_id']!="") {
          //只列出当前Site下的地点
          $sel_sub_location .= " AND hat_asset_locations.`ham_maint_sites_id` = `ham_maint_sites`.id AND hat_asset_locations.`ham_maint_sites_id` = '".$_REQUEST['site_id']."'";
        } else {
         //取出当前业务框架下的所有地点+所有没有Site的地点
          $sel_sub_location .= " AND (hat_asset_locations.`ham_maint_sites_id`= '' OR (hat_asset_locations.`ham_maint_sites_id` = `ham_maint_sites`.id AND ham_maint_sites.`haa_frameworks_id`='".$current_framework."'))";
        }

        if (isset($_REQUEST['id'])) {//如果指明了当前的ID
            $sel_sub_location .= " AND parent_location_id = '".$_REQUEST['id']."'";
        } else {
            $sel_sub_location .= " AND (parent_location_id = '' || parent_location_id IS NULL)";
        }

        $sel_sub_location .= " ORDER BY name";

    //echo($sel_sub_location);

    $bean_locations =  $db-> query($sel_sub_location);

    while ( $location = $db->fetchByAssoc($bean_locations) ) {
           $txt_jason .='{id:"'.$location['id'].'",';
           $txt_jason .='img:"'.$location['location_icon'].'",';
           $txt_jason .='code:"'.$location['name'].'",';
           $txt_jason .='desc:"'.$location['location_title'].'",';
          // $txt_jason .='status_tag:"color_asset_status_'.$asset['asset_status'].'",';
          // $txt_jason .='status:"'.$app_list_strings['hat_asset_status_list'][$asset['asset_status']].'",';
            $txt_jason .='type:"location"},';
    }

    if (isset($_REQUEST['id'])) {
        $sel_sub_asset ="SELECT 
                        hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status, hit_racks.id rack_id
                    FROM
                        hat_assets
                        LEFT JOIN
                        hit_racks ON (hit_racks.`deleted`=0 AND hit_racks.`hat_assets_id`=hat_assets.id),
                        hat_asset_locations_hat_assets_c
                    WHERE
                        hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_assets_idb = hat_assets.id
                            AND hat_asset_locations_hat_assets_c.deleted = 0
                            AND hat_assets.deleted = 0
                            AND (hat_assets.parent_asset_id = '' OR hat_assets.parent_asset_id IS NULL)
                            AND hat_assets.haa_frameworks_id='".$current_framework."'
                            AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_asset_locations_ida ='".$_REQUEST['id']."' ORDER by hat_assets.name ASC";
    }

} elseif ($_REQUEST['type']=="owning_org_business_type"||$_REQUEST['type']=="using_org_business_type") {
	//组织先显示组织的业务类型
	$sql_string ="SELECT id,name FROM haa_codes WHERE code_type='account_business_type'	 AND deleted=0
					 ORDER BY name";

    $get_sql_results =  $db-> query($sql_string);//加载所有的组织类型
    while ( $sql_result = $db->fetchByAssoc($get_sql_results) ) {
            $txt_jason .='{id:"'.$sql_result['id'].'",';
            $txt_jason .='name:"<span class=\'treeview_location\'> '.$sql_result['name'].'</span>",';
            //$txt_jason .='name:"<span class=\'treeview_location\'> '.$sql_result['name'].'</span> <span class="color_tag color_asset_status_'.$sql_result['asset_status'].'">'.$sql_result['asset_status'].'</span",';
            $txt_jason .='type:"'.($_REQUEST['type']=="using_org_business_type"?"using_org_top":"owning_org_top").'"},';
            //类型为using_org_top或owning_org_top
            //也就是组织类型显示完成后，下一层显示为组织清单（按组织类型）
    }

} elseif ($_REQUEST['type']=="owning_org_top"||$_REQUEST['type']=="using_org_top") {
	//显示第一次的组织，第一层的组织挂接在组织类型之下
	$sql_string ="
                    SELECT accounts.id, accounts.name
                    FROM
                      accounts 
                      LEFT JOIN accounts_cstm 
                        ON (accounts_cstm.`id_c` = accounts.`id`)
                    WHERE accounts_cstm.`is_asset_org_c`=1
                      AND accounts.`deleted` = 0
                      AND accounts_cstm.haa_codes_id1_c = '". (isset($_REQUEST['id'])?$_REQUEST['id']:"")."'
					 ORDER BY name";

    $get_sql_results =  $db-> query($sql_string);//加载所有的组织类型
    while ( $sql_result = $db->fetchByAssoc($get_sql_results) ) {
            $txt_jason .='{id:"'.$sql_result['id'].'",';
            $txt_jason .='name:"<span class=\'treeview_location\'> '.$sql_result['name'].'</span>",';
            $txt_jason .='type:"'.($_REQUEST['type']=="using_org"?"using_org":"owning_org").'"},';
            //类型为using_org_top或owning_org_top
    }

} elseif ($_REQUEST['type']=="owning_org"||$_REQUEST['type']=="using_org") { 
//如果是ORG则加载所有的组织，也就是从第二层组织开始，挂接到父组织之下
  $sql_string ="
                    SELECT accounts.id, accounts.name
                    FROM
                      accounts 
                      LEFT JOIN accounts_cstm 
                        ON (accounts_cstm.`id_c` = accounts.`id`)
                    WHERE accounts_cstm.`is_asset_org_c`=1
                      AND accounts.`deleted` = 0
                      AND accounts.parent_id = '". (isset($_REQUEST['id'])?$_REQUEST['id']:"")."'
					 ORDER BY name";

    $bean_orgs =  $db-> query($sql_string);//加载所有的组织
    while ( $org = $db->fetchByAssoc($bean_orgs) ) {
            $txt_jason .='{id:"'.$org['id'].'",';
            $txt_jason .='name:"<span class=\'treeview_location\'> '.$org['name'].'</span>",';
            $txt_jason .='type:"'.$_REQUEST['type'].'"},';
    }

    if (isset($_REQUEST['id'])) {

    	if ($_REQUEST['id']!="UNASSIGNED") {
	    //找当前节点下accounts.id = owning_org_id或using_org_id的资产
	    //如果当前的ID=“UNASSSIGNED"。显示所有没有分配的资产。
          $sel_asset_grouped_by_contact ="SELECT 
                        contacts.id, contacts.`first_name`,contacts.`last_name`
                      FROM
                        contacts 
                      WHERE  contacts.deleted=0 AND contacts.id IN 
                        (SELECT 
                          owning_person_id 
                        FROM
                          hat_assets,
                          accounts
                        WHERE accounts.id = hat_assets.owning_org_id 
                          AND accounts.deleted = 0 
                          AND hat_assets.deleted = 0 
                          AND hat_assets.parent_asset_id = '' 
                                      AND hat_assets.owning_org_id ='".$_REQUEST['id']."'
                        GROUP BY hat_assets.owning_person_id)
                      ORDER BY contacts.first_name, contacts.last_name";
            //echo $sel_asset_grouped_by_contact;

	        $sel_sub_asset ="SELECT
	                        hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status,hit_racks.id rack_id
	                    FROM
	                        hat_assets
                        LEFT JOIN
                        hit_racks ON (hit_racks.`deleted`=0 AND hit_racks.`hat_assets_id`=hat_assets.id),
	                        accounts
	                    WHERE
	                        accounts.id = hat_assets.".$_REQUEST['type']."_id
	                            AND accounts.deleted = 0
	                            AND hat_assets.deleted = 0
	                            AND hat_assets.parent_asset_id = ''
	                            AND accounts.id ='".$_REQUEST['id']."'
	                    ORDER BY hat_assets.name";
    	} else {
    		//显示组织下挂接的资产
	        $sel_sub_asset ="SELECT  hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status
	        					FROM hat_assets 
	        					WHERE hat_assets.`deleted`=0 
                      AND hat_assets.haa_frameworks_id='".$current_framework."'
                      AND hat_assets.".$_REQUEST['type']."_id=''
	                    ORDER BY hat_assets.name";



	    }
    }
} elseif ($_REQUEST['type']=="product_category"||$_REQUEST['type']=="asset_catergory") { //无论是产品还是资产分类，都加载产品分类树
  $sql_string ="SELECT 
  					id,name 
  					FROM aos_product_categories 
  					WHERE aos_product_categories.`deleted`=0 
  						AND aos_product_categories.`parent_category_id`= '". (isset($_REQUEST['id'])?$_REQUEST['id']:"")."'
					 ORDER BY name";

    $get_sql_results =  $db-> query($sql_string);//加载所有的组织
    while ( $sql_result = $db->fetchByAssoc($get_sql_results) ) {
            $txt_jason .='{id:"'.$sql_result['id'].'",';

            $txt_jason .='name:"<span class=\'treeview_location\'> '.$sql_result['name'].'</span>",';
            $txt_jason .='type:"'.$_REQUEST['type'].'"},';
    }

    if (isset($_REQUEST['id'])) {
    	if ($_REQUEST['type']=="product_category") {
	        $sel_aseet_group ="SELECT 
								  aos_products.id,
								  aos_products.name,
								  aos_products_cstm.icon_c
								FROM
								  aos_product_categories,
								  aos_products LEFT JOIN aos_products_cstm ON aos_products_cstm.id_c=aos_products.id
								WHERE aos_products.`deleted` = 0 
								  AND aos_product_categories.deleted=0
								  AND aos_products.aos_product_category_id = aos_product_categories.id
								  AND  aos_product_categories.id='".$_REQUEST['id']."'
	                    ORDER BY aos_products.name";
    $get_sql_results =  $db-> query($sel_aseet_group);//加载所有的组织类型
    while ( $sql_result = $db->fetchByAssoc($get_sql_results) ) {
            $txt_jason .='{id:"'.$sql_result['id'].'",';
            $txt_jason .='name:"<i class=\'zmdi '.$sql_result['icon_c'].' icon-hc-lg \'></i> <span class=\'treeview_product\'> '.$sql_result['name'].'</span>",';
            $txt_jason .='type:"product"},';
           }
    	}
    }
} elseif ($_REQUEST['type']=="product"&&isset($_REQUEST['id'])) {
  $sql_string ="SELECT 
  					hat_assets.id, hat_assets.name, hat_assets.asset_desc,  hat_assets.asset_icon
  					FROM hat_assets
  					WHERE hat_assets.`deleted`=0 
              AND hat_assets.haa_frameworks_id='".$current_framework."'
              AND hat_assets.`aos_products_id` = '".$_REQUEST['id']."'
					 ORDER BY name";
    $sel_sub_asset =$sql_string;

} elseif ($_REQUEST['type']=="asset") { //如果是Asset来源，只要读取下面的子资产,以Asset的ID检索
    $sel_sub_asset ="SELECT 
                        hat_assets.id, hat_assets.name, hat_assets.asset_desc,  hat_assets.asset_icon, hat_assets.asset_status, hit_racks.id rack_id
                    FROM 
                        hat_assets LEFT JOIN
                        hit_racks ON (hit_racks.`deleted`=0 AND hit_racks.`hat_assets_id`=hat_assets.id)
                    WHERE 
                        hat_assets.deleted=0 
                        AND hat_assets.haa_frameworks_id='".$current_framework."'
                        AND hat_assets.parent_asset_id = '".$_REQUEST['id']."'";

}
//echo($sel_sub_asset);



if (isset($sel_asset_grouped_by_contact)) {
    $get_sql_results = $db->query($sel_asset_grouped_by_contact); //无如是Location还是asset来源，都可以显示子资产
    //if(is_array($bean_assets)) {
        while ( $result = $db->fetchByAssoc($get_sql_results) ) {
           $txt_jason .='{id:"'.$result['id'].'",';
           $txt_jason .='icon:"",';
           $txt_jason .='code:"'.$result['last_name'].'",';
           $txt_jason .='type:"grouped_contact"},';
        }
    //}
}


if (isset($sel_sub_asset)) {
    $bean_assets = $db->query($sel_sub_asset); //无如是Location还是asset来源，都可以显示子资产
    //if(is_array($bean_assets)) {
        while ( $asset = $db->fetchByAssoc($bean_assets) ) {
           $txt_jason .='{id:"'.$asset['id'].'",';
           //$txt_jason .='name:"<i class=\'zmdi '.$asset['asset_icon'].' icon-hc-lg \'></i> <span class=\'treeview_asset\'>'.$asset['name'].'</span>: '.$asset['asset_desc'].'",';
           $txt_jason .='img:"'.$asset['asset_icon'].'",';
           $txt_jason .='code:"'.$asset['name'].'",';
           $txt_jason .='desc:"'.$asset['asset_desc'].'",';

           if (isset($asset['rack_id'])) {
            $txt_jason .='rack_id:"'.$asset['rack_id'].'",';
           }

           $txt_jason .='status_tag:"color_asset_status_'.$asset['asset_status'].'",';
           $txt_jason .='status:"'.$app_list_strings['hat_asset_status_list'][$asset['asset_status']].'",';
           $txt_jason .='type:"asset"},';
        }
    //}
}

$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);
//$txt_jason='{"node":['.$txt_jason.']}';
$txt_jason='['.$txt_jason.']';
echo($txt_jason);

exit();