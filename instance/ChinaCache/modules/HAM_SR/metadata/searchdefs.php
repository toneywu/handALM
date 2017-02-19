<?php
$module_name = 'HAM_SR';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'site' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SITE',
        'id' => 'FP_EVENT_LOCATIONS_ID_C',
        'link' => true,
        'width' => '10%',
        'name' => 'site',
        ),
      'reporter_org' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REPORTER_ORG',
        'id' => 'account_id',
        'link' => true,
        'width' => '10%',
        'name' => 'reporter_org',
        ),
      'reporter' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REPORTER',
        'id' => 'contact_id',
        'link' => true,
        'width' => '10%',
        'name' => 'reporter',
        ),
      'owned_org' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OWNED_ORG',
        'id' => 'owned_org_id',
        'link' => true,
        'width' => '10%',
        'name' => 'owned_org',
        ),
      'owned_by' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OWNED_BY',
        'id' => 'owned_by_id',
        'link' => true,
        'width' => '10%',
        'name' => 'owned_by',
        ),
   
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'site' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SITE',
        'id' => 'FP_EVENT_LOCATIONS_ID_C',
        'link' => true,
        'width' => '10%',
        'name' => 'site',
        ),
      'reporter_org' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REPORTER_ORG',
        'id' => 'account_id',
        'link' => true,
        'width' => '10%',
        'name' => 'reporter_org',
        ),
      'reporter' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REPORTER',
        'id' => 'contact_id',
        'link' => true,
        'width' => '10%',
        'name' => 'reporter',
        ),
      'owned_org' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OWNED_ORG',
        'id' => 'owned_org_id',
        'link' => true,
        'width' => '10%',
        'name' => 'owned_org',
        ),
      'owned_by' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OWNED_BY',
        'id' => 'owned_by_id',
        'link' => true,
        'width' => '10%',
        'name' => 'owned_by',
        ),
      
      /*1 => 
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
      ),*/
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
