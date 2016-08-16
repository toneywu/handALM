<?php
$popupMeta = array (
	'moduleMain' => 'HAA_Codes',
	'varName' => 'HAA_Codes',
	'orderBy' => 'haa_codes.name',
	'whereClauses' => array (
		'name' => 'haa_codes.name',
		'code_type' => 'haa_codes.code_type',
		),
	'searchInputs' => array (
		1 => 'name',
		4 => 'code_type',
		),
	'searchdefs' => array (
		'name' => 
		array (
			'type' => 'name',
			'link' => true,
			'label' => 'LBL_NAME',
			'width' => '10%',
			'name' => 'name',
			),
		'code_type' => 
		array (
			'type' => 'enum',
			'studio' => 'visible',
			'label' => 'LBL_CODE_TYPE',
			'width' => '10%',
			'name' => 'code_type',
			),
		),
	'listviewdefs' => array (
		'NAME' => 
		array (
			'type' => 'name',
			'link' => true,
			'label' => 'LBL_NAME',
			'width' => '30%',
			'default' => true,
			'name' => 'name',
			),
		'DESCRIPTION' => 
		array (
			'type' => 'text',
			'label' => 'LBL_DESCRIPTION',
			'sortable' => false,
			'width' => '50%',
			'default' => true,
			'name' => 'description',
			),
		'CODE_TYPE' => 
		array (
			'type' => 'enum',
			'studio' => 'visible',
			'label' => 'LBL_CODE_TYPE',
			'width' => '20%',
			'default' => true,
			'name' => 'code_type',
			),  
		),
	);
