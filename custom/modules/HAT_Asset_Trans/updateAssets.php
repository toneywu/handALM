<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class updateAssets {
        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */

		function updateAssets($focus, $event, $arguments) {
			// 在资产事务处理保存时判断，如果事务处理的行状态达标，则更新资产状态
			$GLOBALS['log']->error("update Assets logic hook called. - before save TransAssetLine");
			$focus_trans_status = $focus->trans_status;
			$GLOBALS['log']->error("focusing transaction line->trans_status;".$focus_trans_status);

			if ($focus_trans_status=='APPROVED') {
				//如果不出意外，应当由HAT_TransactionBatch/checkApprovalWorkflow.php先将头STATUS调整为APPROVED
				$beanAsset = BeanFactory::getBean('HAT_Assets', $focus->hat_assets_hat_asset_transhat_assets_ida);
				if ($beanAsset) { // test if $bean was loaded successfully
					$beanAsset->owning_org_id = $focus->owning_org_id;
					$beanAsset->owning_person_id = $focus->target_owning_person_id;
					$beanAsset->using_org_id = $focus->target_using_org;
					$beanAsset->using_person_id = $focus->target_using_person_id;
					$beanAsset->hat_asset_locations_hat_assetshat_asset_locations_ida = $focus->hat_asset_locations_id;
					$beanAsset->location_desc = $focus->target_location_desc;
					$beanAsset->asset_status = $focus->target_asset_status;
					$beanAsset->save();

					$GLOBALS['log']->error("Saved HAT_Assets record with id of ".$focus->hat_assets_hat_asset_transhat_assets_ida);
					$GLOBALS['log']->error("Saved HAT_Assets record with status of ".$focus->target_asset_status);
					echo "\nhat_asset_locations_id".$focus->hat_asset_locations_id."\n";


					$focus->trans_status = 'CLOSED';

				}//以上完成了按事务处理行的结果去更新资产属性
				//接下来应当判断，是否需要关闭行以及头

			}

	  }
    }

	?>