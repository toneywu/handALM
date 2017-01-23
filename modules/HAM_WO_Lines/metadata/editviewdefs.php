<?php
$module_name = 'HAM_WO_Lines';
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
            'name' => 'wo_number',
            'studio' => 'visible',
            'label' => 'LBL_WO_NUMBER',
			'customCode' => '<input type="hidden" name="ham_wo_id" id="ham_wo_id" value="{$fields.ham_wo_id.value}">{$fields.wo_number.value}',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contract',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACT',
			'displayParams' =>array (
              'initial_filter' => '&contract_account_advanced="+encodeURIComponent($("#account_id").val())+"',
            ),
          ),
          1 => 
          array (
            'name' => 'product',
            'studio' => 'visible',
            'label' => 'LBL_PRODUCT',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'product',
                'id' => 'product_id',
                'haa_uom_id_c'=>'uom_id',
                'primary_uom_c'=>'uom_code'
              ),
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'asset',
            'studio' => 'visible',
            'label' => 'LBL_ASSET',
			'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'asset_number' => 'asset',
                'id' => 'asset_id',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'quantity',
            'label' => 'LBL_QUANTITY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'uom_code',
            'studio' => 'visible',
            'label' => 'LBL_UOM_CODE',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
