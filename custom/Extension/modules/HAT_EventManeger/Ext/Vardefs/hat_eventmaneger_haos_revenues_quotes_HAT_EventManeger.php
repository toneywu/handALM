<?php
// created: 2016-11-07 17:23:39
$dictionary["HAT_EventManeger"]["fields"]["hat_eventmaneger_haos_revenues_quotes"] = array (
  'name' => 'hat_eventmaneger_haos_revenues_quotes',
  'type' => 'link',
  'relationship' => 'hat_eventmaneger_haos_revenues_quotes',
  'source' => 'non-db',
  'module' => 'HAOS_Revenues_Quotes',
  'bean_name' => 'HAOS_Revenues_Quotes',
  'vname' => 'LBL_HAT_EVENTMANEGER_HAOS_REVENUES_QUOTES_FROM_HAOS_REVENUES_QUOTES_TITLE',
  'id_name' => 'hat_eventmaneger_haos_revenues_quoteshaos_revenues_quotes_idb',
);
$dictionary["HAT_EventManeger"]["fields"]["hat_eventmaneger_haos_revenues_quotes_name"] = array (
  'name' => 'hat_eventmaneger_haos_revenues_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_EVENTMANEGER_HAOS_REVENUES_QUOTES_FROM_HAOS_REVENUES_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'hat_eventmaneger_haos_revenues_quoteshaos_revenues_quotes_idb',
  'link' => 'hat_eventmaneger_haos_revenues_quotes',
  'table' => 'haos_revenues_quotes',
  'module' => 'HAOS_Revenues_Quotes',
  'rname' => 'name',
);
$dictionary["HAT_EventManeger"]["fields"]["hat_eventmaneger_haos_revenues_quoteshaos_revenues_quotes_idb"] = array (
  'name' => 'hat_eventmaneger_haos_revenues_quoteshaos_revenues_quotes_idb',
  'type' => 'link',
  'relationship' => 'hat_eventmaneger_haos_revenues_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_HAT_EVENTMANEGER_HAOS_REVENUES_QUOTES_FROM_HAOS_REVENUES_QUOTES_TITLE',
);
