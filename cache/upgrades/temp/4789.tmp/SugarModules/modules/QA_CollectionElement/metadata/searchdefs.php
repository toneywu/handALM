<?php
$module_name = 'QA_CollectionElement';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'qa_collectionelement_qa_elementtype_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_QA_COLLECTIONELEMENT_QA_ELEMENTTYPE_FROM_QA_ELEMENTTYPE_TITLE',
        'id' => 'QA_COLLECTIONELEMENT_QA_ELEMENTTYPEQA_ELEMENTTYPE_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'qa_collectionelement_qa_elementtype_name',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
