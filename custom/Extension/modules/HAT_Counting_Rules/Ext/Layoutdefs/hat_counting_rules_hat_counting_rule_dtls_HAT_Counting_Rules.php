<?php
 // created: 2016-12-24 15:08:40
$layout_defs["HAT_Counting_Rules"]["subpanel_setup"]['hat_counting_rules_hat_counting_rule_dtls'] = array (
  'order' => 100,
  'module' => 'HAT_Counting_Rule_Dtls',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_COUNTING_RULES_HAT_COUNTING_RULE_DTLS_FROM_HAT_COUNTING_RULE_DTLS_TITLE',
  'get_subpanel_data' => 'hat_counting_rules_hat_counting_rule_dtls',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
