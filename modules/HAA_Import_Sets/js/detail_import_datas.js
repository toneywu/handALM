function tabChange(n){
  if (n==0){
    $("#litab"+n).addClass("selected").attr("title","active");
    $("#litab"+(n+1)).removeClass("selected").attr("title","");
    $("#litab"+(n+2)).removeClass("selected").attr("title","");

    $("#tabcontent"+n).removeClass("yui-hidden");
    $("#tabcontent"+(n+1)).addClass("yui-hidden");
    $("#tabcontent"+(n+2)).addClass("yui-hidden");
  }else if(n==1){
    $("#litab"+n).addClass("selected").attr("title","active");
    $("#litab"+(n+1)).removeClass("selected").attr("title","");
    $("#litab"+(n-1)).removeClass("selected").attr("title","");

    $("#tabcontent"+n).removeClass("yui-hidden");
    $("#tabcontent"+(n+1)).addClass("yui-hidden");
    $("#tabcontent"+(n-1)).addClass("yui-hidden");
  }else if(n==2){
    $("#litab"+n).addClass("selected").attr("title","active");
    $("#litab"+(n-1)).removeClass("selected").attr("title","");
    $("#litab"+(n-2)).removeClass("selected").attr("title","");

    $("#tabcontent"+n).removeClass("yui-hidden");
    $("#tabcontent"+(n-1)).addClass("yui-hidden");
    $("#tabcontent"+(n-2)).addClass("yui-hidden");
  }
}

function setTabDatas(n,status){
  var cv_n = datas['cv_n'];
  var import_datas = datas['import_datas'];
  var tbody = $("#tab_tbody"+n);
  tbody.empty();
  $.each(import_datas,function(keyo,val){
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
    if(!status||status=='S'){
      tbody.append(tr);
    }else if(status==val["import_status"]){
      tbody.append(tr);
    }
  });
}

function setTabHead(n,status){
  var thead = $("#tab_thead"+n);
  /* var thead = document.createElement("thead");  */
  thead.empty();
  var titles = datas['titles'];
  var cv_n = datas['cv_n'];
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
  setTabDatas(n,status);
}
