function tabChange(n){
  if (n==1){
    $("#litab"+n).addClass("selected").attr("title","active");
    $("#litab"+(n+1)).removeClass("selected").attr("title","");
    $("#litab"+(n+2)).removeClass("selected").attr("title","");

    $("#tabcontent"+n).removeClass("yui-hidden");
    $("#tabcontent"+(n+1)).addClass("yui-hidden");
    $("#tabcontent"+(n+2)).addClass("yui-hidden");
  }else if(n==2){
    $("#litab"+n).addClass("selected").attr("title","active");
    $("#litab"+(n+1)).removeClass("selected").attr("title","");
    $("#litab"+(n-1)).removeClass("selected").attr("title","");

    $("#tabcontent"+n).removeClass("yui-hidden");
    $("#tabcontent"+(n+1)).addClass("yui-hidden");
    $("#tabcontent"+(n-1)).addClass("yui-hidden");
  }else if(n==3){
    $("#litab"+n).addClass("selected").attr("title","active");
    $("#litab"+(n-1)).removeClass("selected").attr("title","");
    $("#litab"+(n-2)).removeClass("selected").attr("title","");

    $("#tabcontent"+n).removeClass("yui-hidden");
    $("#tabcontent"+(n-1)).addClass("yui-hidden");
    $("#tabcontent"+(n-2)).addClass("yui-hidden");
  }
}

function setTabDatas(n,offset){
  if(!offset){ 
    offset=0;
  }
  var cv_n = datas['cv_n'];
  var import_datas;
  if(n==1){
    import_datas = datas['all_datas'];
  }else if(n==2){
    import_datas = datas['error_datas'];
  }else if(n==3){
    import_datas = datas['warn_datas'];
  }
  var tbody = $("#tab_tbody"+n);
  tbody.empty();
  var num_limit = parseInt($("#datas_page_num_limit").html());
  for(var t=offset;t<import_datas.length&&t<offset+num_limit;t++){
    var val = import_datas[t];
    var tr = $("<tr></tr>");
    tr.append("<td>"+val["line_number"]+"</td>");

    for (var i = 1; i <= cv_n; i++) {
      tr.append("<td>"+val["column_value"+i]+"</td>");
    }
    if(n==1){
      $data_status="";
      $.each(SUGAR.language.languages['app_list_strings']['haa_import_process_status'],function(key,value){
        if(val["import_status"] === key){
            $data_status = value;
        }
      });
      tr.append("<td>"+$data_status+"</td>");
    }else if(n==2){
      tr.append("<td>"+val["error_message"]+"</td>");
    }else if(n==3){
      tr.append("<td>"+val["warning_message"]+"</td>");
    }
    tbody.append(tr);
  }
  setPageButton(n,offset);
}

function setPageButton(n,offset){
  var num_limit = parseInt($("#datas_page_num_limit").html());
  var offsetF=offset+1;
  var offsetT=offset+num_limit;
  var data_num;
  if(n==1){
    data_num = datas['a_n'];
  }else if(n==2){
    data_num = datas['e_n'];
  }else if(n==3){
    data_num = datas['w_n'];
  }
  if(offsetT > data_num){
    offsetT = data_num;
  }
  if(offsetF < 1){
    offsetF = 1;
  }
  var s_offset = 0;
  var p_offset = offset-num_limit;
  var n_offset = offset+num_limit;
  var e_offset = parseInt(data_num/num_limit)*num_limit;
  if(data_num%num_limit==0){
    e_offset-=num_limit;
  }
  if(data_num==0) {
    $(".s_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/start_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".p_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/previous_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".n_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/next_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".e_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/end_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".s_button"+n).attr("disabled","");
    $(".p_button"+n).attr("disabled","");
    $(".n_button"+n).attr("disabled","");
    $(".e_button"+n).attr("disabled","");
  }else if(offset==0){
    $(".s_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/start_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".p_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/previous_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".n_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/next.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".e_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/end.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".s_button"+n).attr("disabled","");
    $(".p_button"+n).attr("disabled","");
    $(".n_button"+n).removeAttr("disabled").attr("onclick","onJumpPage("+n+","+n_offset+")");
    $(".e_button"+n).removeAttr("disabled").attr("onclick","onJumpPage("+n+","+e_offset+")");
  }else if (offsetT==data_num) {
    $(".s_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/start.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".p_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/previous.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".n_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/next_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".e_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/end_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".s_button"+n).removeAttr("disabled").attr("onclick","onJumpPage("+n+","+s_offset+")");
    $(".p_button"+n).removeAttr("disabled").attr("onclick","onJumpPage("+n+","+p_offset+")");
    $(".n_button"+n).attr("disabled","");
    $(".e_button"+n).attr("disabled","");
  }else{
    $(".s_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/start.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".p_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/previous.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".n_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/next.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".e_button"+n+" img").attr("src","themes/SuiteR_HANDALM/images/end.gif?v=6T2wqZkzRRtQXSbbOJRC2A");
    $(".s_button"+n).removeAttr("disabled").attr("onclick","onJumpPage("+n+","+s_offset+")");
    $(".p_button"+n).removeAttr("disabled").attr("onclick","onJumpPage("+n+","+p_offset+")");
    $(".n_button"+n).removeAttr("disabled").attr("onclick","onJumpPage("+n+","+n_offset+")");
    $(".e_button"+n).removeAttr("disabled").attr("onclick","onJumpPage("+n+","+e_offset+")");
  }
  var str = '('+offsetF+' - '+offsetT+' 的 '+data_num+')';
  $(".pageNumbers"+n).html(str);
  
}

function setTabHead(n,status){
  var titles = datas['titles'];
  var cv_n = datas['cv_n'];
  $(".paging").attr("colspan",cv_n+2);
  var thead = $("#tab_thead"+n);
  thead.empty();
  var tr = $("<tr></tr>"); 
  tr.append("<th>行号</th>");
  for (var i = 1; i <= cv_n; i++) {
    /*thead.append("<th>列值"+i+"</th>");*/
    tr.append("<th>"+titles["column_value"+i]+"</th>");
  }
  if(n==1){
    tr.append("<th>导入状态</th>");
  }else if(n==2){
    tr.append("<th>错误消息</th>");
  }else if(n==3){
    tr.append("<th>警告消息</th>");
  }
  thead.append(tr);
  setTabDatas(n);
}

function onJumpPage(n,offset){
  setTabDatas(n,offset);
}

function hidePageHtml(){
  $(".pagination").hide();
}