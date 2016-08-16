<?php
/**
 * 本文件被js/editview_treeview.js调用，在点击树节点时调用本文件，返回一个Jason形式的子节点信息
 * 本文件参数有@id，@type[location or asset]
 * 返回的JASON示例：
 * {"node":[{"id":"92a3dde3-47a1-7467-8e26-56b74a8bed37","html":" V-SH01 : Shanghai Hongqiao Area","type":"location"},{"id":"1f790755-182c-d9bd-9e9e-56b74a64455c","html":" V-SH02 : Shanghai Pudong Area","type":"location"}]}

可以用以下方法测试：http://localhost/suite/index.php?module=HAT_Asset_Locations&action=getTreeNodes&return_module=HAT_Asset_Locations&return_action=index&type=using_org_business_type

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




if($_REQUEST['type']=="location") { //如果是Locationg来源，需要读取子位置和子资产（Asset来源只需要子资产）
        $sel_sub_location ="SELECT
                            id, name, location_title, location_icon
                        FROM
                            hat_asset_locations
                        WHERE
                            hat_asset_locations.deleted = 0";

        if (isset($_REQUEST['id'])) {//如果指明了当前的ID
            $sel_sub_location .= " AND parent_location_id = '".$_REQUEST['id']."'";
        } else {
            $sel_sub_location .= " AND parent_location_id = ''";
        }

        $sel_sub_location .= " ORDER BY name";

       // echo $sel_sub_location."</br>";

    $bean_locations =  $db-> query($sel_sub_location);


    while ( $location = $db->fetchByAssoc($bean_locations) ) {
            $txt_jason .='{id:"'.$location['id'].'",';
            $txt_jason .='name:"<i class=\'zmdi '.$location['location_icon'].' icon-hc-lg \'></i> <span class=\'treeview_location\'> '.$location['name'].'</span>: '.$location['location_title'].'",';
            $txt_jason .='type:"location"},';
    }

    if (isset($_REQUEST['id'])) {
        $sel_sub_asset ="SELECT 
                        hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon
                    FROM
                        hat_assets,
                        hat_asset_locations_hat_assets_c
                    WHERE
                        hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_assets_idb = hat_assets.id
                            AND hat_asset_locations_hat_assets_c.deleted = 0
                            AND hat_assets.deleted = 0
                            AND hat_assets.parent_asset_id = ''
                            AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_asset_locations_ida ='".$_REQUEST['id']."'";
    }

} elseif ($_REQUEST['type']=="owning_org_business_type"||$_REQUEST['type']=="using_org_business_type") {
	//组织先显示组织的业务类型
	$sql_string ="SELECT id,name FROM haa_codes WHERE code_type='account_business_type'	 AND deleted=0
					 ORDER BY name";

    $get_sql_results =  $db-> query($sql_string);//加载所有的组织类型
    while ( $sql_result = $db->fetchByAssoc($get_sql_results) ) {
            $txt_jason .='{id:"'.$sql_result['id'].'",';
            $txt_jason .='name:"<span class=\'treeview_location\'> '.$sql_result['name'].'</span>",';
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
	                        hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon
	                    FROM
	                        hat_assets,
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
	        $sel_sub_asset ="SELECT  hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon 
	        					FROM hat_assets 
	        					WHERE hat_assets.`deleted`=0 AND hat_assets.".$_REQUEST['type']."_id=''
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
  					WHERE hat_assets.`deleted`=0 AND hat_assets.`aos_products_id` = '".$_REQUEST['id']."'
					 ORDER BY name";
    $sel_sub_asset =$sql_string;

} elseif ($_REQUEST['type']=="asset") { //如果是Asset来源，只要读取下面的子资产,以Asset的ID检索
    $sel_sub_asset ="SELECT 
                        hat_assets.id, hat_assets.name, hat_assets.asset_desc,  hat_assets.asset_icon
                    FROM 
                        hat_assets 
                    WHERE 
                        hat_assets.deleted=0 
                        AND hat_assets.parent_asset_id = '".$_REQUEST['id']."'";

}
//echo($sel_sub_asset);



if (isset($sel_asset_grouped_by_contact)) {
    $get_sql_results = $db->query($sel_asset_grouped_by_contact); //无如是Location还是asset来源，都可以显示子资产
    //if(is_array($bean_assets)) {
        while ( $result = $db->fetchByAssoc($get_sql_results) ) {
           $txt_jason .='{id:"'.$result['id'].'",';
           $txt_jason .='name:"<i class=\'zmdi icon-hc-lg \'></i> <span class=\'treeview_contact\'>'.$result['last_name'].'</span>",';
           $txt_jason .='type:"grouped_contact"},';
        }
    //}
}


if (isset($sel_sub_asset)) {
    $bean_assets = $db->query($sel_sub_asset); //无如是Location还是asset来源，都可以显示子资产
    //if(is_array($bean_assets)) {
        while ( $asset = $db->fetchByAssoc($bean_assets) ) {
           $txt_jason .='{id:"'.$asset['id'].'",';
           $txt_jason .='name:"<i class=\'zmdi '.$asset['asset_icon'].' icon-hc-lg \'></i> <span class=\'treeview_asset\'>'.$asset['name'].'</span>: '.$asset['asset_desc'].'",';
           $txt_jason .='type:"asset"},';
        }
    //}
}

$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);
//$txt_jason='{"node":['.$txt_jason.']}';
$txt_jason='['.$txt_jason.']';
echo($txt_jason);

exit();