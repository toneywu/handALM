<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAT_Asset_Locations'] = array(
    // list of what Subpanels to show in the DetailView
  'subpanel_setup' => array(
    'hat_meters' => array(
      'order' => 10,
      'module' => 'HAT_Meters',
      'subpanel_name' => 'default',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'title_key' => 'LBL_METERS_SUBPANEL',
      'get_subpanel_data' => 'hat_meters_hat_asset_locations_link',
      'top_buttons' => 
      array (
        0 => 
        array (
          'widget_class' => 'SubPanelTopCreateButton',
          ),
        ),
      ),
    ),
  );
  ?>