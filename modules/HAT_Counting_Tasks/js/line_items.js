if(typeof(YAHOO.SUGAR) == 'undefined') {
  $.getScript("include/javascript/sugarwidgets/SugarYUIWidgets.js");
}

var prodln = 0;
var tabNumber=1;
var totalPage = 0;
var l_psize=25;


if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

/******************************
/* 加载表头
/*******************************/
function insertLineHeader(tableid,attr){
  $("#line_items_detail").parent().prev().hide();//隐藏标签
  var head_html="<tr>";
  var data=JSON.parse(attr);
  head_html +="<th style='text-align: center;'>"+SUGAR.language.get('HAT_Counting_Lines', 'LBL_ASSET')+"</th>";
  head_html +="<th style='text-align: center;'>"+SUGAR.language.get('HAT_Counting_Lines', 'LBL_NAME')+"</th>";
  head_html +="<th style='text-align: center;'>"+SUGAR.language.get('HAT_Counting_Lines', 'LBL_COUNTING_STATUS')+"</th>";
  for(var i=0;i<data.length;i++){
    head_html +="<th style='text-align: center;'>"+data[i]+"</th>";
  }
  head_html +="<th width='8%'> </th>";
  head_html +="<tr>";
  head_html +='<tr class="pagination" role="presentation">'+
  '<td>'+
  '<input id="btnAddNewLine" type="button" class="button btn_del" onclick="winLoc();" value="新增" />'+
  '</td>'+
  '<td class="paging" colspan="8" align="right">'+
  '<button type="button" name="listViewStartButton" title="首页" class="button"  onclick="goPagefist()"><img src="themes/default/images/start_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" aborder="0" alt="首页" align="absmiddle"></button>'+
  '<button type="button" name="listViewPrevButton" title="上页" class="button" onclick="goPageNumre()"><img src="themes/default/images/previous_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="上页" border="0" align="absmiddle"></button>'+
  '<span id="pageNumbers" class="pageNumbers" style="font-size:12px;valign: middle;color:#000000">(1 - 1 / 总记录条目数： 1)</span>'+
  '<button type="button" name="listViewNextButton" title="下页" class="button" onclick="goPageNumadd()"><img src="themes/default/images/next_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" aborder="0" alt="下页" align="absmiddle"></button>'+
  '<button type="button" name="listViewEndButton" title="末页" class="button" onclick="goPagelast()"><img src="themes/default/images/end_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="末页" border="0" align="absmiddle"></button>'+
  '</td></tr>';

  $("#lineItems_line").append(head_html);
}


/******************************
/* 加载表行数据，将具体的数据写入到insertTransLineElements创建出的界面要素中
/*******************************/
function insertLineData(counting_line, current_view,attr_data,parent_id){ //将数据写入到对应的行字段中
  var ln = 0;
    ln = insertLineElements("lineItems_line", current_view,attr_data,counting_line,parent_id);

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
  tablebody.align="center";
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

function insertLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan=10;
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='winLoc();' value='新增' />";
}
function winLoc(){
  var record_id = $("input[name*='record']").val();
  window.location='index.php?module=HAT_Counting_Lines&action=EditView&return_module=HAT_Counting_Tasks&return_action=DetailView&parent_id='+record_id;
}

function replace_display_lines(linesHtml,elementId) {
  $("#line_items_detail").parent().toggleClass("col-sm-10","col-sm-12");
  var lineItems=document.getElementById(elementId);
  lineItems.innerHTML=linesHtml;
}

function goPage(pno,psize){
    var linenum=0;
    var itable = document.getElementById("lineItems_line");
    var num = itable.rows.length;//表格所有行数(所有记录数)
    //console.log(num);
    //总页数
    var pageSize = psize;//每页显示行数
    //总共分几页
    var datanum=num-3; 
    if(datanum/pageSize > parseInt(datanum/pageSize)){   
            totalPage=parseInt(datanum/pageSize)+1;   
       }else{   
           totalPage=parseInt(datanum/pageSize);   
       }   
    var currentPage = pno;//当前页数
    var startRow = (currentPage - 1) * pageSize+1;//开始显示的行  31 
       var endRow = currentPage * pageSize;//结束显示的行   40
       endRow = (endRow > datanum)? datanum : endRow;    //40
       /*console.log(endRow);*/
       //遍历显示数据实现分页

    for(var i=1;i<(num+1);i++){    
        var irow = itable.rows[i-1];
        if (i==1 || i==2 || i==3){
          irow.style.display="";
        }
        else if((i-3)>=startRow && (i-3)<=endRow){
            irow.style.display="";    
        }else{
            irow.style.display="none";
        }
    }
    for(var i=3;i<num;i++)
    {
      if(itable.rows[i].style.display=="")
      {
        linenum++;
      }
    }

    var l_pagenum="("+startRow+" - "+endRow+" / 总记录条目数："+datanum+")";
    document.getElementById("pageNumbers").innerHTML=l_pagenum;
}

function goPageNumre()
{ 
  
  tabNumber--;
  if (tabNumber==0){
    tabNumber=1;
    return false;
  }
  goPage(tabNumber,l_psize);
}
function goPageNumadd()
{ 
  tabNumber++;
  if (tabNumber==totalPage+1){
    tabNumber--;
    return false;
  }
  goPage(tabNumber,l_psize);
  
}
function goPagefist(){
  tabNumber=1;
  console.log(l_psize);
  goPage(1,l_psize);
}
function goPagelast(){
  tabNumber=totalPage;
  goPage(totalPage,l_psize);
}
