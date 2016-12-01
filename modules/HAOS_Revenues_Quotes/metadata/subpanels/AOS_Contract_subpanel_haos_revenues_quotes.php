<?php
$subpanel_layout['list_fields'] = array (
	'name'=>array(
		'vname' => 'LBL_NAME',
		'widget_class' => 'SubPanelDetailViewLink',
		'width' => '45%',   'default' => true,
		),
	'date_modified'=>array(
		'vname' => 'LBL_DATE_MODIFIED',
		'width' => '45%',   'default' => true,
		),
	'edit_button'=>array(
		'vname' => 'LBL_EDIT_BUTTON',
		'widget_class' => 'SubPanelEditButton',
		'module' => 'HAOS_Revenues_Quotes',
		'width' => '4%',   'default' => true,
		),
	'remove_button'=>array(
		'vname' => 'LBL_REMOVE',
		'widget_class' => 'SubPanelRemoveButton',
		'module' => 'HAOS_Revenues_Quotes',
		'width' => '5%',   'default' => true,
		),
	);