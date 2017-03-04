<?php 
global $db;

		$sql="INSERT INTO hat_asset_trans_batch_hat_asset_trans_c(id,date_entered,hat_asset_trans_batch_hat_asset_transhat_asset_trans_batch_ida,hat_asset_trans_batch_hat_asset_transhat_asset_trans_idb) SELECT
	'".create_guid()."',NOW(),'efde6434-c7d4-601a-4880-58b78926f047',id from hat_asset_trans";
		$db->query($sql);
?>