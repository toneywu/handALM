<?php
$module_name = 'HMM_Locators';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HMM_Locators/js/HMM_Locators_editview.js',
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
          0 => 
          array (
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
            ),
          1 => 
          array (
            'name' => 'location',
            'studio' => 'visible',
            'label' => 'LBL_LOCATION',
            'displayParams' => 
            array (
              'initial_filter' => '&maint_site_advanced="+encodeURIComponent(document.getElementById("site").value)+"',
              ),
            ),
          ),
        1 =>
        array (
          0 =>
          array (
            'name'=>'name',
            'label' => 'LBL_NAME',
            'customCode'=>'<input type="text" name="name" id="name" value="{$fields.name.value}"><input type="hidden" name="locator_coding_mask" id="locator_coding_mask" value="{$fields.locator_coding_mask.value}"><span class="input_mask">{$fields.locator_coding_mask.value}</span><span class="input_desc">{$fields.locator_coding_mask_desc.value}</span>'
          ),
          1 => 'description',
          ),
        ),
      ),
    ),
  );
  ?>
