<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class ChinaCache_CUX {//这是针对CC特殊的业务场景
        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */

	   public function cc_FillAttr9_beforeWOClose($bean, $event, $arguments) {

		    global $db, $timedate;

		    if ($bean->wo_status=='COMPLETED') {
		    	//如果是状态为COMPLETED的工单就会更新他上面所有的事务处理中有机柜的行。刷新Attribute9

			    $sql="SELECT 
					  hat.id
					FROM
					  hat_asset_trans hat,
					  hat_asset_trans_batch hatb,
					  hit_racks hr 
					WHERE hat.`batch_id` = hatb.`id` 
					  AND hr.`hat_assets_id` = hat.`asset_id` 
					  AND hr.`deleted` = 0 
					  AND hr.`enable_partial_allocation` = 0 
					  AND hat.`deleted` = 0 
					  AND hatb.`deleted` = 0 
					  AND hat.trans_status = 'CLOSED' 
					  AND hatb.`source_wo_id` = '".$bean->id."'";
			    //如果存在非散U的机柜，则需要进一步处理
			    $result=$db->query($sql);


			    //如果有值说明当前为机柜，需要在机柜对应的Attribute9上进行处理
			    while ($row=$db->fetchByAssoc($result)) {
				        $BeanHAT = BeanFactory::getBean('HAT_Asset_Trans', $row[id]);
	        			$BeanHAT->save();//触发一次LogicHook
			    }
		    }

	   }// end public function
	}

	?>