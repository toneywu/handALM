<?php
// created: 2016-11-07 17:23:38
$dictionary["hat_eventmaneger_haos_revenues_quotes"] = array (
  'true_relationship_type' => 'one-to-one',
  'relationships' => 
  array (
    'hat_eventmaneger_haos_revenues_quotes' => 
    array (
      'lhs_module' => 'HAT_EventManeger',
      'lhs_table' => 'hat_eventmaneger',
      'lhs_key' => 'id',
      'rhs_module' => 'HAOS_Revenues_Quotes',
      'rhs_table' => 'haos_revenues_quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_eventmaneger_haos_revenues_quotes_c',
      'join_key_lhs' => 'hat_eventmaneger_haos_revenues_quoteshat_eventmaneger_ida',
      'join_key_rhs' => 'hat_eventmaneger_haos_revenues_quoteshaos_revenues_quotes_idb',
    ),
  ),
  'table' => 'hat_eventmaneger_haos_revenues_quotes_c',
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
      'name' => 'hat_eventmaneger_haos_revenues_quoteshat_eventmaneger_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_eventmaneger_haos_revenues_quoteshaos_revenues_quotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hat_eventmaneger_haos_revenues_quotesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_eventmaneger_haos_revenues_quotes_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_eventmaneger_haos_revenues_quoteshat_eventmaneger_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hat_eventmaneger_haos_revenues_quotes_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_eventmaneger_haos_revenues_quoteshaos_revenues_quotes_idb',
      ),
    ),
  ),
);