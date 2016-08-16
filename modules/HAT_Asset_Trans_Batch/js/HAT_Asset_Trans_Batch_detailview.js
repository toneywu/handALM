$(document).ready(function(){

  if($("#asset_trans_status").val()=="DRAFT"){
     var btn=$("<input type='button' class='btn_detailview' id='btn_submit' value='"+SUGAR.language.get('app_strings', 'LBL_SUBMIT_BUTTON_LABEL')+"'>");
     //$("#asset_trans_status").parent().append(btn);
      $("#detail_header_action_menu").after(btn);
  }

    $("#btn_submit").click(function(){
        $("#btn_submit").hide('normal', updateStatus($("input[name='record']").val()));
    });

});

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