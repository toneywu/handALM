<?php 
 $GLOBALS["dictionary"]["HIT_Racks"]=array (
  'table' => 'hit_racks',
  'audited' => true,
  'inline_edit' => true,
  'duplicate_merge' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
      'inline_edit' => false,
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'required',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'hit_racks_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'hit_racks_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'hit_racks_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'SecurityGroups' => 
    array (
      'name' => 'SecurityGroups',
      'type' => 'link',
      'relationship' => 'securitygroups_hit_racks',
      'module' => 'SecurityGroups',
      'bean_name' => 'SecurityGroup',
      'source' => 'non-db',
      'vname' => 'LBL_SECURITYGROUPS',
    ),
    'hat_assets_id' => 
    array (
      'required' => false,
      'name' => 'hat_assets_id',
      'vname' => 'LBL_HAT_ASSETS_ID',
      'type' => 'id',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => false,
      'inline_edit' => true,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 36,
      'size' => '20',
    ),
    'asset' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'asset',
      'vname' => 'LBL_ASSET',
      'type' => 'relate',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id_name' => 'hat_assets_id',
      'ext2' => 'HAT_Assets',
      'module' => 'HAT_Assets',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
    ),
    'asset_desc' => 
    array (
      'name' => 'asset_desc',
      'type' => 'vchar',
      'vname' => 'LBL_ASSET_DESC',
      'module' => 'HAT_Assets',
      'source' => 'non-db',
      'dbType' => 'non-db',
      'studio' => 'visible',
    ),
    'occupation' => 
    array (
      'name' => 'occupation',
      'type' => 'vchar',
      'vname' => 'LBL_OCCUPATION',
      'source' => 'non-db',
      'dbType' => 'non-db',
      'studio' => 'visible',
    ),
    'asset_status' => 
    array (
      'name' => 'asset_status',
      'type' => 'vchar',
      'vname' => 'LBL_ASSET_STATUS',
      'module' => 'HAT_Assets',
      'source' => 'non-db',
      'dbType' => 'non-db',
      'studio' => 'visible',
    ),
    'hat_assets_accounts_name' => 
    array (
      'name' => 'hat_assets_accounts_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
      'save' => true,
      'id_name' => 'hat_assets_accounts_id',
      'module' => 'Accounts',
    ),
    'hat_assets_accounts_id' => 
    array (
      'name' => 'hat_assets_accounts_id',
      'type' => 'id',
      'source' => 'non-db',
      'vname' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
      'save' => true,
      'module' => 'Accounts',
    ),
    'hat_asset_locations' => 
    array (
      'name' => 'hat_asset_locations',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_HAT_ASSET_LOCATIONS',
      'save' => true,
      'id_name' => 'hat_asset_locations_id',
      'module' => 'HAT_Asset_Locations',
    ),
    'hat_asset_locations_id' => 
    array (
      'name' => 'hat_asset_locations_id',
      'type' => 'id',
      'source' => 'non-db',
      'vname' => 'HAT_ASSET_LOCATIONS_ID',
      'save' => true,
      'module' => 'HAT_Asset_Locations',
    ),
    'height' => 
    array (
      'required' => true,
      'name' => 'height',
      'vname' => 'LBL_HEIGHT',
      'type' => 'int',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => '',
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'enable_range_search' => false,
      'disable_num_format' => '',
      'min' => false,
      'max' => false,
    ),
    'depth' => 
    array (
      'required' => false,
      'name' => 'depth',
      'vname' => 'LBL_DEPTH',
      'type' => 'int',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => '',
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'enable_range_search' => false,
      'disable_num_format' => '',
      'min' => false,
      'max' => false,
    ),
    'numbering_rule' => 
    array (
      'required' => true,
      'name' => 'numbering_rule',
      'vname' => 'LBL_NUMBERING_RULE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => 'BOTTOM',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'hit_racks_numbering_list',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'position_display_area' => 
    array (
      'name' => 'position_display_area',
      'vname' => 'LBL_POSITION_DISPLAY_AREA',
      'source' => 'non-db',
      'type' => 'varchar',
      'massupdate' => 0,
    ),
    'asset_link' => 
    array (
      'name' => 'asset_link',
      'type' => 'link',
      'relationship' => 'hit_racks_hat_assets',
      'vname' => 'LBL_CURRENT_ASSET_SUBPANEL_TITLE',
      'link_type' => 'many',
      'module' => 'HAT_Assets',
      'bean_name' => 'HAT_Assets',
      'source' => 'non-db',
    ),
    'rack_allocation_link' => 
    array (
      'name' => 'asset_allocation_link',
      'type' => 'link',
      'relationship' => 'hit_rack_allocations_hit_racks',
      'vname' => 'LBL_CURRENT_ASSET_ALLOCATION_SUBPANEL_TITLE',
      'link_type' => 'many',
      'module' => 'HAT_Assets',
      'bean_name' => 'HAT_Assets',
      'source' => 'non-db',
    ),
  ),
  'relationships' => 
  array (
    'hit_racks_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'HIT_Racks',
      'rhs_table' => 'hit_racks',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'hit_racks_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'HIT_Racks',
      'rhs_table' => 'hit_racks',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'hit_racks_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'HIT_Racks',
      'rhs_table' => 'hit_racks',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'securitygroups_hit_racks' => 
    array (
      'lhs_module' => 'SecurityGroups',
      'lhs_table' => 'securitygroups',
      'lhs_key' => 'id',
      'rhs_module' => 'HIT_Racks',
      'rhs_table' => 'hit_racks',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'securitygroups_records',
      'join_key_lhs' => 'securitygroup_id',
      'join_key_rhs' => 'record_id',
      'relationship_role_column' => 'module',
      'relationship_role_column_value' => 'HIT_Racks',
    ),
    'hit_racks_hat_assets' => 
    array (
      'lhs_module' => 'HIT_Racks',
      'lhs_table' => 'hit_racks',
      'lhs_key' => 'hat_assets_id',
      'rhs_module' => 'HAT_Assets',
      'rhs_table' => 'hat_assets',
      'rhs_key' => 'id',
      'relationship_type' => 'one-to-one',
    ),
    'hit_rack_allocations_hit_racks' => 
    array (
      'lhs_module' => 'HIT_Racks',
      'lhs_table' => 'hit_racks',
      'lhs_key' => 'id',
      'rhs_module' => 'HIT_Rack_Allocations',
      'rhs_table' => 'hit_rack_allocations',
      'rhs_key' => 'hit_racks_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'unified_search' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'hit_rackspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'templates' => 
  array (
    'security_groups' => 'security_groups',
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => false,
);