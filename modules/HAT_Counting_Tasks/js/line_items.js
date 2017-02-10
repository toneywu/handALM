if(typeof(YAHOO.SUGAR) == 'undefined') {
  $.getScript("include/javascript/sugarwidgets/SugarYUIWidgets.js");
}

var prodln = 0;

if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

/******************************
/* 加载表头
/*******************************/
function insertLineHeader(tableid,attr){
  $("#line_items_detail").parent().prev().hide();//隐藏标签
  var head_html="<tr>";
  var data=JSON.parse(attr);
  head_html +="<th >"+SUGAR.language.get('HAT_Counting_Lines', 'LBL_ASSET')+"</th>";
  head_html +="<th >"+SUGAR.language.get('HAT_Counting_Lines', 'LBL_NAME')+"</th>";
  head_html +="<th >"+SUGAR.language.get('HAT_Counting_Lines', 'LBL_COUNTING_STATUS')+"</th>";
  for(var i=0;i<data.length;i++){
    head_html +="<th >"+data[i]+"</th>";
  }
  head_html +="<th width='8%'> </th>";
  head_html +="<tr>";

  $("#lineItems").append(head_html);
}


/******************************
/* 加载表行数据，将具体的数据写入到insertTransLineElements创建出的界面要素中
/*******************************/
function insertLineData(counting_line, current_view,attr_data,parent_id){ //将数据写入到对应的行字段中
  var ln = 0;
    ln = insertLineElements("lineItems", current_view,attr_data,counting_line,parent_id);

    for(var propertyName in counting_line) {
      if ($("#displayed_line_"+propertyName.concat(String(ln))).is(':checkbox')) {
        if (counting_line[propertyName]==true) {
          document.getElementById("displayed_line_"+propertyName.concat(String(ln))).checked = true;
          document.getElementById("displayed_line_"+propertyName.concat(String(ln))).value = 1;
        }
      }else {
        //如果当前字段不是checkbox，就以val的形式赋值
        $("#displayed_line_"+propertyName.concat(String(ln))).html(counting_line[propertyName]);
      }
    }
  //}
}

/******************************
/* 创建出界面的字段要素（不包括填写值，填写值通过insertLineData完成
/*******************************/
function insertLineElements(tableid, current_view,attr_data,line_data,parent_id) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}

  tablebody = document.createElement("tbody");
  tablebody.id = "line_body" + prodln;
  document.getElementById(tableid).appendChild(tablebody);

var data=JSON.parse(attr_data);
  var z1 = tablebody.insertRow(-1);
  z1.id = 'asset_trans_line1_displayed' + prodln;
  z1.className = 'oddListRowS1';
  z1.innerHTML  =
  "<td><span name='displayed_line_asset_desc[" + prodln + "]' id='displayed_line_asset_desc" + prodln + "'></span></td>" +
  "<td><span name='displayed_line_line_name[" + prodln + "]' id='displayed_line_line_name" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_counting_status[" + prodln + "]' id='displayed_line_counting_status" + prodln + "'></span></td>";
   for(var i=0;i<data.length;i++){
    z1.innerHTML +="<td><span name='displayed_line_"+data[i]+"[" + prodln + "]' id='displayed_line_"+data[i]+ prodln + "'></span></td>";
  }
  z1.innerHTML  +="<td><a class='listViewTdToolsS1' href='index.php?module=HAT_Counting_Lines&action=EditView&record="+line_data["id"]+"&parent_module=HAT_Counting_Tasks&parent_id="+parent_id+"&return_module=HAT_Counting_Tasks&return_id="+parent_id+"&return_action=DetailView&return_relationship=get_counting_lines'>编辑</a></td>";

prodln++;

return prodln - 1;
}

function resetLineNum() {//数行号
  var j=0;
  for (var i=0;i<prodln;i++) {
    if ($("#line_deleted"+i).val()!=1) {//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
      j=j+1;
      $("#displayed_line_num" + i).text(j);
    }
  }
  //TODO：如果最终有效的行数，则将头标记为空
  //if (j==0) {}
}

function replace_display_lines(linesHtml,elementId) {
  var lineItems=document.getElementById(elementId);
  lineItems.innerHTML=linesHtml;
}
