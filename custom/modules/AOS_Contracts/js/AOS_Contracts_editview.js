$.getScript("modules/HAA_FF/ff_include.js");


//选择合同类型的回调函数
function setContractTypePopupReturn(popupReplyData){
    set_return(popupReplyData);
    call_ff();
}
 
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"AOS_Contracts");
    $("a.collapsed").click();

    /*if($("#status").val()=="Signed"){
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
       
    }*/
}

function setPreContractPopupReturn(popupReplyData) {
    popupReplyData["name_to_value_array"]["contract_revision_c"]=String(parseInt(popupReplyData["name_to_value_array"]["contract_revision_c"])+1);
    set_return(popupReplyData);
    
}

$(document).ready(function(){

    /*SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
        OverwriteSaveBtn(preValidateFunction);//注意引用时不加（）
    });*/
    /*alert($("#status").val());*/
    
       
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
    //$("input[name^=btn_edit_line]").remove();
    $(".deleteGroup").css("display","none");
    //add by liu
    $("#status").attr("disabled",false);
    $("#status").removeAttr("style");
    $("#contract_subtype_c").attr("disabled",false);
    $("#contract_subtype_c").attr("readonly",false);
    $("#contract_subtype_c").removeAttr("style");
    $("#haa_codes_id3_c").attr("disabled",false);
    $("#haa_codes_id3_c").attr("readonly",false);
    var html='<button id="btn_contract_subtype_c" class="button firstChild" type="button" name="btn_contract_subtype_c" tabindex="" title="选择[Alt+T]" value="选择" onclick="open_popup( &quot;HAA_Codes&quot;, 600, 400, &quot;&code_type_advanced=contract_type&parent_type_value_advanced=&quot;+this.form.type_c.value+&quot;&quot;, true, false, {&quot;call_back_function&quot;:&quot;set_return&quot;,&quot;form_name&quot;:&quot;EditView&quot;,&quot;field_to_name_array&quot;:{&quot;id&quot;:&quot;haa_codes_id3_c&quot;,&quot;name&quot;:&quot;contract_subtype_c&quot;}}, &quot;single&quot;, true );">'
               +'<img src="themes/MaterialDesignP/images/id-ff-select.png?v=6T2wqZkzRRtQXSbbOJRC2A">'
            +'</button>'
            +'<button id="btn_clr_contract_subtype_c" class="button lastChild" type="button" name="btn_clr_contract_subtype_c" tabindex="" title="清除选择" onclick="SUGAR.clearRelateField(this.form, &quot;contract_subtype_c&quot;, &quot;haa_codes_id3_c&quot;);" value="清除选择">'
               +'<img src="themes/MaterialDesignP/images/id-ff-clear.png?v=6T2wqZkzRRtQXSbbOJRC2A">'
            +'</button>';
    $("#haa_codes_id3_c").next().html(html);
    $("#description").attr("readonly",false);
    $("#description").removeAttr("style");
    

//alert(1);
});


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