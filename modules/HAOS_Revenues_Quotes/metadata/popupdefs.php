<?php
$popupMeta = array (
    'moduleMain' => 'HAOS_Revenues_Quotes',
    'varName' => 'HAOS_Revenues_Quotes',
    'orderBy' => 'haos_revenues_quotes.name',
    'whereClauses' => array (
  'name' => 'haos_revenues_quotes.name',
  'assigned_user_id' => 'haos_revenues_quotes.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
);
