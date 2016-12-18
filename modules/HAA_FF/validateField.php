<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

if(empty($_REQUEST['mode'])) die('invalid mode');

global $db;
global $mod_strings, $app_strings, $app_list_strings, $dictionary;

$result_bool = 0;//0表示不通过（需要报错），1表示通过


if ($_REQUEST['mode']=='accounthold') {

	$sel = "SELECT accounts_cstm.credit_hold_c FROM accounts_cstm WHERE accounts_cstm.id_c ='".$_GET['id']."'";
	$beanSEL = $db->query($sel); //无如是Location还是asset来源，都可以显示子资产

	    while ( $result = $db->fetchByAssoc($beanSEL) ) {
	    	if (isset($result['credit_hold_c']) && $result['credit_hold_c']==true){
	    		$result_bool=0;
	    	}else{
	    		$result_bool=1;
	    	}
	    }
}

if ($_REQUEST['mode']=='woaccounthold') {
	$sel = "SELECT accounts_cstm.`credit_hold_c` FROM accounts_cstm,ham_wo,accounts WHERE ham_wo.`account_id` = accounts_cstm.`id_c` AND accounts.id = accounts_cstm.`id_c` AND accounts.`deleted`=0 and ham_wo.id ='".$_GET['id']."'";
	$beanSEL = $db->query($sel); //无如是Location还是asset来源，都可以显示子资产

	    while ( $result = $db->fetchByAssoc($beanSEL) ) {
	    	if (isset($result['credit_hold_c']) && $result['credit_hold_c']==true){
	    		$result_bool=0;
	    	}else{
	    		$result_bool=1;
	    	}
	    }
}

if ($_REQUEST['mode']=='locationName') { //当前当前site下是否有重名的location
	$sel = "SELECT 
			  hat_asset_locations.id 
			FROM
			  hat_asset_locations 
			WHERE hat_asset_locations.`id` != '".$_GET['id']."' 
			  AND hat_asset_locations.name = '".$_GET['val']."' 
			  AND hat_asset_locations.ham_maint_sites_id IN 
			  (SELECT 
			    all_site.id 
			  FROM
			    ham_maint_sites all_site,
			    ham_maint_sites cur_site 
			  WHERE all_site.`haa_frameworks_id` = cur_site.`haa_frameworks_id` 
			    AND cur_site.id = '".$_GET['site_id']."')";
		$beanSEL = $db->query($sel);
		$result_bool=1;
	    while ( $result = $db->fetchByAssoc($beanSEL) ) {
	    		$result_bool=0;
	    }
	    //echo($sel);
}


echo $result_bool;


?>
