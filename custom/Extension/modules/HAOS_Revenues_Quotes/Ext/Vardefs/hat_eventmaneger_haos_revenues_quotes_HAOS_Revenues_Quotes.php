<?php
// created: 2016-11-07 17:23:38
$dictionary["HAOS_Revenues_Quotes"]["fields"]["hat_eventmaneger_haos_revenues_quotes"] = array (
  'name' => 'hat_eventmaneger_haos_revenues_quotes',
  'type' => 'link',
  'relationship' => 'hat_eventmaneger_haos_revenues_quotes',
  'source' => 'non-db',
  'module' => 'HAT_EventManeger',
  'bean_name' => 'HAT_EventManeger',
  'vname' => 'LBL_HAT_EVENTMANEGER_HAOS_REVENUES_QUOTES_FROM_HAT_EVENTMANEGER_TITLE',
  'id_name' => 'hat_eventmaneger_haos_revenues_quoteshat_eventmaneger_ida',
);
$dictionary["HAOS_Revenues_Quotes"]["fields"]["hat_eventmaneger_haos_revenues_quotes_name"] = array (
  'name' => 'hat_eventmaneger_haos_revenues_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_EVENTMANEGER_HAOS_REVENUES_QUOTES_FROM_HAT_EVENTMANEGER_TITLE',
  'save' => true,
  'id_name' => 'hat_eventmaneger_haos_revenues_quoteshat_eventmaneger_ida',
  'link' => 'hat_eventmaneger_haos_revenues_quotes',
  'table' => 'hat_eventmaneger',
  'module' => 'HAT_EventManeger',
  'rname' => 'name',
);
$dictionary["HAOS_Revenues_Quotes"]["fields"]["hat_eventmaneger_haos_revenues_quoteshat_eventmaneger_ida"] = array (
  'name' => 'hat_eventmaneger_haos_revenues_quoteshat_eventmaneger_ida',
  'type' => 'link',
  'relationship' => 'hat_eventmaneger_haos_revenues_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_HAT_EVENTMANEGER_HAOS_REVENUES_QUOTES_FROM_HAT_EVENTMANEGER_TITLE',
);
