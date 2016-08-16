<?php
$module_name = 'HAM_SR';
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
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
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
            'name' => 'sr_number',
            'label' => 'LBL_SR_NUMBER',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'priority',
            'studio' => 'visible',
            'label' => 'LBL_PRIORITY',
          ),
          1 => 
          array (
            'name' => 'reported_date',
            'label' => 'LBL_REPORTED_DATE',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'ham_sr_hat_assets_name',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ham_sr_fp_event_locations_name',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'location_extra_desc',
            'label' => 'LBL_LOCATION_EXTRA_DESC',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'reporter',
            'studio' => 'visible',
            'label' => 'LBL_REPORTER',
          ),
          1 => 
          array (
            'name' => 'reporter_org',
            'studio' => 'visible',
            'label' => 'LBL_REPORTER_ORG',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contact_by',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_BY',
          ),
          1 => 
          array (
            'name' => 'contact_notes',
            'label' => 'LBL_CONTACT_NOTES',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'work_phone',
            'label' => 'LBL_WORK_PHONE',
          ),
          1 => 
          array (
            'name' => 'mobile',
            'label' => 'LBL_MOBILE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'email',
            'label' => 'LBL_EMAIL',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
