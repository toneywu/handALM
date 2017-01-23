function hideFirstTd(tableid){
  $("#LBL_DETAILVIEW_PANEL1 tbody tr td").each(function(i, v){    //针对tb表格下的所有td进行遍历
    $(this).hide();
    return false;
  });
  
}
function file_change(){
  $("#document_name").val($("#filename_file").val());
}
function upload_file(){
  $("#document_id1").val($("#document_id_c").html());
  if(!$("#document_name").val()){
    alert("请先选择文件！");
    return;
  }
  $('#uploadModal').modal('show');  
  var _form = $("#upload_form");
  var options={  
        //target : file_name,    // 把服务器返回的内容放入id为output的元素中  
        //beforeSubmit : showRequest,    // 提交前的回调函数  
        success : write_back_document_id,    // 提交后的回调函数  
        url : 'index.php?to_pdf=true&module=HAA_Import_Sets&action=save_document&id='+$("input[name='record']").val(),    //默认是form的action，如果申明，则会覆盖  
        //type : 'GET',    // 默认值是form的method("GET" or "POST")，如果声明，则会覆盖  
        //dataType : 'xml',    // html（默认）、xml、script、json接受服务器端返回的类型  
        // clearForm : true,    // 成功提交后，清除所有表单元素的值  
        // resetForm : true,    // 成功提交后，重置所有表单元素的值  
        // timeout : 3000    // 限制请求的时间，当请求大于3秒后，跳出请求  
      }  ;
      _form.ajaxSubmit(options);  

    }


function write_back_document_id(data){
  $('#uploadModal').modal('hide');
    var result_data = $.parseJSON(data);
    //var doc_id = data.substring(data.indexOf("document_id:")+12);
    if(result_data["result_status"]=='S'){
      $("#document_id_c").html(result_data["document_id"]);
      refresh_import_datas();
    }else if(result_data["result_status"]=='W'){
      alert(result_data["msg_data"]);
    }else{
      alert("上传文件出错");
    }
}
