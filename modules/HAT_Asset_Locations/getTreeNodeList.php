<?
/************************************************************
*本文件被modules/HAT_Asset_Locations/getTreeNode.php调用，
*用于处理查询的业务场景
*当REQUST(defualt_list)不为空，或不为NONE时进行默认查询的处理
* ************************************************************/
if($_REQUEST['type']=="wo_asset_trans") { //wo_asset_trans 显示当前工作单的所有资产事务处理行中出现的内容
        $sel_sub_asset ="SELECT 
                        hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status
                    FROM
                        hat_assets,
                        hat_asset_locations_hat_assets_c
                    WHERE
                        hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_assets_idb = hat_assets.id
                            AND hat_asset_locations_hat_assets_c.deleted = 0
                            AND hat_assets.deleted = 0
                            AND hat_assets.parent_asset_id = ''
                            AND hat_assets.haa_frameworks_id='".$current_framework."'
                         ORDER by hat_assets.name ASC";
}
?>