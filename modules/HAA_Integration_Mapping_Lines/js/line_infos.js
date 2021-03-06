if(typeof(YAHOO.SUGAR) == 'undefined') {
  $.getScript("include/javascript/sugarwidgets/SugarYUIWidgets.js");
}
var lineName=new Array();
var lineTile=new Array();
var lineRequired= new Array();
var prodln = 0;
var l_lineheader=0;
var tabNumber=1;
var totalPage = 0;
var l_psize=10;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

/******************************
/* 加载表头
/*******************************/
function addlineheader(line_data){
  lineTile[l_lineheader]=line_data.maping_segment_title;
  lineName[l_lineheader]=line_data.map_segment_name;
  lineRequired[l_lineheader]=line_data.required_flag;
  l_lineheader++;
}
function insertTransLineHeader(tableid){
  $("#line_infos_span").parent().prev().hide();//隐藏标签
  var s = document.getElementById("line_infos_span");
  var par=s.parentNode;
  par.className="col-xs-12 col-sm-12 detail-view-field ";//替换DIV的class名称，不然table不会占满屏宽
  var head_html="<thead style='text-align: center'>"+"<tr>";
  head_html +="<th width='15%' style='font-size:14px;border-right:none;border-left:none;text-align: center;'>"+SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_LINE_NUMBER')+"</th>";
  for(var i=0;i<lineTile.length;i++){
    head_html +="<th width='15%' style='font-size:14px;border-right:none;border-left:none;text-align: center;'>"+lineTile[i]+"</th>";
  }
  head_html +="<th width='13%' style='font-size:14px;border-right:none;border-left:none;text-align: center;'>"+SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_ENABLED_FLAG')+"</th>";
  head_html +="<th width='5%' style='font-size:14px;border-right:none;border-left:none;text-align: center;'> </th>";
  head_html +="</tr></thead>";
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
  
  tabNumber--;
  if (tabNumber==0){
    tabNumber=1;
    return false;
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
  tabNumber=totalPage;
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
      if (propertyName.concat(String(ln))=="enabled_flag"+ln) {
        if (mapping_line[propertyName]==1) {
          $("#displayed_line_"+propertyName.toLowerCase().concat(String(ln))).html("是");
        }else{
          $("#displayed_line_"+propertyName.toLowerCase().concat(String(ln))).html("否");
        }
      } else {
        //如果当前字段不是checkbox，就以val的形式赋值\

        var  strHTML=    "<input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='delete_line("+ "\""+mapping_line["id"]+"\"" +","+ln+")'/>";
        console.log(propertyName.concat(String(ln)).toLowerCase());
        $("#displayed_line_"+propertyName.toLowerCase().concat(String(ln))).html(mapping_line[propertyName]);
        $("#displayed_line_remove"+ln).html(strHTML);

/*        $("#displayed_line_remove"+ln).html('<a class="listViewTdToolsS1" href="javascript:sub_p_rem(\'HAA_Integration_Mapping_Lines\', \'HAA_Integration_Mapping_Lines\', \''+mapping_line["id"]+'\', 0);" onClick="return sp_rem_conf();">移除</a>');
*/      
}
}
        /*goPage(1,1);*/
}
function goPage(pno,psize){
    var linenum=0;
    var itable = document.getElementById("lineInfos");
    var num = itable.rows.length;//表格所有行数(所有记录数)
    /*console.log(num);*/
    //总页数
    var pageSize = psize;//每页显示行数
    //总共分几页 
    if((num-2)/pageSize > parseInt((num-2)/pageSize)){   
            totalPage=parseInt((num-2)/pageSize)+1;   
       }else{   
           totalPage=parseInt((num-2)/pageSize);   
       }   
    var currentPage = pno;//当前页数
    var startRow = (currentPage - 1) * pageSize+1;//开始显示的行  31 
       var endRow = currentPage * pageSize;//结束显示的行   40
       endRow = (endRow >(num-2))? (num-2) : endRow;    //40
       /*console.log(endRow);*/
       //遍历显示数据实现分页

    for(var i=1;i<(num+1);i++){    
        var irow = itable.rows[i-1];
        if (i==1 ||i==2){
          irow.style.display="";
        }
        else if((i-2)>=startRow && (i-2)<=endRow){
            irow.style.display="";    
        }else{
            irow.style.display="none";
        }
    }
    for(var i=2;i<num;i++)
    {
      if(itable.rows[i].style.display=="")
      {
        linenum++;
      }
    }

    var l_pagenum="("+startRow+" - "+endRow+" / 总记录条目数："+linenum+")";
    document.getElementById("pageNumbers").innerHTML=l_pagenum;
}

function delete_line(line_id,ln){
  if(confirm("您确认要移除这个关系吗？"))
  {
    
    var tr_id=document.getElementById("asset_trans_line1_displayed"+ln);
    tr_id.style.display = "none";
    $.ajax({
      async:false,
      url: 'index.php?to_pdf=true&module=HAA_Integration_Mapping_Lines&action=delete_mapping_line',
      data: '&line_id='+line_id,
      type:'POST',
            success: function (data) {//调用方法。
                //data=$.parseJSON(data);
                //data=JSON.parse(data);
                //alert(data);
            
              }
            });
    
  }else
  {
    return false;
  }
}

/******************************
/* 创建出界面的字段要素（不包括填写值，填写值通过insertLineData完成
/*******************************/
function insertTransLineElements(tableid, current_view) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}

tablebody = document.createElement("tbody");
tablebody.id = "line_body" + prodln;
document.getElementById(tableid).appendChild(tablebody);


var z1 = tablebody.insertRow(-1);
z1.id = 'asset_trans_line1_displayed' + prodln;
z1.className = 'oddListRowS1';
var html="<td style='font-size:14px;vertical-align: middle;'><span name='displayed_line_line_number[" + prodln + "]' id='displayed_line_line_number" + prodln + "'>1</span></td>" ;
for(var i=0;i<lineName.length;i++){
  var linename=lineName[i].toLowerCase();
  html+="<td style='font-size:14px;vertical-align: middle;'><span name='displayed_line_"+linename+"[" + prodln + "]' id='displayed_line_"+linename + prodln + "'></span></td>";

}
html+="<td style='font-size:14px;vertical-align: middle;'><span name='displayed_line_enabled_flag[" + prodln + "]' id='displayed_line_enabled_flag" + prodln + "'></span></td>"+
"<td style='font-size:14px;vertical-align: middle;'><span name='displayed_line_remove[" + prodln + "]' id='displayed_line_remove" + prodln + "'></span></td>";
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

