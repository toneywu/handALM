<?php
$module_name = 'HAA_Numbering_Rule';
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
        0 => 'framework',
        ),
       1 => 
       array (
        0 => 'name',
        1 => 
        array (
          'name' => 'document_type',
          'studio' => 'visible',
          'label' => 'LBL_DOCUMENT_TYPE',
          ),
        ),
       2 => 
       array (
        0 => 
        array (
          'name' => 'perfix',
          'label' => 'LBL_PERFIX',
          ),
        1 => '',
        ),
       3 => 
       array (
        0 => 
        array (
          'name' => 'min_num_strlength',
          'label' => 'LBL_MIN_NUM_STRLENGTH',
          ),
        1 => 
        array (
          'name' => 'nextval',
          'label' => 'LBL_NEXTVAL',
          ),
        ),
       ),
      ),
    ),
  );
  ?>
