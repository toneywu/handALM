<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAT_Asset_QUAL'] = array(
    // list of what Subpanels to show in the DetailView
    'subpanel_setup' => array(
              'hat_asset_qual_details' => array(
            'order' => 10,
           'module' => 'HAT_Asset_QUAL_Details',
           'subpanel_name' => 'default',
           'sort_order' => 'asc',
           'sort_by' => 'id',
           'title_key' => 'LBL_HAT_QUAL_DETAILS_SUBPANEL',
           'get_subpanel_data' => 'hat_asset_qual_details_link',
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