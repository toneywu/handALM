<?php
$module_name = 'HAM_Maint_Sites';
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
          0 => 'haa_framework',
          1 => 
          array (
            'name' => 'title',
            'label' => 'LBL_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1=>'name'
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'sr_haa_numbering_rule',
            'label' => 'LBL_SR_HAA_NUMBERING_RULE',
          ),
          1 => 
          array (
            'name' => 'wo_haa_numbering_rule',
            'label' => 'LBL_WO_HAA_NUMBERING_RULE',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'locator_coding_mask',
            'label' => 'LBL_LOCATOR_CODING_MASK',
          ),
          1 => 
          array (
            'name' => 'locator_coding_mask_desc',
            'label' => 'LBL_LOCATOR_CODING_MASK_DESC',
          ),
        ),
        1=>
        array (
          0=>'project_control',
          1=>''),
        2=>
        array (
          0=>'hmm_trans_batch_haa_numbering_rule',
          1=>'hmm_trans_lines_haa_numbering_rule'),
        3=>
        array (
          0=>'hmm_mo_haa_numbering_rule',
          ),
      ),
    ),
  ),
);
?>
