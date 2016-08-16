<?php
$module_name = 'HIT_IP_Allocations';
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'account',
            'studio' => 'visible',
            'label' => 'LBL_ACCOUNT',
          ),
          1 => 
          array (
            'name' => 'contact',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT',
          ),
        ),
        2 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'product',
            'studio' => 'visible',
            'label' => 'LBL_PRODUCT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'date_from',
            'label' => 'LBL_DATE_FROM',
          ),
          1 => 
          array (
            'name' => 'date_to',
            'label' => 'LBL_DATE_TO',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'hat_assets',
            'studio' => 'visible',
            'label' => 'LBL_ASSETS',
          ),
          1 => 
          array (
            'name' => 'port',
            'label' => 'LBL_PORT',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'hit_ip',
            'studio' => 'visible',
            'label' => 'LBL_HIT_IP',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'accurate_ip_range',
            'label' => 'LBL_ACCURATE_IP_RANGE',
          ),
          1 => 
          array (
            'name' => 'accurate_ip',
            'label' => 'LBL_ACCURATE_IP',
          ),
        ),
      ),
    ),
  ),
);
?>
