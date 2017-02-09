var prodln = 0;
var columnNum1 = 12;
var lineno;
var num;
var module_dsp_list='';
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  $("#line_items_span").parent().prev().hide();//隐藏SugarCRM字段

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Line_head';
 /* var a=x.insertCell(0);
 a.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_TASK_TEMPLATE');*/
 var b=x.insertCell(0);
 b.width="6%";
 b.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_SORT_ORDER');
 var c=x.insertCell(1);
 c.width="10%";
 c.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_FIELD_LABLE');
 var b1=x.insertCell(2);
 b1.width="10%";
 b1.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_TABLE_NAME');
 var d=x.insertCell(3);
 d.width="10%";
 d.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_COLUMN_NAME');
 var e=x.insertCell(4);
 e.width="10%";
 e.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_FIELD_TYPE');
 var g=x.insertCell(5);
 g.width="10%";
 g.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_RELATE_MODULE');
/* var g1=x.insertCell(6);
 g1.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_MODULE_DSP');
 var h=x.insertCell(7);
 h.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_MODULE_FILTER');*/
 var l=x.insertCell(6);
 l.width="10%";
 l.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_VALUE_SET_NAME');
 var i=x.insertCell(7);
 i.width="10%";
 i.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_LIST_NAME');
 var j=x.insertCell(8);
 j.width="6%";
 j.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_REQUIRED_FLAG');
 var k=x.insertCell(9);
 k.width="8%";
 k.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_CAN_EDIT_FLAG');
/* var k1=x.insertCell(12);
k1.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_ON_DIFF_FLAG');*/
 /*var m=x.insertCell(13);
 m.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_ASSET_OPTIONS');*/
 /*var m=x.insertCell(10);
 m.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_LOOKUP_TYPE');*/
 var n=x.insertCell(10);
 n.width="6%";
 n.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_ENABLED_FLAG');
/* var o=x.insertCell(16);
o.innerHTML=SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_DESCRIPTION');*/
var f=x.insertCell(11);
f.width="6%";
f.innerHTML='&nbsp;';
}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    ln = insertLineElements("lineItems_tem");
    $("#line_id".concat(String(ln))).val(line_data.id);
    $("#line_hat_counting_task_templates_id_c".concat(String(ln))).val(line_data.hat_counting_task_templates_id_c);
    $("#line_template_name".concat(String(ln))).val(line_data.template_name);
    $("#line_sort_order".concat(String(ln))).val(line_data.sort_order);
    $("#line_field_lable".concat(String(ln))).val(line_data.field_lable);
    $("#line_table_names".concat(String(ln))).val(line_data.table_names);
    $("#line_column_name".concat(String(ln))).val(line_data.column_name);
    $("#line_field_type".concat(String(ln))).val(line_data.field_type);
    $("#line_relate_module".concat(String(ln))).val(line_data.relate_module);
    $("#line_module_filter".concat(String(ln))).val(line_data.module_filter);
    $("#line_haa_valuesets_id_c".concat(String(ln))).val(line_data.haa_valuesets_id_c);
    $("#line_valueset_name".concat(String(ln))).val(line_data.valueset_name);
    $("#line_list_name".concat(String(ln))).val(line_data.list_name);
    $("#line_required_flag".concat(String(ln))).attr('checked',line_data.required_flag==1?true:false);
    $("#line_can_edit_flag".concat(String(ln))).attr('checked',line_data.can_edit_flag==1?true:false);
    $("#line_lookup_type".concat(String(ln))).val(line_data.lookup_type);
    $("#line_enabled_flag".concat(String(ln))).attr('checked',line_data.enabled_flag==1?true:false);
    $("#line_description".concat(String(ln))).val(line_data.description);
    $("#line_asset_options".concat(String(ln))).val(line_data.asset_options);
    $("#line_module_dsp".concat(String(ln))).val(line_data.module_dsp);
    $("#line_on_diff_flag".concat(String(ln))).attr('checked',line_data.on_diff_flag==1?true:false);
    $("#line_dsp".concat(String(ln))).val(line_data.module_dsp);

    renderLine(ln);
    $("#line_editor"+ln).hide();
  }
}

function insertLineElements(tableid) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}

tablebody = document.createElement("tbody");
tablebody.id = "line_body" + prodln;
document.getElementById(tableid).appendChild(tablebody);

var line_table_name_option = document.getElementById("tablenamedden").value;
var line_column_name_option = document.getElementById("columnnamedden").value;
var line_field_type_option = document.getElementById("fieldtypedden").value;
var line_list_type_option = document.getElementById("listtypedden").value;
var line_app_list_string = document.getElementById("appliststrings").value;
var line_asset_list_string = document.getElementById("assetliststrings").value;

var z1 = tablebody.insertRow(-1);
z1.id = 'line_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
//"<td><span name='displayed_line_template_name[" + prodln + "]' id='displayed_line_template_name" + prodln + "'></span></td>" +
"<td><span name='displayed_line_sort_order[" + prodln + "]' id='displayed_line_sort_order" + prodln + "'style='word-wrap:break-word'></span></td>"+
"<td><span name='displayed_line_field_lable[" + prodln + "]' id='displayed_line_field_lable" + prodln + "'style='word-wrap:break-word'></span></td>"+
"<td><span name='displayed_line_table_names[" + prodln + "]' id='displayed_line_table_names" + prodln + "'style='word-wrap:break-word'></span></td>"+
"<td><span name='displayed_line_column_name[" + prodln + "]' id='displayed_line_column_name" + prodln + "'style='word-wrap:break-word'></span></td>"+
"<td><span name='displayed_line_field_type[" + prodln + "]' id='displayed_line_field_type" + prodln + "'style='word-wrap:break-word'></span></td>"+
"<td><span name='displayed_line_relate_module[" + prodln + "]' id='displayed_line_relate_module" + prodln + "'style='word-wrap:break-word'></span></td>" +
//"<td><span name='displayed_line_module_dsp[" + prodln + "]' id='displayed_line_module_dsp" + prodln + "'></span></td>"+
//"<td><span name='displayed_line_module_filter[" + prodln + "]' id='displayed_line_module_filter" + prodln + "'></span></td>"+
"<td><span name='displayed_line_valueset_name[" + prodln + "]' id='displayed_line_valueset_name" + prodln + "'style='word-wrap:break-word'></span></td>"+
"<td><span name='displayed_line_list_name[" + prodln + "]' id='displayed_line_list_name" + prodln + "' style='word-wrap:break-word'></span></td>"+
"<td><span name='displayed_line_required_flag[" + prodln + "]' id='displayed_line_required_flag" + prodln + "'style='word-wrap:break-word'></span></td>"+
"<td><span name='displayed_line_can_edit_flag[" + prodln + "]' id='displayed_line_can_edit_flag" + prodln + "'style='word-wrap:break-word'></span></td>"+
//"<td><span name='displayed_line_on_diff_flag[" + prodln + "]' id='displayed_line_on_diff_flag" + prodln + "'></span></td>"+
//"<td><span name='displayed_line_asset_options[" + prodln + "]' id='displayed_line_asset_options" + prodln + "'></span></td>"+
//"<td><span name='displayed_line_lookup_type[" + prodln + "]' id='displayed_line_lookup_type" + prodln + "' style='word-wrap:break-word'></span></td>"+
"<td><span name='displayed_line_enabled_flag[" + prodln + "]' id='displayed_line_enabled_flag" + prodln + "'style='word-wrap:break-word'></span></td>"+
//"<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>"+
"<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln;
  x.style = "display:none";


  x.innerHTML  = "<td colSpan='"+columnNum1+"'>"+
  "<link rel='stylesheet' type='text/css' href='custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'>"+
  "<table border='0' class='lineEditor' width='100%' style='display:table'>"+

  "<tr>"+
  "<input name='line_id["+prodln+"]' id='line_id"+prodln+"' value='' type='hidden'>"+
  "<input name='line_dsp["+prodln+"]' id='line_dsp"+prodln+"' value='' type='hidden'>"+
  //"<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_TASK_TEMPLATE')+"<span class='required'>*</span></td>"+
  "<input name='line_template_name["+prodln+"]' id='line_template_name"+prodln+"' value='' type='hidden' >"+
  "<input name='line_hat_counting_task_templates_id_c["+prodln+"]' id='line_hat_counting_task_templates_id_c"+prodln+"' type='hidden' value=''>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_SORT_ORDER')+"<span class='required'>*</span></td>"+
  "<td><input name='line_sort_order["+prodln+"]' id='line_sort_order"+prodln+"' size='30' maxlength='255' type='text'></td>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_FIELD_LABLE')+"<span class='required'>*</span></td>"+
  "<td><input name='line_field_lable["+prodln+"]' id='line_field_lable"+prodln+"' size='30' maxlength='255' type='text'></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_TABLE_NAME')+"<span class='required'>*</span></td>"+
  "<td><select tabindex='116' name='line_table_names[" + prodln + "]' id='line_table_names" + prodln + "' onchange='setReadtype_table_names("+prodln+")'>" + line_table_name_option +"</select></td>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_COLUMN_NAME')+"<span class='required'>*</span></td>"+
  "<td><select tabindex='116' name='line_column_name[" + prodln + "]' id='line_column_name" + prodln + "'>" + line_column_name_option +"</select></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_FIELD_TYPE')+"<span class='required'>*</span></td>"+
  "<td><select tabindex='116' name='line_field_type[" + prodln + "]' id='line_field_type" + prodln + "' onchange='setReadtype_field_type("+prodln+")'>" + line_field_type_option +"</select></td>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_RELATE_MODULE')+"</td>"+
  "<td><select tabindex='116' name='line_relate_module[" + prodln + "]' id='line_relate_module" + prodln + "' disabled='disabled' onchange='get_module_dsp_list(this.value,"+prodln+")'>" + line_list_type_option +"</select></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_MODULE_DSP')+"</td>"+
  "<td><select tabindex='116' name='line_module_dsp[" + prodln + "]' id='line_module_dsp" + prodln + "' disabled='disabled' onchange='get_dsp_val(this.value,"+prodln+")'>" + module_dsp_list +"</select></td>"+
  //"<td><input name='line_module_dsp["+prodln+"]' id='line_module_dsp"+prodln+"' size='30' maxlength='255' type='text'></td>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_MODULE_FILTER')+"</td>"+
  "<td><textarea id='line_module_filter"+prodln+"' name='line_module_filter["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;' disabled='disabled'></textarea></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_VALUE_SET_NAME')+"</td>"+
  "<td><input name='line_valueset_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_valueset_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text' disabled='disabled'>"+
  "<input name='line_haa_valuesets_id_c["+prodln+"]' id='line_haa_valuesets_id_c"+prodln+"' type='hidden' value=''>"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn_value[" + prodln + "]' id='btn_value" + prodln + "' onclick='openValuePopup(" + prodln + ");' disabled='disabled'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' ></button>"+
  "<button type='button' name='btn_clr_valuename' id='btn_clr_valuename' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_valueset_name\", \"line_haa_valuesets_id_c\","+prodln+");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_LIST_NAME')+"</td>"+
  "<td><select tabindex='116' name='line_list_name[" + prodln + "]' id='line_list_name" + prodln + "' disabled='disabled'>" + line_app_list_string +"</select></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_REQUIRED_FLAG')+"<span class='required'>*</span></td>"+
  "<input type='hidden' name='line_required_flag["+prodln+"]' value='0'> "+
  "<td><input name='line_required_flag["+prodln+"]' id='line_required_flag"+prodln+"' title='' value='1' type='checkbox'></td>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_CAN_EDIT_FLAG')+"<span class='required'>*</span></td>"+
  "<input type='hidden' name='line_can_edit_flag["+prodln+"]' value='0'> "+
  "<td><input name='line_can_edit_flag["+prodln+"]' id='line_can_edit_flag"+prodln+"' title='' value='1' type='checkbox' checked></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_ON_DIFF_FLAG')+"</td>"+
  "<input type='hidden' name='line_on_diff_flag["+prodln+"]' value='0'> "+
  "<td><input name='line_on_diff_flag["+prodln+"]' id='line_on_diff_flag"+prodln+"' title='' value='1' type='checkbox' disabled='disabled'></td>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_ASSET_OPTIONS')+"</td>"+
  "<td><select tabindex='116' name='line_asset_options[" + prodln + "]' id='line_asset_options" + prodln + "' disabled='disabled'>" + line_asset_list_string +"</select></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_LOOKUP_TYPE')+"</td>"+
  "<td><input name='line_lookup_type["+prodln+"]' id='line_lookup_type"+prodln+"' size='30' maxlength='255' type='text'></td>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_ENABLED_FLAG')+"<span class='required'>*</span></td>"+
  "<input type='hidden' name='line_enabled_flag["+prodln+"]' value='0'> "+
  "<td><input name='line_enabled_flag["+prodln+"]' id='line_enabled_flag"+prodln+"' title='' value='1' type='checkbox' checked></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_DESCRIPTION')+"</td>"+
  "<td><textarea id='line_description"+prodln+"' name='line_description["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
  "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
  "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
  "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
  "</tr>"+
  "</table></td>";
  
  //addToValidate('EditView', 'line_hat_counting_policies_id_c'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_TASK_TEMPLATE'));
  addToValidate('EditView', 'line_sort_order'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_SORT_ORDER'));
  addToValidate('EditView', 'line_field_lable'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_FIELD_LABLE'));
  addToValidate('EditView', 'line_table_names'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_TABLE_NAME'));
  addToValidate('EditView', 'line_column_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_COLUMN_NAME'));
  addToValidate('EditView', 'line_field_type'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_FIELD_TYPE'));
  addToValidate('EditView', 'line_required_flag'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_REQUIRED_FLAG'));
  addToValidate('EditView', 'line_can_edit_flag'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_CAN_EDIT_FLAG'));
  addToValidate('EditView', 'line_enabled_flag'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_ENABLED_FLAG'));

  clr_value('#line_valueset_name','#line_haa_valuesets_id_c',prodln);

  renderLine(prodln);
  num=prodln;
  prodln++;
  return prodln - 1;
}

function renderLine(ln) { //将编辑器中的内容显示于正常行中
  $("#displayed_line_sort_order"+ln).html($("#line_sort_order"+ln).val());
  $("#displayed_line_field_lable"+ln).html($("#line_field_lable"+ln).val());
  $("#displayed_line_table_names"+ln).html($("#line_table_names"+ln).find("option:selected").html());
  $("#displayed_line_column_name"+ln).html($("#line_column_name"+ln).find("option:selected").html());
  $("#displayed_line_field_type"+ln).html($("#line_field_type"+ln).find("option:selected").html());
  $("#displayed_line_relate_module"+ln).html($("#line_relate_module"+ln).find("option:selected").html());
  $("#displayed_line_module_filter"+ln).html($("#line_module_filter"+ln).val());
  $("#displayed_line_valueset_name"+ln).html($("#line_valueset_name"+ln).val());
  $("#displayed_line_list_name"+ln).html($("#line_list_name"+ln).val());
  var flag=$("#line_required_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_required_flag"+ln).html(flag);
  var flag=$("#line_can_edit_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_can_edit_flag"+ln).html(flag);
  $("#displayed_line_lookup_type"+ln).html($("#line_lookup_type"+ln).val());
  var flag=$("#line_enabled_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_enabled_flag"+ln).html(flag);
  $("#displayed_line_description"+ln).html($("#line_description"+ln).val());
  $("#displayed_line_asset_options"+ln).html($("#line_asset_options"+ln).val());
  //$("#displayed_line_module_dsp"+ln).html($("#line_module_dsp"+ln).val());
  $("#displayed_line_module_dsp"+ln).html($("#line_module_dsp"+ln).find("option:selected").html());
  var flag=$("#line_on_diff_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_on_diff_flag"+ln).html(flag);

  $("#lineItems_tem tr td").each(function(){
    $(this).css('vertical-align','middle');
  });
}

function insertLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan=columnNum1;
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_BTN_ADD_LINE')+"' />";
}

function addNewLine(tableid) {
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertLineElements(tableid);//加入新行
    LineEditorShow(prodln-1);       //打开行编辑器
    setdefalttask(num);
    addoptions(num);

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
    //removeFromValidate('EditView','line_hat_counting_policies_id_c'+ ln);
    removeFromValidate('EditView','line_sort_order'+ ln);
    removeFromValidate('EditView','line_field_lable'+ ln);
    removeFromValidate('EditView','line_table_names'+ ln);
    removeFromValidate('EditView','line_column_name'+ ln);
    removeFromValidate('EditView','line_field_type'+ ln);
    removeFromValidate('EditView','line_required_flag'+ ln);
    removeFromValidate('EditView','line_can_edit_flag'+ ln);
    removeFromValidate('EditView','line_enabled_flag'+ ln);
    removeFromValidate('EditView','line_relate_module'+ ln);
    removeFromValidate('EditView','line_list_name'+ ln);
  }
  resetLineNum_Bold();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  validate(ln);
  var module_name=document.getElementById("line_relate_module"+ln).value;
    if(module_name){
      get_module_dsp_list(module_name,ln);
    }
  setReadtype_field_type(ln);
  setReadtype_table_names(ln);
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }
  $("#line_displayed"+ln).hide();
  $("#line_editor"+ln).show();

}

function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
    $("#line_editor"+ln).hide();
    $("#line_displayed"+ln).show();
    renderLine(ln);
    resetLineNum_Bold();

  }
}

function resetLineNum_Bold() {//数行号
  var j=0;
  for (var i=0;i<prodln;i++) {
    if ($("#line_deleted"+i).val()!=1) {//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
      j=j+1;
      $("#displayed_line_num" + i).text(j);
    }
  }
}

function validate(ln){

  //addToValidate('EditView', 'line_hat_counting_policies_id_c'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_TASK_TEMPLATE'));
  addToValidate('EditView', 'line_sort_order'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_SORT_ORDER'));
  addToValidate('EditView', 'line_field_lable'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_FIELD_LABLE'));
  addToValidate('EditView', 'line_table_names'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_TABLE_NAME'));
  addToValidate('EditView', 'line_column_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_COLUMN_NAME'));
  addToValidate('EditView', 'line_field_type'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_FIELD_TYPE'));
  addToValidate('EditView', 'line_required_flag'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_REQUIRED_FLAG'));
  addToValidate('EditView', 'line_can_edit_flag'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_CAN_EDIT_FLAG'));
  addToValidate('EditView', 'line_enabled_flag'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_ENABLED_FLAG'));
}

$("#LBL_EDITVIEW_PANEL1 tr").each(function(i){
  $(this).children().each(function(i){
    $(this).removeAttr('colspan');
    if(i==1)
      $(this).attr('width','87.5%');
  });
  if (i==1) {
    $("#line_items_span").parent().attr('colspan','2');
    $("#line_items_span").parent().attr('width','100%');
  }
});

function replace_display_lines(linesHtml,elementId) {
  var lineItems=document.getElementById(elementId);
  lineItems.innerHTML=linesHtml;
}

function setdefalttask(ln){
  var default_num =ln+1;
  document.getElementById("line_sort_order"+ln).value=default_num;
}

function setReadtype_field_type(ln){
  if(document.getElementById("line_field_type"+ln).value=='LOV'){
    document.getElementById("line_relate_module"+ln).disabled=false;
    document.getElementById("line_module_filter"+ln).disabled=false;
    document.getElementById("line_valueset_name"+ln).disabled=false;
    document.getElementById("line_module_dsp"+ln).disabled=false;
    document.getElementById("btn_value"+ln).disabled=false;
    document.getElementById("line_list_name"+ln).disabled=true;
    removeFromValidate('EditView','line_list_name'+ ln);
    addToValidate('EditView', 'line_relate_module'+ ln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_RELATE_MODULE'));
  }else if(document.getElementById("line_field_type"+ln).value=='LIST'){
    document.getElementById("line_list_name"+ln).disabled=false;
    addToValidate('EditView', 'line_list_name'+ ln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Template_Details', 'LBL_LIST_NAME'));
    document.getElementById("line_relate_module"+ln).disabled=true;
    document.getElementById("line_module_filter"+ln).disabled=true;
    document.getElementById("line_valueset_name"+ln).disabled=true;
    document.getElementById("btn_value"+ln).disabled=true;
    document.getElementById("line_module_dsp"+ln).disabled=true;
    removeFromValidate('EditView','line_relate_module'+ ln);
  }else{
    document.getElementById("line_relate_module"+ln).disabled=true;
    document.getElementById("line_module_filter"+ln).disabled=true;
    document.getElementById("line_list_name"+ln).disabled=true;
    document.getElementById("line_valueset_name"+ln).disabled=true;
    document.getElementById("line_module_dsp"+ln).disabled=true;
    document.getElementById("btn_value"+ln).disabled=true;
    removeFromValidate('EditView','line_relate_module'+ ln);
    removeFromValidate('EditView','line_list_name'+ ln);
  }
}

function addoptions(ln){
  var sel = document.getElementById("line_relate_module"+ln);
  var option = new Option(' ', '');      
  sel.options.add(option);

  sel.options[0].value = '';
  sel.options[0].text = ' ';
}

function clr_value(attr_name,attr_id,ln){
  var old_val="";
  $(attr_name+ln).click(function(){
    old_val=$(this).val();
  });
  $(attr_name+ln).blur(function(){
    var leave_val=$(this).val();
    if (leave_val!=old_val) {
      $(this).val("");
      var line_num=$(this).attr("id").replace(/[^0-9]/ig,"");
      $(attr_id+line_num).val("");
    }
  });
}

function openValuePopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setValueReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_haa_valuesets_id_c"+ln,
      "name" : "line_valueset_name" + ln,
    }
  };
  var frame='&valueset_type_advanced=F';
  open_popup('HAA_ValueSets', 800, 850, frame, true, true, popupRequestData);
}

function setValueReturn(popupReplyData){
  set_return(popupReplyData);
}

function setReadtype_table_names(ln){
  if(document.getElementById("line_table_names"+ln).value=='INV_TASK_DETAILS'){
    document.getElementById("line_asset_options"+ln).disabled=false;
    document.getElementById("line_on_diff_flag"+ln).disabled=true;
  }else if(document.getElementById("line_table_names"+ln).value=='INV_DETAIL_RESULTS'){
    document.getElementById("line_asset_options"+ln).disabled=true;
    document.getElementById("line_on_diff_flag"+ln).disabled=false;
  }
  else{
    document.getElementById("line_asset_options"+ln).disabled=true;
    document.getElementById("line_on_diff_flag"+ln).disabled=true;
  }
}

function setSelectChecked(selectId, checkValue){  
    var select = document.getElementById(selectId);

    for(var i=0; i<select.options.length; i++){  
        if(select.options[i].value == checkValue){
            select.options[i].selected = true;  
            break;  
        }  
    }  
};

function get_module_dsp_list(module,ln){
  $.ajax({
    url:'index.php?to_pdf=true&module=HAT_Counting_Task_Templates&action=get_module_dsp_list',
    data:'&module_name='+module,
    type:'POST',
    async:false,
    success:function(data){
      module_dsp_list=JSON.parse(data);
      var sel = document.getElementById("line_module_dsp"+ln);
      sel.options.length=0;
      for(var key in module_dsp_list){
        var option = new Option(module_dsp_list[key],key);      
       sel.options.add(option);
       var dsp=document.getElementById("line_dsp"+ln).value;
       //console.log(dsp);
       if(dsp){
        setSelectChecked(("line_module_dsp"+ln),dsp);
       }
     }

      //module_dsp_list=JSON.parse(data);
    }
  });
}
function get_dsp_val(value,ln){
  document.getElementById("line_dsp"+ln).value=value;
}