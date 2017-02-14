var prodln = 0;
var l_prodln=0;
var columnNum1 = 0;
var l_lineheader=0;
var linetite=new Array();
var linename = new Array();
var lineRequired = new Array();
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  $("#line_items_span").parent().prev().hide();//隐藏SugarCRM字段
  var i =0;
  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Line_head';
  var a=x.insertCell(0);
  a.innerHTML=SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_LINE_NUMBER');
  for(i =0;i<linetite.length;i++)
  {
  var b=x.insertCell(1+i);
  b.innerHTML=linetite[i];
    } 
  var c=x.insertCell(1+i);
  c.innerHTML=SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_REQUIRED_FLAG');
  var b1=x.insertCell(2+i);
  b1.innerHTML=SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_DESCRIPTION');
  var d=x.insertCell(3+i);
  d.innerHTML='&nbsp;';
  columnNum1=4+i;
  var tr_header=document.getElementById(tablehead.id);
  tr_header.style.backgroundColor="white";
  tr_header.align="center";
}

function addlineheader(line_data){
  linetite[l_lineheader]=line_data.maping_segment_title;
  linename[l_lineheader]=line_data.map_segment_name;
  lineRequired[l_lineheader]=line_data.required_flag;
  l_lineheader++;
}
function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    ln = insertLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(line_data.line_id);
    $("#line_line_number".concat(String(ln))).val(line_data.line_number);
    for(var i=0;i<linename.length;i++){
      if(linename[i]=="SOURCE1"){
      $("#line_source1".concat(String(ln))).val(line_data.SOURCE1);
    }
    else if(linename[i]=="SOURCE2"){
      $("#line_source2".concat(String(ln))).val(line_data.SOURCE2);
    } 
    else if(linename[i]=="SOURCE3"){
      $("#line_source3".concat(String(ln))).val(line_data.SOURCE3);
    } 
    else if(linename[i]=="SOURCE4"){
      
      $("#line_source4".concat(String(ln))).val(line_data.SOURCE4);
    } 
    else if(linename[i]=="SOURCE5"){
      $("#line_source5".concat(String(ln))).val(line_data.SOURCE5);
    } 
    else if(linename[i]=="SOURCE6"){
      $("#line_source6".concat(String(ln))).val(line_data.SOURCE6);
    } 
    else if(linename[i]=="SOURCE7"){
      $("#line_source7".concat(String(ln))).val(line_data.SOURCE7);
    } 
    else if(linename[i]=="SOURCE8"){
      $("#line_source8".concat(String(ln))).val(line_data.SOURCE8);
    } 
    else if(linename[i]=="TRAGET1"){
      $("#line_target1".concat(String(ln))).val(line_data.TRAGET1);
    } 
    else if(linename[i]=="TRAGET2"){
      $("#line_target2".concat(String(ln))).val(line_data.TRAGET2);
    } 
    else if(linename[i]=="TRAGET3"){
      $("#line_target3".concat(String(ln))).val(line_data.TRAGET3);
    } 
    else if(linename[i]=="TRAGET4"){
      $("#line_target4".concat(String(ln))).val(line_data.TRAGET4);
    } 
    else if(linename[i]=="TRAGET5"){
      $("#line_target5".concat(String(ln))).val(line_data.TRAGET5);
    } 
    else if(linename[i]=="TRAGET6"){
      $("#line_target6".concat(String(ln))).val(line_data.TRAGET6);
    } 
    else if(linename[i]=="TRAGET7"){
      $("#line_target7".concat(String(ln))).val(line_data.TRAGET7);
    } 
    else if(linename[i]=="TRAGET8"){
      $("#line_target8".concat(String(ln))).val(line_data.TRAGET8);
    } 

    }
    /*$("#line_source1_8".concat(String(ln))).val(line_data.source1_8);
    $("#line_target1_8".concat(String(ln))).val(line_data.target1_8);*/
    $("#line_required_flag".concat(String(ln))).attr('checked',line_data.required_flag==1?true:false);
    $("#line_description".concat(String(ln))).val(line_data.description);
    $("#line_header_id".concat(String(ln))).val(line_data.header_id);
    renderLine(ln);
  }
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

var z1 = tablebody.insertRow(-1);
z1.id = 'line1_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td style='vertical-align: middle;'><span name='displayed_line_number[" + prodln + "]' id='displayed_line_number" + prodln + "'></span></td>"; 
for(var i=0;i<linename.length;i++){
  if(linename[i].substring(0,1)=='S'){
    var l=linename[i].substring(6,7);
  z1.innerHTML=z1.innerHTML+"<td style='vertical-align: middle;'><span name='displayed_source"+l+"[" + prodln + "]' id='displayed_source"+l + prodln + "'></span></td>" ;
 }else if(linename[i].substring(0,1)=='T')
 {
var j=linename[i].substring(6,7);
  z1.innerHTML=z1.innerHTML+"<td style='vertical-align: middle;'><span name='displayed_target"+j+"[" + prodln + "]' id='displayed_target"+j+ prodln + "'></span></td>" ;
 }
}
z1.innerHTML=z1.innerHTML+"<td style='vertical-align: middle;'><span name='displayed_required_flag[" + prodln + "]' id='displayed_required_flag" + prodln + "'></span></td>"+
"<td style='vertical-align: middle;'><span name='displayed_description[" + prodln + "]' id='displayed_description" + prodln + "'></span></td>"+
"<td style='vertical-align: middle;'><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";

var tr_dis=document.getElementById(z1.id);
  tr_dis.align="center";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln;
  x.style = "display:none";
  
  /*l_prodln=prodln+1;*/
  var req;
  var html
  = "<td colSpan='"+columnNum1+"'>"+
  "<table border='0' class='lineEditor' width='100%' style='display:table'>"+
  "<tr>"+
  "<input name='line_id["+prodln+"]' id='line_id"+prodln+"' value='' type='hidden'>"+
  "<input name='line_header_id["+prodln+"]' id='line_header_id"+prodln+"' value='' type='hidden' >"+
 "<td>"+SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_LINE_NUMBER')+"</td>"+
  "<td><input name='line_line_number["+prodln+"]' id='line_line_number"+prodln+"' size='30' maxlength='255' type='text' ></td>"+
  "<td>"+SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_REQUIRED_FLAG')+"</td>"+
    "<td><input name='line_required_flag[" + prodln + "]' id='line_required_flag" + prodln + "' size='30' maxlength='255' type='checkbox'></td>"+
  "</tr>";
  for(var i=0;i<linename.length;i++){
    if(lineRequired[i]==1){
         req="*";

        }else{
          req="";
        }
    if(i%2==0){
      if(linename[i].substring(0,6)=='SOURCE'){
        
    var l=linename[i].substring(6,7);
  html=html+"<tr>"+
  "<td>"+linetite[i]+req+"</td>"+
    "<td><input name='line_source"+l+"["+prodln+"]' id='line_source"+l+prodln+"' size='30' maxlength='255' type='text' ></td>";
}
else if(linename[i].substring(0,6)=='TRAGET'){
    var j=linename[i].substring(6,7);
  html=html+"<tr>"+
  "<td>"+linetite[i]+req+"</td>"+
    "<td><input name='line_target"+j+"["+prodln+"]' id='line_target"+j+prodln+"' size='30' maxlength='255' type='text' ></td>";
}
}
else if (i%2==1)
{
if(linename[i].substring(0,6)=='SOURCE'){
    var l=linename[i].substring(6,7);
  html=html+
  "<td>"+linetite[i]+req+"</td>"+
    "<td><input name='line_source"+l+"["+prodln+"]' id='line_source"+l+prodln+"' size='30' maxlength='255' type='text' ></td>"
+"</tr>";
}else if(linename[i].substring(0,6)=='TRAGET'){
    var j=linename[i].substring(6,7);
  html=html+
  "<td>"+linetite[i]+req+"</td>"+
    "<td><input name='line_target"+j+"["+prodln+"]' id='line_target"+j+prodln+"' size='30' maxlength='255' type='text' ></td>"
    +"<tr>";
}
    }
  }
   if(linename.length%2==1) {
    html=html+
    "<td>"+SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_DESCRIPTION')+"</td>"+
    "<td><textarea id='line_description"+prodln+"' name='line_description["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
    "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
    "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
    "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
  "</tr>"+
  "</table></td>";
   }
  else if(linename.length%2==0){
  html=html+"<tr>"+
    "<td>"+SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_DESCRIPTION')+"</td>"+
    "<td><textarea id='line_description"+prodln+"' name='line_description["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
    "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
    "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
    "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
  "</tr>"+
  "</table></td>";
  }
     x.innerHTML=html;
    // console.log(x.innerHTML);
    
    /*addToValidate('EditView', 'line_line_number'+ prodln,'int', 'true',SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_LINE_NUMBER'));
    addToValidate('EditView', 'line_column_title'+ prodln,'varchar', 'true',SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_COLUMN_TITLE'));
    addToValidate('EditView', 'line_column_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_COLUMN_NAME'));
    addToValidate('EditView', 'line_column_data_type'+ prodln,'varchar', 'true',SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_COLUMN_DATA_TYPE'));
    addToValidate('EditView', 'line_column_type'+ prodln,'varchar', 'true',SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_COLUMN_TYPE'));
    */
    renderLine(prodln);
    prodln++;

    return prodln - 1;
  }

function renderLine(ln) { //将编辑器中的内容显示于正常行中
 valitems(prodln);
  $("#displayed_line_number"+ln).html($("#line_line_number"+ln).val());
  for(var i=0;i<linename.length;i++){
  if(linename[i].substring(0,1)=='S'){
    var l=linename[i].substring(6,7);
  $("#displayed_source"+l+ln).html($("#line_source"+l+ln).val());
}else if(linename[i].substring(0,1)=='T'){
  var j=linename[i].substring(6,7);
  $("#displayed_target"+j+ln).html($("#line_target"+j+ln).val());
}
}
  var flag=$("#line_required_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_required_flag"+ln).html(flag);
  $("#displayed_description"+ln).html($("#line_description"+ln).val());
  LineEditorClose(ln);
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
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertLineElements(tableid);//加入新行
    LineEditorShow(prodln - 1);       //打开行编辑器
    setLineNum(prodln);
  }
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
    removeFromValidate('EditView','line_line_number'+ ln);
    for(var i=0;i<lineRequired.length;i++) 
    {
      if (lineRequired[i]==1) {
        if(linename[i].substring(0,6)=="SOURCE"){
          var l=linename[i].substring(6,7);
          removeFromValidate('EditView','line_source'+l+ ln);
        }
        if(linename[i].substring(0,6)=="TARGET"){
          var j=linename[i].substring(6,7);
          removeFromValidate('EditView','line_target'+j+ ln);
        }
      }
    }
  }

  resetLineNum_Bold();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  valitems(ln);
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
      $("#displayed_line_number" + i).text(j);
    }
  }
}

function setLineNum(ln){
  var j=0;
  for (var i=0;i<ln;i++) {
    /*if ($("#line_deleted"+i).val()!=1) {*///跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
      j=j+1;
      $("#line_line_number"+i).val(j);
    //}
  }
}
function valitems(ln){
  addToValidate('EditView', 'line_line_number'+ ln,'int', 'true',SUGAR.language.get('HAA_Integration_Mapping_Lines', 'LBL_LINE_NUMBER'));
  for(var i=0;i<lineRequired.length;i++) 
    {
      if (lineRequired[i]==1) {
        if(linename[i].substring(0,6)=="SOURCE"){
          var l=linename[i].substring(6,7);
    
          addToValidate('EditView', 'line_source'+l+ ln,'varchar', 'true',linetite[i]);
      
        }
        if(linename[i].substring(0,6)=="TARGET"){
          var j=linename[i].substring(6,7);
         
          addToValidate('EditView', 'line_target'+j+ ln,'varchar', 'true',linetite[i]);
       
        }
      }
    }
}

function setExtendValReturn(popupReplyData){
  console.log(popupReplyData);
  /*var id=popupReplyData['name_to_value_array']['haa_integration_mapping_def_headers_id_c'];*/

  set_return(popupReplyData);
    $.ajax({
      async:false,
      url: 'index.php?to_pdf=true&module=HAA_Integration_Mapping_Headers&action=get_mapping_def_lines_item',
      data: '&header_id='+$("#haa_integration_mapping_def_headers_id_c").val(),
      type:'POST',
      success: function (data) {
       /* data=$.parseJSON(data);*/
        var res=JSON.parse(data);
        for (var i=0;i<res.length;i++){
        linetite[i]=res[i]['maping_segment_title'];
        linename[i]=res[i]['map_segment_name'];
        lineRequired[i]=res[i]['required_flag'];
      }
      $("#lineItems_head").hide();
      insertLineHeader("lineItems");
    }
  });
  
}
function hidesubpanl(){

  $("#line_items_label").hide();//隐藏SugarCRM字段
}
