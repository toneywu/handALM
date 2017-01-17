<?php
$popupMeta = array (
    'moduleMain' => 'HAM_Work_Center_Res',
    'varName' => 'HAM_Work_Center_Res',
    'orderBy' => 'HAM_Work_Center_Res.name',
    'whereClauses' => array (
  'name' => 'HAM_Work_Center_Res.name',
  'ham_work_center_name' => 'ham_work_center_res.ham_work_center_name',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'ham_work_center_name',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'ham_work_center_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HAM_WORK_CENTER_NAME',
    'id' => 'WORK_CENTER_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'ham_work_center_name',
  ),
),
);
