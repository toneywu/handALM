<?php
// created: 2016-02-08 10:53:31
$dictionary["Account"]["fields"]["haa_qual_accounts"] = array (
  'name' => 'haa_qual_accounts',
  'type' => 'link',
  'relationship' => 'haa_qual_accounts',
  'source' => 'non-db',
  'module' => 'HAA_QUAL',
  'bean_name' => 'HAA_QUAL',
  //'side' => 'right',
  'vname' => 'LBL_HAA_QUAL_TITLE',
);

$dictionary["Account"]["relationships"]["haa_qual_accounts"] = array (
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'HAA_QUAL',
    'rhs_table' => 'haa_qual',
    'rhs_key' => 'org_id',
    'relationship_type' => 'one-to-many',
);
