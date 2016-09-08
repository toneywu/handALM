function updateStatus(object_id) {
  if (object_id) {
        //ajaxStatus.flashStatus(SUGAR.language.get('app_strings', 'LBL_LOADING'),800);为什么Ajax不能正常的被调用@！？
        //alert("ajax called");
        
        $("#btn_submit").hide();
        $("#detail_header_action_menu").after("<span id='btn_submit_ajax_msg'> <img src='themes/default/images/loading.gif'  alt='saving' /> "+SUGAR.language.get('app_strings', 'LBL_SAVING')+"...</span>");
        SUGAR.ajaxUI.showLoadingPanel();

        setTimeout(function() {
          $.ajax({
            url: 'index.php?to_pdf=true&module=HAM_SR&action=changeStatusToSubmit&id=' + object_id,
            success: function () {
              SUGAR.ajaxUI.hideLoadingPanel();
              $("#sr_status").parent().append(" -> <img src='themes/default/images/yes.gif'  alt='saved' /> <span style='font-weight:bolder;color:green;'>"+SUGAR.language.get('app_strings', 'LBL_SUBMITTED')+"</span>");
              $("#btn_submit_ajax_msg").html(" <img src='themes/default/images/yes.gif'  alt='saved' /> "+SUGAR.language.get('app_strings', 'LBL_SAVED'));
            }
          }), 100});;
      }
    }

    function createWO(object_id) {
      $("#btn_create_wo").hide();
      SUGAR.ajaxUI.showLoadingPanel();

      setTimeout(function() {
        window.location.href = "index.php?module=HAM_WO&action=EditView&sr_id="+object_id+"&return_module=HAM_SR&return_action=DetailView&return_id="+object_id;
      },100);
    }

    /**
    +
         * 关闭SR 2016-09-08 yuan.chen 
        * @param object_id
        */
       function close_sr(object_id) {
           SUGAR.ajaxUI.showLoadingPanel();
           setTimeout(function() {
              window.location.href = "index.php?module=HAM_SR&action=EditView&button_change_status=CLOSED&record="+object_id+"&record"+object_id+"&return_module=HAM_SR&return_action=DetailView&return_id="+object_id;       
             },100);
          }

function openWOPopup(){ //弹出工作单选择界面
  var popupRequestData = {
            "call_back_function" : "setWOReturn",//"setAssetReturn",
            "form_name" : "formDetailView",
            'initial_filter':'&maint_site_advanced="+encodeURIComponent(document.getElementById("ham_maint_sites_id").value)+"',
            "field_to_name_array" : {
              "id" : "sr_wo_id",
              "name" : "sr_wo_name",
              "wo_number" : "sr_wo_num",
              "wo_status" : "sr_wo_status"
            }
          };
          open_popup('HAM_WO', 600, 850, '', true, true, popupRequestData);
        }

function setWOReturn(popupReplyData) { //调用Ajax写入当前工作请求的工作单号
  set_return(popupReplyData);
  $("#detail_header_action_menu").after("<span id='btn_submit_ajax_msg'> <img src='themes/default/images/loading.gif'  alt='saving' /> "+SUGAR.language.get('app_strings', 'LBL_SAVING')+"...</span>");
  $("#btn_assign_wo").hide();
  $("#btn_create_wo").hide();
  SUGAR.ajaxUI.showLoadingPanel();
  
  setTimeout(function() {
    $.ajax({
      url: 'index.php?to_pdf=true&module=HAM_SR&action=assignSRtoWO&wo_id=' + $("#sr_wo_id").val()+ '&sr_id='+$("input[name='record']").val(),
      success: function () {
            SUGAR.ajaxUI.hideLoadingPanel();
            $("#btn_submit_ajax_msg").html(" <img src='themes/default/images/yes.gif'  alt='saved' /> "+SUGAR.language.get('app_strings', 'LBL_SAVED'));
            $("#ham_wo_id").html(" <img src='themes/default/images/yes.gif'  alt='saved' /> ["+$("#sr_wo_num").val()+"] "+$("#sr_wo_name").val());
            $("#ham_wo_status").html($("#ham_wo_status").val());
          }
        })
  },100);
}


$(document).ready(function(){


  if($("#sr_status").val()=="DRAFT"){
   var btn=$("<input type='button' class='btn_detailview' id='btn_submit' value='"+SUGAR.language.get('app_strings', 'LBL_SUBMIT_BUTTON_LABEL')+"'>"); 
   $("#edit_button").after(btn);
      } else if($("#sr_status").val()=="APPROVED"){
      //添加建立工作单与分配工作单按钮
        var btn="<input type='button' class='btn_detailview' id='btn_create_wo' value='"+SUGAR.language.get('HAM_SR', 'LBL_SR_TO_NEW_WO')+"'>"
          + "<input type='button' class='btn_detailview' id='btn_assign_wo' value='"+SUGAR.language.get('HAM_SR', 'LBL_SR_TO_OLD_WO')+"'>";
        $("#edit_button").after(btn);
        console.log(btn);
        var fld=$("<input type='hidden' id='sr_wo_id' name='sr_wo_id>" //添加3个用户记录工作单信息的字段（在分配工作单时使用）
          + "<input type='hidden' id='sr_wo_num' name='sr_wo_num'>"
          + "<input type='hidden' id='sr_wo_name' name='sr_wo_name'>"
          + "<input type='hidden' id='sr_wo_status' name='sr_wo_status'>"
          );
        $("#formDetailView").append(fld);
  }
  
  if($("#sr_status").val()=="APPROVED"||$("#sr_status").val()=="INPRG"){
	  //add by yuan.chen 2016-09-08
      var close_btn=$("<input type='button' class='btn_detailview' id='btn_close_sr' value='"+SUGAR.language.get('app_strings', 'LBL_SUBMIT_BUTTON_CLOSE_SR_LABEL')+"'>");
      $("#edit_button").after(close_btn);  
      $("#btn_close_sr").click(function(){ //如果点了Create WO按钮，跳到工作单生成界面
          //ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_PROCESSING_REQUEST'));
    	  close_sr($("input[name='record']").val());
        });
  }
  
  
  

/*    if ($("#ham_wo_id").text()=='') {
        $("#ham_wo_id").text(SUGAR.language.get('HAM_SR', 'LBL_SR_NOT_ASSIGED_TO_WO'))
      }*/

    $("#btn_submit").click(function(){ //如果点了Submit按钮，调用Ajax修改状态

     updateStatus($("input[name='record']").val());
   });

    $("#btn_create_wo").click(function(){ //如果点了Create WO按钮，跳到工作单生成界面
        //ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_PROCESSING_REQUEST'));
        createWO($("input[name='record']").val());

      });

    $("#btn_assign_wo").click(function(){ //如果点了Assign WO按钮，弹出工作单选择界面
      openWOPopup();
    });

});