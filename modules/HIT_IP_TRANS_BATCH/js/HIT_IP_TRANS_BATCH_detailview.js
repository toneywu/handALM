$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()
if(typeof(YAHOO.SUGAR) == 'undefined') {
	$.getScript("include/javascript/sugarwidgets/SugarYUIWidgets.js");
}

function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HIT_IP_TRANS_BATCH","DetailView");
    $("a.collapsed").click();
}


function showWOLines(wo_id) {
    console.log('index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + wo_id);
        $.ajax({
            url: 'index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + wo_id,
            success: function (data) {
                //console.log(data);
                $("#wo_lines_display").html(data);
            },
            error: function () { //失败
                alert('Error loading document');
            }
        });
};

/**
 * 点击按钮 调用Ajax请求 保存
 * @param name
 */
function save(id,status_code){
		$.ajax({
			url: 'index.php?to_pdf=true&module=HIT_IP_TRANS_BATCH&action=saveBean&id=' + id+"&status_code="+status_code,
			success: function (data) {
				window.location.href = "index.php?module=HIT_IP_TRANS_BATCH&action=DetailView&record="+id;
			},
			error: function () { //失败
				alert('Error loading document');
				
			}
		});
};

/**
 * 点击按钮 调用Ajax请求 获取list里面根据工单状态应该显示的value
 * @param name
 */
function changeStatus(id){

		$.ajax({
			url: 'index.php?to_pdf=true&module=HIT_IP_TRANS_BATCH&action=getListFields&id=' + id,
			success: function (data) {
				var title_txt=SUGAR.language.get('HIT_IP_TRANS_BATCH', 'LBL_BTN_CHANGE_STATUS_BUTTON_LABEL');
				var html=""
				html+=title_txt;
				html+=data;
				//html+="<input type='button' class='btn_detailview' id='btn_save' value='"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+"'>";
				YAHOO.SUGAR.MessageBox.show({msg: html,title: title_txt, type: 'confirm',
																		fn: function(confirm) {
																			if (confirm == 'yes') {
																				console.log($("input[name='record']").val());
																				save($("input[name='record']").val(),$("#asset_trans_status").val());
																			}
																		}
											});
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
	/*}*/
};

$(document).ready(function() {
  //触发FF
  SUGAR.util.doWhen("typeof setFF == 'function'", function(){
    call_ff();
  });

  $("#line_items_span").parent("td").prev("td").hide();
  //去除行前的标签
  
   if (typeof $("#source_wo_id").attr("data-id-value") != "undefined") {
		// 如果来源于工作单则显示工作单对象行信息，否则直接隐藏行
		$("#wo_lines").append("<div id='wo_lines_display'></div>");
		showWOLines($("#source_wo_id").attr("data-id-value"));
	} else {
		$("#wo_lines").parent("tr").hide();
	}
  
    var change_btn=$("<input type='button' class='btn_detailview' id='btn_change_status' value='"+SUGAR.language.get('HIT_IP_TRANS_BATCH', 'LBL_BTN_CHANGE_STATUS_BUTTON_LABEL')+"'>");
	
	if($("#asset_trans_status").val()=="DRAFT"){
		$("#edit_button").after(change_btn);	
	}
	
	$("#btn_change_status").click(function(){
			changeStatus($("input[name='record']").val());
	});	
	

});


function GenerateDoc() {
	if (typeof template_id == 'undefined' || template_id.length == 0) {
		alert(SUGAR.language.get('app_strings', 'LBL_NO_TEMPLATE'));
		// warning for no PDF template
	} else {
		var record_id = $("input[name*='record']").val();
		//Modefy by osmond.liu 20161118
		var title_txt=SUGAR.language.get('HIT_IP_TRANS_BATCH','LBL_PDF_TEMPLATES');
		
		var list=$("#pdftemplatehidden").val();
		var $html=$('<select id="pdf_template_list" class="pdf_template_list" name="pdf_template_list">'+
			list+'</select>');
		var html='<select id="pdf_template_list" class="pdf_template_list" name="pdf_template_list">'+
		list+'</select>';

		BootstrapDialog.confirm({
			title: title_txt,
			message:$html,
			 callback: function(result){
				if(result) {
					template_id=$('#pdf_template_list').val();
					window.location = "index.php?module=HIT_IP_TRANS_BATCH&action=GenerateDoc&task=new&uid="
					+ record_id + "&templateID=" + template_id;
				}else{
                    //alert("Nope.");              
                }
            }
        });
		//END Modefy osmond.liu 20161118
		/**/
	}
}