//$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()

/*function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HAT_Asset_Trans_Batch","DetailView");
    $(".expandLink").click();
 
}
*/

$(document).ready(function(){
/*	 //触发FF 
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        call_ff();
    });
*/
    if (typeof hideButtonFlag !="undefined") {
	   $(".action_buttons").hide();
    }

    $("#line_items_span").parent("td").prev("td").hide();

    if (typeof $("#source_wo_id").attr("data-id-value") !="undefined") {
      //如果来源于工作单则显示工作单对象行信息，否则直接隐藏行
      $("#wo_lines").append("<div id='wo_lines_display'></div>");
      showWOLines($("#source_wo_id").attr("data-id-value"));
    } else {
        $("#wo_lines").parent("tr").hide();
    }

  if($("#asset_trans_status").val()=="DRAFT"){
     var btn=$("<input type='button' class='btn_detailview' id='btn_submit' value='"+SUGAR.language.get('app_strings', 'LBL_SUBMIT_BUTTON_LABEL')+"'>");
     //$("#asset_trans_status").parent().append(btn);
      $("#detail_header_action_menu").after(btn);
  }

    $("#btn_submit").click(function(){
        $("#btn_submit").hide('normal', updateStatus($("input[name='record']").val()));
    });

});

function showWOLines(wo_id) {
    console.log('index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + wo_id);
        $.ajax({
            url: 'index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + wo_id,
            success: function (data) {
                $("#wo_lines_display").html(data);
            },
            error: function () { //失败
                alert('Error loading document');
            }
        });
};

function updateStatus(object_id) {
    if (object_id) {
        //ajaxStatus.flashStatus(SUGAR.language.get('app_strings', 'LBL_LOADING'),800);为什么Ajax不能正常的被调用@！？
        //alert("ajax called");
        $("#detail_header_action_menu").after("<span id='btn_submit_ajax_msg'> <img src='themes/default/images/loading.gif'  alt='saving' /> "+SUGAR.language.get('app_strings', 'LBL_SAVING')+"...</span>");
        $.ajax({
            url: 'index.php?to_pdf=true&module=HAT_Asset_Trans_Batch&action=changeStatusToSubmit&id=' + object_id,
            success: function () {
                //ajaxStatus.hideStatus();
                $("#asset_trans_status").parent().append(" -> <img src='themes/default/images/yes.gif'  alt='saved' /> <span style='font-weight:bolder;color:green;'>"+SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_SUBMITTED')+"</span>");
                $("#btn_submit_ajax_msg").html(" <img src='themes/default/images/yes.gif'  alt='saved' /> "+SUGAR.language.get('app_strings', 'LBL_SAVED'));
            }
        });
    }
}

function GenerateDoc() {
    if (typeof template_id == 'undefined' || template_id.length == 0) {
        alert (SUGAR.language.get('app_strings', 'LBL_NO_TEMPLATE'));
        //warning for no PDF template
	} else {
	    var record_id=$( "input[name*='record']" ).val();
	    window.location = "index.php?module=HAT_Asset_Trans_Batch&action=GenerateDoc&uid="+record_id+"&templateID="+template_id;
    }
}