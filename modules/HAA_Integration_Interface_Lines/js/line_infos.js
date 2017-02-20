if(typeof(YAHOO.SUGAR) == 'undefined') {
  $.getScript("include/javascript/sugarwidgets/SugarYUIWidgets.js");
}
var lineName=new Array();//存储动态字段名称
var lineTile=new Array();//存储动态字段标题
var lineRequired= new Array();//存储动态字段是否必输
var prodln = 0;
var l_lineheader=0;
var tabNumber=1;//当前页数
var totalPage = 0;//总页数，暂时没有用到
var l_psize=10;//每页显示的行数
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

/******************************
/* 加载表头
/*******************************/
function addlineheader(line_data){//接收php文件中传过来的动态字段信息
  lineTile[l_lineheader]=line_data.column_title;
  lineName[l_lineheader]=line_data.column_name;
  lineRequired[l_lineheader]=line_data.required_flag;
  l_lineheader++;
}
function insertTransLineHeader(tableid){//画行面板的表头信息
  $("#line_infos_span").parent().prev().hide();//隐藏标签
  var s = document.getElementById("line_infos_span");
  var par=s.parentNode;
  par.className="col-xs-12 col-sm-12 detail-view-field ";//替换DIV的class名称，不然table不会占满屏宽
  var head_html="<thead style='text-align: center'>"+"<tr>";
  head_html +="<th width='15%' style='font-size:14px;border-right:none;border-left:none;text-align: center;'>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_EXT_LINE_ID')+"</th>";
  for(var i=0;i<lineTile.length;i++){//遍历动态字段标题，将标题显示。
    head_html +="<th width='15%' style='font-size:14px;border-right:none;border-left:none;text-align: center;'>"+lineTile[i]+"</th>";
  }
  head_html +="<th width='13%' style='font-size:14px;border-right:none;border-left:none;text-align: center;'>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_LINE_STATUS')+"</th>";
  head_html +="<th width='13%' style='font-size:14px;border-right:none;border-left:none;text-align: center;'>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_PROCESS_MESSAGE')+"</th>";
  head_html +="<th width='13%' style='font-size:14px;border-right:none;border-left:none;text-align: center;'>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_DESCRIPTION')+"</th>";
  head_html +="<th width='5%' style='font-size:14px;border-right:none;border-left:none;text-align: center;'> </th>";
  head_html +="</tr></thead>";
  //画出分页按钮
  head_html +='<tr class="pagination" role="presentation">'+
  '<td colspan="20" align="right">'+
  '<table width="100%" cellspacing="0" cellpadding="0" border="0">'+
  '<tbody>'+
  '<tr>'+
  '<td align="left"></td>'+
  '<td nowrap="" align="right">'+
  '<input class="button" value="首页" type="button" name="listViewStartButton"   onclick="goPagefist()"/>'+
  '<input class="button" value="上一页" type="button" name="listViewStartButton"   onclick="goPageNumre()"/>'+
  '<span id="pageNumbers" style="font-size:12px;valign: middle;"> <font color="black">(1 - 1 / 总记录条目数： 1)</font></span>'+
  '<input class="button" value="下一页" type="button" name="listViewStartButton"   onclick="goPageNumadd()"/>'+
  '<input class="button" value="末页" type="button" name="listViewStartButton"   onclick="goPagelast()"/>'+

  '</td></tr></tbody></table></td></tr>';
  $("#lineInfos").append(head_html);
}
function goPageNumre()//上一页
{ 

  tabNumber--;//当前页面-1
  if (tabNumber==0){//如果当前页面减一后=0
    tabNumber=1;
    return false;//返回false，不翻页
  }
  goPage(tabNumber,l_psize);
}
function goPageNumadd()//下一页
{ 
  tabNumber++;
  if (tabNumber==totalPage+1){
    tabNumber--;
    return false;
  }
  goPage(tabNumber,l_psize);
  
}
function goPagefist(){//首页
  tabNumber=1;
  goPage(1,l_psize);
}
function goPagelast(){//末页
  tabNumber=totalPage;//当前页数等于总页数，即跳转到最后一页
  goPage(totalPage,l_psize);
}
/******************************
/* 加载表行数据，将具体的数据写入到insertTransLineElements创建出的界面要素中
/*******************************/
function insertLineData(mapping_line, current_view){ //将数据写入到对应的行字段中
  var ln = 0;
  //if(mapping_line.id != '0' && mapping_line.id !== ''){

    ln = insertTransLineElements("lineInfos", current_view);
    mapping_line=JSON.parse(mapping_line);
    for(var propertyName in mapping_line) {
      //这里直接遍历所有的属性（因此需要建立与Bean属性同名的各个字段）
      //console.log(propertyName+"="+mapping_line[propertyName]);
      //console.log("#line_"+propertyName.concat(String(ln)) +"=="+ mapping_line[propertyName] );
        //如果当前字段不是checkbox，就以val的形式赋值
        //display 用html赋值
        if(propertyName.concat(String(ln))=="line_status"+ln){
          var l_linestatus=document.getElementById("displayed_line_line_status_list"+ln);

        for(var i =0 ;i<l_linestatus.length;i++){
          if(mapping_line[propertyName]==l_linestatus[i].value){
                  $("#displayed_line_"+propertyName.toLowerCase().concat(String(ln))).html(l_linestatus[i].text);
}
        }
      }else{
        console.log(propertyName.concat(String(ln)).toLowerCase());
        $("#displayed_line_"+propertyName.toLowerCase().concat(String(ln))).html(mapping_line[propertyName]);
        }
      }
    }
    function goPage(pno,psize){//数据分页方法
      var linenum=0;
      var itable = document.getElementById("lineInfos");//获取数据显示的表格
    var num = itable.rows.length;//表格所有行数(所有记录数)
    /*console.log(num);*/
    //总页数
    var pageSize = psize;//每页显示行数
    var real_num=num-2;
    //总共分几页 
    if(real_num/pageSize > parseInt(real_num/pageSize)){   //获取总页数
      totalPage=parseInt(real_num/pageSize)+1;   
    }else{   
     totalPage=parseInt(real_num/pageSize);   
   }   
    var currentPage = pno;//当前页数
    var startRow = (currentPage - 1) * pageSize+1;//开始显示的行  31 
       var endRow = currentPage * pageSize;//结束显示的行   40
       endRow = (endRow >real_num)? real_num : endRow;    //40
       /*console.log(endRow);*/
       //遍历显示数据实现分页

       for(var i=1;i<(num+1);i++){    //根据起始行和结束行判断需要显示表格的哪几行
        var irow = itable.rows[i-1];
        if (i==1 ||i==2){
          irow.style.display="";//固定显示表格的第1和2行，即表头和翻页按钮
        }
        else if((i-2)>=startRow && (i-2)<=endRow){
          irow.style.display="";    //显示对应的行
        }else{
          irow.style.display="none";//隐藏其他行
        }
      }
      for(var i=2;i<num;i++)
      {
        if(itable.rows[i].style.display=="")
        {
          linenum++;//获取当前页所显示的行数
        }
      }

      var l_pagenum="("+startRow+" - "+endRow+" / 总记录条目数："+linenum+")";
      document.getElementById("pageNumbers").innerHTML=l_pagenum;//替换页数信息
    }

    
/******************************
/* 创建出界面的字段要素（不包括填写值，填写值通过insertLineData完成
/*******************************/
function insertTransLineElements(tableid, current_view) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}
var InterLineStatus = document.getElementById("InterLineStatus").value;
tablebody = document.createElement("tbody");
tablebody.id = "line_body" + prodln;
document.getElementById(tableid).appendChild(tablebody);
var z1 = tablebody.insertRow(-1);
z1.id = 'asset_trans_line1_displayed' + prodln;
z1.className = 'oddListRowS1';
var html="<td style='font-size:14px;vertical-align: middle;height: 40px;'><span name='displayed_line_ext_line_id[" + prodln + "]' id='displayed_line_ext_line_id" + prodln + "'>1</span></td>" ;
for(var i=0;i<lineName.length;i++){

  var linename=lineName[i].toLowerCase();
  html+="<td style='font-size:14px;vertical-align: middle;height: 40px;'><span name='displayed_line_"+linename+"[" + prodln + "]' id='displayed_line_"+linename + prodln + "'></span></td>";

}
html+="<td style='display:none;'><select  name='displayed_line_line_status_list[" + prodln + "]' id='displayed_line_line_status_list" + prodln + "'>"+InterLineStatus+"</select></td>"+
"<td style='font-size:14px;vertical-align: middle;height: 40px;'><span name='displayed_line_line_status[" + prodln + "]' id='displayed_line_line_status" + prodln + "'></span></td>"+
"<td style='font-size:14px;vertical-align: middle;height: 40px;'><span name='displayed_line_process_message[" + prodln + "]' id='displayed_line_process_message" + prodln + "'></span></td>"+
"<td style='font-size:14px;vertical-align: middle;height: 40px;'><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>"+
"<td style='font-size:14px;vertical-align: middle;height: 40px;'><span name='displayed_line_remove[" + prodln + "]' id='displayed_line_remove" + prodln + "'></span></td>";
z1.innerHTML  =html;
var tr_dis=document.getElementById(z1.id);
tr_dis.align="center";
prodln++;

return prodln -1;

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

