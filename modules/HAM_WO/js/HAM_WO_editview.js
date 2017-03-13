var global_event_options="";

function setEventTypeReturn(popupReplyData){//选择地点类型后
    set_return(popupReplyData);
    call_ff();
}

function getNowDatetime(){
   var myDate = new Date();
   var Y = myDate.getFullYear(); 
   var M = myDate.getMonth()+1; 
   var D = myDate.getDate(); 
   var H = myDate.getHours();
   var MIN = myDate.getMinutes();
   var S = myDate.getSeconds();
   var now = Y
            +'-'
            +(M>9?M:'0'+M)
            +'-'
            +(D>9?D:'0'+D)
            +' '
            +(H>9?H:'0'+H)
            +':'
            +(MIN>9?MIN:'0'+MIN)
            /*+':'
            +(S>9?S:'0'+S)*/;
   return now;
}
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HAM_WO");
    $("a.collapsed").click();
    if($("#date_actual_start").val()==''){
        var nowDate = getNowDatetime();
        $("#date_actual_start").val(nowDate);
    }
}

function setAssetPopupReturn(popupReplyData){
    set_return(popupReplyData);
    $("#asset_desc_text").text($("#asset_desc").val());
    resetPersonByDate();
}

function setLocationPopupReturn(popupReplyData){
    set_return(popupReplyData);
    $("#location_desc_text").text($("#location_desc").val());
    if($("#location_map_enabled").val()=="1") {
        $("#location_map_enabled_text").show();
    } else {
        $("#location_map_enabled_text").hide();
    }
}

function setWoPriorityReturn(popupReplyData){
    set_return(popupReplyData);
    if($("#priority").val()==""){
        $("#priority").val($("#wo_priority").val());
        $("#ham_priority_id").val($("#wo_priority_id").val());
    }
}

function setHamActivityReturn(popupReplyData){
    set_return(popupReplyData);
    //$("#haa_ff_id").val(popupReplyData.name_to_value_array.hat_event_type_id);
    //console.log(popupReplyData.name_to_value_array.hat_event_type_id);
    //通过事务处理单获取haa_ff_id
    //
    $.ajax({
            url: 'index.php?to_pdf=true&module=HAM_WO&action=get_ff_id&hat_event_type_id=' + popupReplyData.name_to_value_array.hat_event_type_id,
            success: function (data) {
                $("#haa_ff_id").val(data);
                call_ff();
            },
            error: function () { //失败
                alert('Error loading document');
            }
        });
    
    if($("#name").val()==""||$("#name").val()==""||$("#ham_act_id_rule").val()!=$("#name").val()){
        $("#name").val($("#ham_act_id_rule").val());
    }
    if($("#priority").val()==""||$("#priority").val()==""){
        $("#priority").val($("#wo_priority").val());
        $("#ham_priority_id").val($("#wo_priority_id").val());
    }
    
}

function setWorkCenterPopupReturn(popupReplyData){
    set_return(popupReplyData);
    $("#work_center_res").val("");
    $("#work_center_res_id").val("");
    $("#work_center_people").val("");
    $("#work_center_people_id").val("");
}

function setWorkCenterResPopupReturn(popupReplyData){
    set_return(popupReplyData);
}

function resetPersonByDate() {
    var asset_id = $("#hat_assets_id").val();
    var event_time = "";

    if ($("#date_schedualed_start").val()=="") {
        event_time = $("#date_target_start").val();
    } else {
        event_time = $("#date_schedualed_start").val();
    }

    if(asset_id != "" && event_time !=""){
        //如果资产编号不为空，则可以进行基于资产的人员重新处理
    console.log("&asset_id="+asset_id+"&event_time="+event_time);
    $.ajax({
        url:"?module=HAT_Incidents&action=getTimebasedPersonInfor&to_pdf=true",
        type:"GET",
        async: false,
        data:"&asset_id="+asset_id+"&event_time="+event_time,
        success:function(data){
            data = JSON.parse(data);
            //console.log(data);
            $("#contact_id1_c").val(data.id);
            $("#contract_name").val(data.name);
        }
    });
    }
}

function require_field(){
    var wo_status = $("#wo_status").val();
    if(wo_status){
        mark_field_enabled("date_actual_start",true);
        mark_field_enabled("date_actual_finish",true);
    }else{
        mark_field_enabled("date_actual_start",false);
        mark_field_enabled("date_actual_finish",false);
        $("#span_date_actual_start span.input-group-addon").show();
        $("#span_date_actual_finish span.input-group-addon").show();
    }
}

/**
 * 点击按钮 调用Ajax请求 获取权限
 * @param name
 */
function checkAccess(id){
    if(id!=""){
        $.ajax({
            url: 'index.php?to_pdf=true&module=HAM_WO&action=checkAccess&id=' + id,
            success: function (data) {
                if(data!="Y"){
                    window.location.href = "index.php?module=HAM_WO&action=DetailView&record="+id;
                }
            },
            error: function () { //失败
                alert('Error loading document');
            }
        });
    }
};
///**
//* 设置必输
//
/*function mark_field_enabled(field_name,not_required_bool) {
//field_name = 字段名，不需要jquery select标志，直接写名字
//not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=true则为非必须
//alert(not_required_bool);
    $("#"+field_name).css({"color":"#000000","background-Color":"#ffffff"});
    $("#"+field_name).attr("readonly",false);
    $("#"+field_name+"_label").css({"color":"#000000","text-decoration":"none"})

    if(typeof not_required_bool == "undefined" || not_required_bool==false || not_required_bool=="") {
       addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());//将当前字段标记为必须验证
       //打上必须星标
       if  ($("#"+field_name+"_label .required").text()!='*') {//如果没有星标，则打上星标
         $("#"+field_name+"_label").html($("#"+field_name+"_label").text()+"<span class='required'>*</span>");//打上星标
       } else {//如果已经有星标了，则显示出来
         $("#"+field_name+"_label .required").show();
       }
    } else { //如果不是必须的，则不显示星标
     //直接Remove有时会出错，所有先设置为Validate再Remove
     addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());
     removeFromValidate('EditView',field_name);
      //去除必须验证
     $("#"+field_name+"_label .required").hide();
    }
    if  (typeof $("#btn_"+field_name)!= 'undefined') {//移除选择按钮
     $("#btn_"+field_name).css({"visibility":"visible"});
    }
    if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {//移除清空按钮
     $("#btn_clr_"+field_name).css({"visibility":"visible"});
    }
}
*/
function showWOLines() {
    console.log('index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + $("input[name=record]").val());
        $.ajax({
            url: 'index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + $("input[name=record]").val(),
            success: function (data) {
                //console.log(data);
                $("#wo_lines_display").html(data);
            },
            error: function () { //失败
                alert('Error loading document');
            }
        });
};

//add by liu
function check_quantity(){
        var error_msg="";

        //json_data['fromview']="EditView";
        console.log($("input[name=record]").val()+"=============================");
        var wo_id=$("input[name='record']").val();
        var contract_id=$("#contract_id").val();
        $.ajax({
            type:"POST",
            url: "index.php?to_pdf=true&module=HAM_WO&action=checkQuantity",
            data: "&contract_id="+contract_id+"&wo_id="+wo_id,
            cache:false,
            async:false,//重要的关健点在于同步和异步的参数，
            success: function(msg){
                error_msg=msg;
                console.log("check_quantity = "+error_msg);
                if(error_msg!="S"){

                    BootstrapDialog.alert({
                            type : BootstrapDialog.TYPE_DANGER,
                            title : SUGAR.language.get('app_strings',
                                    'LBL_EMAIL_ERROR_GENERAL_TITLE'),
                            message : error_msg
                        });
            }
        },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                 //alert('Error loading document');
                 console.log(textStatus+errorThrown);
            },
            });
    return error_msg;
    
}

//add by liu
function check_lines(){
        var error_msg="";

        var wo_id=$("input[name='record']").val();
        $.ajax({
            type:"POST",
            url: "index.php?to_pdf=true&module=HAM_WO&action=checkLines",
            data: "&wo_id="+wo_id,
            cache:false,
            async:false,//重要的关健点在于同步和异步的参数，
            success: function(msg){
                error_msg=msg;
                console.log("check_lines = "+error_msg);
                if(error_msg!="S"){

                    BootstrapDialog.alert({
                            type : BootstrapDialog.TYPE_DANGER,
                            title : SUGAR.language.get('app_strings',
                                    'LBL_EMAIL_ERROR_GENERAL_TITLE'),
                            message : error_msg
                        });
            }
        },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                 //alert('Error loading document');
                 console.log(textStatus+errorThrown);
            },
            });
    return error_msg;
    
}

function preValidateFunction(async_bool = false) {

    var return_flag=true;
    var error_msg="S";
    $wo_status=$("#wo_status").val();
    console.log("preValidateFunction preValidateFunction preValidateFunction");
    if($wo_status=="SUBMITTED"&&global_event_options.contract_completed!=""&&global_event_options.contract_completed=="SUBMITTED"&&$("#contract_id").val()==""){
        console.log(global_event_options.contract_completed);
        return_flag=false;
        BootstrapDialog.alert({
                        type : BootstrapDialog.TYPE_DANGER,
                        title : SUGAR.language.get('app_strings',
                                'LBL_EMAIL_ERROR_GENERAL_TITLE'),
                        message : "提交工单之前请关联合同！"
                    });
    }

    //状态改为已提交审批的时候,保存工单必须要有工作对像行
    if ($("input[name='record']").val() != "") {
        if($wo_status=="SUBMITTED"){
            var error_msg = check_lines(); //如果验证有误会返回错误信息
        }
        if(error_msg!="S"&&error_msg!=""){
                return;
        }
    }
    console.log(global_event_options);

    if($wo_status=="APPROVED"&&$("#contract_id").val()!=""){
        console.log("check_quantity1");
        var error_msg = check_quantity(); //如果验证有误会返回错误信息
    }
    if(error_msg!="S"&&error_msg!=""){
            return;
    }
    
    return return_flag;
}



$(document).ready(function(){

        var event_id = $("#hat_event_type_id").val();
        $.ajax({//
            url : 'index.php?to_pdf=true&module=HIT_IP_TRANS_BATCH&action=getEventJsonData&hat_eventtype_id='
                    + event_id,
            async : false,
            success : function(data) {
                global_event_options = jQuery.parseJSON(data);
            },
            error : function() { // 失败
                alert('Error loading document');
            }
        });

    //改写Save事件，在Save之前加入数据校验
    SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
        OverwriteSaveBtn(preValidateFunction);//ff_include.js 注意preValidateFunction是一个Function，在此引用时不加（）
    });


    $("#event_type").change(function(){
        SUGAR.util.doWhen("typeof setFF == 'function'", function(){
            call_ff();
        });
    });

    $("#date_schedualed_start").change(function(){resetPersonByDate()})
    $("#date_target_start").change(function(){resetPersonByDate()})

    /**
     * checkAccess 
     * 工作单状态为其它状态时（包括已批准、等待XX、正在执行中及未来可能扩展的状态），以下字段不可编辑：
     * 工单编号、维护区域、标准作业活动、工作单类型、位置、设备/资产、合同、目标开始时间、目标完成时间、
     * 工作单来源信息面板下的所有字段    
     * 
     */
    //BUG：CheckAccess存在问题，新创建工作单时，会自动推出。请检查新增记录的逻辑 #by toney_wu
    //checkAccess($("input[name='record']").val());
    //权限满足后 字段不可编辑：
    var wo_status = $("#wo_status").val();

    SUGAR.util.doWhen("typeof mark_field_disabled != 'undefined'"), function() {
        if(wo_status=="APPROVED"||wo_status=="WSCH"||wo_status=="WMATL"||wo_status=="WPCOND"||wo_status=="INPRG"){
            mark_field_disabled("ham_act_id_rule",false);
            mark_field_disabled("site",false);
            mark_field_disabled("event_type",false);
            mark_field_disabled("location",false);
            mark_field_disabled("asset",false);
            mark_field_disabled("contract",false);
            mark_field_disabled("date_target_start",false);
            mark_field_disabled("date_target_finish",false);
            mark_field_disabled("reporter",false);
            mark_field_disabled("reporter_org",false);
            mark_field_disabled("reported_date",false);
            mark_field_disabled("priority",false);
            mark_field_disabled("source_type",false);
            mark_field_disabled("source_reference",false);
        }
        if(wo_status!="DRAFT"){
            mark_field_disabled("ham_act_id_rule",false);
            mark_field_disabled("location",false);
            mark_field_disabled("asset",false);
            mark_field_disabled("event_type",false);
        }
    }

//这时obj就是触发事件的对象，可以使用它的各个属性
//还可以将obj转换成jquery对象，方便选用其他元素

//处理工作对象行
    $("#wo_lines").parent("td").prev("td").hide();
    $("#wo_lines").hide();
    $("#wo_lines").after("<div id='wo_lines_display'></div>")
    showWOLines();


    if($("#source_type").val()=='SR') {
        $("#reported_date").attr("type","text");
        $("#site,#LBL_EDITVIEW_PANEL4 input,#LBL_EDITVIEW_PANEL4 select").attr("readonly",true);
        $("#site,#LBL_EDITVIEW_PANEL4 input,#LBL_EDITVIEW_PANEL4 select").css("background-Color","#efefef");
        $("#LBL_EDITVIEW_PANEL4 button,#LBL_EDITVIEW_PANEL4 .dateTime").hide();
    }


    //在地点、资产下方添加一个说明的span
    $("#location").parent().append("<span style='display:block' id='location_desc_text'></span><input type='hidden' id='location_desc' name='location_desc'>");
    $("#asset").parent().append("<span style='display:block' id='asset_desc_text'></span><input type='hidden' id='asset_desc' name='asset_desc'>");
    //这两个变量从view/view.edit.php中传递来
    if (typeof js_var_location_title !== "undefined") {
        $("#location_desc_text").text(js_var_location_title);
    }
    if (typeof js_var_asset_desc !== "undefined") {
        $("#asset_desc_text").text(js_var_asset_desc);
    }

    //在地图字段下加入一个提示当前地点是否有GIS信息的字段
    $("#map_enabled").parent().append("<span id='location_map_enabled_text'>"+SUGAR.language.get('HAM_WO', 'LBL_LOCATION_MAP_ENABLED')+"</span><input type='hidden' id='location_map_enabled' name='location_map_enabled'>");
    $("#location_map_enabled_text").hide();


    initTransHeaderStatus()

function initTransHeaderStatus() {
    
    var current_header_status = $("#wo_status").val();
    if (current_header_status=="DRAFT") {//可以DRAFT和SUBMIT
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='RELEASED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='CANCELED']").remove();
         $("#wo_status option[value='COMPLETED']").remove();
        //$("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        //add by yuan.chen 2016-08-11
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        $("#wo_status option[value='WPREV']").remove();
        $("#wo_status option[value='REWORK']").remove(); 

        //如果当前WO没有生成（新建模式，也就是不是处于修改模式），则将当前LOV加上一个空值，让用户去选择。
        if(typeof $("input[name='record']").val()=="undefined"||$("input[name='record']").val()==''){
            //$("#site_select").append("<option selected ='selected' value=''></option>"); 
            //deleted 20170107已经有空值了，不需要再插入
            $("#site_select").val(""); 
            addToValidate('EditView', "site_select",'varchar', 'true', $("#site_label").text());
        }
        
        //end 
    }else if (current_header_status=="RETURNED") {//可以DRAFT和SUBMIT
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='RELEASED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='CANCELED']").remove();
         $("#wo_status option[value='COMPLETED']").remove();
        //$("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        //add by yuan.chen 2016-08-11
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        $("#wo_status option[value='WPREV']").remove();
        $("#wo_status option[value='REWORK']").remove(); 
        $("#wo_status option[value='CLOSED']").remove(); 
        
        //end 
    } else if (current_header_status=="SUBMITTED") { //可以CANCEL和SUBMIT
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='WORKING']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        
        //add by yuan.chen 2016-08-11
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        //end 
        $("#wo_status option[value='WPREV']").remove();
        setEditViewReadonly ();
    } else if ((current_header_status=="APPROVED")||(current_header_status=="RELEASED")||(current_header_status=="REWORK")) { //可以CANCEL,COMPLETED
        /*$("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='RELEASED']").remove();        
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();*/
        $("#wo_status option[value='RELEASED']").remove();        
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='SUBMITTED']").remove();
        //$("#wo_status option[value='COMPLETED']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='WPREV']").remove();
        setEditViewReadonly ();
       $("#pagecontent button").css("display","none");
       $("#pagecontent input").attr("readonly",true);
       $("#pagecontent input").attr("style","background-Color:#efefef");
       $("#pagecontent textarea").attr("readonly",true);
       $("#pagecontent select").attr("disabled","disabled");
       $("#pagecontent select").css("background-Color","#efefef");
       //$("#pagecontent input").attr("disabled","disabled");
       $("#pagecontent .dateTime").hide();
       $("#CANCEL_HEADER").removeAttr("readonly");
       $("#CANCEL_HEADER").removeAttr("disabled");
       $("#CANCEL_HEADER").removeAttr("style");
       $("#CANCEL_FOOTER").removeAttr("readonly");
       $("#CANCEL_FOOTER").removeAttr("disabled");
       $("#CANCEL_FOOTER").removeAttr("style");
    } else if ((current_header_status=="CANCELED")) { //什么也不能做
        $("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='RELEASED']").remove();
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
        
      //add by yuan.chen 2016-08-11
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        //end 
        $("#wo_status option[value='WPREV']").remove();
        setEditViewReadonly ();
    }else if ((current_header_status=="CLOSED")) { //什么也不能做，同Canceled
        
        $("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='RELEASED']").remove();        
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='CANCELED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        //$("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
      //add by yuan.chen 2016-08-11
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        $("#wo_status option[value='WPREV']").remove();
        //end 
        //setEditViewReadonly ();
    }else if ((current_header_status=="COMPLETED")) { 
        //add by yuan.chen 2016-08-11
        $("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='RELEASED']").remove();        
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='CANCELED']").remove();
        $("#wo_status option[value='TRANSACTED']").remove();
        //$("#wo_status option[value='COMPLETED']").remove();
        //$("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
      
        $("#wo_status option[value='WSCH']").remove();
        $("#wo_status option[value='WMATL']").remove();
        $("#wo_status option[value='WPCOND']").remove();
        $("#wo_status option[value='INPRG']").remove();
        $("#wo_status option[value='WPREV']").remove();
        setEditViewReadonly ();
      //end 
    }else if((current_header_status=="WSCH")){//等待计划安排 WSCH WMATL WPCOND INPRG CANCELED
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='RELEASED']").remove(); 
        $("#wo_status option[value='REWORK']").remove(); 
        $("#wo_status option[value='WPREV']").remove();
        setEditViewReadonly ();
    }else if((current_header_status=="WMATL")){//等待物料 WMATL WSCH WPCOND INPRG CANCELED
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='RELEASED']").remove(); 
        $("#wo_status option[value='REWORK']").remove(); 
        $("#wo_status option[value='WPREV']").remove();
        setEditViewReadonly ();
    }else if((current_header_status=="WPCOND")){//等待作业条件 WMATL WSCH WPCOND INPRG CANCELED
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='RELEASED']").remove(); 
        $("#wo_status option[value='REWORK']").remove(); 
        $("#wo_status option[value='WPREV']").remove();
    }else if((current_header_status=="INPRG")){//正在执行中 WMATL WSCH WPCOND INPRG CANCELED
        $("#wo_status option[value='DRAFT']").remove();
        $("#wo_status option[value='SUBMITTED']").remove();
        $("#wo_status option[value='APPROVED']").remove();
        $("#wo_status option[value='COMPLETED']").remove();
        $("#wo_status option[value='CLOSED']").remove();
        $("#wo_status option[value='REJECTED']").remove();
        $("#wo_status option[value='RELEASED']").remove(); 
        $("#wo_status option[value='REWORK']").remove(); 
        $("#wo_status option[value='WPREV']").remove();
    }
    
}

    
$("#wo_status").change(function(){
        require_field();
});
if(global_event_options.contract_completed=="SUBMITTED"||global_event_options.contract_completed=="COMPLETED"){
    $("#contract").removeAttr("readonly");
    $("#contract").removeAttr("disabled");
    $("#contract").removeAttr("style");
    $("#btn_contract").removeAttr("style");
    $("#btn_contract").removeAttr("disabled");
    $("#btn_clr_contract").removeAttr("style");
    $("#btn_clr_contract").removeAttr("disabled");
    $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").removeAttr("disabled");
    $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").removeAttr("readonly");
    $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").removeAttr("style");
    $("#contract_id").removeAttr("readonly");
    $("#contract_id").removeAttr("disabled");
    $("#contract_id").removeAttr("style");
}
    
    
function setEditViewReadonly () { //如果当前头状态为Submitted、Approved、Canceled、Closed需要将字段变为只读
    $("#tabcontent0 input").attr("readonly",true);
    $("#tabcontent0 button").attr("readonly",true);
    $("#tabcontent0 input").attr("style","background-Color:#efefef");
    
    $("#tabcontent0 button").css("display","none");
    $("#tabcontent0 select").css("background-Color","#efefef");
    $("#tabcontent0 .dateTime").hide();
    
    var wo_status = $("#wo_status").val();
    if(wo_status=="COMPLETED"){
        mark_field_enabled("date_actual_start",false);
        mark_field_enabled("date_actual_finish",false);
        $(".input-group-addon").hide();
        $("#date_schedualed_start").unbind("focus");
        $("#date_target_start").unbind("focus");
        $("#date_start_not_earlier").unbind("focus");
        $("#date_actual_start").unbind("focus");
        
        $("#date_schedualed_finish").unbind("focus");
        $("#date_target_finish").unbind("focus");
        $("#date_finish_not_later").unbind("focus");
        $("#date_actual_finish").unbind("focus");
        
        $("#span_date_actual_start span.input-group-addon").show();
        $("#span_date_actual_finish span.input-group-addon").show();
    }else{
        $("#date_schedualed_start").unbind("focus");
        $("#date_target_start").unbind("focus");
        $("#date_start_not_earlier").unbind("focus");
        $("#date_actual_start").unbind("focus");
        
        $("#date_schedualed_finish").unbind("focus");
        $("#date_target_finish").unbind("focus");
        $("#date_finish_not_later").unbind("focus");
        $("#date_actual_finish").unbind("focus");
        $(".input-group-addon").hide();
    }
    
}

});
