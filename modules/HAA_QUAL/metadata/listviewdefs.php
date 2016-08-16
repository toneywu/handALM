<?php
$module_name = 'HAA_QUAL';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CODE_QUALIFICATION_TYPE' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_QUALIFICATION_TYPE',
    'id' => 'CODE_QUALIFICATION_TYPE_ID',
    'link' => true,
    'width' => '15%',
  ),
  'PARENT_NAME' => 
  array (
    'type' => 'parent',
    'studio' => 'visible',
    'label' => 'LBL_FLEX_RELATE',
    'link' => true,
    'sortable' => false,
    'ACLTag' => 'PARENT',
    'dynamic_module' => 'PARENT_TYPE',
    'id' => 'PARENT_ID',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
    ),
    'width' => '20%',
    'default' => true,
  ),
  'EFFECTIVE_START_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EFFECTIVE_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'NO_EFFECTIVE_END_FLAG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_NO_EFFECTIVE_END_FLAG',
    'width' => '5%',
  ),
  'EFFECTIVE_END_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EFFECTIVE_END_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'QUAL_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_QUAL_STATUS',
    'width' => '10%',
  ),
  'CONTENT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTENT',
    'width' => '10%',
    'default' => true,
  ),
  'ATTRIBUTE7' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRIBUTE7',
    'width' => '10%',
    'default' => false,
  ),
  'ORG' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ORG',
    'id' => 'ORG_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'CONTACT' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CONTACT',
    'id' => 'CONTACT_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'CONTACT_ID_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_ID_NUMBER',
    'width' => '10%',
    'default' => false,
  ),
  'CONTACT_MOBILE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_MOBILE',
    'width' => '10%',
    'default' => false,
  ),
  'CONTACT_MAIL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_MAIL',
    'width' => '10%',
    'default' => false,
  ),
  'CONTACT_ADDRESS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_ADDRESS',
    'width' => '10%',
    'default' => false,
  ),
  'CONTACT_FIXED_PHONE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_FIXED_PHONE',
    'width' => '10%',
    'default' => false,
  ),
  'ATTRIBUTE1' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRIBUTE1',
    'width' => '10%',
    'default' => false,
  ),
  'ATTRIBUTE2' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRIBUTE2',
    'width' => '10%',
    'default' => false,
  ),
  'ATTRIBUTE3' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRIBUTE3',
    'width' => '10%',
    'default' => false,
  ),
  'ATTRIBUTE4' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRIBUTE4',
    'width' => '10%',
    'default' => false,
  ),
  'ATTRIBUTE5' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRIBUTE5',
    'width' => '10%',
    'default' => false,
  ),
  'ATTRIBUTE6' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRIBUTE6',
    'width' => '10%',
    'default' => false,
  ),
  'ATTRIBUTE8' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRIBUTE8',
    'width' => '10%',
    'default' => false,
  ),
  'ATTRIBUTE9' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRIBUTE9',
    'width' => '10%',
    'default' => false,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'CERTIFIED_BY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CERTIFIED_BY',
    'width' => '10%',
    'default' => false,
  ),
);
?>
