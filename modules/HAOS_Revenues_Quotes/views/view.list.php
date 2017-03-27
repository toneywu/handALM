<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAOS_Revenues_QuotesViewList extends ViewList
{
	function processSearchForm()
    {
        parent::processSearchForm();
        $haa_frameworks_id=$_SESSION["current_framework"];
        if ($this->where) {//多个查询条件时加and以及拼接查询条件
            $this->where.=" AND EXISTS ( SELECT 1 FROM haos_revenues_quotes tc WHERE haos_revenues_quotes.id=tc.id AND tc.haa_frameworks_id_c='".$haa_frameworks_id."')";
        }else{//没有其他查询条件时
            $this->where=" EXISTS ( SELECT 1 FROM haos_revenues_quotes tc WHERE haos_revenues_quotes.id=tc.id AND tc.haa_frameworks_id_c='".$haa_frameworks_id."')";
        } 
       
    }

	function display(){

		echo '<script src="modules/HAOS_Revenues_Quotes/js/HAOS_Revenues_Quotes_listview.js"></script>';
		parent::display();
		echo '<script>
			$(function(){
				$("button[name=btn_event_type_basic]").removeAttr("onclick");
				$("button[name=btn_event_type_basic]").click(function(){
					open_popup("HAT_EventType", 600, 400, "&basic_type_advanced=REVENUE", true, false, {"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"hat_eventtype_id_c_basic","name":"event_type_basic"}}, "single", true);
				});
			});
		</script>';
		echo "<script>
			if($(\"#createInvoiceBtn\").length==0){
			var createInvBtn=$('<input id=\"createInvoiceBtn\" type=\"button\" value=\"创建发票\" onclick=\"createInvoices()\">');
			createInvBtn.insertBefore('#select_actions_disabled_top');
			}
			if($(\"#createInvoiceBtn2\").length==0){
			var createInvBtn=$('<input id=\"createInvoiceBtn2\" type=\"button\" value=\"批量结算\" onclick=\"createInvoices2()\">');
			createInvBtn.insertBefore('#select_actions_disabled_top');
			}
		</script>";

		echo "<script src='modules/HAOS_Revenues_Quotes/js/HAOS_Revenues_Quotes_listview.js'></script>";
		echo "<script>
			function createInvoices(){
				var bool=false;//是否有选择，默认没有
				var num=0;
				var data_array=new Array();
				$('table.list').find(':checkbox').each(function(){
					if($(this).is(':checked')){
						data_array[num]=$(this).val();
						bool=true;
						num++;
					}
				});  
				if(bool==true){
					$.ajax({
						url:'?module=HAOS_Revenues_Quotes&action=checkInfo&to_pdf=1',
						data:'&data='+data_array,
						type:'POST',
						success:function(data){
							var val=JSON.parse(data); 
							if(val['type']==-1){
								alert('创建发票时不能勾选已结清的收支项。');
							}
							else if(val['type']==0){
								alert('客户与人员信息必须一致！');
							}else{
								
								location.href='?module=AOS_Invoices&action=editview&data='+val['value']+'&cord='+val['cord']+'&amount_c=0&source_code_c=HAOS_Revenues_Quotes&name='+val['name']+'&due_date='+val['event_date'];
								
							}
						}
					}); 
				}else{
					alert('请勾选记录');
				}
			}

			function createInvoices2(){
				var bool=false;//是否有选择，默认没有
				var num=0;
				var data_array=new Array();
				$('table.list').find(':checkbox').each(function(){
					if($(this).is(':checked')){
						data_array[num]=$(this).val();
						bool=true;
						num++;
					}
				});  
				if(bool==true){
					$.ajax({
						url:'?module=HAOS_Revenues_Quotes&action=checkInfo&to_pdf=1',
						data:'&data='+data_array,
						type:'POST',
						success:function(data){
							var val=JSON.parse(data); 
							if(val['type']==-1){
								alert('创建发票时不能勾选已结清的收支项。');
							}
							else if(val['type']==0){
								alert('客户与人员信息必须一致！');
							}
							else{
							   
								 location.href='?module=AOS_Invoices&action=editview&data='+val['value']+'&cord='+val['cord']+'&amount_c=0&source_code_c=HAOS_Revenues_Quotes&name='+val['name']+'&due_date='+val['event_date'];
								
							}
						}
					}); 
				}else{
					alert('请勾选记录');
				}
			}
		</script>";
	}
}
	
?>