var prodln = 0;
var columnNum = 15;
var lineno;
var num;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  $("#line_items_span").parent().prev().hide();//隐藏SugarCRM字段

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  tablehead.style="background:white;";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Line_head';
  /*var a=x.insertCell(0);
  a.width="23%";
  a.align="center";
  a.innerHTML=''+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_BATCH_RULE')+'';
  a.innerHTML+="<p><span>&nbsp;"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_ORG_SPLIT_FLAG')+"&nbsp;</span>"+
  "<span>&nbsp;"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_LOC_SPLIT_FLAG')+"&nbsp;</span>"+
  "<span>&nbsp;"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_MAJOR_SPLIT_FLAG')+"&nbsp;</span>"+
  "<span>&nbsp;"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_CATEGORY_SPLIT_FLAG')+"&nbsp;</span>"+
  "<span>&nbsp;"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_USER_PERSON_SPLIT_FLAG')+"&nbsp;</span>"+
  "<span>&nbsp;"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_OWN_PERSON_SPLIT_FLAG')+"&nbsp;</span>"+
  "</p>";*/

  var d=x.insertCell(0);
  d.style="height: 40px;line-height: 40px";
  d.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_LOCATION');
  var e=x.insertCell(1);
  e.style="height: 40px;line-height: 40px";
  e.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_LOCATION_DRILLDOWN');
  var g=x.insertCell(2);
  g.style="height: 40px;line-height: 40px";
  g.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_ORANIZATION');
  var h=x.insertCell(3);
  h.style="height: 40px;line-height: 40px";
  h.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_ORG_DRILLDOWN');
  var g1=x.insertCell(4);
  g1.style="height: 40px;line-height: 40px";
  g1.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_USING_ORGANIZATION');
  var h1=x.insertCell(5);
  h1.style="height: 40px;line-height: 40px";
  h1.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_USING_ORG_DRILLDOWN');
  var i=x.insertCell(6);
  i.style="height: 40px;line-height: 40px";
  i.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_MAJOR');
  var j=x.insertCell(7);
  j.style="height: 40px;line-height: 40px";
  j.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_MAJOR_DRILLDOWN');
  var k=x.insertCell(8);
  k.style="height: 40px;line-height: 40px";
  k.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_CATEGORY');
  var l=x.insertCell(9);
  l.style="height: 40px;line-height: 40px";
  l.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_CATEGORY_DRILLDOWN');
  var m=x.insertCell(10);
  m.style="height: 40px;line-height: 40px";
  m.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_USER_PERSON');
  var i=x.insertCell(11);
  i.style="height: 40px;line-height: 40px";
  i.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_OWN_PERSON');
  var n1=x.insertCell(12);
  n1.style="height: 40px;line-height: 40px";
  n1.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_COUNTING_POLICY_GROUPS');
  var n=x.insertCell(13);
  n.style="height: 40px;line-height: 40px";
  n.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_COUNTING_POLICIES');
  /*
  var j=x.insertCell(11);
  j.style="height: 40px;line-height: 40px";
  j.innerHTML=SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_COUNTING_RULE');*/
  var f=x.insertCell(14);
  f.innerHTML='&nbsp;';
}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    ln = insertLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(line_data.id);
    /*$("#line_user_person_split_flag".concat(String(ln))).attr('checked',line_data.user_person_split_flag==1?true:false);
    $("#line_user_person_split_flag".concat(String(ln))).val(line_data.user_person_split_flag);
    $("#line_own_person_split_flag".concat(String(ln))).attr('checked',line_data.own_person_split_flag==1?true:false);
    $("#line_own_person_split_flag".concat(String(ln))).val(line_data.own_person_split_flag);
    $("#line_org_split_flag".concat(String(ln))).attr('checked',line_data.org_split_flag==1?true:false);
    $("#line_org_split_flag".concat(String(ln))).val(line_data.org_split_flag);
    $("#line_loc_split_flag".concat(String(ln))).attr('checked',line_data.loc_split_flag==1?true:false);
    $("#line_loc_split_flag".concat(String(ln))).val(line_data.loc_split_flag);
    $("#line_major_split_flag".concat(String(ln))).attr('checked',line_data.major_split_flag==1?true:false);
    $("#line_major_split_flag".concat(String(ln))).val(line_data.major_split_flag);
    $("#line_category_split_flag".concat(String(ln))).attr('checked',line_data.category_split_flag==1?true:false);
    $("#line_category_split_flag".concat(String(ln))).val(line_data.category_split_flag);*/
    $("#line_location_name".concat(String(ln))).val(line_data.location_name);
    $("#line_hat_asset_locations_id_c".concat(String(ln))).val(line_data.hat_asset_locations_id_c);
    $("#line_user_name".concat(String(ln))).val(line_data.user_name);
    $("#line_user_contacts_id_c".concat(String(ln))).val(line_data.user_contacts_id_c);
    $("#line_own_name".concat(String(ln))).val(line_data.own_name);
    $("#line_own_contacts_id_c".concat(String(ln))).val(line_data.own_contacts_id_c);
    $("#line_using_org_name".concat(String(ln))).val(line_data.using_org_name);
    $("#line_account_id_c1".concat(String(ln))).val(line_data.account_id_c1);
    $("#line_account_name".concat(String(ln))).val(line_data.account_name);
    $("#line_account_id_c".concat(String(ln))).val(line_data.account_id_c);
    $("#line_code_name".concat(String(ln))).val(line_data.code_name);
    $("#line_haa_codes_id_c".concat(String(ln))).val(line_data.haa_codes_id_c);
    $("#line_category_name".concat(String(ln))).val(line_data.category_name);
    $("#line_aos_product_categories_id_c".concat(String(ln))).val(line_data.aos_product_categories_id_c);
    $("#line_location_drilldown".concat(String(ln))).attr('checked',line_data.location_drilldown==1?true:false);
    $("#line_location_drilldown".concat(String(ln))).val(line_data.location_drilldown);
    $("#line_org_drilldown".concat(String(ln))).attr('checked',line_data.org_drilldown==1?true:false);
    $("#line_org_drilldown".concat(String(ln))).val(line_data.org_drilldown);
    $("#line_using_org_drilldown".concat(String(ln))).attr('checked',line_data.using_org_drilldown==1?true:false);
    $("#line_using_org_drilldown".concat(String(ln))).val(line_data.using_org_drilldown);
    $("#line_major_drilldown".concat(String(ln))).attr('checked',line_data.major_drilldown==1?true:false);
    $("#line_major_drilldown".concat(String(ln))).val(line_data.major_drilldown);
    $("#line_category_drilldown".concat(String(ln))).attr('checked',line_data.category_drilldown==1?true:false);
    $("#line_category_drilldown".concat(String(ln))).val(line_data.category_drilldown);
    $("#line_policy_name".concat(String(ln))).val(line_data.policy_name);
    $("#line_hat_counting_policies_id_c".concat(String(ln))).val(line_data.hat_counting_policies_id_c);
    $("#line_policy_group_name".concat(String(ln))).val(line_data.policy_group_name);
    $("#line_hat_counting_policy_groups_id_c".concat(String(ln))).val(line_data.hat_counting_policy_groups_id_c);
   /* $("#line_rule_name".concat(String(ln))).val(line_data.rule_name);
   $("#line_hat_counting_rules_id_c".concat(String(ln))).val(line_data.hat_counting_rules_id_c);*/

   renderLine(ln);
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

var z1 = tablebody.insertRow(-1);
z1.id = 'line_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
// "<td><span name='displayed_line_org_split_flag[" + prodln + "]' id='displayed_line_org_split_flag" + prodln + "'></span></td>" +
// "<td><span name='displayed_line_loc_split_flag[" + prodln + "]' id='displayed_line_loc_split_flag" + prodln + "'></span></td>" +
// "<td><span name='displayed_line_major_split_flag[" + prodln + "]' id='displayed_line_major_split_flag" + prodln + "'></span></td>" +
// "<td><span name='displayed_line_category_split_flag[" + prodln + "]' id='displayed_line_category_split_flag" + prodln + "'></span></td>" +
/*"<td align='center'><span name='displayed_line_org_split_flag[" + prodln + "]' id='displayed_line_org_split_flag" + prodln + "' style='width:40px;text-align:center;display:block;float:left;'></span>"+
"<span name='displayed_line_loc_split_flag[" + prodln + "]' id='displayed_line_loc_split_flag" + prodln + "' style='width:35px;text-align:center;display:block;float:left;'></span>"+
"<span name='displayed_line_major_split_flag[" + prodln + "]' id='displayed_line_major_split_flag" + prodln + "' style='width:35px;text-align:center;display:block;float:left;'></span>"+
"<span name='displayed_line_category_split_flag[" + prodln + "]' id='displayed_line_category_split_flag" + prodln + "' style='width:35px;text-align:center;display:block;float:left;'></span>"+
"<span name='displayed_line_user_person_split_flag[" + prodln + "]' id='displayed_line_user_person_split_flag" + prodln + "' style='width:35px;text-align:center;display:block;float:left;'></span>"+
"<span name='displayed_line_own_person_split_flag[" + prodln + "]' id='displayed_line_own_person_split_flag" + prodln + "' style='width:35px;text-align:center;display:block;float:left;'></span>"+
"</td>"+*/
"<td><span name='displayed_line_location_name[" + prodln + "]' id='displayed_line_location_name" + prodln + "'></span></td>" +
"<td><span name='displayed_line_location_drilldown[" + prodln + "]' id='displayed_line_location_drilldown" + prodln + "'></span></td>"+
"<td><span name='displayed_line_account_name[" + prodln + "]' id='displayed_line_account_name" + prodln + "'></span></td>" +
"<td><span name='displayed_line_org_drilldown[" + prodln + "]' id='displayed_line_org_drilldown" + prodln + "'></span></td>"+
"<td><span name='displayed_line_using_org_name[" + prodln + "]' id='displayed_line_using_org_name" + prodln + "'></span></td>" +
"<td><span name='displayed_line_using_org_drilldown[" + prodln + "]' id='displayed_line_using_org_drilldown" + prodln + "'></span></td>"+
"<td><span name='displayed_line_code_name[" + prodln + "]' id='displayed_line_code_name" + prodln + "'></span></td>" +
"<td><span name='displayed_line_major_drilldown[" + prodln + "]' id='displayed_line_major_drilldown" + prodln + "'></span></td>"+
"<td><span name='displayed_line_category_name[" + prodln + "]' id='displayed_line_category_name" + prodln + "'></span></td>" +
"<td><span name='displayed_line_category_drilldown[" + prodln + "]' id='displayed_line_category_drilldown" + prodln + "'></span></td>"+
"<td><span name='displayed_line_user_name[" + prodln + "]' id='displayed_line_user_name" + prodln + "'></span></td>"+
"<td><span name='displayed_line_own_name[" + prodln + "]' id='displayed_line_own_name" + prodln + "'></span></td>"+
"<td><span name='displayed_line_policy_group_name[" + prodln + "]' id='displayed_line_policy_group_name" + prodln + "'></span></td>"+
"<td><span name='displayed_line_policy_name[" + prodln + "]' id='displayed_line_policy_name" + prodln + "'></span></td>"+
/*"<td><span name='displayed_line_rule_name[" + prodln + "]' id='displayed_line_rule_name" + prodln + "'></span></td>"+*/
"<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln;
  x.style = "display:none";



  x.innerHTML  = "<td colSpan='"+columnNum+"'><table id='rule' width='100%' style='display:table'>"+
  "<tr>"+
  "<input name='line_id["+prodln+"]' id='line_id"+prodln+"' value='' type='hidden'>"+
  "<td>"+
   /* "<span>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_ORG_SPLIT_FLAG')+
    "<input type='hidden' name='line_org_split_flag["+prodln+"]' value='0'>"+
    "<input name='line_org_split_flag["+prodln+"]' id='line_org_split_flag"+prodln+"' title='' value='1' type='checkbox'></span>&nbsp;&nbsp;&nbsp;"+
    "<span>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_LOC_SPLIT_FLAG')+
    "<input type='hidden' name='line_loc_split_flag["+prodln+"]' value='0'>"+
    "<input name='line_loc_split_flag["+prodln+"]' id='line_loc_split_flag"+prodln+"' title='' value='1' type='checkbox'></span>&nbsp;&nbsp;&nbsp;"+
    "<span>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_MAJOR_SPLIT_FLAG')+
    "<input type='hidden' name='line_major_split_flag["+prodln+"]' value='0'>"+
    "<input name='line_major_split_flag["+prodln+"]' id='line_major_split_flag"+prodln+"' title='' value='1' type='checkbox'></span>&nbsp;&nbsp;&nbsp;"+
    "<span>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_CATEGORY_SPLIT_FLAG')+
    "<input type='hidden' name='line_category_split_flag["+prodln+"]' value='0'>"+
    "<input name='line_category_split_flag["+prodln+"]' id='line_category_split_flag"+prodln+"' title='' value='1' type='checkbox'></span>&nbsp;&nbsp;&nbsp;"+
    "<span>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_USER_PERSON_SPLIT_FLAG')+
    "<input type='hidden' name='line_user_person_split_flag["+prodln+"]' value='0'>"+
    "<input name='line_user_person_split_flag["+prodln+"]' id='line_user_person_split_flag"+prodln+"' title='' value='1' type='checkbox'></span>&nbsp;&nbsp;&nbsp;"+
    "<span>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_OWN_PERSON_SPLIT_FLAG')+
    "<input type='hidden' name='line_own_person_split_flag["+prodln+"]' value='0'>"+
    "<input name='line_own_person_split_flag["+prodln+"]' id='line_own_person_split_flag"+prodln+"' title='' value='1' type='checkbox'></span>"+*/
    "</td>"+
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_LOCATION')+"</td>"+
    "<td><input name='line_location_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_location_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_hat_asset_locations_id_c["+prodln+"]' id='line_hat_asset_locations_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openLocPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_locname' id='btn_clr_locname' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_location_name"+prodln+"\", \"line_hat_asset_locations_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_LOCATION_DRILLDOWN')+"</td>"+
    "<input type='hidden' name='line_location_drilldown["+prodln+"]' value='0'> "+
    "<td><input name='line_location_drilldown["+prodln+"]' id='line_location_drilldown"+prodln+"' title='' value='1' type='checkbox'></td>"+
    "</td>"+
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_ORANIZATION')+"</td>"+
    "<td><input name='line_account_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_account_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_account_id_c["+prodln+"]' id='line_account_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOrgPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_orgname' id='btn_clr_orgname' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_account_name"+prodln+"\", \"line_account_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_ORG_DRILLDOWN')+"</td>"+
    "<input type='hidden' name='line_org_drilldown["+prodln+"]' value='0'> "+
    "<td><input name='line_org_drilldown["+prodln+"]' id='line_org_drilldown"+prodln+"' title='' value='1' type='checkbox' ></td>"+
    "</td>"+
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_USING_ORGANIZATION')+"</td>"+
    "<td><input name='line_using_org_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_using_org_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_account_id_c1["+prodln+"]' id='line_account_id_c1"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openUsingOrgPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_usingorgname' id='btn_clr_usingorgname' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_using_org_name"+prodln+"\", \"line_account_id_c1"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_USING_ORG_DRILLDOWN')+"</td>"+
    "<input type='hidden' name='line_using_org_drilldown["+prodln+"]' value='0'> "+
    "<td><input name='line_using_org_drilldown["+prodln+"]' id='line_using_org_drilldown"+prodln+"' title='' value='1' type='checkbox' ></td>"+
    "</td>"+
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_MAJOR')+"</td>"+
    "<td><input name='line_code_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_code_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_haa_codes_id_c["+prodln+"]' id='line_haa_codes_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openCodePopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_codename' id='btn_clr_codename' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_code_name"+prodln+"\", \"line_haa_codes_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_MAJOR_DRILLDOWN')+"</td>"+
    "<input type='hidden' name='line_major_drilldown["+prodln+"]' value='0'> "+
    "<td><input name='line_major_drilldown["+prodln+"]' id='line_major_drilldown"+prodln+"' title='' value='1' type='checkbox' ></td>"+
    "</td>"+
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_CATEGORY')+"</td>"+
    "<td><input name='line_category_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_category_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_aos_product_categories_id_c["+prodln+"]' id='line_aos_product_categories_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openCatePopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_catename' id='btn_clr_catename' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_category_name"+prodln+"\", \"line_aos_product_categories_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_CATEGORY_DRILLDOWN')+"</td>"+
    "<input type='hidden' name='line_category_drilldown["+prodln+"]' value='0'> "+
    "<td><input name='line_category_drilldown["+prodln+"]' id='line_category_drilldown"+prodln+"' title='' value='1' type='checkbox' ></td>"+
    "</td>"+
    "</tr>"+
    "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_USER_PERSON')+"</td>"+
    "<td><input name='line_user_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_user_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_user_contacts_id_c["+prodln+"]' id='line_user_contacts_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openUserPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_catename' id='btn_clr_catename' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_user_name"+prodln+"\", \"line_user_contacts_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_OWN_PERSON')+"</td>"+
    "<td><input name='line_own_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_own_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_own_contacts_id_c["+prodln+"]' id='line_own_contacts_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOwnPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_catename' id='btn_clr_catename' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_own_name"+prodln+"\", \"line_own_contacts_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
/*    "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
    "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
    "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+*/
    "</tr>"+
    "<tr>"+
    /*"<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_COUNTING_RULE')+"</td>"+
    "<td><input name='line_rule_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_rule_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_hat_counting_rules_id_c["+prodln+"]' id='line_hat_counting_rules_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openRulePopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_rulename' id='btn_clr_rulename' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_rule_name"+prodln+"\", \"line_hat_counting_rules_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+*/
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_COUNTING_POLICY_GROUPS')+"<span class='required'>*</span></td>"+
    "<td><input name='line_policy_group_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_policy_group_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_hat_counting_policy_groups_id_c["+prodln+"]' id='line_hat_counting_policy_groups_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openPolicyGroupPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_policygroupname' id='btn_clr_policygroupname' tabindex='0' title='清除选择' class='button lastChild' onclick='setpolicyval(this.form, \"line_policy_group_name\", \"line_hat_counting_policy_groups_id_c\","+prodln+");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_COUNTING_POLICIES')+"<span class='required'>*</span></td>"+
    "<td><input name='line_policy_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_policy_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text' disabled='disabled' >"+
    "<input name='line_hat_counting_policies_id_c["+prodln+"]' id='line_hat_counting_policies_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn_policy["+prodln+"]' id='btn_policy"+prodln+"' onclick='openPolicyPopup(" + prodln + ");' disabled='disabled' ><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_policyname' id='btn_clr_policyname' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_policy_name"+prodln+"\", \"line_hat_counting_policies_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
    "</tr><tr><td></td><td></td>"+
    "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
    "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
    "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
    "</tr>"+
    "</table></td>";

    addToValidate('EditView','line_hat_counting_policy_groups_id_c'+prodln,'varchar','true',SUGAR.language.get('HAT_Counting_Batch_Rules','LBL_COUNTING_POLICY_GROUPS'));
    addToValidate('EditView','line_hat_counting_policies_id_c'+prodln,'varchar','true',SUGAR.language.get('HAT_Counting_Batch_Rules','LBL_COUNTING_POLICIES'));

    clr_value('#line_location_name','#line_hat_asset_locations_id_c',prodln);
    clr_value('#line_account_name','#line_account_id_c',prodln);
    clr_value('#line_code_name','#line_haa_codes_id_c',prodln);
    clr_value('#line_category_name','#line_aos_product_categories_id_c',prodln);
    clr_value('#line_policy_name','#line_hat_counting_policies_id_c',prodln);
    clr_value('#line_user_name','#line_user_contacts_id_c',prodln);
    clr_value('#line_own_name','#line_own_contacts_id_c',prodln);
    clr_value('#line_policy_group_name','#line_hat_counting_policy_groups_id_c',prodln);
    clr_value('#line_using_org_name','#line_account_id_c1',prodln);


    renderLine(prodln);
    num =prodln;
    prodln++;
    return prodln - 1;
  }

function renderLine(ln) { //将编辑器中的内容显示于正常行中
 /* var flag=$("#line_user_person_split_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_user_person_split_flag"+ln).html(flag);
  var flag=$("#line_own_person_split_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_own_person_split_flag"+ln).html(flag);
  var flag=$("#line_org_split_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_org_split_flag"+ln).html(flag);
  var flag=$("#line_loc_split_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_loc_split_flag"+ln).html(flag);
  var flag=$("#line_major_split_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_major_split_flag"+ln).html(flag);
  var flag=$("#line_category_split_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_category_split_flag"+ln).html(flag);*/
  $("#displayed_line_location_name"+ln).html($("#line_location_name"+ln).val());
  var flag=$("#line_location_drilldown"+ln).is(':checked')?"是":"否";
  $("#displayed_line_location_drilldown"+ln).html(flag);
  $("#displayed_line_account_name"+ln).html($("#line_account_name"+ln).val());
  var flag=$("#line_org_drilldown"+ln).is(':checked')?"是":"否";
  $("#displayed_line_org_drilldown"+ln).html(flag);
  $("#displayed_line_code_name"+ln).html($("#line_code_name"+ln).val());
  var flag=$("#line_major_drilldown"+ln).is(':checked')?"是":"否";
  $("#displayed_line_major_drilldown"+ln).html(flag);
  $("#displayed_line_category_name"+ln).html($("#line_category_name"+ln).val());
  var flag=$("#line_category_drilldown"+ln).is(':checked')?"是":"否";
  $("#displayed_line_category_drilldown"+ln).html(flag);
  $("#displayed_line_user_name"+ln).html($("#line_user_name"+ln).val());
  $("#displayed_line_own_name"+ln).html($("#line_own_name"+ln).val());
  $("#displayed_line_policy_name"+ln).html($("#line_policy_name"+ln).val());
  $("#displayed_line_policy_group_name"+ln).html($("#line_policy_group_name"+ln).val());
  $("#displayed_line_using_org_name"+ln).html($("#line_using_org_name"+ln).val());
  var flag=$("#line_using_org_drilldown"+ln).is(':checked')?"是":"否";
  $("#displayed_line_using_org_drilldown"+ln).html(flag);
  //$("#displayed_line_rule_name"+ln).html($("#line_rule_name"+ln).val());

}

function insertLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan=columnNum;
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAT_Counting_Batch_Rules', 'LBL_BTN_ADD_LINE')+"' />";
}

function addNewLine(tableid) {
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertLineElements(tableid);//加入新行
    LineEditorShow(prodln-1);       //打开行编辑器
    setdefault(num);
    //setdisabled(num);
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
    removeFromValidate('EditView','line_hat_counting_policy_groups_id_c'+ln);
    removeFromValidate('EditView','line_hat_counting_policies_id_c'+ln);
  }
  resetLineNum_Bold();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）

  validate(ln);
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }
  setdisabled(ln);
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

function openLocPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setLocReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_hat_asset_locations_id_c"+ln,
      "name" : "line_location_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  //var frame='&frame_c_advanced='+$("#haa_framework").val();
  var module_name='&module_name=HAT_Counting_Batchs';
  open_popup('HAT_Asset_Locations', 800, 850,module_name, true, true, popupRequestData);
}

function setLocReturn(popupReplyData){
  set_return(popupReplyData);
  setCheck(num);
}

function setCheck(ln){
  if(document.getElementById("line_location_name"+ln).value != ''){
    document.getElementById("line_location_drilldown"+ln).checked=true;
  }
  if(document.getElementById("line_account_name"+ln).value != ''){
    document.getElementById("line_org_drilldown"+ln).checked=true;
  }
  if(document.getElementById("line_using_org_name"+ln).value != ''){
    document.getElementById("line_using_org_drilldown"+ln).checked=true;
  }
  if(document.getElementById("line_code_name"+ln).value != ''){
    document.getElementById("line_major_drilldown"+ln).checked=true;
  }
  if(document.getElementById("line_category_name"+ln).value != ''){
    document.getElementById("line_category_drilldown"+ln).checked=true;
  }
}

function openOrgPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setOrgReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_account_id_c"+ln,
      "name" : "line_account_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  var frame='&module_name=HAT_Counting_Batchs&frame_c_advanced='+$("#haa_framework").val();
  open_popup('Accounts', 800, 850,frame, true, true, popupRequestData);
}

function setOrgReturn(popupReplyData){
  set_return(popupReplyData);
  setCheck(num);
}

function openUsingOrgPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setUsingOrgReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_account_id_c1"+ln,
      "name" : "line_using_org_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  var frame='&module_name=HAT_Counting_Batchs&frame_c_advanced='+$("#haa_framework").val();
  open_popup('Accounts', 800, 850,frame, true, true, popupRequestData);
}

function setUsingOrgReturn(popupReplyData){
  set_return(popupReplyData);
  setCheck(num);
}

function openUserPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setUserReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_user_contacts_id_c"+ln,
      "name" : "line_user_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  //var frame='&module_name=HAT_Counting_Batchs&frame_c_advanced='+$("#haa_framework").val();
  open_popup('Contacts', 800, 850,'', true, true, popupRequestData);
}

function setUserReturn(popupReplyData){
  set_return(popupReplyData);
  setCheck(num);
}

function openOwnPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setOwnReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_own_contacts_id_c"+ln,
      "name" : "line_own_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  //var frame='&module_name=HAT_Counting_Batchs&frame_c_advanced='+$("#haa_framework").val();
  open_popup('Contacts', 800, 850,'', true, true, popupRequestData);
}

function setOwnReturn(popupReplyData){
  set_return(popupReplyData);
  setCheck(num);
}

function openCodePopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setCodeNameReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_haa_codes_id_c"+ln,
      "name" : "line_code_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  var contact='&module_name=HAT_Counting_Batchs&code_type_advanced=asset_counting_major_type';
  open_popup('HAA_Codes', 800, 850, contact, true, true, popupRequestData);
}

function setCodeNameReturn(popupReplyData){
  set_return(popupReplyData);
  setCheck(num);
}

function openCatePopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setCateReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_aos_product_categories_id_c"+ln,
      "name" : "line_category_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  //var frame='&frame_c_advanced='+$("#haa_framework").val();
  var module_name='&module_name=HAT_Counting_Batchs';
  open_popup('AOS_Product_Categories', 800, 850,module_name, true, true, popupRequestData);
}

function setCateReturn(popupReplyData){
  set_return(popupReplyData);
  setCheck(num);
}

function openRulePopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setRuleReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_hat_counting_rules_id_c"+ln,
      "name" : "line_rule_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  //var frame='&frame_c_advanced='+$("#haa_framework").val();
  open_popup('HAT_Counting_Rules', 800, 850,'', true, true, popupRequestData);
}

function setRuleReturn(popupReplyData){
  set_return(popupReplyData);
}

function openPolicyPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setPolicyReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_hat_counting_policies_id_c"+ln,
      "name" : "line_policy_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  //'&'$("line_hat_counting_policy_groups_id_c"+ln).val()
  var frame='&enabled_flag_advanced=1&hat_counting_policy_groups_id_c_advanced='+$("#line_hat_counting_policy_groups_id_c"+ln).val();
  open_popup('HAT_Counting_Policies', 800, 850,frame, true, true, popupRequestData);
}

function setPolicyReturn(popupReplyData){
  set_return(popupReplyData);
}

function openPolicyGroupPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setPolicyGroupReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_hat_counting_policy_groups_id_c"+ln,
      "name" : "line_policy_group_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  //+
  var frame='&frame_c_advanced='+$("#line_framework").val();
  open_popup('HAT_Counting_Policy_Groups', 800, 850,frame, true, true, popupRequestData);
}

function setPolicyGroupReturn(popupReplyData){
  set_return(popupReplyData);
  setnullpolicy(num);
}

function setpolicyval(form,name,id,ln){
  SUGAR.clearRelateField(form,name+ln,id+ln);
  setnullpolicy(ln);
}

function setnullpolicy(ln){
  $("#line_policy_name"+ln).val("");
  $("#line_hat_counting_policies_id_c"+ln).val("");
  if(document.getElementById("line_hat_counting_policy_groups_id_c"+ln).value!=''){
    document.getElementById("line_policy_name"+ln).disabled=false;
    document.getElementById("btn_policy"+ln).disabled=false;
  }else
  {
    document.getElementById("line_policy_name"+ln).disabled=true;
    document.getElementById("btn_policy"+ln).disabled=true;
  }
}
function validate(ln){
  addToValidate('EditView','line_hat_counting_policy_groups_id_c'+ln,'varchar','true',SUGAR.language.get('HAT_Counting_Batch_Rules','LBL_COUNTING_POLICY_GROUPS'));
  addToValidate('EditView','line_hat_counting_policies_id_c'+ln,'varchar','true',SUGAR.language.get('HAT_Counting_Batch_Rules','LBL_COUNTING_POLICIES'));
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

function setdisabled(ln){
  if (document.getElementById('line_hat_counting_policies_id_c'+ln).value==''){
   document.getElementById('line_policy_name'+ln).disabled=true;
   document.getElementById('btn_policy'+ln).disabled=true;
 }
 else{
  document.getElementById('line_policy_name'+ln).disabled=false;
  document.getElementById('btn_policy'+ln).disabled=false;
}
}

function setdefault(ln){
  var policy_groups_id=$('#policy_groups_id').val();
  var policy_groups_name=$('#policy_groups_name').val();
  document.getElementById('line_hat_counting_policy_groups_id_c'+ln).value=policy_groups_id;
  document.getElementById('line_policy_group_name'+ln).value=policy_groups_name;
  setnullpolicy(ln);
}