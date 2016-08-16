<?php
 // created: 2016-05-19 10:53:39
$layout_defs["HAA_UOM"]["subpanel_setup"]['qa_collectionelement_haa_uom'] = array (
  'order' => 100,
  'module' => 'QA_CollectionElement',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_QA_COLLECTIONELEMENT_HAA_UOM_FROM_QA_COLLECTIONELEMENT_TITLE',
  'get_subpanel_data' => 'qa_collectionelement_haa_uom',
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
