<?php
$module_name = 'HAM_Work_Center_Res';
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'ham_work_center_name',
            'studio' => 'visible',
            'label' => 'LBL_HAM_WORK_CENTER_NAME',
			//'customCode' => '<input type="hidden" name="ham_work_centers_name" id="ham_work_centers_name" value="{$fields.ham_work_centers_name.value}">{$fields.ham_work_centers_name.value}',			
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
