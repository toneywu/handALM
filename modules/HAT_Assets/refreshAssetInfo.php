<?php 
$assetBeanList = BeanFactory :: newBean("HAT_Assets")->get_full_list('', "", "");
foreach($assetBeanList as $bean){
	$bean->hat_asset_locations_hat_assetshat_asset_locations_ida='71d846ee-d107-4eb5-cae8-58aea9577d09';
	$bean->owning_org_id='85e99e26-5c77-98fe-5be0-58ae9df881b1';
	$bean->save();
}
?>