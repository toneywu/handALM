var prodln = 0;
var l_prodln=0;
var columnNum1 = 6;
var column_name =  new Array();
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function showModuleFields(){
    privilige_module = document.getElementById('privilige_module').value;
    if(privilige_module != ''){

    $.ajax({//Load module fields
        url: "index.php?to_pdf=true&module=AOW_WorkFlow&action=getModuleFields&aow_value=&view=EditView&aow_module="+privilige_module,
        //dataType: "json",
        success: function (result) {
             column_name = result;
             if(document.getElementById('btnaddNewLine_c')){
                document.getElementById('btnaddNewLine_c').disabled = '';
              }
                //console.log("column_name loaded");
                //console.log(result);
            },
        error: function () { //失败
            alert('Error loading document');
        },
        async:false
    });

    } else {
      if(document.getElementById('btnaddNewLine_c')){
        document.getElementById('btnaddNewLine_c').disabled = 'disabled';
      }
    }

}

function insertLineHeader_c(tableid){
  $("#line_items_span2").parent().prev().hide();//隐藏SugarCRM字段
  document.getElementById("line_items_span2").parentElement.className="col-xs-12.col-sm-12.edit-view-field"
  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='linecl_head';
  var a=x.insertCell(0);
  a.innerHTML=SUGAR.language.get('HPR_Group_Columns', 'LBL_SORT_NUMBER');
  var b=x.insertCell(1);
  b.innerHTML=SUGAR.language.get('HPR_Group_Columns', 'LBL_HPR_COLUMN_NAME');
  var h=x.insertCell(2);
  h.innerHTML=SUGAR.language.get('HPR_Group_Columns', 'LBL_EDIT_ENABLE_FLAG');
  var c=x.insertCell(3);
  c.innerHTML=SUGAR.language.get('HPR_Group_Columns', 'LBL_HIDE_ENABLE_FLAG');
  var c1=x.insertCell(4);
  c1.innerHTML=SUGAR.language.get('HPR_Group_Columns', 'LBL_DESCRIPTION');
  var b1=x.insertCell(5);
  b1.innerHTML='&nbsp;';
  var tr_header=document.getElementById(tablehead.id);
  tr_header.style.backgroundColor="white";
  tr_header.align="center";
  
}


function insertLineData_c(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    ln = insertLineElements_c("lineItems2");
    $("#linecl_id".concat(String(ln))).val(line_data.line_id);
    $("#linecl_sort_number".concat(String(ln))).val(line_data.sort_number);
    $("#linecl_hpr_column_name".concat(String(ln))).val(line_data.hpr_column_name);
    $("#linecl_edit_enable_flag".concat(String(ln))).attr('checked',line_data.edit_enable_flag==1?true:false);
    $("#linecl_hide_enable_flag".concat(String(ln))).attr('checked',line_data.hide_enable_flag==1?true:false);
    $("#linecl_description".concat(String(ln))).val(line_data.description);
    $("#linecl_header_id".concat(String(ln))).val(line_data.header_id);
    renderLine_c(ln);
  }
}

function insertLineElements_c(tableid) { //创建界面要素
//包括以下内容：1）显示头，
//2）定义SQS对象，
//3）定义界面显示的可见字段，
//4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}
tablebody = document.createElement("tbody");
tablebody.id = "linecl_body" + prodln;
document.getElementById(tableid).appendChild(tablebody);

var z1 = tablebody.insertRow(-1);
z1.id = 'linecl1_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td style='vertical-align: middle;'><span name='displayed_sort_number[" + prodln + "]' id='displayed_sort_number" + prodln + "'></span></td>" +
"<td style='vertical-align: middle;'><select disabled='disabled' tabindex='116' name='displayed_hpr_column_name[" + prodln + "]' id='displayed_hpr_column_name" + prodln + "'>"+column_name+"</select></td>"+
"<td style='vertical-align: middle;'><span name='displayed_edit_enable_flag[" + prodln + "]' id='displayed_edit_enable_flag" + prodln + "'></span></td>"+
"<td style='vertical-align: middle;'><span name='displayed_hide_enable_flag[" + prodln + "]' id='displayed_hide_enable_flag" + prodln + "'></span></td>"+
"<td style='vertical-align: middle;'><span name='displayed_description[" + prodln + "]' id='displayed_description" + prodln + "'></span></td>"+
"<td style='vertical-align: middle;'><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow_c("+prodln+")'></td>";
 //设置tr的align属性为center 
 var tr_dis=document.getElementById(z1.id);
 tr_dis.align="center";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'linecl_editor' + prodln;
  x.style = "display:none";
  
  /*l_prodln=prodln+1;*/
  x.innerHTML  = "<td colSpan='"+columnNum1+"'>"+
  "<table border='0' class='lineEditor' width='100%' style='display:table'>"+
  "<tr>"+
  "<input name='linecl_id["+prodln+"]' id='linecl_id"+prodln+"' value='' type='hidden'>"+
  "<input name='linecl_header_id["+prodln+"]' id='linecl_header_id"+prodln+"' value='' type='hidden' >"+
  "<td>"+SUGAR.language.get('HPR_Group_Columns', 'LBL_SORT_NUMBER')+"</td>"+
  "<td><input name='linecl_sort_number["+prodln+"]' id='linecl_sort_number"+prodln+"' size='30' maxlength='255' type='text' ></td>"+
  "<td>"+SUGAR.language.get('HPR_Group_Columns', 'LBL_HPR_COLUMN_NAME')+"<span class='required'>*</span></td>"+
  "<td><select  tabindex='116' name='linecl_hpr_column_name[" + prodln + "]' id='linecl_hpr_column_name" + prodln + "'>" +column_name +"</select></td>"+
  "</tr>"+
  "<td>"+SUGAR.language.get('HPR_Group_Columns', 'LBL_EDIT_ENABLE_FLAG')+"</td>"+
  "<td><input name='linecl_edit_enable_flag[" + prodln + "]' id='linecl_edit_enable_flag" + prodln + "' size='30' maxlength='255' type='checkbox' checked=true value='1'></td>"+
  "<td>"+SUGAR.language.get('HPR_Group_Columns', 'LBL_HIDE_ENABLE_FLAG')+"</td>"+
  "<td><input name='linecl_hide_enable_flag[" + prodln + "]' id='linecl_hide_enable_flag" + prodln + "' size='30' maxlength='255' type='checkbox' value='1'></td>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HPR_Group_Columns', 'LBL_DESCRIPTION')+"</td>"+
  "<td><textarea id='linecl_description"+prodln+"' name='linecl_description["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
  "<td><input type='hidden' id='linecl_deleted2"+prodln+"' name='linecl_deleted2["+prodln+"]' value='0'></td>"+
  "<td><input type='button' id='linecl_delete_line2" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted_c(" + prodln + ",\"linecl_\")'>"+
  "<button type='button' id='btn_LineEditorClose_c" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose_c(" + prodln + ",\"linecl_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
  "</td>"+
  "</tr>"+
  "</table></td>";
    
    renderLine_c(prodln);
    valitems_c(prodln);
    prodln++;
    return prodln - 1;
  }

function renderLine_c(ln) { //将编辑器中的内容显示于正常行中

  $("#displayed_sort_number"+ln).html($("#linecl_sort_number"+ln).val());
  $("#displayed_hpr_column_name"+ln).val($("#linecl_hpr_column_name"+ln).val());
  var flag=$("#linecl_edit_enable_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_edit_enable_flag"+ln).html(flag);
  var flag=$("#linecl_hide_enable_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_hide_enable_flag"+ln).html(flag);
  $("#displayed_description"+ln).html($("#linecl_description"+ln).val());
  LineEditorClose_c(ln);
}

function insertLineFootor_c(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan=columnNum1;
  footer_cell.innerHTML="<input id='btnaddNewLine_c' disabled = 'disabled' type='button' class='button btn_del' onclick='addNewLine_c(\"" +tableid+ "\")' value='+新增' />";
}

function addNewLine_c(tableid) {
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertLineElements_c(tableid);//加入新行
    LineEditorShow_c(prodln - 1);       //打开行编辑器
    setLineNum_c(prodln);
  }
}



function btnMarkLineDeleted_c(ln, key) {//删除当前行
  if(confirm(SUGAR.language.get('app_strings','NTC_DELETE_CONFIRMATION'))) {
    markLineDeleted_c(ln, key);
    LineEditorClose_c(ln); 
  }
  else
  {
    return false;
  }
}
function markLineDeleted_c(ln, key) {//删除当前行
  // collapse line; update deleted value
  document.getElementById(key + 'body' + ln).style.display = 'none';
  document.getElementById(key + 'deleted2' + ln).value = '1';
  document.getElementById(key + 'delete_line2' + ln).onclick = '';

  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView','linecl_sort_number'+ ln);
    removeFromValidate('EditView','linecl_hpr_column_name'+ ln);
  
  }

  resetLineNum_Bold_c();

}

function LineEditorShow_c(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  //valitems_c(ln);
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose_c(i);
    }
  }

  $("#linecl1_displayed"+ln).hide();
  $("#linecl_editor"+ln).show();
}

function LineEditorClose_c(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
    $("#linecl_editor"+ln).hide();
    $("#linecl1_displayed"+ln).show();
    renderLine_c(ln);
    resetLineNum_Bold_c();
  }
}

function resetLineNum_Bold_c() {//数行号
  var j=0;
  for (var i=0;i<prodln;i++) {
    if ($("#linecl_deleted2"+i).val()!=1) {//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
      j=j+1;
       $("#displayed_sort_number" + i).text(j);
      $("#linecl_sort_number"+i).val(j);
    }
  }
}

function setLineNum_c(ln){
  var j=0;
  for (var i=0;i<ln;i++) {
    if ($("#linecl_deleted2"+i).val()!=1) {//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
      j=j+1;
      $("#linecl_sort_number"+i).val(j);
    }
  }
}



function valitems_c(ln){
  addToValidate('EditView', 'linecl_sort_number'+ ln,'int', 'true',SUGAR.language.get('HPR_Group_Columns', 'LBL_SORT_NUMBER'));
  addToValidate('EditView', 'linecl_hpr_column_name'+ ln,'varchar', 'true',SUGAR.language.get('HPR_Group_Columns', 'LBL_HPR_COLUMN_NAME'));
  
}


function replace_display_lines_c(linesHtml,elementId) {
  var lineItems=document.getElementById(elementId);
  lineItems.innerHTML=linesHtml;
}