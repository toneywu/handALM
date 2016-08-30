<?php
$module_name = 'HAM_ACT';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
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
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'sr_hat_domains_rule',
            'studio' => 'visible',
            'label' => 'LBL_SR_HAA_FRAMEWORKS_RULE',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'act_status',
            'studio' => 'visible',
            'label' => 'LBL_ACT_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'priority',
            'studio' => 'visible',
            'label' => 'LBL_PRIORITY',
          ),
          1 => 
          array (
            'name' => 'sr_haa_codes_rule',
            'studio' => 'visible',
            'label' => 'SR_HAA_CODES_RULE',
			'displayParams' =>
            array (
              'initial_filter' => '&code_type_advanced=activity_type',
            )
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
