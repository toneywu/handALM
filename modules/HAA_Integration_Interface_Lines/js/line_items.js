var prodln = 0;
var l_prodln=0;
var columnNum1 = 0;
var l_lineheader=0;//记录有多少动态字段需要展示
var linetite=new Array();//存储字段标题
var linename = new Array();//存储字段名称
var lineRequired = new Array();//字段是否必输
var addbutton =0;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function addlineheader(line_data){
  linetite[l_lineheader]=line_data.column_title;
  linename[l_lineheader]=line_data.column_name;
  lineRequired[l_lineheader]=line_data.required_flag;
  l_lineheader++;
}
function insertLineHeader(tableid){
  $("#line_items_span").parent().prev().hide();//隐藏SugarCRM字段

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  
  document.getElementById(tableid).appendChild(tablehead);
  // console.log(linetite);
  var x=tablehead.insertRow(-1);
  x.id='Line_head';
  var a=x.insertCell(0);
  a.innerHTML=SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_EXT_LINE_ID');
  for(i =0;i<linetite.length;i++)
  {
    var b2=x.insertCell(1+i);
    b2.innerHTML=linetite[i];
  } 
  var b=x.insertCell(1+i);
  b.innerHTML=SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_LINE_STATUS');
  var c=x.insertCell(2+i);
  c.innerHTML=SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_PROCESS_MESSAGE');
  var b1=x.insertCell(3+i);
  b1.innerHTML=SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_DESCRIPTION');
  var d=x.insertCell(4+i);
  d.innerHTML='&nbsp;';
  columnNum1=5+i
  var tr_header=document.getElementById(tablehead.id);
  /*console.log(tr_header);*/
  tr_header.style.backgroundColor="white";
  tr_header.align="center";
  

}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  
  ln = insertLineElements("lineItems");
  for(var propertyName in line_data) {
        //这里直接遍历所有的属性（因此需要建立与Bean属性同名的各个字段）
      //console.log(propertyName+"="+line_data[propertyName]);
      //console.log("#line_"+propertyName.concat(String(ln)) +"=="+ line_data[propertyName] );
      /*if (propertyName.concat(String(ln))=="enabled_flag"+ln) {
        if (line_data[propertyName]==1) {
          $("#line_"+propertyName.toLowerCase().concat(String(ln))).html("是");
        }else{
          $("#line_"+propertyName.toLowerCase().concat(String(ln))).html("否");
        }
      } else {*/
        //如果当前字段不是checkbox，就以val的形式赋值

        $("#line_"+propertyName.toLowerCase().concat(String(ln))).val(line_data[propertyName]);            //}
      }
      renderLine(ln);
    }

function insertLineElements(tableid) { //创建界面要素
//包括以下内容：1）显示头，
//2）定义SQS对象，
//3）定义界面显示的可见字段，
//4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}

tablebody = document.createElement("tbody");
tablebody.id = "line_body" + prodln;
document.getElementById(tableid).appendChild(tablebody);

var InterLineStatus = document.getElementById("InterLineStatus").value;

var z1 = tablebody.insertRow(-1);
z1.id = 'line1_displayed' + prodln;
z1.className = 'oddListRowS1';
var innerhtml=
"<td style='vertical-align: middle;'><span name='displayed_ext_line_id[" + prodln + "]' id='displayed_ext_line_id" + prodln + "'></span></td>" ;
for(var i =0;i<linename.length;i++)
{ 

  var l_disp_name=linename[i].toLowerCase();
  innerhtml+="<td style='vertical-align: middle;'><span name='displayed_"+l_disp_name+"[" + prodln + "]' id='displayed_"+l_disp_name+ prodln + "'></span></td>" ;
}
innerhtml+="<td style='vertical-align: middle;'><select disabled='disabled' tabindex='116' name='displayed_line_status[" + prodln + "]' id='displayed_line_status" + prodln + "'>" + InterLineStatus +"</select></td>"+
"<td style='vertical-align: middle;'><span name='displayed_process_message[" + prodln + "]' id='displayed_process_message" + prodln + "'></span></td>"+
"<td style='vertical-align: middle;'<span name='displayed_description[" + prodln + "]' id='displayed_description" + prodln + "'></span></td>"+
"<td style='vertical-align: middle;'><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";
z1.innerHTML  =innerhtml;
var tr_dis=document.getElementById(z1.id);
tr_dis.align="center";
  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln;
  x.style = "display:none";
  /*l_prodln=prodln+1;*/
  var req;

  var lineHtml= "<td colSpan='"+columnNum1+"'>"+
  "<table border='0' class='lineEditor' width='100%' style='display:table'>"+
  "<tr>"+
  "<input name='line_id["+prodln+"]' id='line_id"+prodln+"' value='' type='hidden'>"+
  "<input name='line_header_id["+prodln+"]' id='line_header_id"+prodln+"' value='' type='hidden' >"+
  "<td>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_EXT_LINE_ID')+"<span class='required'>*</span></td>"+
  "<td><input name='line_ext_line_id["+prodln+"]' id='line_ext_line_id"+prodln+"' size='30' maxlength='255' type='text'></td>";
  for(var i=0;i<linename.length;i++)
  {
    if(lineRequired[i]==1){
     req="*";

   }else{
    req="";
  }

  var l_line_name=linename[i].toLowerCase();
  if(i%2==0){
    lineHtml+=
    "<td>"+linetite[i]+req+"</td>"+
    "<td><input name='line_"+l_line_name+"["+prodln+"]' id='line_"+l_line_name+prodln+"' size='30' maxlength='255' type='text'></td>"+
    "</tr>";
  }else if(i%2==1){
    lineHtml+=  "<tr>"+
    "<td>"+linetite[i]+req+"</td>"+
    "<td><input name='line_"+l_line_name+"["+prodln+"]' id='line_"+l_line_name+prodln+"' size='30' maxlength='255' type='text'></td>";
  }
}
if(linename.length%2==0){
  lineHtml+= "<td>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_LINE_STATUS')+"<span class='required'>*</span></td>"+
  "<td><select onchange='setSelectVal("+prodln+")'tabindex='116' name='line_line_status[" + prodln + "]' id='line_line_status" + prodln + "'>" + InterLineStatus +"</select></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_PROCESS_MESSAGE')+"<span class='required'>*</span></td>"+
  "<td><input name='line_process_message[" + prodln + "]' id='line_process_message" + prodln + "' size='30' maxlength='255' type='text'></td>"+
  "<td>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_DESCRIPTION')+"</td>"+
  "<td><textarea id='line_description"+prodln+"' name='line_description["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
  "</tr>"+
  "<tr>"+
  "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
  "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
  "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
  "</td>"+
  "</tr>"+

  "</table></td>";
}else{
  lineHtml+=
  "<tr>"+
  "<td>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_LINE_STATUS')+"<span class='required'>*</span></td>"+
  "<td><select onchange='setSelectVal("+prodln+")'tabindex='116' name='line_line_status[" + prodln + "]' id='line_line_status" + prodln + "'>" + InterLineStatus +"</select></td>"+
  "<td>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_PROCESS_MESSAGE')+"<span class='required'>*</span></td>"+
  "<td><input name='line_process_message[" + prodln + "]' id='line_process_message" + prodln + "' size='30' maxlength='255' type='text'></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAA_Integration_Interface_Lines', 'LBL_DESCRIPTION')+"</td>"+
  "<td><textarea id='line_description"+prodln+"' name='line_description["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
  "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
  "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
  "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
  "</td>"+
  "</tr>"+"</table></td>";
}
x.innerHTML =lineHtml;
valitems(prodln);
renderLine(prodln);
prodln++;

return prodln - 1;
}

function renderLine(ln) { //将编辑器中的内容显示于正常行中

  $("#displayed_ext_line_id"+ln).html($("#line_ext_line_id"+ln).val());
  for(var i=0;i<linename.length;i++){
    var l=linename[i].toLowerCase();
    $("#displayed_"+l+ln).html($("#line_"+l+ln).val());
  }
  $("#displayed_line_status"+ln).val($("#line_line_status"+ln).val());
  $("#displayed_process_message"+ln).html($("#line_process_message"+ln).val());
  $("#displayed_description"+ln).html($("#line_description"+ln).val());
}

function insertLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan=columnNum1;
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+新增' />";
}

function addNewLine(tableid) {
    var l_record=document.getElementsByName("record")[0].value;
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增

    if (addbutton==0 && l_record==""){
    getInterfaceInfo();
    addbutton++;
  }
    insertLineElements(tableid);//加入新行
    LineEditorShow(prodln - 1);       //打开行编辑器
    setLineNum(prodln);
  }

}

function getInterfaceInfo(){
  var interface_code=$("#interface_code").val();
  var haa_frameworks_id=$("#haa_frameworks_id_c").val();
  $.ajax({
    async:false,
    url: 'index.php?to_pdf=true&module=HAA_Integration_Interface_Headers&action=get_interface_info',
    data: '&interface_code='+interface_code+'&haa_frameworks_id='+haa_frameworks_id,
    type:'POST',
    success: function (data) {//调用方法。
                //data=$.parseJSON(data);
                //data=JSON.parse(data);
                
                var res=JSON.parse(data);
                for (var i=0;i<res.length;i++){
                  linetite[i]=res[i]['column_title'];
                  linename[i]=res[i]['column_name'];
                  lineRequired[i]=res[i]['required_flag'];
                }
                //$("#lineItems_head").hide();
                insertLineHeader("lineItems");
              }
            });
}

function btnMarkLineDeleted(ln, key) {//删除当前行
  if(confirm(SUGAR.language.get('app_strings','NTC_DELETE_CONFIRMATION'))) {
    markLineDeleted(ln, key);
    LineEditorClose(ln); 
  }
  else
  {
    return false;
  }
}
function markLineDeleted(ln, key) {//删除当前行

  // collapse line; update deleted value
  document.getElementById(key + 'body' + ln).style.display = 'none';
  document.getElementById(key + 'deleted' + ln).value = '1';
  document.getElementById(key + 'delete_line' + ln).onclick = '';

  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView','line_ext_line_id'+ ln);
    removeFromValidate('EditView','line_line_status'+ ln);
    for(var i=0;i<lineRequired.length;i++) 
    {
      if (lineRequired[i]==1) {
        var j=linename[i].toLowerCase();
        removeFromValidate('EditView','line_'+j+ ln);
      }
    }
  }
  resetLineNum_Bold();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }
  $("#line1_displayed"+ln).hide();
  $("#line_editor"+ln).show();


}

function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
    $("#line_editor"+ln).hide();
    
    $("#line1_displayed"+ln).show();
    renderLine(ln);
    resetLineNum_Bold();
  }
}

function resetLineNum_Bold() {//数行号
  var j=0;
  for (var i=0;i<prodln;i++) {
    if ($("#line_deleted"+i).val()!=1) {//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
      j=j+1;
      $("#displayed_ext_line_id" + i).text(j);
      $("#line_ext_line_id"+i).val(j);
    }
  }
}
function setLineNum(ln){
  var j=0;
  for (var i=0;i<ln;i++) {
    if ($("#line_deleted"+i).val()!=1) {//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
      j=j+1;
      $("#line_ext_line_id"+i).val(j);
    }
  }
}

function valitems(ln){
  addToValidate('EditView', 'line_ext_line_id'+ ln,'int', 'true',SUGAR.language.get('HAA_Integration_Mapping_Def_Lines', 'LBL_LINE_NUMBER'));
  addToValidate('EditView', 'line_line_status'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_Mapping_Def_Lines', 'LBL_SEGMENT_TYPE'));
  for(var i=0;i<lineRequired.length;i++) 
  {
    if (lineRequired[i]==1) {
      var l=linename[i].toLowerCase();
      addToValidate('EditView', 'line_'+l+ ln,'varchar', 'true',linetite[i]);
    }
  }
}
function hidesubpanl(){

  $("#line_items_span").parent().prev().hide();//隐藏SugarCRM字段
}
