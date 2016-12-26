<?php
$module_name = 'HAT_EventType';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'framework',
          1 => 
          array (
            'name' => 'basic_type',
            'studio' => 'visible',
            'label' => 'LBL_BASIC_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'event_short_desc',
            'label' => 'LBL_EVENT_SHORT_DESC',
          ),
          1 => 
          array (
            'name' => 'parent_eventtype',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_EVENTTYPE',
          ),
        ),
        2 => 
        array (
          0 => 'name',
          1 => 'aos_pdf_template',
        ),
        3 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'haa_ff',
            'studio' => 'visible',
            'label' => 'LBL_HAA_FF',
          ),
        ),
        4 => 
        array (
          0 => 'asset_scope',
          1 => 'default_asset_list',
        ),
        5=>
        array(
          0=> 
          array (
            'name' => 'need_limit_transaction_lines',
            'label' => 'LBL_NEED_LIMIT_TRANSACTION_LINES',
          ),
          1=>""
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'require_approval_workflow',
            'studio' => 'visible',
            'label' => 'LBL_REQUIRE_APPROVAL_WORKFLOW',
          ),
          1 => 
          array (
            'name' => 'require_confirmation',
            'studio' => 'visible',
            'label' => 'LBL_REQUIRE_CONFIRMATION',
          ),
        ),
        7=>
        array(
          0=>'check_customer_hold_t_using',
          1=>'check_customer_hold_c_owning',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'change_target_status',
            'label' => 'LBL_CHANGE_TARGET_STATUS',
          ),
          1 => 
          array (
            'name' => 'target_asset_status',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_ASSET_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'change_processing_status',
            'label' => 'LBL_CHANGE_PROCESSING_STATUS',
          ),
          1 => 
          array (
            'name' => 'processing_asset_status',
            'studio' => 'visible',
            'label' => 'LBL_PROCESSING_ASSET_STATUS',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'change_owning_org',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_OWNING_ORG',
          ),
          1 => 
          array (
            'name' => 'change_owning_person',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_OWNING_PERSON',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'change_oranization_le',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_ORANIZATION_LE',
          ),
          1 => 
          array (
            'name' => 'change_location_desc',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_LOCATION_DESC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'change_using_org',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_USING_ORG',
          ),
          1 => 
          array (
            'name' => 'change_using_person',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_USING_PERSON',
          ),
        ),
        3 => 
        array (
          0 => 'keep_seperated_allc_rack_using_org',
          1 => 
          array (
            'name' => 'change_location',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_LOCATION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'change_parent',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_PARENT',
          ),
          1 => 
          array (
            'name' => 'change_rack_position',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_RACK_POSITION',
          ),
        ),
        5=>
        array(
          0=>"change_cost_center",
          1=>"change_asset_attribute10"
        ),
        6=>
        array(
          0=>"change_asset_attribute11",
          1=>"change_asset_attribute12"
        ),
		7=>
        array(
          0=>"allocation_flag",
        )
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'change_ip_subnets',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_IP_SUBNETS',
          ),
          1 => 
          array (
            'name' => 'change_associated_ip',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_ASSOCIATED_IP',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'change_gateway',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_GATEWAY',
          ),
          1 => 
          array (
            'name' => 'change_bandwidth_type',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_BANDWIDTH_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'change_port',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_PORT',
          ),
          1 => 
          array (
            'name' => 'change_speed_limit',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_SPEED_LIMIT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'change_asset',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_ASSET',
          ),
          1 => 
          array (
            'name' => 'change_cabinet',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_CABINET',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'change_monitoring',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_MONITORING',
          ),
          1 => 
          array (
            'name' => 'change_channel_num',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_CHANNEL_NUM',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'change_channel_content',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_CHANNEL_CONTENT',
          ),
          1 => 
          array (
            'name' => 'change_mrtg_link',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_CHANGE_MRTG_LINK',
          ),
        ),

        6 => 
        array (
          0 => 'change_main_asset',
          1 => 'change_backup_asset',
        ),
        7 => 
        array (
          0 => 'change_port_backup',
          1 => 'change_monitoring_backup',
        ),
        8 => 
        array (
          0 => 'change_channel_content_backup',
          1 => 'change_channel_num_backup',
        ),
        9 => 
        array (
          0 => 'change_date_end',
          1 => 'change_date_start',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'change_access_assets_name',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_ACCESS_ASSETS_NAME',
          ),
          1 => 
          array (
            'name' => 'change_access_assets_backup_name',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_ACCESS_ASSETS_BACKUP_NAME',
          ),
        ),
        11 => 
        array (
          0 => 'change_status',
          1 => 
          array (
            'name' => 'change_enable_action',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_ENABLE_ACTION',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'change_broadband_type',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_BROADBAND_TYPE',
          ),
          1 => 
          array (
            'name' => 'change_child_port',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_CHILD_PORT',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'change_vlan_channel',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_VLAN_CHANNEL',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
