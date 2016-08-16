<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class setHeaderStatusClosed {
        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */

		function setHeaderStatusClosed($focus, $event, $arguments) {
			// 如果保存的行是Close状态，则判断是否当前批的所有行都关闭了，如果都关闭了，此将头也一并关闭
			global $db;
			$focus_trans_status = $focus->trans_status;
			$GLOBALS['log']->infor("setHeaderStatusClosed logic hook called. aftersave TransLine".$focus->trans_status);
			$GLOBALS['log']->infor("setHeaderStatusClosed trans_status".$focus->trans_status);
			if ($focus_trans_status=='CLOSED') {//仅在当前行状态为Closed时触发
				//查看批号相同是否还有记录
				echo '</br>setHeaderStatusClosed: get a closed trans_line';
				$sel ="SELECT
						hat_asset_trans.id
					FROM
						hat_asset_trans_batch_hat_asset_trans_c,hat_asset_trans
					WHERE
						hat_asset_trans_batch_hat_asset_trans_c.hat_asset_trans_batch_hat_asset_transhat_asset_trans_batch_ida = '".$focus->hat_asset_trans_batch_hat_asset_transhat_asset_trans_batch_ida."'
						and hat_asset_trans.id = hat_asset_trans_batch_hat_asset_trans_c.hat_asset_trans_batch_hat_asset_transhat_asset_trans_idb
						and (hat_asset_trans.trans_status = 'SUBMITTED' OR hat_asset_trans.trans_status = 'APPROVED')";
				$bean_lines =  $db->query($sel);

				echo '</br>$bean_lines->id='.$bean_lines->id;
				$GLOBALS['log']->infor('$bean_lines->num_rows='.$bean_lines->num_rows);
				$GLOBALS['log']->infor('hat_asset_trans_batch_hat_asset_transhat_asset_trans_batch_ida='.$focus->hat_asset_trans_batch_hat_asset_transhat_asset_trans_batch_ida);
				if ($bean_lines->num_rows==0) {
					$GLOBALS['log']->infor('header should be closed');
					$bean_header = BeanFactory::getBean('HAT_Asset_Trans_Batch',$focus->hat_asset_trans_batch_hat_asset_transhat_asset_trans_batch_ida);
						if($bean_header) {
							$bean_header->asset_trans_status = 'CLOSED';
							$bean_header->save();
						}
				}
			}

			
	  }		
    }

	?>