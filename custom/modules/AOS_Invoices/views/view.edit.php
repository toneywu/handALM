<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class AOS_InvoicesViewEdit extends ViewEdit {
	function AOS_InvoicesViewEdit(){
		parent::ViewEdit();
	}

	function display(){
		global $db,$app_list_strings;
		// global $sugar_config, $locale, $app_list_strings, $mod_strings;
		require_once('modules/HAA_Frameworks/orgSelector_class.php');
		$current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
		$current_module = $this->module;
		$current_action = $this->action;
		$this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));	


		$this->populateInvoiceTemplates();
		$this->populateBillContactInfo();
		$this->populateParentInfo();

		//*********************处理FF界面 START********************
		/*if(isset($this->bean->hat_eventtype_id_c) && ($this->bean->hat_eventtype_id_c)!=""){
			$hat_eventtype_id_c = $this->bean->hat_eventtype_id_c;
			$bean_event_type = BeanFactory::getBean('HAT_EventType',$hat_eventtype_id_c);
			$ff_id = $bean_event_type->haa_ff_id;
		}
		*/
		//20170203toney.wu add start
		require_once('modules/HAA_FF/ff_include_editview.php');
		initEditViewByFF((!empty($this->bean->haa_codes_id_c))?$this->bean->haa_codes_id_c:"",'HAT_EventType');
		//20170203toney.wu add end
		parent::display(); 
		//style=\"display: none;\"
		echo "<script>
		if($(\"#createInvoiceBtn\").length==0){
			var createInvBtn=$('<input id=\"revenues_source_code_c\"  name=\"revenues_source_code_c\" value=\"\" style=\"display: none;\"><input id=\"revenues_source_code_id\"  name=\"revenues_source_code_id\"  value=\"\" style=\"display: none;\">');
			createInvBtn.insertBefore('#source_code_c');
		}
	</script>"; 
	$html="";
	
			//add 20170317 收支同步结算
	if(isset($_GET['revenues_source_code_c'])&&isset($_GET['revenues_source_code_id'])){
			// var_dump('expression222222222');
			// var_dump($_GET['revenues_source_code_c']);
		echo "<script>
		document.getElementById('revenues_source_code_id').value='".$_GET['revenues_source_code_id']."';
		document.getElementById('revenues_source_code_c').value='".$_GET['revenues_source_code_c']."';</script>";
		$html.= "<script>
		if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;} </script>";

		if($_GET['revenues_source_code_c']=='AOS_Contracts'){

			if (isset($_GET["data"])) {
				$cord_array=preg_split('/,/', $_GET["data"]);
				foreach ($cord_array as $k => $v) {
					$cord_array[$k]="'".$cord_array[$k]."'";
				} 
				$str=implode(',', $cord_array);

				$sql = "SELECT pg.group_id FROM aos_products_quotes pg  WHERE pg.id in(".$str.") AND pg.deleted = 0  group by pg.group_id ORDER BY pg.number ASC";
					$result = $db->query($sql);
				$html.= "<script>
				if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;} </script>";
				while($grow = $db->fetchByAssoc($result)){
					
					$groupBean=BeanFactory::getBean('AOS_Line_Item_Groups',$grow['group_id']);
		        	    	//处理费用组
					$bean_codes = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
						'name' =>  $groupBean->name,
						'code_module'=>'revenue'
						));
					$haa_codes_id_c='';
					if ($bean_codes) { 
						$haa_codes_id_c= isset($bean_codes->id)?$bean_codes->id:'';
					}

					//var_dump($bean_codes);

					$group_item = 'null';

					$group_item = new HAA_codes();
					$group_item ->retrieve($haa_codes_id_c);
					$group_item = $group_item->toArray();
					//$group_item['group_id']=$haa_codes_id_c;
					$group_item['group_id']=$grow['group_id'];
					$group_item = json_encode($group_item);

					$sql2="select pg.id,pg.parent_id from aos_products_quotes pg WHERE pg.deleted=0  and pg.group_id='".$grow['group_id']."' and pg.id in(".$str.")";
					
          	    	$res = $db->query($sql2);
          	    	while ( $lrow = $db->fetchByAssoc($res)) {
          	    		$quote = new AOS_Products_Quotes();
          	    		$quote->retrieve($lrow['id']);
          	    		//$quote->haos_revenues_quotes_id_c=$lrow['parent_id'];
          	    	    //$quote->id='';
          	    		//$quote->save();
          	    		//$quote->;

          	    		$line_item=$quote->toArray();
          	    		//$line_item['group_id']=$haa_codes_id_c;
          	    		$line_item['group_id']=$grow['group_id'];
          	    		$line_item = json_encode($line_item);
          	    		
          	    		$html .= "<script>
          	    		insertLineItems(".$line_item.",".$group_item.");</script>";
          	    	}

          	  }//结束组循环
          	}
          		echo $html;
          	    echo "
          	    <script>
     				// var inputArr=$('#lineItems input');
					// var inputArrLength=inputArr.length;
					// for(var i=0;i<inputArrLength;i++){
					// 	inputArr[i].readOnly=true;
					// }

					// var selectArr=$('#lineItems select');
					// var selectArrLength=selectArr.length;
					// for(var i=0;i<selectArrLength;i++){
					// 	selectArr[i].readOnly=true;
					// }

					var buttonArr=$('#lineItems button');
					var buttonArrLength=buttonArr.length;
					for(var i=0;i<buttonArrLength;i++){
						buttonArr[i].disabled=true;
					}

					var inputBtnArr = $('#lineItems input[id^=\"btn_product_edit_line\"]'); 
					var inputBtnArrLength=inputBtnArr.length;
					for(var i=0;i<inputBtnArrLength;i++){
						inputBtnArr[i].disabled=true;
					}

					var inputSerBtnArr = $('#lineItems input[id^=\"btn_service_edit_line\"]'); 
					var inputSerBtnArrLength=inputSerBtnArr.length;
					for(var i=0;i<inputSerBtnArrLength;i++){
						inputSerBtnArr[i].disabled=true;
					}

					var inputGroupNameArr=$('#lineItems input[id^=\"group\"]'); 
					var inputGroupNameArrLength=inputGroupNameArr.length;
					for(var i=0;i<inputGroupNameArrLength;i++){
						inputGroupNameArr[i].disabled=true;
					}

					var inputAddProBtnArr=$('#lineItems input[id^=\"product_group\"]'); 
					var inputAddProBtnArrLength=inputAddProBtnArr.length;
					for(var i=0;i<inputAddProBtnArrLength;i++){
						inputAddProBtnArr[i].disabled=true;
					}

					var inputAddSerBtnArr=$('#lineItems input[id^=\"service_group\"]'); 
					var inputAddSerBtnArrLength=inputAddSerBtnArr.length;
					for(var i=0;i<inputAddSerBtnArrLength;i++){
						inputAddSerBtnArr[i].disabled=true;
					}

					// var textareaArr=$('#lineItems textarea');
					// var textareaArrLength=textareaArr.length;
					// for(var i=0;i<textareaArrLength;i++){
					// 	textareaArr[i].readOnly=true;
					// }
					document.getElementById('addGroup').disabled=true;
					//$('#addGroup').disabled=true;
          	    </script>
          	    ";
          	}else{

			//var_dump($_GET['revenues_source_code_id']);
          		require_once('modules/'.$_GET['revenues_source_code_c'].'/InfoToInvoiceEditView.php');
          		$return_result = getInfo($_GET['revenues_source_code_id']);
          		$return_data = $return_result['return_data'];
          		$rawRow = $return_data['rawRow'];
          		$quoteRow = $return_data['quoteRow'];
			// var_dump($return_data['rawRow']);
			// var_dump($return_data['quoteRow']);

   			//	处理费用组
          		$bean_codes = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
          			'name' =>  $rawRow['expense_group'],
          			'code_module'=>'revenue'
          			));
          		if ($bean_codes) { 
          			$rawRow['haa_codes_id_c']= isset($bean_codes->id)?$bean_codes->id:'';
          			$rawRow['expense_group']=$rawRow['expense_group'];
          		}
          		else{
          			$rawRow['expense_group'] = '';
          			$rawRow['haa_codes_id_c']= '';
          		}

          		$group_item = new HAA_codes();
          		$group_item ->retrieve($rawRow['haa_codes_id_c']);

          		$group_item=$group_item->toArray();
          		$group_item['group_id']=$rawRow['haa_codes_id_c'];
          		$group_item = json_encode($group_item);

          		$quote = new AOS_Products_Quotes();
          		//$quoteRow['id'] = '';
   			//$quoteRow['parent_id']='ABCDE12345';
          		$quoteRow['parent_type']='HAOS_Revenues_Quotes';
          		if($quoteRow['line_item_type_c']=='Service'){
          			$quoteRow['product_id']='0';
          		}
          		$quote->populateFromRow($quoteRow);
			//$quote->process_save_dates =false;
			//$quote->save();

          		$line_item=$quote->toArray();
          		$line_item['group_id']=$rawRow['haa_codes_id_c'];
          		$line_item = json_encode($line_item);

          		$html .= "<script>
          		insertLineItems(" . $line_item . "," . $group_item . ");</script>";
          		echo $html;
          	}

    }else{//add 20170317 非同步结算
    	if (isset($_GET["data"])) {
    		$cord_array=preg_split('/,/', $_GET["data"]);
    		foreach ($cord_array as $k => $v) {
    			$cord_array[$k]="'".$cord_array[$k]."'";
    		} 
    		$str=implode(',', $cord_array);
    		$sql = "SELECT hr.haa_codes_id_c FROM aos_products_quotes pg left join haos_revenues_quotes hr on pg.parent_id=hr.id WHERE pg.id in(".$str.") AND pg.deleted = 0 and hr.deleted=0 group by hr.haa_codes_id_c ORDER BY pg.number ASC";
    		$result = $db->query($sql);
    		$html.= "<script>
    		if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;} </script>";
          	    while ( $grow = $db->fetchByAssoc($result)) {//分组->组下的条目
          	    	$group_item = 'null';
          	    	if ($grow['haa_codes_id_c'] != null) {
          	    		$group_item = new HAA_codes();
          	    		$group_item ->retrieve($grow['haa_codes_id_c']);
          	    		$group_item = $group_item->toArray();
          	    		$group_item['group_id']=$grow['haa_codes_id_c'];
          	    		$group_item = json_encode($group_item);
          	    	}
          	    	$sql="select pg.id,pg.parent_id from aos_products_quotes pg,haos_revenues_quotes hr WHERE pg.parent_id=hr.id and pg.deleted=0 and hr.deleted=0 and hr.haa_codes_id_c='".$grow['haa_codes_id_c']."' and pg.id in(".$str.")";
          	    	$res = $db->query($sql);
          	    	while ( $lrow = $db->fetchByAssoc($res)) {
          	    		$quote = new AOS_Products_Quotes();
          	    		$quote->retrieve($lrow['id']);
          	    		$quote->haos_revenues_quotes_id_c=$lrow['parent_id'];
          	    		$quote->save();


          	    		$line_item=$quote->toArray();
          	    		$line_item['group_id']=$grow['haa_codes_id_c'];
          	    		$line_item = json_encode($line_item);
          	    		
          	    		$html .= "<script>
          	    		insertLineItems(".$line_item.",".$group_item.");</script>";
          	    	}
          	    }
          	}
          	echo $html;	   
   		}//end add 20170317 同步结算   	
   		
   		$cord=$_GET['cord'];
        if(isset($cord)){
   		$cord_array=preg_split('/,/', $cord);
        //var_dump($cord_array);
   		$accounts=BeanFactory::getBean('Accounts',$cord_array[1]);
   		$contacts=BeanFactory::getBean('Contacts',$cord_array[0]); 
   		echo "<script>
   		document.getElementById('billing_account').value='".$accounts->name."';
   		document.getElementById('billing_account_id').value='".$cord_array[1]."';
   		document.getElementById('billing_contact').value='".$contacts->name."';
   		document.getElementById('billing_contact_id').value='".$cord_array[0]."';
   		document.getElementById('billing_contact_number').value='".$contacts->employee_number_c."';</script>";
   		}
   	if (isset($_GET["name"])) {
   		$name=$_GET['name'];
   		echo "<script>
   		document.getElementById('name').value='".$name."';
   	</script>";
   }



   if (isset($_GET["period_name_c"])) {
   	$period_name_c=$_GET['period_name_c'];
   	echo "<script>
   	document.getElementById('period_name_c').value='".$period_name_c."';

   </script>";
}
if (isset($_GET["status"])) {
	$status=$_GET['status'];
	echo "<script>
	document.getElementById('status').value='".$status."';
	document.getElementById('status_hide').value='".$status."';
</script>";
}
if (isset($_GET["amount_c"])) {
	$amount_c=$_GET['amount_c'];
	echo "<script>
	document.getElementById('amount_c').value='".$amount_c."';
	document.getElementById('amount_c_hide').value='".$amount_c."';
</script>";
}
if (isset($_GET["source_code_c"])) {
	$source_code_c=$_GET['source_code_c'];
	echo "<script>
	document.getElementById('source_code_c').value='".$source_code_c."';
</script>";
}    
if (isset($_GET["source_reference_c"])) {
	$source_reference_c=$_GET['source_reference_c'];
	echo "<script>
	document.getElementById('source_reference_c').value='".$source_reference_c."';
</script>";
}

		/*$ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
		echo '<script>if($("#haa_ff_id").length==0) {  $("#EditView").	append("'.$ff_id_field.'");}</script>';
		*/
		//如果已经选择事件类型，无论是否事件类型对应的FlexForm有值，值将界面展开。
		/*20170203 toney.wu deleted

		if(isset($this->bean->hat_eventtype_id_c) && ($this->bean->hat_eventtype_id_c)!=""){
		echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
		} /*else {
			echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
		}
		20170203 toney.wu deleted end*/

		//*********************处理FF界面 END********************
		$amount_c=$this->bean->amount_c;
		$amount_c=preg_replace("/,/", "", $amount_c);
		if ($this->bean->id) {
			$this->bean->amount_c=number_format($amount_c,2,'.',',');
			echo "<script>
			$('#closed_date_c').val('".$this->bean->closed_date_c."');
			$('#status').val('".$this->bean->status."');
			$('#amount_c').val('".$this->bean->amount_c."');
			$('#unpaied_amount_c').attr('readonly',true);
			$('#return_deposit_date_c').val('".$this->bean->return_deposit_date_c."');
			document.getElementById('period_name_c').value='".$this->bean->period_name_c."';
		</script>";
		echo '<script type="text/javascript">

		var Datetimepicker=$("#span_return_deposit_date_c");
		var dateformat="Y-m-d H:M";
		dateformat = dateformat.replace(/Y/,"yyyy");
		dateformat = dateformat.replace(/m/,"mm");
		dateformat = dateformat.replace(/d/,"dd");
		dateformat = dateformat.split(" ",1);
		Datetimepicker.datetimepicker({
			language: "zh_CN",
			format: dateformat[0],
			showMeridian: true,
			minView: 4,
			todayBtn: true,
			autoclose: true,
		});
	</script>';
	}

	
		//add by hq 170301 发票名字	
	if(isset($_GET["name"]) && !empty($_GET["name"]) && isset($_GET["source_code_c"])){
		if(($_GET["source_code_c"])=='HAOS_Revenues_Quotes'){
			echo "<script>
			var invoice_date_for_name = $(\"#invoice_date\").val();
			var name = '".$_GET["name"]."'+' '+invoice_date_for_name;
			$('#name').val(name);

		</script>"; 
	}

}
    //end add 170301
    //add by hq 20170309 发票到期日期
if(isset($_GET["due_date"])){
	echo "<script>
	var dueDate = '".$_GET["due_date"]."';
	$('#due_date').val(dueDate);

</script>"; 
}
    //add by hq 20170301 自动带出期间
echo "<script> 

$('.datetimepicker.datetimepicker-dropdown-bottom-right.dropdown-menu').click(function(){
	getPeriod();
});
</script>";
		//end 20170301

	//add by hq 20170313 事件类型
if(isset($_GET["source_code_c"])){ 
	$eventtypeInfo = $this->getEventTypeInfo($_GET["source_code_c"]);
	echo "<script> 
	$('#event_type_c').val('".$eventtypeInfo['eventTypeName']."');
	$('#hat_eventtype_id_c').val('".$eventtypeInfo['eventTypeId']."');
</script>";
}
	//end 20170313
}

function populateInvoiceTemplates(){
	global $app_list_strings;

	$sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted='0' AND type='AOS_Invoices'";
	$res = $this->bean->db->query($sql);

	$app_list_strings['template_ddown_c_list'] = array();
	while($row = $this->bean->db->fetchByAssoc($res)){
		$app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
	}
}

function populateBillContactInfo(){
	$bean_contact= BeanFactory::getBean('Contacts', $this->bean->billing_contact_id);
	if ($bean_contact) { 

		$this->bean->billing_contact_number = isset($bean_contact->employee_number_c)?$bean_contact->employee_number_c:'';
	}
}
function populateParentInfo(){
		//需要根据来源类型模块分别设置返回值
		//如果有新的模块来源需要在这里增加分支，这里不适合用弹性关联
	if($this->bean->source_code_c=="AOS_Contracts"){
		$this->bean->parent_type=($this->bean->parent_type!='')?$this->bean->parent_type:$this->bean->source_code_c;
		$this->bean->parent_id=($this->bean->parent_type!='')?$this->bean->parent_id:$this->bean->source_id_c;
		$parent_bean= BeanFactory::getBean('AOS_Contracts', $this->bean->parent_id);
		if ($parent_bean) { 
			$this->bean->parent_name = isset($parent_bean->name)?$parent_bean->name:'';
			$this->bean->parent_number = isset($parent_bean->contract_number_c)?$parent_bean->contract_number_c:'';
			$this->bean->parent_class = isset($parent_bean->type_c)?$parent_bean->type_c:'';
			$this->bean->parent_sub_type = isset($parent_bean->contract_subtype_c)?$parent_bean->contract_subtype_c:'';
		}
	}

}


function editSynHtml(){

}

function getEventTypeInfo($source_code_c){
	
	$EventTypeInfo = array();
	$tag = '';
	if($source_code_c=='HAOS_Revenues_Quotes'){
		$tag = 'Invoice';
	}else if($source_code_c=='AOS_Contracts'){
		$tag = 'Deposit';
	}

	$sql = 'select id,name from hat_eventtype
	where 1=1
	and tag="'.$tag.'"';
	$res = $this->bean->db->query($sql);
	
	while($row = $this->bean->db->fetchByAssoc($res)){
		$EventTypeInfo['eventTypeId'] = $row['id'];
		$EventTypeInfo['eventTypeName'] = $row['name'];
	}


	return $EventTypeInfo;
	
}

}
?>
