var prodln = 0;
var columnNum = 4;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  $("#line_items_label").hide();//隐藏SugarCRM字段
  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  tablehead.style.display="none";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Line_head';
  var a=x.insertCell(0);
  a.innerHTML=SUGAR.language.get('HAA_Interfaces', 'LBL_SEQ');
  var b=x.insertCell(1);
  b.innerHTML=SUGAR.language.get('HAA_Interfaces', 'LBL_DATE_ENTERED');
  var c=x.insertCell(2);
  c.innerHTML=SUGAR.language.get('HAA_Interfaces', 'LBL_CREATED');
  var d=x.insertCell(3);
  d.innerHTML='&nbsp;';
}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){

    ln = insertLineElements("lineItems");
    renderLine(ln,line_data);
  }
}

function insertLineElements(tableid) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}

tablebody = document.createElement("tbody");
tablebody.id = "line_body" + prodln;
document.getElementById(tableid).appendChild(tablebody);var z1 = tablebody.insertRow(-1);
z1.id = 'line1_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td><span name='displayed_line_num[" + prodln + "]' id='displayed_line_num" + prodln + "'></span></td>"+
"<td><span name='displayed_line_date_entered[" + prodln + "]' id='displayed_line_date_entered" + prodln + "'></span></td>"+
"<td><span name='displayed_line_create_person[" + prodln + "]' id='displayed_line_create_person" + prodln + "'></span></td>";
prodln++;
return prodln - 1;
}

function renderLine(ln,line_data) { //将编辑器中的内容显示于正常行中
  $("#displayed_line_num"+ln).html(line_data.seq);
  $("#displayed_line_date_entered"+ln).html(line_data.date_entered);
  $("#displayed_line_create_person"+ln).html(line_data.create_person);
}

function insertLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan=columnNum;
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAA_Interfaces', 'LBL_BTN_ADD_LINE')+"' />";
}

