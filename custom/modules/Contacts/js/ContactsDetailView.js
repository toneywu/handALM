$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()

function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"Contacts","DetailView");
    $("a.collapsed").click();
 
}

$(document).ready(function() {
  //´¥·¢FF
  SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    call_ff();
  });

    //将Subpanel的内容前移到上方TAB中

    $("#whole_subpanel_history").appendTo($("#tab-content-6 div.detail-view-row"))
    $("#whole_subpanel_contacts").appendTo($("#tab-content-5 div.detail-view-row"))
    $("#whole_subpanel_documents").appendTo($("#tab-content-7 div.detail-view-row"))
    $("#whole_subpanel_contact_aos_contracts").appendTo($("#tab-content-8 div.detail-view-row"))
    $("#whole_subpanel_contact_aos_invoices").appendTo($("#tab-content-8 div.detail-view-row"))
    $("#whole_subpanel_contact_aos_quotes").appendTo($("#tab-content-8 div.detail-view-row"))

    $("#whole_subpanel_hat_assets_contacts_owningperson").appendTo($("#tab-content-9 div.detail-view-row"))
    $("#whole_subpanel_hat_assets_contacts_usingperson").appendTo($("#tab-content-9 div.detail-view-row"))
    $("#whole_subpanel_hat_assets_trans_contacts").appendTo($("#tab-content-9 div.detail-view-row"))

});