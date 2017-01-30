$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
var record;
var framework_id;
var is_first = true;
var popup_line =new Array;


    //弹出窗口生成sql
    /*function GenerateDoc() {
	
		record = $("input[name*='record']").val();
		framework_id =$("#haa_frameworks_id_c").attr("data-id-value");
		//Modefy by osmond.liu 20161118
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
					"<select id='window_type_list' class='window_type_list' name='window_type_list'>"+list+"</select>";
		var $html=$(html);

		BootstrapDialog.confirm({
			title: title_txt,
			message:$html,
			 callback: function(result){
			 	if(result) {
			 		var type = $("#window_type_list").val();
			 		//setHtmlByPage(1,type);
			 		$.ajax({
			 			url:"index.php?module=HAA_ListViews&action=GenerateDoc&to_pdf=true",
			 			data:"&record="+record+"&frameworkId="+framework_id+"&nowpage=1",
							type:"POST",//PUT
							success:function(result){
								if (result !="") {
									setPophtml(result);
								}
								else{
									alert("sql有错!");
								}
							}
						});
			 	}
            }
        });
		
	}*/

	function setPophtml(result,type){
		var list = $.parseJSON(result);
		var columns = list["column"];

        var column_list = list["columns"];

		var datas = list["data"];
		var nowpage = parseInt(list["nowpage"], 10);
		var sumpage = list["sumpage"];
		var title_txt = list["title"];
		var is_correct = list["is_correct"];
		var column_display = list["column_display"];
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
				html += "<th class='footable-visible' scope='col' >"+columns[x]+"</th>";
			}
			html += "</tr>";
			var i = 0;
			for (y in datas){
				html += "<tr class='oddListRowS1' height='20'>";
				if (type == "popup") {
					html += '<td class="nowrap" width="1%"><input class="checkbox" title="选择该行" onclick="getDisplayColumn('+i+')" name="mass[]" value="" type="checkbox"></td>';
			    }
				var line_data = datas[y];

				for (z in line_data) {
					html +="<td class='footable-visible'  valign='top' align='left'>" + line_data[z] + "</td>";
				}
				html += "</tr>";
			}
			html +="</table>";
	    }
	    else{
	    	html += "<span>SQL执行出错：拼接后的SQL语句</span>";

	    	
	    }
	    $html=$(html);
		if (is_first) {
			is_first =false;
			BootstrapDialog.confirm({
				title: title_txt,
				message:$html,
				callback: function(result){
					if (result) {
						 //alert('嘿嘿');
						 is_first = true;
					}else{
						alert("SB");
						is_first = true;
					}

				}
			});
		}
		else{
			
			$("#html_table").replaceWith(html);
		}
	}

	function setHtmlByPage(nowpage,type){
		$.ajax({
 			url:"index.php?module=HAA_ListViews&action=GenerateDoc&to_pdf=true",
 			data:"&record="+record+"&frameworkId="+framework_id+"&nowpage="+nowpage,
				type:"POST",//PUT
				success:function(result){
					if (result !="") {
						console.log(result);
						//子窗口
						setPophtml(result,type);
						//top.location.reload();
					}
				}
			});
	}
	function getDisplayColumn(ln){
		console.log(popup_line[ln]);
	}