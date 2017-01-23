function setDocName(doc_name){
	$("#document_name").val(doc_name);
}

function but_validate(){
	if(!$("#tab_tbody1").html()){
		alert("请先在上传文档区域，上传并确认需要导入的文件。");
		return;
	}
	//alert(1);
	exec_fun($("#exec_file_name").html(),$("#validate_func_name").html());
}

function but_import(){
	if($("#tab_tbody2").html()){
		alert("请先修正错误数据，再尝试导入。");
		return;
	}
	//alert(2);
	exec_fun($("#exec_file_name").html(),$("#import_func_name").html());
}

function exec_fun(efilename,efuncname){
	$.ajax({
            url: 'index.php?to_pdf=true&module=HAA_Import_Sets&action=control_exec_file&exec_file_name='+efilename+'&exec_func_name='+efuncname,
            success: function (data) {
                console.log(data);
                var result = $.parseJSON(data);
                if(result["return_status"]==0){
                	alert("执行成功！");
                }else{
                	alert('执行出错！\n错误消息：'+result["msg_data"]);
                }
                refresh_import_datas();
            },
            error: function () { //失败
                alert('Error loading document');
            }
    });
}

function refresh_import_datas(){
	var doc_id = $("#document_id_c").html();
    $.ajax({
            url: 'index.php?to_pdf=true&module=HAA_Import_Datas&action=GetImportDatas&doc_id='+doc_id,
            success: function (data) {
                console.log(data);
                datas = $.parseJSON(data);
                setTabHead(1);
                setTabHead(2,"ERROR");
                setTabHead(3,"WARN");
            },
            error: function () { //失败
                alert('Error loading document');
            }
    });
}