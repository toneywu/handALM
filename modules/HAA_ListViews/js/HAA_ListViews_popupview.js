$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
var record;
var framework_id;
var is_first = true;
var popup_line =new Array;

function generateListviewHtml(result,type){
	var list = $.parseJSON(result);
	var columns = list["column"];
	var popup_visible = list["popup_visible"];
	var dashlet_visible = list["dashlet_visible"];

	var column_list = list["columns"];

	var datas = list["data"];
	var nowpage = parseInt(list["nowpage"], 10);
	var sumpage = list["sumpage"];
	var is_correct = list["is_correct"];
	var value_return = list["value_return"];
	popup_line = list["column_popup"];
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
	"</head>";
	if (is_correct) {
		html += '<table class="list view table footable-loaded footable default" id="html_table" width="100%" cellspacing="0" cellpadding="0" border="0">'+
		'<thead>'+
		'<tr id="pagination" role="presentation">'+
		'<td colspan="19" align="right">'+
		'<table class="paginationTable pull-right col-md-4" cellspacing="0" cellpadding="0" border="0">'+
		'<tbody>'+
		'<tr>'+
		'<td class="paginationChangeButtons" width="1%" nowrap="nowrap" align="right">'+
		'<button id="listViewStartButton_top" class="button" type="button" name="listViewStartButton" title="首页" onclick=setHtmlByPage('+(nowpage-25)+',"'+type+'")>'+
		'<img src="themes/SuiteR_HANDALM/images/start_off.gif?v=6-oABrRk-DYgrmsAywj82w" alt="首页" border="0" align="absmiddle">'+
		'</button>'+
		'<button id="listViewPrevButton_top" class="button" type="button" name="listViewPrevButton" title="上页" onclick=setHtmlByPage('+(nowpage-1)+',"'+type+'")>'+
		'<img src="themes/SuiteR_HANDALM/images/previous_off.gif?v=6-oABrRk-DYgrmsAywj82w" alt="上页" border="0" align="absmiddle">'+
		'</button>'+
		'</td>'+
		'<td class="paginationActionButtons" width="1%" nowrap="nowrap">'+
		'<div class="pageNumbers">( 1 - '+sumpage+' 的 '+nowpage+' )</div>'+
		'</td>'+
		'<td class="paginationActionButtons" width="1%" nowrap="nowrap" align="right">'+
		'<button id="listViewNextButton_top" class="button" type="button" name="listViewNextButton" title="下页" onclick=setHtmlByPage('+(nowpage+1)+',"'+type+'")>'+
		'<img src="themes/SuiteR_HANDALM/images/next_off.gif?v=6-oABrRk-DYgrmsAywj82w" alt="下页" border="0" align="absmiddle">'+
		'</button>'+
		'<button id="listViewEndButton_top" class="button" type="button" name="listViewEndButton" title="末页" onclick=setHtmlByPage('+(nowpage+25)+',"'+type+'")>'+
		'<img src="themes/SuiteR_HANDALM/images/end_off.gif?v=6-oABrRk-DYgrmsAywj82w" alt="末页" align="absmiddle">'+
		'</button>'+
		'</td>'+
		'<td class="paginationActionButtons" width="4px" nowrap="nowrap"></td>'+
		'</tr>'+
		'</tbody>'+
		'</table>'+
		'</td>'+
		'</tr>';
		if (type == "") {
			type = "popup";
		}
		if (type == "popup") {
			html += '<td class="nowrap" width="1%"></td>';
		}
		for (x in columns){
			
			if(( dashlet_visible[x] == 1&&type == "dashlet")||(popup_visible[x] == 1&&type == "popup")){
				html += "<th class='footable-visible' scope='col' >"+columns[x]+"</th>";
			}
		}
		html += "</tr>";
		var i = 0;
		for (y in datas){
			html += "<tr class='oddListRowS1' height='20'>";
			if (type == "popup") {
				html += '<td class="nowrap" width="1%"><input class="checkbox" title="选择该行" onclick="getDisplayColumn('+i+')" name="mass[]" value="" type="checkbox"></td>';
			}
			var line_data = datas[y];

			var j= 0;
			for (z in line_data) {
				if((column_list[j]["dashlet_visible_flag"] == 1&&type == "dashlet")||(column_list[j]["popup_visible_flag"] == 1&&type == "popup")){
					if (column_list[j]["display_type_code"] == "LNK" && column_list[j]["column_name"] == z) {
						var id = line_data[column_list[j]["link_id_column"]];
						html += "<td class='footable-visible'  valign='top' align='left'>"+
						"<a href='?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3D"+column_list[j]["link_module"]+"%26action%3DDetailView%26record%3D"+id+"'>"+
						line_data[z] + "</a></td>";
					}
					else {
						html +="<td class='footable-visible'  valign='top' align='left'>" + line_data[z] + "</td>";
					}
				}
				j++;
			}
			html += "</tr>";
		}
		html +="</table>";
	}
	else{
		html += "<span>SQL执行出错：拼接后的SQL语句执行出错。</span>";
	}
	return html;
}

function generatePreviewHtml(result,type){
	var list = $.parseJSON(result);
	var title_txt = list["title"];
	var listviewHtml=generateListviewHtml(result,type);
	$html=$(listviewHtml);
	if (is_first) {
		is_first =false;
		BootstrapDialog.confirm({
			title: title_txt,
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

function getDynamicListHtml(elementId,listviewCode,type,frameworkId='',nowpage=1){

	$.ajax({
		url:"index.php?module=HAA_ListViews&action=GenerateDoc&to_pdf=true",
		data:"&listviewCode="+listviewCode+"&frameworkId="+frameworkId+"&nowpage="+nowpage,
				type:"POST",//PUT
				success:function(result){
					if (result !="") {
						var listviewHtml=generateListviewHtml(result,type);
						var lineItems=document.getElementById(elementId);
						lineItems.innerHTML=listviewHtml;
					}
				}
			});
}

function listPagePreview(type,nowpage=1){
	$.ajax({
		url:"index.php?module=HAA_ListViews&action=GenerateDoc&to_pdf=true",
		data:"&record="+record+"&frameworkId="+framework_id+"&nowpage="+nowpage,
				type:"POST",//PUT
				success:function(result){
					if (result !="") {
						generatePreviewHtml(result,type);
						//top.location.reload();
					}
				}
			});
}

	//popup选定后,返回的数据
	function getDisplayColumn(ln){
		console.log(popup_line[ln]);
	}