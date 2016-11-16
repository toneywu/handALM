<?php


/*

For Example:

	SELECT hat_asset_locations.id FROM hat_asset_locations WHERE hat_asset_locations.`id` != '".$_GET['id']."' AND hat_asset_locations.name = '".$_GET['val']."' AND hat_asset_locations.ham_maint_sites_id IN (SELECT all_site.id FROM ham_maint_sites all_site, ham_maint_sites cur_site WHERE all_site.`haa_frameworks_id` = cur_site.`haa_frameworks_id` AND cur_site.id = '".$_GET['site_id']."')";

*/

  global $db, $current_language;

  $this_FF = BeanFactory::getBean('HAA_FSQL','4c0622c0-86ae-9ef2-7c1c-582add24f9d8');

  //echo $this_FF->sql_string;

  	$sel = $this_FF->sql_string;
	$beanSEL = $db->query($sel);

	$beanSEL = 'select * from hat_locations'

	$result_bool=0;

	//如果当前SQL可以取出值则返回result_bool=1，如果当前SQL取不出值，则返回0
    while ( $result = $db->fetchByAssoc($beanSEL) ) {
    		//echo $result['name']."<br/>";
    		$result_bool = 1;
    }

    echo $result_bool;

?>