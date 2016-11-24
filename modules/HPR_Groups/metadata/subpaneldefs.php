<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$layout_defs['HPR_Groups'] = array(
	'subpanel_setup' => array(
        'hpr_group_members' => 
        array (
            'order' => 1,
            'module' => 'HPR_Group_Members',
            'subpanel_name' => 'HPR_Groups_subpanel_hpr_groups_hpr_group_members',
            'sort_order' => 'asc',
            'sort_by' => 'id',
            'title_key' => 'HPR_Group_Members',
            'get_subpanel_data' => 'hpr_groups_hpr_group_members',
            'top_buttons' => array (
               /* 0 => array('widget_class' => 'SubPanelTopCreateButton'),*/
                ),
            ),
        'hpr_group_priviliges' => 
        array (
            'order' => 100,
            'module' => 'HPR_Group_Priviliges',
            'subpanel_name' => 'HPR_Groups_subpanel_hpr_groups_hpr_group_priviliges',
            'sort_order' => 'asc',
            'sort_by' => 'id',
            'title_key' => 'HPR_Group_Priviliges',
            'get_subpanel_data' => 'hpr_groups_hpr_group_priviliges',
            'top_buttons' => 
            array (
               /* 0 => array('widget_class' => 'SubPanelTopCreateButton'),*/
                ),
            ),
        ),
    );
    ?>
