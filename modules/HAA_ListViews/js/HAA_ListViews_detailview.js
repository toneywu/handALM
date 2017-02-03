$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
var is_first = true;
$(document).ready(function(){
	$("#line_items_span").parent().prev().hide();
	$("#s_sort_column1").hide();
	$("#s_sort_column2").hide();
	$("#s_sort_column3").hide();
	$("#s_sort_column4").replaceWith("");
});

function generatePreviewHtml(listviewHtml,title){
    $html=$(listviewHtml);
    if (is_first) {
        is_first =false;
        BootstrapDialog.confirm({
            title: title,
            message:$html,
            callback: function(result){
                if (result) {
                    is_first = true;
                }else{
                    is_first = true;
                }

            }
        });
    }
    else{
        $("#html_table").replaceWith(listviewHtml);
    }
}

function listPagePreview(listviewCode,type,frameworkId='',nowpage=1,elementId=''){
    $.ajax({
        url:"index.php?module=HAA_ListViews&action=GenerateDoc&to_pdf=true",
        data:"&listviewCode="+listviewCode+"&frameworkId="+frameworkId+"&nowpage="+nowpage+"&pageType="+type,
                type:"POST",//PUT
                success:function(result){
                    if (result !="") {
                        var ajaxResult=$.parseJSON(result);
                        if (elementId==''){
                            generatePreviewHtml(ajaxResult['html'],ajaxResult['title']);
                        }
                        else{
                            var lineItems=document.getElementById(elementId);
                            lineItems.innerHTML=ajaxResult['html'];
                        }
                        //top.location.reload();
                    }
                }
            });
}

    //弹出窗口选择dashlet 仪表栏/popup 值列表
    function GenerateDoc() {
    	
    	record = $("input[name*='record']").val();
    	framework_id =$("#haa_frameworks_id_c").attr("data-id-value");
        listviewCode =$("#listview_code").text();
        var title_txt=SUGAR.language.get('HAA_ListViews','LBL_GENERATE_DOC');

        var list=$("#windowtypehidden").val();
        var html = "<head>"+
        "<link rel='stylesheet' type='text/css' href='include/javascript/qtip/jquery.qtip.min.css'>"+
        "<link rel='stylesheet' type='text/css' href='cache/themes/SuiteR_HANDALM/css/yui.css?v=6T2wqZkzRRtQXSbbOJRC2A'>"+
        "<link rel='stylesheet' type='text/css' href='include/javascript/jquery/themes/base/jquery.ui.all.css'>"+
        "<link rel='stylesheet' type='text/css' href='cache/themes/SuiteR_HANDALM/css/deprecated.css?v=6T2wqZkzRRtQXSbbOJRC2A'>"+
        "<link rel='stylesheet' type='text/css' href='cache/themes/SuiteR_HANDALM/css/style.css?v=6T2wqZkzRRtQXSbbOJRC2A'>"+
        "<meta http-equiv='X-UA-Compatible' content='IE=edge'>"+
        "<meta name='viewport' content='initial-scale=1.0, user-scalable=no'>"+
        "<link href='themes/SuiteR/css/bootstrap.min.css' rel='stylesheet'>"+
        "<link href='themes/SuiteR/css/colourSelector.php' rel='stylesheet'>"+
        "<link rel='stylesheet' href='custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css' type='text/css'>"+
        "</head>"+
        "<table><tr><td>窗口样式:</td>"+
        "<td><select id='window_type_list' class='window_type_list' name='window_type_list'>"+list+"</select></td></tr></table>";
        var $html=$(html);

        BootstrapDialog.confirm({
          title: title_txt,
          message:$html,
          callback: function(result){
           if(result) {
            var type = $("#window_type_list").val();
            listPagePreview(listviewCode,type,framework_id,1);   		
        }
    }
});

    }
        //popup选定后,返回的数据
        function getDisplayColumn(ln){
            console.log(popup_line[ln]);
        }