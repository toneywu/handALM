<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAOS_Insurances'] = array(
    // list of what Subpanels to show in the DetailView
  'subpanel_setup' => array(
    'haos_insurance_claims' => array(
      'order' => 30,
      'module' => 'HAOS_Insurance_Claims',
      'sort_order' => 'asc',
      'sort_by' => 'claim_number',
      'subpanel_name' => 'HAOS_Insurances_subpanel_haos_insurance_claims',
            'get_subpanel_data' => 'function:get_insurance_claims',//这里没有指向传统的link，而是指向了一个function
            'generate_select' => true,
            'title_key' => 'LBL_HAOS_INSURANCE_CLAIMS_SUBPANEL_TITLE',
            'top_buttons'  => array (),
            'function_parameters' => array(
                'import_function_file' => 'modules/HAOS_Insurance_Claims/Insurance_ClaimsSubpanel.php',//指向特定的文件
                'insurance_id' => $this->_focus->id,
                'return_as_array' => 'true'
                ),
            ),
    'haos_insurances_documents' => array (
      'order' => 10,
      'module' => 'Documents',
      'subpanel_name' => 'default',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'title_key' => 'LBL_HAOS_INSURANCES_DOCUMENTS_FROM_DOCUMENTS_TITLE',
      'get_subpanel_data' => 'haos_insurances_documents',
      'top_buttons' => 
      array (
        0 => 
        array (
          'widget_class' => 'SubPanelTopButtonQuickCreate',
          ),
        ),
      ), 
    ),
  );
  ?>