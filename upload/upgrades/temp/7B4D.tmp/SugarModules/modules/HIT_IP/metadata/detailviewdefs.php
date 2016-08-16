<?php
$module_name = 'HIT_IP';
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
          0 => 'name',
          1 => 
          array (
            'name' => 'ip_usage',
            'label' => 'LBL_IP_USAGE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ip_c',
            'label' => 'LBL_IP_C',
          ),
          1 => 
          array (
            'name' => 'ip_c_bm',
            'label' => 'LBL_IP_C_BM',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ip_internet',
            'label' => 'LBL_IP_INTERNET',
          ),
          1 => 
          array (
            'name' => 'ip_internet_bm',
            'label' => 'LBL_IP_INTERNET_BM',
          ),
        ),
        3 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
