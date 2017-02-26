$.getScript("modules/HAA_FF/ff_include.js");

$(document).ready(function() {
    //这里可以有其它代码;

    //Add by zengchen 20161219
    setAmount_c();
    $("#status").change(function(){
        $("#amount_c").val("");
    	setAmount_c();
    });

    function setAmount_c(){
    	var statu=$("#status option:selected").val();
    	$("#amount_c").unbind("blur");
        $("#unpaied_amount_c").attr("readonly",true);
    	$("#amount_c").attr("readonly",true);
    	$("#amount_c").removeAttr("placeholder");
    	switch(statu){
    		case "Paid":
                $("#unpaied_amount_c").val("");
    			$("#amount_c").val($("#total_amount").val());
    		break;
    		case "Unpaid":
    			$("#amount_c").val("0.00");
                $("#unpaied_amount_c").val($("#total_amount").val());
                alert("以往租金包括未完全支付后剩余款项。");
    		break;
    		case "Cancelled":
    			$("#amount_c").val("");
                $("#unpaied_amount_c").val("");
    		break;
    		case "PartedPaid":
    			$("#amount_c").removeAttr("readonly");
                $("#amount_c").attr("placeholder","金额大于0且小于金额总计");
    			$("#amount_c").blur(function(){
    				var amount_c=$("#amount_c").val().replace(/,/g,"");
                    var total_amount=$("#total_amount").val().replace(/,/g,"");//去除除千分符
    				if (parseFloat(amount_c)<=0||parseFloat(amount_c)>=parseFloat(total_amount)) {
    					$("#amount_c").val("");
    				}else{
                        $("#unpaied_amount_c").val(parseFloat(total_amount)-parseFloat(amount_c));
                    }
    			});
    		break;
    	}
    }
    //End add 20161219
    //Add by zhangling 20170214
    if(document.getElementsByName("record")[0].value!=""&&($("#status").val()=="Paid"||$("#status").val()=="PartedPaid")&& parseInt($("#amount_c").val())!=0){
       $("#EditView_tabs input").attr("readonly",true);
       $("#EditView_tabs input").css("background-Color","#efefef");
       $("#EditView_tabs textarea").attr("readonly",true);
       $("#EditView_tabs textarea").css("background-Color","#efefef");
       $("#EditView_tabs select").attr("disabled","disabled");
       $("#EditView_tabs select").css("background-Color","#efefef");
       $("#EditView_tabs input").attr("disabled","disabled");
       $("#EditView_tabs .dateTime").hide();
       $(".input-group-addon").hide();
       $("#EditView_tabs button").addClass("button");
       $("#EditView_tabs button").removeAttr("style");
       $("#EditView_tabs button").remove();
       $(".deleteGroup").css("display","none");
    }
    //End add 20170214
});
//选择合同类型的回调函数
function setEventTypeReturn(popupReplyData){
	set_return(popupReplyData);
	call_ff();
}
 
function call_ff() {
	triger_setFF($("#haa_ff_id").val(),"AOS_Invoices");
	$("a.collapsed").click();
}
//选择来源类型的回调函数
function openParentPopup(){
	if ($("#source_code_c").val()==="AOS_Contracts"){
		var popupRequestData = {
			"call_back_function" : "setParentReturn",
			"form_name" : "EditView",
			"field_to_name_array" : {
				"id" : "parent_id" ,
				"name" : "parent_name" ,
				"contract_number_c" : "parent_number",
				"contract_subtype_c" : "parent_sub_type" ,
				"type_c" : "parent_class" ,
			}
		};
		open_popup($("#source_code_c").val(), 1200, 850, '', true, true, popupRequestData);
	}


}
function setParentReturn(popupReplyData){
	set_return(popupReplyData);
	$("#source_id_c").val($("#parent_id").val());
}

function resetParentInfo(){  
	$("#source_reference_c").val("");
	$("#source_id_c").val("");
	$("#parent_number").val("");
	$("#parent_class").val("");
	$("#parent_id").val("");
	$("#parent_sub_type").val("");
	$("#parent_name").val("");
}

//Add by zengchen 20161219
function setCloseDate(){
    if ($("#closed_date_c").text()!="") {
        return false;
    }
    var message="是否将未结金额转入后期结算?";
    var record=$("input[name='record']").val();
    var url="?module=AOS_Invoices&action=setCloseDate&to_pdf=true";
    YAHOO.SUGAR.MessageBox.show({
        msg : "是否将未结金额转入后期结算?",
        title : "关闭发票",
        type : 'confirm',
        buttons:[{
            text:"是",
            isDefault:true,
            handler:function(){
                YAHOO.SUGAR.MessageBox.config['fn']('yes');
                YAHOO.SUGAR.MessageBox.hide();
            },
        },{
            text:"否",
            handler:function(){
                YAHOO.SUGAR.MessageBox.config['fn']('no');
                YAHOO.SUGAR.MessageBox.hide();
            },
        }],
        fn : function(confirm) {
            console.log(confirm);
            if (confirm == 'yes') {
                getAjaxData(record,url);
                window.location.reload();//不管是与否，都刷新页面
            }else{
                getAjaxData(record,url);
                window.location.reload();//不管是与否，都刷新页面
            }
        },
    });
}

function getAjaxData(recordId,urlStr) {
    $.ajax({
        url:urlStr,
        data:"&record="+recordId,
        type:"POST",
        success:function(res){
            if (res==1) {
                return true;
            }else{
                alert("未正常关闭该发票，请重试。");
                return false;
            }
        }
    });
}
//End add 20161219 

//add by tangqi 20170224
function returnDeposit(){
  /*  if ($("#closed_date_c").text()!="") {
        return false;
    }*/
    var record=$("input[name='record']").val();
    var url="?module=AOS_Invoices&action=returnDeposit&to_pdf=true";
    if(confirm("是否退回押金?"))//弹出确定/取消对话框
      {
        getAjaxData(record,url);
        window.location.reload();//不管是与否，都刷新页面
      }else
      {
        return false;
      }
}

function getPeriod(){
    var dateTime=document.getElementById("invoice_date").value;
    var frame_id=document.getElementById("haa_frameworks_id_c").value;
    if(dateTime)
    {
        $.ajax({
            async:false,
            url: 'index.php?to_pdf=true&module=AOS_Invoices&action=getPeriod',
            data: '&dateTime='+dateTime+'&frame_id='+frame_id,
            type:'POST',
            success: function (data) {//调用方法。
                //data=$.parseJSON(data);
                //data=JSON.parse(data);
                $("#period_name_c").val(data); //将取出来的头ID字段放到页面上的一个隐藏文本框中。
            }
    });

    }
}
//end add by tangqi 20170224