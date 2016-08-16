<?php
$module_name = 'QA_CollectionPlan';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'qa_collectionplan_qa_collectionplandefine_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONPLANDEFINE_FROM_QA_COLLECTIONPLANDEFINE_TITLE',
        'id' => 'QA_COLLECTF3C4NDEFINE_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'qa_collectionplan_qa_collectionplandefine_name',
      ),
      'qa_collectionplan_qa_collectionelement_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONELEMENT_FROM_QA_COLLECTIONELEMENT_TITLE',
        'id' => 'QA_COLLECTIONPLAN_QA_COLLECTIONELEMENTQA_COLLECTIONELEMENT_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'qa_collectionplan_qa_collectionelement_name',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
