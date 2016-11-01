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
			$GLOBALS['log']->infor("checkApprovalWorkflow logic hook called. Aftersave HAM_SR;".$focus->wo_status);
			$focus_wo_status = $focus->wo_status;
			if ($focus_wo_status=='SUBMITTED') {
					$focus->wo_status = 'APPROVED';
				//TODO:以后再加入真正的工作流判断，临时只要提交都会通过
			} else if ($focus_wo_status=='APPROVED') {
			}
		}
    }

	?>