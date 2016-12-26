$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()

function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"Contacts","DetailView");
    $(".expandLink").click();
 
}

$(document).ready(function() {
  //´¥·¢FF
  SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    call_ff();
  });

    //将Subpanel的内容前移到上方TAB中

    $("#LBL_DETAILVIEW_PANEL_ORG").after("<div class='tab_subpanel'>"+$("#whole_subpanel_contacts").html()+"</div>");
    $("#whole_subpanel_contacts").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_HISTORY").after("<div class='tab_subpanel'>"+$("#whole_subpanel_history").html()+"</div>");
    $("#whole_subpanel_history").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_DOC").after("<div class='tab_subpanel'>"+$("#whole_subpanel_documents").html()+"</div>");
    $("#whole_subpanel_documents").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_BUSINESS").after("<div class='tab_subpanel'>"+$("#whole_subpanel_contact_aos_contracts").html()+"</div>");
    $("#whole_subpanel_contact_aos_contracts").replaceWith("");
    $("#LBL_DETAILVIEW_PANEL_BUSINESS").after("<div class='tab_subpanel'>"+$("#whole_subpanel_contact_aos_invoices").html()+"</div>");
    $("#whole_subpanel_contact_aos_invoices").replaceWith("");
    $("#LBL_DETAILVIEW_PANEL_BUSINESS").after("<div class='tab_subpanel'>"+$("#whole_subpanel_contact_aos_quotes").html()+"</div>");
    $("#whole_subpanel_contact_aos_quotes").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_ASSETS").after("<div class='tab_subpanel'>"+$("#whole_subpanel_hat_assets_contacts_owningperson").html()+"</div>");
    $("#whole_subpanel_hat_assets_contacts_owningperson").replaceWith("");
    $("#LBL_DETAILVIEW_PANEL_ASSETS").after("<div class='tab_subpanel'>"+$("#whole_subpanel_hat_assets_contacts_usingperson").html()+"</div>");
    $("#whole_subpanel_hat_assets_contacts_usingperson").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_ASSETS").after("<div class='tab_subpanel'>"+$("#whole_subpanel_hat_assets_trans_contacts").html()+"</div>");
    $("#whole_subpanel_hat_assets_trans_contacts").replaceWith("");


});