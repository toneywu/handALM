$.getScript("modules/HAA_FF/ff_include.js");


//选择合同类型的回调函数
function setContractTypePopupReturn(popupReplyData){
    set_return(popupReplyData);
    call_ff();
}
 
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"AOS_Contracts");
    $("a.collapsed").click();

    if($("#status").val()=="Signed"){
	   //$("#EditView_tabs button").css("display","none");
	   $("#EditView_tabs input").attr("readonly",true);
	   //$("#EditView_tabs input").attr("style","background-Color:#efefef");
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
	   //$("input[name^=btn_edit_line]").remove();
		$(".deleteGroup").css("display","none");
	   
	}
    //
}

function setPreContractPopupReturn(popupReplyData) {
	popupReplyData["name_to_value_array"]["contract_revision_c"]=String(parseInt(popupReplyData["name_to_value_array"]["contract_revision_c"])+1);
	set_return(popupReplyData);
	
}

//$(document).ready(function(){

	/*SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(preValidateFunction);//注意引用时不加（）
	});*/
	/*alert($("#status").val());*/
	

//alert(1);
//});


function setContractTempPopupReturn(popupReplyData){
	var contract_temp_id= popupReplyData["name_to_value_array"]["haos_contract_templates_id_c"];
	
	get_contract_temp_info(contract_temp_id);
	set_return(popupReplyData);
	

}

function get_contract_temp_info(id){

	$.ajax({
            async:false,
            url: 'index.php?to_pdf=true&module=AOS_Contracts&action=getContractTempInfo',
            data: '&contr_temp_id='+id,
            type:'POST',
            success: function (data) {//调用方法。
                //data=$.parseJSON(data);
                //data_line_item=eval(data.line_item);
                data=JSON.parse(data);

                for (var i = 0; i < data.line_item.length; i++) {
                	insertLineItems(data.line_item[i], data.group_item[i]);
                }

                /*for(var i =0;i<data.line_item.length;i++){
                	insertLineItems(data.line_item, data.group_item);
                }*/
                
            }
    });

}