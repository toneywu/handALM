<?php
$module_name = 'HAM_Maint_Sites';
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
          0 => 'name',
          1 =>
          array (
            'name' => 'title',
            'label' => 'LBL_TITLE',
            ),
          ),
        1 =>
        array (
          0 => 'description',
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
            'displayParams' =>
            array (
              'initial_filter' => '&document_type_advanced[]=SR',
              ),
            ),
          1 =>
          array (
            'name' => 'wo_haa_numbering_rule',
            'label' => 'LBL_WO_HAA_NUMBERING_RULE',
            'displayParams' =>
            array (
              'initial_filter' => '&document_type_advanced=WO',
              ),
            ),
          ),
        ),
      'lbl_editview_panel2' =>
      array (
        0 =>
        array (
          0 => 'locator_coding_mask',
          1 => 'locator_coding_mask_desc',
          ),
        1=>
        array (
         0 => 'project_control',
         ),
        2=>
        array (
          0=>
          array (
            'name'=>'hmm_trans_batch_haa_numbering_rule',
            'displayParams' =>
            array (
              'initial_filter' => '&document_type_advanced=INV_TRANS_BATCH',
              ),
            ),
          1=>
          array (
            'name'=>'hmm_trans_lines_haa_numbering_rule',
            'displayParams' =>
            array (
              'initial_filter' => '&document_type_advanced=INV_TRANS_LINE',
              ),
            ),
          ),
        3=>
        array (
          0=>
          array(
            'name'=> 'hmm_mo_haa_numbering_rule',
            'displayParams' =>
            array (
              'initial_filter' => '&document_type_advanced=MO',
              ),
            ),
          ),
        ),
      ),
    ),
  );
  ?>
