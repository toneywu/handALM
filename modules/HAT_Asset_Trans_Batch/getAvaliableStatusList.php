<?php
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

global $app_strings, $timedate,$GLOBALS;

 //基于当前事务单ID，获取状态，之后显示出当前可用的列表状态
$current_id = $_GET['id'];
$beanTransBatch = BeanFactory::getBean('HAT_Asset_Trans_Batch',$current_id);
$current_status = $beanTransBatch->asset_trans_status;
//获取当前状态
//以取消、完成、自动完成状态下，在界面上是无法进入本界面的，如果进来了，则强行结束
if($current_status=="CLOSED"||$current_status=="AUTO_TRANSACTED"||$current_status=="CANCELED") {
	die($current_status.' is not a Valid Status');
}


$beanEventType = BeanFactory::getBean('HAT_EventType',$beanTransBatch->hat_eventtype_id);
$require_confirmation = $beanEventType->require_confirmation;
//判断EventType中是否需要2次确认(提交->审批->处理)
//如果可选2次确认，则后续会列出TRANSACTED状态。

echo '<form class="edit">';
echo  translate('LBL_BTN_CHANGE_STATUS_BUTTON_LABEL','HAT_Asset_Trans_Batch').": ";//显示状态变更的按钮
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
//完成了值列表的输出

if ($require_confirmation =="OPTIONAL") {
//列出选择框
echo '<span id="span_asset_trans_date" class="input-group date" style="margin-top:5px" >';
echo translate('LBL_DEFAULT_DATE','HAT_Asset_Trans_Batch').": ";
echo " <input type='checkbox' id='chk_default_date' name='chk_default_date' value='auto_date' checked='checked' />";
echo '</span>';

//列出实际完成日期的输入框
echo '<span id="span_accutral_execution_date" class="input-group date" style="margin-top:5px" >';
echo translate('LBL_ACCTUAL_COMPLETE_DATE','HAT_Asset_Trans').": ";
echo '<input class="date_input" autocomplete="off" type="text" name="accutral_execution_date" id="accutral_execution_date" title="" tabindex="0">';
echo '<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span></span>';
echo '</form>';

?>
<script>
$("#span_accutral_execution_date").hide()

//如果没有选择默认日期，则显示出日期选择区域
$('input[type="checkbox"][name="chk_default_date"]').change(function() {
     if(this.checked) {
         $("#span_accutral_execution_date").hide()
     } else {
         $("#span_accutral_execution_date").show()
     }
 });

//设置当前日期选择框，EditView中在SugarField中已经有定义，这里是DetailView，可能没有经过SugarField，因此再定义一次。
var dateformat='<?php echo ($timedate->get_date_format()." ".$timedate->get_time_format());?>';
dateformat = dateformat.replace(/Y/,"yyyy");
dateformat = dateformat.replace(/m/,"mm");
dateformat = dateformat.replace(/d/,"dd");
dateformat = dateformat.replace(/H/,"hh");
dateformat = dateformat.replace(/M/,"ii");

$('#span_accutral_execution_date').datetimepicker({
    format: dateformat,
    language: '<?php echo $GLOBALS['current_language'];?>',
	showMeridian: true,
	minView: 0,
	todayBtn: true,
	autoclose: true
});


</script>

<?php
	}//end if if ($require_confirmation =="OPTIONAL")
?>