<?php
 // created: 2016-05-19 10:53:43
$layout_defs["QA_CollectionElement"]["subpanel_setup"]['qa_collectionplan_qa_collectionelement'] = array (
  'order' => 100,
  'module' => 'QA_CollectionPlan',
  'subpanel_name' => '',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONELEMENT_FROM_QA_COLLECTIONPLAN_TITLE',
  'get_subpanel_data' => 'qa_collectionplan_qa_collectionelement',
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
