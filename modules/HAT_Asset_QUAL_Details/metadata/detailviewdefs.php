<?php
$module_name = 'HAT_Asset_QUAL_Details';
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
            'name' => 'hat_asset_qual',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_QUAL',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'qual_org',
            'studio' => 'visible',
            'label' => 'LBL_QUAL_ORG',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'qual_date',
            'label' => 'LBL_QUAL_DATE',
          ),
          1 => 
          array (
            'name' => 'effective_date',
            'label' => 'LBL_EFFECTIVE_DATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'interval_period',
            'label' => 'LBL_INTERVAL',
          ),
          1 => 
          array (
            'name' => 'interval_uom',
            'label' => 'LBL_INTERVAL_UOM',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'qual_result_passed',
            'label' => 'LBL_QUAL_RESULT_PASSED',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'qual_range',
            'label' => 'LBL_QUAL_RANGE',
          ),
          1 => 
          array (
            'name' => 'measure_precision',
            'label' => 'LBL_MEASURE_PRESION',
          ),
        ),
        6 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
