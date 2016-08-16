<?php
$module_name = 'HAA_Maps';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAA_Maps/js/editview_HAA_Maps.js',
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
          0 => 'name',
          1 => 'description',
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'map_file',
            'studio' => 'visible',
            'label' => 'LBL_MAP_FILE',
            'customCode' => '{$MAP_IMAGE}',
            
            ),
          1 => '',
          ),
        ),
      ),
    ),
  );
  ?>
