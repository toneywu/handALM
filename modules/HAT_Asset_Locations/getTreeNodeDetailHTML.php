<?php
/**
 * 本文件被js/editview_treeview.js调用，在点击树节点时调用本文件，返回一个Jason形式的当前节点明细
 * 本文件参数有@id，@type[location or asset]
 * 返回的JASON示例： 
 * {"node":[{"id":"92a3dde3-47a1-7467-8e26-56b74a8bed37","html":" V-SH01 : Shanghai Hongqiao Area","type":"location"},{"id":"1f790755-182c-d9bd-9e9e-56b74a64455c","html":" V-SH02 : Shanghai Pudong Area","type":"location"}]}
 */

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

global $db;
global $mod_strings, $app_strings, $app_list_strings,$dictionary;

require_once('cache/modules/HAT_Assets/HAT_Assetsvardefs.php');
require_once('cache/modules/HAT_Asset_Locations/HAT_Asset_Locationsvardefs.php');

if (isset($_REQUEST['current_mode'])){
  $current_mode= $_REQUEST['current_mode'];
}else{
  $current_mode="view";
}


$txt_jason ='';

function get_label_name ($field_name,$mod_name) {
  global $dictionary;
  return (translate($dictionary[$mod_name]['fields'][$field_name]['vname'],$mod_name));
}

/****************************************************
*  $label_field_name, 标签字段对应的字段名
    $mod_name,  模块名
    $val_field,  数据内容
    $val_type='varchar', 数据项类型
    $con_string='',  连接符号，如JASON字段之间通过','关联
    $val_field_id='' 如果是ID字段，提供链接
****************************************************/
function get_jason_field ($label_field_name, $mod_name,  $val_field,  $val_type='varchar', $val_field_id='', $relate_mod_name='') {


    if ($val_type=="bool") {
      $val_field = ($val_field==0)?'<input type=\"checkbox\">':'<input type=\"checkbox\" checked=\"checked\">';
    } elseif ($val_type=="relate" && isset($val_field_id)) {
      $val_field = '<a href=\"index.php?module='.$relate_mod_name.'&action=DetailView&record='.$val_field_id.'\">'.$val_field.'</a>';
    }
    if (isset($val_field)&&$val_field!='') {
      $return_text ='{"lab":"'.get_label_name($label_field_name, $mod_name).'","val":"'.$val_field.'"},';
    } else {
      $return_text ='';
    }
    return $return_text;
}


/*以下是执行的主要过程*************************************/

if($_GET['type']=="location") { //如果是Locationg来源，需要读取子位置和子资产（Asset来源只需要子资产）
   $sel_location ="SELECT 
                        ham_maint_sites.id site_id,
                        ham_maint_sites.name site_name,
                        hat_asset_locations.name location_name,
                        hat_asset_locations.id,
                        hat_asset_locations.map_address,
                        hat_asset_locations.inventory_mode,
                        hat_asset_locations.asset_node,
                        hat_asset_locations.maint_node,
                        hat_asset_locations.map_type
                    FROM
                        hat_asset_locations,ham_maint_sites
                    where
                      hat_asset_locations.ham_maint_sites_id = ham_maint_sites.id
                        and hat_asset_locations.deleted=0
                        and ham_maint_sites.deleted=0
                        AND hat_asset_locations.id = '".$_GET['id']."'";

  //echo($sel_sub_asset);

  $bean_locations = $db->query($sel_location); //无如是Location还是asset来源，都可以显示子资产
  //if(is_array($bean_assets)) {
    while ( $location = $db->fetchByAssoc($bean_locations) ) {
       //$txt_jason .='"type":"location"';
       $txt_jason .='"fields":[';
       $txt_jason .=get_jason_field('name','HAT_Asset_Locations',$location['location_name']);
       $txt_jason .=get_jason_field('maint_site','HAT_Asset_Locations',$location['site_name']);
       $txt_jason .=get_jason_field('map_address','HAT_Asset_Locations',$location['map_address']);
       $txt_jason .=get_jason_field('inventory_mode','HAT_Asset_Locations',$app_list_strings['hat_inventory_node_list'][$location['inventory_mode']]);
       $txt_jason .=get_jason_field('asset_node','HAT_Asset_Locations',$location['asset_node'],'bool');
       $txt_jason .=get_jason_field('maint_node','HAT_Asset_Locations',$location['maint_node'],'bool');
       $txt_jason .=get_jason_field('map_type','HAT_Asset_Locations',$app_list_strings['cux_map_type_list'][$location['map_type']]); //最后一个没有,
       $txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);//最后一个没有,
       $txt_jason .='],';

       if ($current_mode=="view") {
         $txt_jason .='"btn":[{"link":"module=HAT_Asset_Locations&action=DetailView&record='.$location['id'].'","lab":"'.translate('LBL_ACT_VIEW_LOCATION','HAT_Asset_Locations').'"}';
         $txt_jason .=',{"link":"module=HAM_SRs&action=EditView&location_id='.$location['id'].'","lab":"'.translate('LBL_ACT_CREATE_SR','HAT_Asset_Locations').'"}';
         $txt_jason .=',{"link":"module=HAM_WO&action=EditView&location_id='.$location['id'].'","lab":"'.translate('LBL_ACT_CREATE_WO','HAT_Asset_Locations').'"}';
         $txt_jason .='],';
       }

       $txt_jason .='"type":"location"';
    }

} elseif ($_GET['type']=="asset") { //如果是Asset来源，只要读取下面的子资产,以Asset的ID检索
    $sel_asset ="SELECT 
                    hat_assets.id,
                    hat_assets.name,
                    hat_assets.asset_desc,
                    aos_products.id aos_products_id,
                    aos_products.name asset_group,
                    aos_product_categories.id aos_product_categories_id,
                    aos_product_categories.name asset_category,
                    hat_assets.asset_icon,
                    hat_assets.asset_status,
                    hat_assets.asset_name,
                    hat_assets.asset_number,
                    hat_assets.serial_number,
                    hat_assets.vin,
                    hat_assets.engine_num,
                    hat_assets.tracking_number,
                    hat_assets.brand,
                    hat_assets.model,
                    hat_assets.maintainable,
                    hat_assets.enable_it_rack,
                    hat_assets.enable_it_ports,
                    hat_assets.using_person_desc,
                    hat_assets.owning_person_desc,
                    hat_asset_locations.id hat_asset_locations_hat_assetshat_asset_locations_ida,
                    hat_asset_locations.name hat_asset_locations_hat_assets_name,
                    ham_maint_sites.id site_id,
                    ham_maint_sites.name site_name,
                    hat_assets.location_desc,
                    accounts_u.id using_org_id,
                    accounts_u.name using_org,
                    contacts_o.id using_person_id,
                    contacts_o.last_name using_person,
                    accounts_o.id owning_org_id,
                    accounts_o.name owning_org,
                    contacts_o.id owning_person_id,
                    contacts_o.`last_name` owning_person,
                    hat_assets.`parent_asset_id`,
                    hat_assets_p.name parent_asset
                FROM
                    aos_products,
                    aos_product_categories,
                    haa_frameworks,
                    hat_assets
      LEFT JOIN
      (hat_assets hat_assets_p) ON (hat_assets.`parent_asset_id` = hat_assets_p.id) 
                        LEFT JOIN
                    accounts accounts_u ON (hat_assets.`using_org_id` = accounts_u.id
                        AND accounts_u.deleted = 0)
                        LEFT JOIN
                    contacts contacts_u ON (hat_assets.`using_person_id` = contacts_u.id
                        AND contacts_u.deleted = 0)
                        LEFT JOIN
                    accounts accounts_o ON (hat_assets.`owning_org_id` = accounts_o.id
                        AND accounts_o.deleted = 0)
                        LEFT JOIN
                    contacts contacts_o ON (hat_assets.`owning_person_id` = contacts_o.id
                        AND contacts_o.deleted = 0)
                        LEFT JOIN
                    (hat_asset_locations_hat_assets_c, hat_asset_locations, ham_maint_sites) ON (hat_assets.id = hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_assets_idb
                        AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_asset_locations_ida = hat_asset_locations.id
                        AND hat_asset_locations.ham_maint_sites_id = ham_maint_sites.id
                        AND hat_asset_locations.deleted = 0
                        AND hat_asset_locations_hat_assets_c.deleted = 0
                        AND ham_maint_sites.deleted = 0)
                WHERE
                    hat_assets.aos_products_id = aos_products.id
                        AND hat_assets.aos_product_categories_id = aos_product_categories.id
                        AND hat_assets.haa_frameworks_id = haa_frameworks.id
                        AND hat_assets.deleted = 0
                        AND haa_frameworks.deleted = 0
                        AND aos_products.deleted = 0
                        AND aos_product_categories.deleted = 0
                        AND hat_assets.id = '".$_GET['id']."'";


    $bean_assets = $db->query($sel_asset); //无如是Location还是asset来源，都可以显示子资产
    while ($asset = $db->fetchByAssoc($bean_assets)) {

      $txt_rack_jason = "";
      $txt_rack_allocation_jason="";
      //如果当前资产是IT机柜，则加载机柜相关的文字内容（定义在机柜模块中），合并到展示区域中
      if ($asset['enable_it_rack']==true) {
        $beanRack = BeanFactory::getBean('HIT_Racks') ->retrieve_by_string_fields(array('hit_racks.hat_assets_id'=>$asset['id']));
        $txt_rack_jason .=get_jason_field('height','HIT_Racks',$beanRack->height);
        $txt_rack_jason .=get_jason_field('dimension_external','HIT_Racks',$beanRack->dimension_external);
        $txt_rack_jason .=get_jason_field('dimension_internal','HIT_Racks',$beanRack->dimension_internal);
        $txt_rack_jason .=get_jason_field('rated_current','HIT_Racks',$beanRack->rated_current);
        $txt_rack_jason .=get_jason_field('standard_power','HIT_Racks',$beanRack->standard_power);
        $txt_rack_jason .=get_jason_field('stock_number','HIT_Racks',$beanRack->stock_number);
        $txt_rack_jason .=get_jason_field('enable_partial_allocation','HIT_Racks',$beanRack->enable_partial_allocation,'bool');

        require_once('modules/HIT_Racks/ServerChart.php');
        $txt_rack_jason .= get_jason_field('occupation','HIT_Racks', getOccupationCnt($beanRack));
        //$txt_rack_jason .= get_jason_field('position_display_area','HIT_Racks', getServerChart($beanRack,"RackFrame"));
        //以上是机柜图，20161030将机柜图从文字区域转到下方，单独处理
        //从下内容都来源于modules/HIT_Racks/ServerChart.php
        $txt_rack_allocation_jason = getServerChart($beanRack,"Servers").',"rackid":"'.$beanRack->id.'"';
        $txt_rack_allocation_chart = '"'.getServerChart($beanRack,"RackFrame").'"';
      }

      //以下是正常的资产信息，所以有资产都按以下进行加载
      //机柜会在最后进行合并
       $txt_jason .='"fields":[';
       $txt_jason .=get_jason_field('name','HAT_Assets',$asset['name']);
       $txt_jason .=get_jason_field('asset_desc','HAT_Assets',$asset['asset_desc']);
       $txt_jason .=get_jason_field('asset_category','HAT_Assets',$asset['asset_category']);
       $txt_jason .=get_jason_field('asset_group','HAT_Assets',$asset['asset_group']);
       $txt_jason .=get_jason_field('asset_status','HAT_Assets','<span class=\"color_tag color_asset_status_'.$asset['asset_status'].'\">'.$app_list_strings['hat_asset_status_list'][$asset['asset_status']].'</span>');
       $txt_jason .=get_jason_field('asset_number','HAT_Assets',$asset['asset_number']);
       $txt_jason .=get_jason_field('serial_number','HAT_Assets',$asset['serial_number']);
       $txt_jason .=get_jason_field('vin','HAT_Assets',$asset['vin']);
       $txt_jason .=get_jason_field('engine_num','HAT_Assets',$asset['engine_num']);
       $txt_jason .=get_jason_field('tracking_number','HAT_Assets',$asset['tracking_number']);
       $txt_jason .=get_jason_field('asset_name','HAT_Assets',$asset['asset_name']);
       $txt_jason .=get_jason_field('brand','HAT_Assets',$asset['brand']);
       $txt_jason .=get_jason_field('model','HAT_Assets',$asset['model']);
       $txt_jason .=get_jason_field('maintainable','HAT_Assets',$asset['maintainable'],'bool');
       $txt_jason .=get_jason_field('enable_it_rack','HAT_Assets',$asset['enable_it_rack'],'bool');
       $txt_jason .=get_jason_field('enable_it_ports','HAT_Assets',$asset['enable_it_ports'],'bool');
       $txt_jason .=get_jason_field('hat_asset_locations_hat_assets_name','HAT_Assets',$asset['hat_asset_locations_hat_assets_name'],'relate',$asset['hat_asset_locations_hat_assetshat_asset_locations_ida'],'HAT_Asset_Locations');
       $txt_jason .=get_jason_field('location_desc','HAT_Assets',$asset['location_desc']);
       $txt_jason .=get_jason_field('maint_site','HAT_Asset_Locations',$asset['site_name']);
       $txt_jason .=get_jason_field('owning_org','HAT_Assets',$asset['owning_org'],'relate',$asset['owning_org_id'],'Accounts');
       $txt_jason .=get_jason_field('owning_person','HAT_Assets',$asset['owning_person_id'],'relate',$asset['owning_person_id'],'Contacts');
       $txt_jason .=get_jason_field('using_org','HAT_Assets',$asset['using_org'],'relate',$asset['using_org_id'],'Accounts');
       $txt_jason .=get_jason_field('using_person','HAT_Assets',$asset['using_person_id'],'relate',$asset['using_person_id'],'Contacts');
       //资产的常规信息显示完成后，钭机柜的信息合并进来，注意最后还要合并一次机柜的分配信息
       $txt_jason .=$txt_rack_jason;

       $txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);//最后一个没有
       $txt_jason .='],';

       if ($current_mode=="view") {
         $txt_jason .='"btn":[{"link":"module=HAT_Asset_Locations&action=DetailView&record='.$asset['hat_asset_locations_hat_assetshat_asset_locations_ida'].'","lab":"'.translate('LBL_ACT_VIEW_LOCATION','HAT_Asset_Locations').'"}';
         $txt_jason .=',{"link":"module=HAT_Assets&action=DetailView&record='.$asset['id'].'","lab":"'.translate('LBL_ACT_VIEW_ASSET','HAT_Asset_Locations').'"}';
         $txt_jason .=',{"link":"module=HAM_SRs&action=EditView&hat_assets_id='.$asset['id'].'","lab":"'.translate('LBL_ACT_CREATE_SR','HAT_Asset_Locations').'"}';
         $txt_jason .=',{"link":"module=HAM_WO&action=EditView&hat_assets_id='.$asset['id'].'","lab":"'.translate('LBL_ACT_CREATE_WO','HAT_Asset_Locations').'"}';
         $txt_jason .='],';
       } else {
          $txt_jason .= '"rdata":{';
          foreach ($asset as $key => $value) {
            $txt_jason .= '"'.$key.'":"'.$value.'",';
          }
          $txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);//去除最后的,
          $txt_jason.="},";
       }
       $txt_jason .='"enable_it_ports":"'.$asset['enable_it_ports'].'",';
       $txt_jason .='"type":"asset"';

       if (isset($txt_rack_allocation_jason)&&$txt_rack_allocation_jason!="") { //如果有机柜信息，继续加载机柜的分配信息
          $txt_jason  .=','.$txt_rack_allocation_jason;
          $txt_jason  .=',"chart":'.$txt_rack_allocation_chart;
       }
    }
}

//$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);//去除最后的,
$txt_jason='{'.$txt_jason.'}';
echo($txt_jason);

exit();
?>