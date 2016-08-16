<?php
 // created: 2016-05-19 10:53:50
$layout_defs["QA_CollectionPlan"]["subpanel_setup"]['qa_inputresult_qa_collectionplan'] = array (
  'order' => 100,
  'module' => 'QA_inputresult',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_QA_INPUTRESULT_QA_COLLECTIONPLAN_FROM_QA_INPUTRESULT_TITLE',
  'get_subpanel_data' => 'qa_inputresult_qa_collectionplan',
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
