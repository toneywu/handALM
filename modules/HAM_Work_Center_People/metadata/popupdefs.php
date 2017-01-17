<?php
$popupMeta = array (
    'moduleMain' => 'HAM_Work_Center_People',
    'varName' => 'HAM_Work_Center_People',
    'orderBy' => 'ham_work_center_people.name',
    'whereClauses' => array (
  'name' => 'ham_work_center_people.name',
  'ham_work_center_res_name' => 'ham_work_center_people.ham_work_center_res_name',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'ham_work_center_res_name',
),
    'searchdefs' => array (
  'ham_work_center_res_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HAM_WORK_CENTER_RES_NAME',
    'id' => 'WORK_CENTER_RES_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'ham_work_center_res_name',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
),
);
