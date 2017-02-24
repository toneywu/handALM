<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class ChinaCache_CUX {//这是针对CC特殊的业务场景
        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */

	   public function cc_FillAttr9($bean, $event, $arguments) {

		    global $db, $timedate;
echo "111111111111";
		    if ($bean->trans_status=='CLOSED') {

			    $sql="SELECT ha.id, ha.attribute9 attribute9 FROM hat_assets ha, hit_racks hr WHERE ha.id  = hr.`hat_assets_id` AND hr.deleted= 0 AND hr.enable_partial_allocation = 0 AND ha.id = '".$bean->asset_id."' AND ha.`enable_it_rack` = '1' AND ha.deleted = 0";
			    //如果存在非散U的机柜，则需要进一步处理
			    $result=$db->query($sql);

			    echo "2222222222222".$sql;
			    //如果有值说明当前为机柜，需要在机柜对应的Attribute9上进行处理
			    while ($row=$db->fetchByAssoc($result)) {
			        $bean->current_asset_attribute9 = $row['attribute9'];
			        //echo "<br/>".$bean->target_asset_attribute9;
			        if (empty($bean -> target_using_org_id) || ($bean->inactive_using == 1 && $bean->date_end <= $timedate->nowDB())) {
			            //如果当前使用组织为空，则将应当的Attribute9清空
			            $bean->target_asset_attribute9 = '';

echo "333333333333";

			        } else {
			        	//如果当前使用组织不为空，则试图取出事务单对应的WO上的合同信息
			            $sql2="SELECT 
			                  hwl.`contract_id`
			                FROM
			                  ham_wo_lines hwl,
			                  hat_asset_trans_batch hatb,
			                  hat_asset_trans hat,
			                  aos_products_cstm ap_cstm
			                WHERE hat.`batch_id` = hatb.id 
			                  AND hatb.`source_wo_id` = hwl.`ham_wo_id` 
			                  AND ap_cstm.`id_c` = hwl.`product_id`
			                  AND ap_cstm.`asset_criticality_c` = 'A'
			                  AND hat.`asset_id` = '".$bean->asset_id."'
			                  AND hwl.deleted= 0 
			                LIMIT 0,1";

				    echo "444444444444444".$sql2;

			            $result2=$db->query($sql2);
			            //读取出当前Header对应的所有行记录
			            while ($row2=$db->fetchByAssoc($result2)) {
			                $bean->target_asset_attribute9 = $row2['contract_id'];
			            }
			        } // end if

			         //以上完成了trans_line的更新，下面继续更新对应的资产
			        if (isset($bean->target_asset_attribute9)) {
				        $BeanAsset = BeanFactory::getBean('HAT_Assets', $bean->asset_id);
				        $BeanAsset->attribute9 = $bean->target_asset_attribute9;
	        			$BeanAsset->save();
        			}
			    }// end while
		    }//if ($bean->trans_status='CLOSED')
	   }// end public function
	}

	?>