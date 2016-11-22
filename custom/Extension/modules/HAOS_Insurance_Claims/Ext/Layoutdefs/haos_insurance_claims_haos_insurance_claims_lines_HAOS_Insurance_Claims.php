<?php
 // created: 2016-11-22 18:14:21
$layout_defs["HAOS_Insurance_Claims"]["subpanel_setup"]['haos_insurance_claims_haos_insurance_claims_lines'] = array (
  'order' => 100,
  'module' => 'HAOS_Insurance_Claims_Lines',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAOS_INSURANCE_CLAIMS_HAOS_INSURANCE_CLAIMS_LINES_FROM_HAOS_INSURANCE_CLAIMS_LINES_TITLE',
  'get_subpanel_data' => 'haos_insurance_claims_haos_insurance_claims_lines',
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
