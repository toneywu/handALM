var prodln = 0;
var columnNum = 6;
var lineno;
var num=0;
var resultHtml='';
var result_id='';
var data = '';
var label='';
var type='';
var lov_name='';
var view ='';
var flag='no';
var first_flag=true;
//$("#line_items_label").hide();
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid,current_view ,attr_label,attr_data,attr_type,status){
  view=current_view;
  if(current_view=='EditView'){
      $("#line_items_span").parent().prev().hide();//隐藏标签
    }else{
      $('#line_items_detail_span').parent().prev().hide();
    }
    var head_html="<tr>";
    if(attr_label!=''&&attr_data!=''){
      columnNum=16;
      if(status==true){
        label=attr_label;
        data=attr_data;
        type=attr_type;
      }else{
        label=JSON.parse(attr_label);
        data=JSON.parse(attr_data);
        type=JSON.parse(attr_type);
      }
    }else flag='yes';
    var wi=100/16;
    head_html +="<th width="+wi+"%>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_CYCLE_NUMBER')+"</th>";
    head_html +="<th width="+wi+"%>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_COUNTING_RESULT')+"</th>";
    if(flag='no'){
      for(var i=0;i<label.length;i++){
        var n_attr=data[i].split("e");
        if(n_attr[0]!='attribut'){ break;}
        head_html +="<th width="+wi+"%>"+label[i]+"</th>";
        for(var j=0;j<data.length;j++){
          var n_flag=data[j].split("g");
          if(n_flag[1]==n_attr[1] &&n_flag[0]=='diff_fla'){
           head_html +="<th width="+wi+"%>"+label[j]+"</th>";
         }
       }
     }
   }
   if(current_view=="EditView"){
    head_html +="<th >"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ADJUST_NEEDED')+"</th>";
    head_html +="<th >"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ADJUST_METHOD')+"</th>";
    head_html +="<th >"+SUGAR.language.get('HAT_Counting_Results', 'LBL_ADJUST_STATUS')+"</th>";
  }
  head_html +="<th > </th>";
  head_html +="<tr>";
  if(first_flag==true){
  $("#lineItems_result").append(head_html);
  first_flag=false;
  }
  $("#lineItems_result").find("tbody:eq(0)").find("tr:eq(0)").replaceWith(head_html);
}

function insertLineData(line_data,current_view,column_name){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    result_id=line_data.id;
    if(column_name!=''){
      columnNum=16;
      lov_name=JSON.parse(column_name);
    }else flag='yes';
    
    ln = insertLineElements("lineItems_result",current_view,line_data);
    for(var propertyName in line_data) {
      if ($("#line_"+propertyName.concat(String(ln))).is(':checkbox')) {
        if (line_data[propertyName]==true) {
          document.getElementById("line_"+propertyName.concat(String(ln))).checked = true;
          document.getElementById("line_"+propertyName.concat(String(ln))).value = 1;
        }
      }else {
        //如果当前字段不是checkbox，就以val的形式赋值
        $("#line_"+propertyName.concat(String(ln))).val(line_data[propertyName]);
        if(flag='no' && lov_name[propertyName]){
          $("#line_"+(propertyName+"_name").concat(String(ln))).val(lov_name[propertyName]);
        }
      }
    }
    
    renderLine(ln);
    $("#line_editor"+ln).hide();
  }
}

function insertLineElements(tableid,current_view,line_data) { //创建界面要素
  //自定义区域JS加载
  var id=$("#task_template_attr").val();
  if (id!="") {
    
    attr_info_result(id,'line_',prodln);
  }
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
z1.align="center";
z1.id = 'line_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td><span name='displayed_line_cycle_number[" + prodln + "]' id='displayed_line_cycle_number" + prodln + "'></span></td>" +
"<td><span name='displayed_line_counting_result[" + prodln + "]' id='displayed_line_counting_result" + prodln + "'></span></td>";
;
/*for(var i=0;i<data.length;i++){
    z1.innerHTML +="<td><span name='displayed_line_"+data[i]+"[" + prodln + "]' id='displayed_line_"+data[i]+ prodln + "'></span></td>";
  }*/
  if(flag='no'){
    for(var i=0;i<label.length;i++){
      var n_attr=data[i].split("e");
      if(n_attr[0]!='attribut'){ break;}
      if(type[i]=='LOV'){
      //z1.innerHTML +="<td><span name='displayed_line_"+data[i]+"[" + prodln + "]' id='displayed_line_"+data[i]+ prodln + "'></span></td>";
      z1.innerHTML +="<td><span name='displayed_line_"+data[i]+"_name"+"[" + prodln + "]' id='displayed_line_"+data[i]+"_name"+ prodln + "'></span></td>";      
    }else{
      z1.innerHTML +="<td><span name='displayed_line_"+data[i]+"[" + prodln + "]' id='displayed_line_"+data[i]+ prodln + "'></span></td>";   
    }
    for(var j=0;j<data.length;j++){
      var n_flag=data[j].split("g");
      //alert(n_flag[0]);
      if(n_flag[1]==n_attr[1] &&n_flag[0]=='diff_fla'){
       z1.innerHTML +="<td><span name='displayed_line_"+data[j]+"[" + prodln + "]' id='displayed_line_"+data[j]+ prodln + "'></span></td>";
     }
   }
 }
}
if(current_view == "EditView" ) {
  z1.innerHTML+="<td><span name='displayed_line_adjust_needed[" + prodln + "]' id='displayed_line_adjust_needed" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_adjust_method[" + prodln + "]' id='displayed_line_adjust_method" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_adjust_status[" + prodln + "]' id='displayed_line_adjust_status" + prodln + "'></span></td>"+
  "<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";
}
if(current_view == "DetailView"){

  z1.innerHTML  +="<td><input type='button' value='移除' class='button'  id='btn_delete_line" + prodln +"' onclick='line_delete(" + prodln + ")'></td>";
}
  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln;
 // x.style = "display:none";
 x.innerHTML  = "<td colSpan='"+columnNum+"'>"+
 "<link rel='stylesheet' type='text/css' href='custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'>"+
 "<table border='0' class='lineEditor' width='100%' style='display:table'>"+
 "<tr>"+
 "<input name='line_id["+prodln+"]' id='line_id"+prodln+"' value='' type='hidden'>"+
 "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_CYCLE_NUMBER')+"<span class='required'>*</span></td>"+
 "<td><input id='line_cycle_number"+prodln+"' name='line_cycle_number["+prodln+"]'  type='text' value=''></td>"+
 "<td>"+SUGAR.language.get('HAT_Counting_Results', 'LBL_COUNTING_RESULT')+"</td>"+
 "<td><select tabindex='116' name='line_counting_result[" + prodln + "]' id='line_counting_result" + prodln + "' onchange='setadjustneed("+prodln+")'>" + line_res_type_option +"</select></td>"+
 "</td>"+
 "</tr>"+
 resultHtml+
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
 "</tr></tbody>"+
 "</table></td>";

 validate(prodln);

 num=prodln;
 renderLine(prodln);
 prodln++;
 return prodln - 1;
}

function renderLine(ln) { //将编辑器中的内容显示于正常行中
    $("#displayed_line_cycle_number"+ln).html($("#line_cycle_number"+ln).val());
    $("#displayed_line_counting_result"+ln).html($("#line_counting_result"+ln).find("option:selected").html());
    $("#displayed_line_adjust_method"+ln).html($("#line_adjust_method"+ln).find("option:selected").html());
    $("#displayed_line_adjust_status"+ln).html($("#line_adjust_status"+ln).find("option:selected").html());
    var flag=$("#line_adjust_needed"+ln).is(':checked')?"是":"否";
    $("#displayed_line_adjust_needed"+ln).html(flag);
    if(flag='no'){
      for(var i=0;i<data.length;i++){
        if(type[i]=='CHECKBOX'){
      //console.log("#displayed_line_"+data[i]+ln);
      var flag=$("#line_"+data[i]+ln).is(':checked')?"是":"否";
      $("#displayed_line_"+data[i]+ln).html(flag);
    }else if(type[i]=='LIST'){
     $("#displayed_line_"+data[i]+ln).html($("#line_"+data[i]+ln).find("option:selected").html());
   }else if(type[i]=='LOV'){
    $("#displayed_line_"+data[i]+"_name"+ln).html($("#line_"+data[i]+"_name"+ln).val());
  }else{
    $("#displayed_line_"+data[i]+ln).html($("#line_"+data[i]+ln).val());
  }
}
}

$("#lineItems_result tr td").each(function(){
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

  insertLineElements(tableid,'EditView');//加入新行
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

function line_delete(ln){
  if(confirm(SUGAR.language.get('app_strings','NTC_DELETE_CONFIRMATION'))) {
  $("#line_body"+ln).hide();
  updateDeleted(result_id);
  }
  else
  {
    return false;
  }
}

function updateDeleted(line_id){
  $.ajax({
    async:false,
    url: 'index.php?to_pdf=true&module=HAT_Counting_Lines&action=updateDeleted',
    data: '&id='+line_id,
    type:'POST',
            success: function (data) {//调用方法。
                //data=$.parseJSON(data);
                //data=JSON.parse(data);
                //alert(data);
              }
            });

}

function markLineDeleted(ln, key) {//删除当前行

  // collapse line; update deleted value
  document.getElementById(key + 'body' + ln).style.display = 'none';
  document.getElementById(key + 'deleted' + ln).value = '1';
  document.getElementById(key + 'delete_line' + ln).onclick = '';

  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView','line_cycle_number'+ ln);
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
  addToValidate('EditView', 'line_cycle_number'+ ln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Results', 'LBL_CYCLE_NUMBER'));
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
  document.getElementById("line_counting_result"+ln).value='';
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


function attr_info_result(id,prefix,prodln){
  var module_id = result_id;
  $.ajax({
    url:'index.php?to_pdf=true&module=HAT_Counting_Tasks&action=counting_task_attr',
    data:'&id='+id+'&type=INV_DETAIL_RESULTS&module_action=EditView&module_name=HAT_Counting_Results&module_id='+module_id+'&prefix='+prefix
    +'&prodln='+prodln+'&asset_id='+'',
    type:'POST',
    async:false,
    success:function(result){
      resultHtml=result;
      load_script(result);
    }
  });
}

function setReturnattribute1(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),1);
}

function setReturnattribute2(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),2);
}

function setReturnattribute3(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),3);
}

function setReturnattribute4(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),4);
}

function setReturnattribute5(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),5);
}

function setReturnattribute6(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),6);
}

function setReturnattribute7(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),7);
}

function setReturnattribute8(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),8);
}

function setReturnattribute9(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),9);
}

function setReturnattribute10(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),10);
}

function setReturnattribute11(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),11);
}

function setReturnattribute12(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),12);
}

function setReturnattribute13(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),13);
}

function setReturnattribute14(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),14);
}

function setReturnattribute15(popupReplyData){
  set_return(popupReplyData);
  setFlag((prodln-1),15);
}

function setFlag(ln,n){
  var flag='line_diff_flag'+n+ln;
  var this_value=document.getElementById("line_attribute"+n+ln).value;
  var attr_h=document.getElementById("attribute"+n).value;
  var flag_attr_if="1=2";var flag_attr_else="1=1";
  if(attr_h==this_value){
    document.getElementById(flag).checked=false;
  }
  else{
    document.getElementById(flag).checked=true;
  }
  var bool=false;
  for(i=1;i<16;i++){
    var diff_flag="line_diff_flag"+i+ln;
    if(document.getElementById(diff_flag)!==null){
      bool=bool|document.getElementById(diff_flag).checked;
    }
  }
  if(bool==1){
    document.getElementById("line_counting_result"+ln).value="Different";
  }else{
    document.getElementById("line_counting_result"+ln).value="Matched";
  }
  if(document.getElementById("line_counting_result"+ln).value!="Matched"){
    document.getElementById("line_adjust_needed"+ln).checked=true;
  }else{
    document.getElementById("line_adjust_needed"+ln).checked=false;
  }
}

function load_script(data){
// 第一步：匹配加载的页面中是否含有js
var regDetectJs = /<script(.|\n)*?>(.|\n|\r\n)*?<\/script>/ig;
var jsContained = data.match(regDetectJs);

// 第二步：如果包含js，则一段一段的取出js再加载执行
if(jsContained) {
    // 分段取出js正则
    var regGetJS = /<script(.|\n)*?>((.|\n|\r\n)*)?<\/script>/im;

    // 按顺序分段执行js
    var jsNums = jsContained.length;
    for (var i=0; i<jsNums; i++) {
        var jsSection = jsContained[i].match(regGetJS);

        if(jsSection[2]) {
            if(window.execScript) {
                // 给IE的特殊待遇
                window.execScript(jsSection[2]);
            } else {
                // 给其他大部分浏览器用的
                window.eval(jsSection[2]);
            }
        }
    }
}

}