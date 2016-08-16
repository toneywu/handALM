<?php
$module_name = 'HAM_ACT_OP';
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
            'name' => 'ham_act_id_rule',
            'studio' => 'visible',
            'label' => 'HAM_ACT_ID_RULE',
            'customCode' => '<input type="hidden" name="ham_act_id_rule" id="ham_act_id_rule" value="{$fields.ham_act_id_rule.value}">{$fields.ham_act_id_rule.value}',
          ),
          1 => 
          array (
            'name' => 'activity_status',
            'studio' => 'visible',
            'label' => 'LBL_ACTIVITY_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'activity_op_number',
            'label' => 'LBL_ACTIVITY_OP_NUMBER',
          ),
          1 => 'description',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'sr_work_center_rule',
            'studio' => 'visible',
            'label' => 'SR_SR_WORK_CENTER_RULE',
          ),
          1 => 
          array (
            'name' => 'ham_work_center_res_name',
            'studio' => 'visible',
            'label' => 'LBL_HAM_WORK_CENTER_RES_NAME',
            'displayParams' => 
            array (
              'initial_filter' => '&work_center_id_advanced="+encodeURIComponent(document.getElementById("sr_work_center_rule_id").value)+"',
            ),
          ),
        ),
        3 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'standard_hour',
            'label' => 'LBL_STANDARD_HOUR',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'act_module',
            'studio' => 'visible',
            'label' => 'LBL_ACT_MODULE',
          ),
          1 => 
          array (
            'name' => 'autoopen_next_task',
            'studio' => 'visible',
            'label' => 'LBL_AUTOOPEN_NEXT_TASK',
          ),
        ),
      ),
    ),
  ),
);
?>
