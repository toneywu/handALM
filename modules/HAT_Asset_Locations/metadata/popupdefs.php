<?php
$popupMeta = array (
	'moduleMain' => 'HAT_Asset_Locations',
	'varName' => 'HAT_Asset_Locations',
	'orderBy' => 'hat_asset_locations.name',
	'whereClauses' => array (
		'name' => 'hat_asset_locations.name',
		'location_title' => 'hat_asset_locations.location_title',
		'asset_node' => 'hat_asset_locations.asset_node',
		'maint_node' => 'hat_asset_locations.maint_node',
		'maint_site' => 'hat_asset_locations.maint_site',
		'code_asset_location_type' => 'hat_asset_locations.code_asset_location_type',
		
	),
	'whereStatement'=>'(("'.$_REQUEST["site_type"].'"="D" and jt0.name in ("数据中心")) or ("'.$_REQUEST["site_type"].'"="J" and jt0.name in ("机柜列")) or ("'.$_REQUEST["site_type"].'"="F" and jt0.name in ("房间")) or "'.$_REQUEST["site_type"].'" ="" ) AND hat_asset_locations.`ham_maint_sites_id` IN (SELECT ham_maint_sites.id FROM haa_frameworks, ham_maint_sites WHERE haa_frameworks.id = ham_maint_sites.`haa_frameworks_id` AND haa_frameworks.id = "'.$_SESSION["current_framework"].'")',
	'searchInputs' => array (
		1 => 'name',
		4 => 'location_title',
		5 => 'asset_node',
		6 => 'maint_node',
		7 => 'maint_site',
		8 => 'code_asset_location_type',
		
	),
	'searchdefs' => array (
		'maint_site' => array (
			'type' => 'relate',
			'studio' => 'visible',
			'label' => 'LBL_MAINT_SITE',
			'id' => 'HAM_MAINT_SITES_ID',
			'link' => true,
			'width' => '10%',
			'name' => 'maint_site',
			
		),
		'code_asset_location_type' => array (
			'type' => 'relate',
			'studio' => 'visible',
			'label' => 'LBL_ASSET_LOCATION_TYPE',
			'id' => 'CODE_ASSET_LOCATION_TYPE_ID',
			'link' => true,
			'width' => '10%',
			'name' => 'code_asset_location_type',
			'displayParams' => array (
				'initial_filter' => '&code_type_advanced=asset_location_type',
				
			),
			
		),
		'name' => array (
			'type' => 'name',
			'link' => true,
			'label' => 'LBL_NAME',
			'width' => '10%',
			'name' => 'name',
			
		),
		'location_title' => array (
			'type' => 'varchar',
			'label' => 'LBL_LOCATION_TITLE',
			'width' => '10%',
			'name' => 'location_title',
			
		),
		'asset_node' => array (
			'type' => 'bool',
			'label' => 'LBL_ASSET_NODE',
			'width' => '10%',
			'name' => 'asset_node',
			
		),
		'maint_node' => array (
			'type' => 'bool',
			'label' => 'LBL_MAINT_NODE',
			'width' => '10%',
			'name' => 'maint_node',
			
		),
		
	),
	'listviewdefs' => array (
		'NAME' => array (
			'type' => 'name',
			'link' => true,
			'label' => 'LBL_NAME',
			'width' => '18%',
			'default' => true,
			'name' => 'name',
			
		),
		'LOCATION_TITLE' => array (
			'type' => 'varchar',
			'label' => 'LBL_LOCATION_TITLE',
			'width' => '18%',
			'default' => true,
			'name' => 'location_title',
			
		),
		'CODE_ASSET_LOCATION_TYPE' => array (
			'type' => 'relate',
			'default' => true,
			'studio' => 'visible',
			'label' => 'LBL_ASSET_LOCATION_TYPE',
			'id' => 'CODE_ASSET_LOCATION_TYPE_ID',
			'link' => true,
			'width' => '10%',
			'name' => 'code_asset_location_type',
			'whereStatement' => ' code_type="asset_location_type"',
			
		),
		'ASSET_NODE' => array (
			'type' => 'bool',
			'default' => true,
			'label' => 'LBL_ASSET_NODE',
			'width' => '5%',
			'name' => 'asset_node',
			
		),
		'MAINT_NODE' => array (
			'type' => 'bool',
			'default' => true,
			'label' => 'LBL_MAINT_NODE',
			'width' => '5%',
			'name' => 'maint_node',
			
		),
		'INVENTORY_MODE' => array (
			'default' => true,
			'type' => 'enum',
			'label' => 'LBL_INVENTORY_MODE',
			'width' => '8%',
			'name' => 'inventory_mode',
			
		),
		'MAINT_SITE' => array (
			'type' => 'relate',
			'default' => true,
			'studio' => 'visible',
			'label' => 'LBL_MAINT_SITE',
			'id' => 'HAM_MAINT_SITES_ID',
			'link' => true,
			'width' => '10%',
			'name' => 'maint_site',
			
		),
		
	),
	
);
