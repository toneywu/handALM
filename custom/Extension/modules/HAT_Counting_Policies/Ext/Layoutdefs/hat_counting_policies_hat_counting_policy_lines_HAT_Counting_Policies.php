<?php
 // created: 2017-01-13 16:43:13
$layout_defs["HAT_Counting_Policies"]["subpanel_setup"]['hat_counting_policies_hat_counting_policy_lines'] = array (
  'order' => 100,
  'module' => 'HAT_Counting_Policy_Lines',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_COUNTING_POLICIES_HAT_COUNTING_POLICY_LINES_FROM_HAT_COUNTING_POLICY_LINES_TITLE',
  'get_subpanel_data' => 'hat_counting_policies_hat_counting_policy_lines',
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
