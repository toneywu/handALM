var prodln = 0;
var columnNum = 18;
var lineno;
var num=0;

if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  $("#line_items_label").remove();//隐藏SugarCRM字段

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Line_head';
  var a=x.insertCell(0);
  a.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_CYCLE_NUMBER');
/*  var b=x.insertCell(1);
b.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_ACTUAL_QUANTITY');*/
var c=x.insertCell(1);
c.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_ACTUAL_LOCATION');
var b1=x.insertCell(2);
b1.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_ACTUAL_ORANIZATION');
var d=x.insertCell(3);
d.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_ACTUAL_ASSET_STATUS');
var b=x.insertCell(4);
b.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_ACTUAL_ASSET_MAJOR');
var m=x.insertCell(5);
m.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_USER_PERSON');
var n=x.insertCell(6);
n.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_OWN_PERSON');
  /*var e=x.insertCell(5);
  e.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_QTY_DIFF_FLAG');*/
  var e=x.insertCell(7);
  e.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_LOCT_DIFF_FLAG');
  var g=x.insertCell(8);
  g.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_ORG_DIFF_FLAG');
  var h=x.insertCell(9);
  h.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_STATUS_DIFF_FLAG');
  var q=x.insertCell(10);
  q.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_MAJOR_DIFF_FLAG');
  var o=x.insertCell(11);
  o.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_USER_DIFF_FLAG');
  var p=x.insertCell(12);
  p.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_OWN_DIFF_FLAG');
  var i=x.insertCell(13);
  i.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_COUNTING_RESULT');
  var j=x.insertCell(14);
  j.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_ADJUST_NEEDED');
  var k=x.insertCell(15);
  k.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_ADJUST_METHOD');
  var l=x.insertCell(16);
  l.innerHTML=SUGAR.language.get('HAT_Counting_Results', 'LBL_ADJUST_STATUS');
  var f=x.insertCell(17);
  f.innerHTML='&nbsp;';
}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    ln = insertLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(line_data.id);
    $("#line_cycle_number".concat(String(ln))).val(line_data.cycle_number);
    $("#line_organization_name".concat(String(ln))).val(line_data.account_name);
    $("#line_account_id_c".concat(String(ln))).val(line_data.account_id_c);
    $("#line_code_name".concat(String(ln))).val(line_data.code_name);
    $("#line_haa_codes_id_c".concat(String(ln))).val(line_data.haa_codes_id_c);
    $("#line_actual_asset_status".concat(String(ln))).val(line_data.actual_asset_status);
/*    $("#line_actual_quantity".concat(String(ln))).val(line_data.actual_quantity);
*/    $("#line_location_name".concat(String(ln))).val(line_data.location_name);
$("#line_hat_asset_locations_id_c".concat(String(ln))).val(line_data.hat_asset_locations_id_c);
    /*$("#line_qty_diff_flag".concat(String(ln))).attr('checked',line_data.qty_diff_flag==1?true:false);
    $("#line_qty_diff_flag".concat(String(ln))).val(line_data.qty_diff_flag);*/
    $("#line_loct_diff_flag".concat(String(ln))).attr('checked',line_data.loct_diff_flag==1?true:false);
    $("#line_loct_diff_flag".concat(String(ln))).val(line_data.loct_diff_flag);
    $("#line_org_diff_flag".concat(String(ln))).attr('checked',line_data.org_diff_flag==1?true:false);
    $("#line_org_diff_flag".concat(String(ln))).val(line_data.org_diff_flag);
    $("#line_status_diff_flag".concat(String(ln))).attr('checked',line_data.status_diff_flag==1?true:false);
    $("#line_status_diff_flag".concat(String(ln))).val(line_data.status_diff_flag);
    $("#line_counting_result".concat(String(ln))).val(line_data.counting_result);
    $("#line_adjust_method".concat(String(ln))).val(line_data.adjust_method);
    $("#line_adjust_needed".concat(String(ln))).attr('checked',line_data.adjust_needed==1?true:false);
    $("#line_adjust_needed".concat(String(ln))).val(line_data.adjust_needed);
    $("#line_major_diff_flag".concat(String(ln))).attr('checked',line_data.major_diff_flag==1?true:false);
    $("#line_major_diff_flag".concat(String(ln))).val(line_data.major_diff_flag);
    $("#line_adjust_status".concat(String(ln))).val(line_data.adjust_status);
    $("#line_user_name".concat(String(ln))).val(line_data.user_name);
    $("#line_user_contacts_id_c".concat(String(ln))).val(line_data.user_contacts_id_c);
    $("#line_own_name".concat(String(ln))).val(line_data.own_name);
    $("#line_own_contacts_id_c".concat(String(ln))).val(line_data.own_contacts_id_c);
    $("#line_user_diff_flag".concat(String(ln))).attr('checked',line_data.user_diff_flag==1?true:false);
    $("#line_user_diff_flag".concat(String(ln))).val(line_data.user_diff_flag);
    $("#line_own_diff_flag".concat(String(ln))).attr('checked',line_data.own_diff_flag==1?true:false);
    $("#line_own_diff_flag".concat(String(ln))).val(line_data.own_diff_flag);
    
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

var line_act_type_option = document.getElementById("resactastidden").value;
var line_res_type_option = document.getElementById("rescountresidden").value;
var line_adj_type_option = document.getElementById("resadjmetidden").value;
var line_adj_stas_option = document.getElementById("resadjstaidden").value;

var z1 = tablebody.insertRow(-1);
z1.id = 'line_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td><span name='displayed_line_cycle_number[" + prodln + "]' id='displayed_line_cycle_number" + prodln + "'></span></td>" +
"<td><span name='displayed_line_location_name[" + prodln + "]' id='displayed_line_location_name" + prodln + "'></span></td>"+
"<td><span name='displayed_line_organization_name[" + prodln + "]' id='displayed_line_organization_name" + prodln + "'></span></td>"+
"<td><span name='displayed_line_actual_asset_status[" + prodln + "]' id='displayed_line_actual_asset_status" + prodln + "'></span></td>"+
/*"<td><span name='displayed_line_actual_quantity[" + prodln + "]' id='displayed_line_actual_quantity" + prodln + "'></span></td>"+*/
"<td><span name='displayed_line_code_name[" + prodln + "]' id='displayed_line_code_name" + prodln + "'></span></td>"+
"<td><span name='displayed_line_user_name[" + prodln + "]' id='displayed_line_user_name" + prodln + "'></span></td>"+
"<td><span name='displayed_line_own_name[" + prodln + "]' id='displayed_line_own_name" + prodln + "'></span></td>"+
/*"<td><span name='displayed_line_qty_diff_flag[" + prodln + "]' id='displayed_line_qty_diff_flag" + prodln + "'></span></td>"+*/
"<td><span name='displayed_line_loct_diff_flag[" + prodln + "]' id='displayed_line_loct_diff_flag" + prodln + "'></span></td>"+
"<td><span name='displayed_line_org_diff_flag[" + prodln + "]' id='displayed_line_org_diff_flag" + prodln + "'></span></td>"+
"<td><span name='displayed_line_status_diff_flag[" + prodln + "]' id='displayed_line_status_diff_flag" + prodln + "'></span></td>"+
"<td><span name='displayed_line_major_diff_flag[" + prodln + "]' id='displayed_line_major_diff_flag" + prodln + "'></span></td>"+
"<td><span name='displayed_line_user_diff_flag[" + prodln + "]' id='displayed_line_user_diff_flag" + prodln + "'></span></td>"+
"<td><span name='displayed_line_own_diff_flag[" + prodln + "]' id='displayed_line_own_diff_flag" + prodln + "'></span></td>"+
"<td><span name='displayed_line_counting_result[" + prodln + "]' id='displayed_line_counting_result" + prodln + "'></span></td>"+
"<td><span name='displayed_line_adjust_needed[" + prodln + "]' id='displayed_line_adjust_needed" + prodln + "'></span></td>"+
"<td><span name='displayed_line_adjust_method[" + prodln + "]' id='displayed_line_adjust_method" + prodln + "'></span></td>"+
"<td><span name='displayed_line_adjust_status[" + prodln + "]' id='displayed_line_adjust_status" + prodln + "'></span></td>"+
"<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln;
 // x.style = "display:none";

 x.innerHTML  = "<td colSpan='"+columnNum+"'>"+
 "<link rel='stylesheet' type='text/css' href='custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'>"+
 "<table border='0' class='lineEditor' width='100%'>"+
 "<tr>"+
 "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_CYCLE_NUMBER')+"<span class='required'>*</span></td>"+
 "<td><input id='line_cycle_number"+prodln+"' name='line_cycle_number["+prodln+"]'  type='text' value=''></td>"+
 "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ACTUAL_ORANIZATION')+"</td>"+
 "<td><input name='line_organization_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_organization_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
 "<input name='line_account_id_c["+prodln+"]' id='line_account_id_c"+prodln+"' type='hidden' value=''>"+
 "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOrgPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
 "<button type='button' name='btn_clr_orgname' id='btn_clr_orgname' tabindex='0' title='清除选择' class='button lastChild' onclick='setorgval(this.form, \"line_organization_name\", \"line_account_id_c\","+prodln+");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+
 "</td>"+
 "</tr>"+
 "<tr>"+
 "<input name='line_id["+prodln+"]' id='line_id"+prodln+"' value='' type='hidden'>"+
 "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ACTUAL_LOCATION')+"</td>"+
 "<td><input name='line_location_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_location_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
 "<input name='line_hat_asset_locations_id_c["+prodln+"]' id='line_hat_asset_locations_id_c"+prodln+"' type='hidden' value=''>"+
 "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openLocPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
 "<button type='button' name='btn_clr_locname' id='btn_clr_locname' tabindex='0' title='清除选择' class='button lastChild' onclick='setlocval(this.form, \"line_location_name\", \"line_hat_asset_locations_id_c\","+prodln+");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+
 "</td>"+
 "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ACTUAL_ASSET_STATUS')+"</td>"+
 "<td><select tabindex='116' name='line_actual_asset_status[" + prodln + "]' id='line_actual_asset_status" + prodln + "' onchange='setdefaultsta("+prodln+")'>" + line_act_type_option +" </select></td>"+
 "</tr>"+
 "<tr>"+
 "<tr>"+
 "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ACTUAL_ASSET_MAJOR')+"</td>"+
 "<td><input name='line_code_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_code_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
 "<input name='line_haa_codes_id_c["+prodln+"]' id='line_haa_codes_id_c"+prodln+"' type='hidden' value=''>"+
 "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openCodePopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
 "<button type='button' name='btn_clr_codename' id='btn_clr_codename' tabindex='0' title='清除选择' class='button lastChild' onclick='setcodeval(this.form, \"line_code_name\", \"line_haa_codes_id_c\","+prodln+");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+
 "</td>"+
 "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_USER_PERSON')+"</td>"+
 "<td><input name='line_user_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_user_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
 "<input name='line_user_contacts_id_c["+prodln+"]' id='line_user_contacts_id_c"+prodln+"' type='hidden' value=''>"+
 "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openUserPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
 "<button type='button' name='btn_clr_username' id='btn_clr_username' tabindex='0' title='清除选择' class='button lastChild' onclick='setuserval(this.form, \"line_user_name\", \"line_user_contacts_id_c\","+prodln+");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+
 "</td>"+
    /*"<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_QTY_DIFF_FLAG')+"</td>"+
    "<input type='hidden' name='line_qty_diff_flag["+prodln+"]' value='0'> "+
    "<td><input name='line_qty_diff_flag["+prodln+"]' id='line_qty_diff_flag"+prodln+"' title='' value='1' type='checkbox' ></td>"+*/
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_OWN_PERSON')+"</td>"+
    "<td><input name='line_own_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_own_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_own_contacts_id_c["+prodln+"]' id='line_own_contacts_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOwnPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_ownname' id='btn_clr_ownname' tabindex='0' title='清除选择' class='button lastChild' onclick='setownval(this.form, \"line_own_name\", \"line_own_contacts_id_c\","+prodln+");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+
    "</td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_LOCT_DIFF_FLAG')+"</td>"+
    "<input type='hidden' name='line_loct_diff_flag["+prodln+"]' value='0'> "+
    "<td><input name='line_loct_diff_flag["+prodln+"]' id='line_loct_diff_flag"+prodln+"' title='' value='1' type='checkbox' onclick='return false'></td>"+
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ORG_DIFF_FLAG')+"</td>"+
    "<input type='hidden' name='line_org_diff_flag["+prodln+"]' value='0'> "+
    "<td><input name='line_org_diff_flag["+prodln+"]' id='line_org_diff_flag"+prodln+"' title='' value='1' type='checkbox' onclick='return false'></td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_STATUS_DIFF_FLAG')+"</td>"+
    "<input type='hidden' name='line_status_diff_flag["+prodln+"]' value='0'> "+
    "<td><input name='line_status_diff_flag["+prodln+"]' id='line_status_diff_flag"+prodln+"' title='' value='1' type='checkbox' onclick='return false'></td>"+  
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_MAJOR_DIFF_FLAG')+"</td>"+
    "<input type='hidden' name='line_major_diff_flag["+prodln+"]' value='0'> "+
    "<td><input name='line_major_diff_flag["+prodln+"]' id='line_major_diff_flag"+prodln+"' title='' value='1' type='checkbox' onclick='return false'></td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_USER_DIFF_FLAG')+"</td>"+
    "<input type='hidden' name='line_user_diff_flag["+prodln+"]' value='0'> "+
    "<td><input name='line_user_diff_flag["+prodln+"]' id='line_user_diff_flag"+prodln+"' title='' value='1' type='checkbox' onclick='return false'></td>"+
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_OWN_DIFF_FLAG')+"</td>"+
    "<input type='hidden' name='line_own_diff_flag["+prodln+"]' value='0'> "+
    "<td><input name='line_own_diff_flag["+prodln+"]' id='line_own_diff_flag"+prodln+"' title='' value='1' type='checkbox' onclick='return false'></td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_COUNTING_RESULT')+"</td>"+
    "<td><select tabindex='116' name='line_counting_result[" + prodln + "]' id='line_counting_result" + prodln + "' onchange='setadjustneed("+prodln+")'>" + line_res_type_option +"</select></td>"+
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ADJUST_NEEDED')+"</td>"+
    "<input type='hidden' name='line_adjust_needed["+prodln+"]' value='0'> "+
    "<td><input name='line_adjust_needed["+prodln+"]' id='line_adjust_needed"+prodln+"' title='' value='1' type='checkbox' ></td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ADJUST_METHOD')+"</td>"+
    "<td><select tabindex='116' name='line_adjust_method[" + prodln + "]' id='line_adjust_method" + prodln + "'>" + line_adj_type_option +"</select></td>"+   
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ADJUST_STATUS')+"</td>"+
    "<td><select tabindex='116' name='line_adjust_status[" + prodln + "]' id='line_adjust_status" + prodln + "'>" + line_adj_stas_option +"</select></td>"+
    "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
    "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
    "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
    "</tr>"+
    "</table></td>";
    // console.log(x.innerHTML);
    //addToValidate('EditView', 'line_cycle_number'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Results', 'LBL_CYCLE_NUMBER'));

    clr_value('#line_organization_name','#line_account_id_c',prodln);
    clr_value('#line_location_name','#line_hat_asset_locations_id_c',prodln);
    clr_value('#line_code_name','#line_haa_codes_id_c',prodln);
    clr_value('#line_user_name','#line_user_contacts_id_c',prodln);
    clr_value('#line_own_name','#line_own_contacts_id_c',prodln);
    num=prodln;
    renderLine(prodln);
    prodln++;
    return prodln - 1;
  }

function renderLine(ln) { //将编辑器中的内容显示于正常行中
  $("#displayed_line_cycle_number"+ln).html($("#line_cycle_number"+ln).val());
  $("#displayed_line_organization_name"+ln).html($("#line_organization_name"+ln).val());
  $("#displayed_line_actual_asset_status"+ln).html($("#line_actual_asset_status"+ln).find("option:selected").html());
  $("#displayed_line_actual_quantity"+ln).html($("#line_actual_quantity"+ln).val());
  $("#displayed_line_location_name"+ln).html($("#line_location_name"+ln).val());
  $("#displayed_line_code_name"+ln).html($("#line_code_name"+ln).val());
  $("#displayed_line_user_name"+ln).html($("#line_user_name"+ln).val());
  $("#displayed_line_own_name"+ln).html($("#line_own_name"+ln).val());
  var flag=$("#line_qty_diff_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_qty_diff_flag"+ln).html(flag);
  var flag=$("#line_loct_diff_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_loct_diff_flag"+ln).html(flag);
  var flag=$("#line_org_diff_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_org_diff_flag"+ln).html(flag);
  var flag=$("#line_status_diff_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_status_diff_flag"+ln).html(flag);
  var flag=$("#line_major_diff_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_major_diff_flag"+ln).html(flag);
  var flag=$("#line_user_diff_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_user_diff_flag"+ln).html(flag);
  var flag=$("#line_own_diff_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_own_diff_flag"+ln).html(flag);
  $("#displayed_line_counting_result"+ln).html($("#line_counting_result"+ln).find("option:selected").html());
  $("#displayed_line_adjust_method"+ln).html($("#line_adjust_method"+ln).find("option:selected").html());
  $("#displayed_line_adjust_status"+ln).html($("#line_adjust_status"+ln).find("option:selected").html());
  var flag=$("#line_adjust_needed"+ln).is(':checked')?"是":"否";
  $("#displayed_line_adjust_needed"+ln).html(flag);

  $("#lineItems tr td").each(function(){
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
  footer_cell.colSpan=columnNum;
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAT_Counting_Results', 'LBL_BTN_ADD_LINE')+"' />";
}

function addNewLine(tableid) {
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增

  insertLineElements(tableid);//加入新行
    LineEditorShow(prodln-1);       //打开行编辑器 
    setdefaultnum(num);  
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

/*  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView','line_cycle_number'+ ln);
  }*/
  resetLineNum_Bold();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  //validate(ln);
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }
  $("#line_displayed"+ln).hide();
  $("#line_editor"+ln).show();

}

function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
 // if (check_form('EditView')) {
  $("#line_editor"+ln).hide();
  $("#line_displayed"+ln).show();
  renderLine(ln);
  resetLineNum_Bold();
  
  //}
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

function openOrgPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setOrgReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_account_id_c"+ln,
      "name" : "line_organization_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  var frame='&frame_c_advanced='+$("#line_framework").val();
  open_popup('Accounts', 800, 850,frame, true, true, popupRequestData);
  
}

function setOrgReturn(popupReplyData){
  set_return(popupReplyData);
  setdefaultorg(lineno);
}

function openLocPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setLocReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_hat_asset_locations_id_c"+ln,
      "name" : "line_location_name" + ln,
    }
  };
  //var contact='&code_type_advanced=asset_counting_obj_type';
  var frame='&frame_c_advanced='+$("#line_framework").val();
  open_popup('HAT_Asset_Locations', 800, 850,frame, true, true, popupRequestData);
}

function setLocReturn(popupReplyData){
  set_return(popupReplyData);
  setdefaultloc(lineno);
}

function openCodePopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setCodeReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_haa_codes_id_c"+ln,
      "name" : "line_code_name" + ln,
    }
  };
  //var contact='&code_type_advanced=asset_counting_obj_type';
  var frame='&code_type_advanced=asset_counting_major_type&frame_c_advanced='+$("#line_framework").val();
  open_popup('HAA_Codes', 800, 850, frame, true, true, popupRequestData);
}

function setCodeReturn(popupReplyData){
  set_return(popupReplyData);
  setdefaultcode(lineno);
}

function openUserPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setUserReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_user_contacts_id_c"+ln,
      "name" : "line_user_name" + ln,
    }
  };
  open_popup('Contacts', 800, 850, '', true, true, popupRequestData);
}

function setUserReturn(popupReplyData){
  set_return(popupReplyData);
  setdefaultuser(lineno);
}

function openOwnPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setOwnReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_own_contacts_id_c"+ln,
      "name" : "line_own_name" + ln,
    }
  };
  open_popup('Contacts', 800, 850, '', true, true, popupRequestData);
}

function setOwnReturn(popupReplyData){
  set_return(popupReplyData);
  setdefaultown(lineno);
}



function validate(ln){

  addToValidate('EditView', 'line_cycle_number'+ ln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Results', 'LBL_CYCLE_NUMBER'));
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
      if(attr_name=='#line_organization_name'){
        setdefaultorg(ln);
      }
      if(attr_name=='#line_location_name'){
        setdefaultloc(ln);
      }
      if(attr_name=='#line_code_name'){
        setdefaultcode(ln);
      }
      if(attr_name=='#line_user_name'){
        setdefaultuser(ln);
      }
      if(attr_name=='#line_own_name'){
        setdefaultown(ln);
      }
    }
  });
}

function setdefaultqty(ln){
  var h_qty =$("#snapshot_quantity").val();
  if(h_qty != $('#line_actual_quantity'+ln).val()){
    document.getElementById("line_qty_diff_flag"+ln).checked=true;
    $('#line_qty_diff_flag'+ln).val('1');
    
  }else{
    document.getElementById("line_qty_diff_flag"+ln).checked=false;
    $('#line_qty_diff_flag'+ln).val('0');
  }
  setcountingres(ln,'#line_qty_diff_flag');
}

function setdefaultloc(ln){
  var h_loc =$("#hat_asset_locations_id_c").val();
  if(h_loc != $('#line_hat_asset_locations_id_c'+ln).val()){
    document.getElementById("line_loct_diff_flag"+ln).checked=true;
    $('#line_loct_diff_flag'+ln).val('1');

  }else{
    document.getElementById("line_loct_diff_flag"+ln).checked=false;
    $('#line_loct_diff_flag'+ln).val('0');
  }
  
  setcountingres(ln,'#line_loct_diff_flag');
}

function setdefaultuser(ln){
  var h_loc =$("#user_contacts_id_c").val();
  if(h_loc != $('#line_user_contacts_id_c'+ln).val()){
    document.getElementById("line_user_diff_flag"+ln).checked=true;
    $('#line_user_diff_flag'+ln).val('1');

  }else{
    document.getElementById("line_user_diff_flag"+ln).checked=false;
    $('#line_user_diff_flag'+ln).val('0');
  }
  
  setcountingres(ln,'#line_user_diff_flag');
}

function setdefaultown(ln){
  var h_loc =$("#own_contacts_id_c").val();
  if(h_loc != $('#line_own_contacts_id_c'+ln).val()){
    document.getElementById("line_own_diff_flag"+ln).checked=true;
    $('#line_own_diff_flag'+ln).val('1');

  }else{
    document.getElementById("line_own_diff_flag"+ln).checked=false;
    $('#line_own_diff_flag'+ln).val('0');
  }
  
  setcountingres(ln,'#line_own_diff_flag');
}

function setdefaultcode(ln){
  var h_loc =$("#haa_codes_id_c").val();
  if(h_loc != $('#line_haa_codes_id_c'+ln).val()){
    document.getElementById("line_major_diff_flag"+ln).checked=true;
    $('#line_major_diff_flag'+ln).val('1');
    
  }else{
    document.getElementById("line_major_diff_flag"+ln).checked=false;
    $('#line_major_diff_flag'+ln).val('0');
  }
  setcountingres(ln,'#line_major_diff_flag');
}

function setdefaultorg(ln){
  var h_org =$("#account_id_c").val();
  if(h_org != $('#line_account_id_c'+ln).val()){
    document.getElementById("line_org_diff_flag"+ln).checked=true;
    $('#line_org_diff_flag'+ln).val('1');
    
  }else{
    document.getElementById("line_org_diff_flag"+ln).checked=false;
    $('#line_org_diff_flag'+ln).val('0');
  }
  setcountingres(ln,'#line_org_diff_flag');
}

function setdefaultsta(ln){
  var h_sta =$("#asset_status").val();
  if(h_sta != $('#line_actual_asset_status'+ln).find('option:selected').val()){
    document.getElementById("line_status_diff_flag"+ln).checked=true;
    $('#line_status_diff_flag'+ln).val('1');
  }else{
    document.getElementById("line_status_diff_flag"+ln).checked=false;
    $('#line_status_diff_flag'+ln).val('0');
  }
  setcountingres(ln,'#line_status_diff_flag');
}

function setcountingres(ln,field_name){
  if( $(field_name+ln).is(':checked')){
    document.getElementById("line_counting_result"+ln).value="Different";
  }else if(!$('#line_loct_diff_flag'+ln).is(':checked') &&
    !$('#line_org_diff_flag'+ln).is(':checked') &&
    !$('#line_status_diff_flag'+ln).is(':checked') &&
    !$('#line_major_diff_flag'+ln).is(':checked')&&
    !$('#line_user_diff_flag'+ln).is(':checked') &&
    !$('#line_own_diff_flag'+ln).is(':checked')){
    document.getElementById("line_counting_result"+ln).value="Matched";
  }
  setadjustneed(ln);
}

function setadjustneed(ln){
  if($('#line_counting_result'+ln).find('option:selected').val()!='Matched'){
    document.getElementById("line_adjust_needed"+ln).checked=true;
    $('#line_adjust_needed'+ln).val('1');
  }else{
    document.getElementById("line_adjust_needed"+ln).checked=false;
    $('#line_adjust_needed'+ln).val('0');
  }
}

function setdefaultnum(ln){
  var default_num =ln+1;
  document.getElementById("line_cycle_number"+ln).value=default_num;
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

function setlocval(form,name,id,ln){
  SUGAR.clearRelateField(form,name+ln,id+ln);
  setdefaultloc(ln);
}

function setorgval(form,name,id,ln){
  SUGAR.clearRelateField(form,name+ln,id+ln);
  setdefaultorg(ln);
}

function setcodeval(form,name,id,ln){
  SUGAR.clearRelateField(form,name+ln,id+ln);
  setdefaultcode(ln);
}

function setuserval(form,name,id,ln){
  SUGAR.clearRelateField(form,name+ln,id+ln);
  setdefaultuser(ln);
}

function setownval(form,name,id,ln){
  SUGAR.clearRelateField(form,name+ln,id+ln);
  setdefaultown(ln);
}