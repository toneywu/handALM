$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()
 
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HAM_SR","DetailView");
    $("a.collapsed").click();
}

function DocumentReady() {
	//触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        call_ff();
    });

    if( $('#is_le_c').is(':checked')) { //如果是法人实体，显示法人实体相关信息
        $("#detailpanel_4").show();
    } else {
        $("#detailpanel_4").hide();
    }

    if( $('#is_customer_c').is(':checked')) {//如果是客户，显示客户服务管理相关信息
        $("#detailpanel_3").show();
    } else {
        $("#detailpanel_3").hide();
    }


    //将Subpanel的内容前移到上方TAB中

    $("#whole_subpanel_accounts").appendTo($("#tab-content-8 div.detail-view-row").first());
    $("#whole_subpanel_contacts").appendTo($("#tab-content-8 div.detail-view-row").first());

    $("#whole_subpanel_haa_qual_accounts").appendTo($("#tab-content-9 div.detail-view-row"))

    $("#whole_subpanel_documents").appendTo($("#tab-content-10 div.detail-view-row"))
    $("#whole_subpanel_ham_wo").appendTo($("#tab-content-12 div.detail-view-row"))

    $("#whole_subpanel_hit_racks").appendTo($("#tab-content-6 div.detail-view-row"))
    $("#whole_subpanel_hit_ip_allocations").appendTo($("#tab-content-6 div.detail-view-row"))

    $("#whole_subpanel_hat_assets").appendTo($("#tab-content-7 div.detail-view-row"))

    $("#whole_subpanel_account_aos_contracts").appendTo($("#tab-content-11 div.detail-view-row"))

/*    $("#LBL_DETAILVIEW_PANEL_DOC").after("<div class='tab_subpanel'>"+$("#whole_subpanel_documents").html()+"</div>");
    $("#whole_subpanel_documents").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_QUAL").after("<div class='tab_subpanel'>"+$("#whole_subpanel_haa_qual_accounts").html()+"</div>");
    $("#whole_subpanel_haa_qual_accounts").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_MEMBER").after("<div class='tab_subpanel'>"
            +$("#whole_subpanel_accounts").html()
            +$("#whole_subpanel_contacts").html()
            +"</div>");
    $("#whole_subpanel_accounts").replaceWith("");
    $("#whole_subpanel_contacts").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_WORK").after("<div class='tab_subpanel'>"+$("#whole_subpanel_ham_wo").html()+"</div>");
    $("#whole_subpanel_ham_wo").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_IT").after("<div class='tab_subpanel'>"
            +$("#whole_subpanel_hit_racks").html()
            +$("#whole_subpanel_hit_ip_allocations").html()
            +"</div>");
    $("#whole_subpanel_hit_racks").replaceWith("");
    $("#whole_subpanel_hit_ip_allocations").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_ASSET").after("<div class='tab_subpanel'>"+$("#whole_subpanel_hat_assets").html()+"</div>");
    $("#whole_subpanel_hat_assets").replaceWith("");

    $("#LBL_DETAILVIEW_PANEL_BUSINESS").after("<div class='tab_subpanel'>"+$("#whole_subpanel_account_aos_contracts").html()+"</div>");
    $("#whole_subpanel_account_aos_contracts").replaceWith("");
*/}


$(document).ready(DocumentReady);