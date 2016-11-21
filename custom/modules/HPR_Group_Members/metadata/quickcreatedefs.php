<?php
$module_name = 'HPR_Group_Members';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HPR_Group_Members/js/HPR_Group_Members.js',
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
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'organization',
            'studio' => 'visible',
            'label' => 'LBL_ORGANIZATION',
            'displayParams' =>
            array (
              'initial_filter' => '&frame_c_advanced="+$("#haa_frameworks_id_c").text()+"',
              'call_back_function' => 'setDefaultName',
            ),
          ),
          1 => 
          array (
            'name' => 'user_name',
            'studio' => 'visible',
            'label' => 'LBL_USER_NAME',
            'displayParams' =>
            array (
              'initial_filter' => '&contact_organization_c_advanced="+this.form.{$fields.organization.name}.value+"',
              'call_back_function' => 'setDefaultName',
            ),
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
