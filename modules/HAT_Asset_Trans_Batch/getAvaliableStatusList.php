<?php 

error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

 //基于当前事务单ID，获取状态，之后显示出当前可用的列表状态
$current_id = $_GET['id'];
$beanTransBatch = BeanFactory::getBean('HAT_Asset_Trans_Batch',$current_id);
$current_status = $beanTransBatch->asset_trans_status;
//获取当前状态
if($current_status=="CLOSED"||$current_status=="AUTO_TRANSACTED"||$current_status=="CANCELED") {
	die($current_status.' is not a Valid Status');
}

$beanEventType = BeanFactory::getBean('HAT_EventType',$beanTransBatch->hat_eventtype_id);
$require_confirmation = $beanEventType->require_confirmation;

echo '<select name='.'"change_asset_trans_status"'.' id="change_asset_trans_status"'.'>';


foreach($app_list_strings['asset_trans_status'] as $key=>$value){
	//加载除DRAFT、CLOSED、AUTO_TRANSACTED
	if($key!="DRAFT" && $key!="CLOSED" && $key!="AUTO_TRANSACTED" && $key!="APPROVED") {
		if ($keys!="TRANSACTED" || ($require_confirmation =="OPTIONAL" && $key=="TRANSACTED")) {
			//如果可以选择2步确认，则显示可以切换到“TRANSACTED”的状态
			//如果不可以2步确认，或是必须2步确认，都没有此状态
			echo '<option value="'.$key.'">'.$value.'</option>';
		}
	}

}

echo '</select>';
?>