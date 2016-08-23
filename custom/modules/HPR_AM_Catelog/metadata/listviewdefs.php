<?php
$module_name = 'HPR_AM_Catelog';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'AM_ROLES' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_AM_ROLES',
    'id' => 'HPR_AM_ROLES_ID_C',
    'link' => true,
    'width' => '20%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '40%',
    'default' => true,
  ),
);
?>
