<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class checkApprovalWorkflow {
        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */

		function checkApprovalWorkflow($focus, $event, $arguments) {
			// 在资产事务处理保存时判断，如果事务处理的行状态达标，则更新资产状态
			$GLOBALS['log']->infor("checkApprovalWorkflow logic hook called. Aftersave TransHeader;".$focus->asset_trans_status);
			$focus_trans_status = $focus->asset_trans_status;
			if ($focus_trans_status=='SUBMITTED') {
					$focus->asset_trans_status = 'APPROVED';
				//TODO:以后再加入真正的工作流判断，临时只要提交都会通过
			} else if ($focus_trans_status=='APPROVED') {
				//如果头处于Approved状态，则判断是否有没有关闭的行（存在已经关闭的行，但没有未关闭的行）
				global $db;
				$sel ="SELECT
							hat_asset_trans.id
						FROM
							hat_asset_trans_batch_hat_asset_trans_c,hat_asset_trans
						WHERE
							hat_asset_trans_batch_hat_asset_trans_c.hat_asset_trans_batch_hat_asset_transhat_asset_trans_batch_ida = '".$focus->id."'
							and hat_asset_trans.id = hat_asset_trans_batch_hat_asset_trans_c.hat_asset_trans_batch_hat_asset_transhat_asset_trans_idb
							and (hat_asset_trans.trans_status = 'CLOSED')";
					$bean_lines_closed =  $db->query($sel);
					if ($bean_lines_closed->num_rows>0) { //如果已经有已经关闭的行，则进一步判断是否有还没关闭完整的行
						$GLOBALS['log']->infor('header should be closed -find closed line'.$bean_lines_closed->num_rows);

						$sel ="SELECT
									hat_asset_trans.id
								FROM
									hat_asset_trans_batch_hat_asset_trans_c,hat_asset_trans
								WHERE
									hat_asset_trans_batch_hat_asset_trans_c.hat_asset_trans_batch_hat_asset_transhat_asset_trans_batch_ida = '".$focus->id."'
									and hat_asset_trans.id = hat_asset_trans_batch_hat_asset_trans_c.hat_asset_trans_batch_hat_asset_transhat_asset_trans_idb
									and (hat_asset_trans.trans_status = 'SUBMITTED' OR hat_asset_trans.trans_status = 'APPROVED')";
						$bean_lines_open =  $db->query($sel);
						if($bean_lines_open->num_rows ==0) {//如果所有的行都已经关闭，则可以去完成
							$bean_header = BeanFactory::getBean('HAT_Asset_Trans_Batch',$focus->id);
							if($bean_header) {
								$bean_header->asset_trans_status = 'CLOSED';
								$bean_header->save();
							}
						}
					}
			}
		}
    }

	?>