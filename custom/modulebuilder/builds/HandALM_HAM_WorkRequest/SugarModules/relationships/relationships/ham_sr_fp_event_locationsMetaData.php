<?php
// created: 2016-03-03 10:09:58
$dictionary["ham_sr_fp_event_locations"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'ham_sr_fp_event_locations' => 
    array (
      'lhs_module' => 'FP_Event_Locations',
      'lhs_table' => 'fp_event_locations',
      'lhs_key' => 'id',
      'rhs_module' => 'HAM_SR',
      'rhs_table' => 'ham_sr',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ham_sr_fp_event_locations_c',
      'join_key_lhs' => 'ham_sr_fp_event_locationsfp_event_locations_ida',
      'join_key_rhs' => 'ham_sr_fp_event_locationsham_sr_idb',
    ),
  ),
  'table' => 'ham_sr_fp_event_locations_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'ham_sr_fp_event_locationsfp_event_locations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ham_sr_fp_event_locationsham_sr_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ham_sr_fp_event_locationsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ham_sr_fp_event_locations_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'ham_sr_fp_event_locationsfp_event_locations_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'ham_sr_fp_event_locations_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ham_sr_fp_event_locationsham_sr_idb',
      ),
    ),
  ),
);