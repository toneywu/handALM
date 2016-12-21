<?php
$where_status  = "HAT_Assets.asset_status =". $_POST['asset_status'];
$where_asset_name = "HAT_Assets.name =". $_POST['asset_name'];
$where_site_select = $_POST['site_select'];

echo $where_status.$where_asset_name.$where_site_select;