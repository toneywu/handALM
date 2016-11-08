//这是FF行定义的核心文件，由FieldLines.php进行调用。

var condln = 0;
var condln_count = 0;
var ff_fields =  new Array();
var ff_module = '';

document.getElementById('ff_module').addEventListener("change", showModuleFields, false);

function loadFieldLine(lineData){

    var prefix = 'ff_field_';
    var ln = 0;

    getListofValue();//读取几个固定的值列表

    ln = insertFieldLine();

    for(var a in lineData){ //通过循环将名称相同的对象直接赋值
        if(document.getElementById(prefix + a + ln) != null){
            document.getElementById(prefix + a + ln).value = lineData[a];
            //console.log(prefix + a + ln+" = "+lineData[a]);
        }
    }

    $("#"+prefix+"field_label"+ln).html("<strong>"+$("#"+prefix+"field"+ln+"  option:selected").text()+"</strong>"+"<span class='input_desc'>("+lineData['field']+")</span>");
    $("#"+prefix+"fieldtype_label"+ln).html("<strong>"+$("#"+prefix+"fieldtype"+ln+"  option:selected").text()+"</strong><span class='input_desc'>"+$("#"+prefix+"listfilter"+ln+"  option:selected").text()+"</span>");
    changeFieldTyle($("#"+prefix+"fieldtype" + ln), ln );

    //checkbox无法完成快速循环赋值，在此手工指定
    $("#"+prefix+"att_required"+ln).prop('checked',lineData['att_required']==0?false:true);
    $("#"+prefix+"att_hide"+ln).prop('checked',lineData['att_hide']==0?false:true);
    $("#"+prefix+"att_keep_position"+ln).prop('checked',lineData['att_keep_position']==0?false:true);

}

function changeFieldTyle(obj,ln) {
    //alert($(obj).children('option:selected').val());
    var current_val =$(obj).children('option:selected').val();
    
    if(current_val=='HIDE'||current_val=='PLACEHOLDER') {//如果当前字段为List，则显示List对应的子分类字段
            mark_field_disabled('ff_field_mask'+ln);
            mark_field_disabled('ff_field_default_val'+ln);
            mark_field_disabled('ff_field_label'+ln);
            mark_field_disabled('ff_field_label_b'+ln);
    } else {
            mark_field_enabled('ff_field_mask'+ln, true);
            mark_field_enabled('ff_field_default_val'+ln, true);
            mark_field_enabled('ff_field_label'+ln, true);
            mark_field_enabled('ff_field_label_b'+ln, true);
    }

    if(current_val=='LIST'&&action_sugar_grp1 == 'EditView') {//如果当前字段为List，则显示List对应的子分类字段
        $('#ff_field_listfilter'+ln).show();
    }else{
        $('#ff_field_listfilter'+ln).hide();
    }
}

function showModuleFields(){

    clearFieldLines();
    getListofValue()//加载其它的值列表

    ff_module = document.getElementById('ff_module').value;

    if(ff_module != ''){

    $.ajax({//Load module fields
        url: "index.php?to_pdf=true&module=AOW_WorkFlow&action=getModuleFields&aow_value=&view=EditView&aow_module="+ff_module,
        //dataType: "json",
        success: function (result) {
             ff_fields = result;
                document.getElementById('btn_FieldLine').disabled = '';
                //console.log("ff_fields loaded");
                //console.log(result);
            },
        error: function () { //失败
            alert('Error loading document');
        },
        async:false
    });

    } else {
        document.getElementById('btn_FieldLine').disabled = 'disabled';
    }

}



function showModuleFieldType(ln, value){
    if (typeof value === 'undefined') { value = ''; }

    var callback = {
        success: function(result) {
            document.getElementById('aow_conditions_fieldInput'+ln).innerHTML = result.responseText;
            SUGAR.util.evalScript(result.responseText);
            enableQS(false);
        },
        failure: function(result) {
            document.getElementById('aow_conditions_fieldInput'+ln).innerHTML = '';
        }
    }

    var rel_field = document.getElementById('aow_conditions_module_path'+ln).value;
    var aow_field = document.getElementById('aow_conditions_field'+ln).value;
    var type_value = document.getElementById("aow_conditions_value_type["+ln+"]").value;
    var aow_field_name = "aow_conditions_value["+ln+"]";

    YAHOO.util.Connect.asyncRequest ("GET", "index.php?module=AOW_WorkFlow&action=getModuleFieldType&view="+action_sugar_grp1+"&aow_module="+ff_module+"&aow_fieldname="+aow_field+"&aow_newfieldname="+aow_field_name+"&aow_value="+value+"&aow_type="+type_value+"&rel_field="+rel_field,callback);
}

function checkModuleField(ln) {
    current_val= $("#ff_field_field"+ln).val();
    for (var i=0;i<condln_count;i++){
        //判断当前值是否已经被选择过，确保唯一性
        if ( i!=ln && current_val == $("#ff_field_field"+i).val()) {
            console.log(current_val+"("+i+")");
            $("#ff_field_field"+ln).val("")
            alert(SUGAR.language.get('app_strings', 'LBL_DUPLICATED_ERR'));
            break;
        }
    }

}



/**
 * Insert Header
 */

function insertFieldHeader(){
    tablehead = document.createElement("thead");
    tablehead.id = "fieldLines_head";
    document.getElementById('fieldLines').appendChild(tablehead);

    var x=tablehead.insertRow(-1);
    x.id='fieldLines_head';

    var a=x.insertCell(0);
    //a.style.color="rgb(68,68,68)";

    var b=x.insertCell(1);
    b.style.color="rgb(0,0,0)";
    b.innerHTML=SUGAR.language.get('HAA_FF_Fields', 'LBL_FIELD');

    var c=x.insertCell(2);
    c.style.color="rgb(0,0,0)";
    c.innerHTML=SUGAR.language.get('HAA_FF_Fields', 'LBL_TYPE');

    var d=x.insertCell(3);
    d.style.color="rgb(0,0,0)";
    d.innerHTML=SUGAR.language.get('HAA_FF_Fields', 'LBL_ATT_REQUIRED');

    var f=x.insertCell(4);
    f.style.color="rgb(0,0,0)";
    f.innerHTML=SUGAR.language.get('HAA_FF_Fields', 'LBL_MASK');

    var g=x.insertCell(5);
    g.style.color="rgb(0,0,0)";
    g.innerHTML=SUGAR.language.get('HAA_FF_Fields', 'LBL_DEFAULT_VAL');

    var h=x.insertCell(6);
    h.style.color="rgb(0,0,0)";
    h.innerHTML=SUGAR.language.get('HAA_FF_Fields', 'LBL_ATT_LABEL');

    var i=x.insertCell(7);
    i.style.color="rgb(0,0,0)";
    i.innerHTML=SUGAR.language.get('HAA_FF_Fields', 'LBL_ATT_LABEL2');
}

function getListofValue(){
    ff_type ="<option value='DEFAULT' selected='selected'>Default</option><option value='HIDE'>Hide</option>"
                     +"<option value='PLACEHOLDER'>Hide(Placeholder)</option>"
                     +"<option value='INPUT'>Input</option>"
                     +"<option value='LIST'>List</option>"
                     +"<option value='READONLY'>Read Only</option>"
                     +"<option value='CHECKBOX'>Checkbox</option>";
}

function insertFieldLine(){
    //console.log(ff_fields);
    //console.log(ff_module);

    if (document.getElementById('fieldLines_head') == null) {
        insertFieldHeader();
    } else {
        document.getElementById('fieldLines_head').style.display = '';
    }


    tablebody = document.createElement("tbody");
    tablebody.id = "haa_ff_field_body" + condln;
    document.getElementById('fieldLines').appendChild(tablebody);


    var x = tablebody.insertRow(-1);
    x.id = 'product_line' + condln;

    var a = x.insertCell(0);
    if(action_sugar_grp1 == 'EditView'){
        a.innerHTML = "<button type='button' id='btn_haa_ff_field_delete_line" + condln + "' class='button' value='' tabindex='116' onclick='markConditionLineDeleted(" + condln + ")'><img src='themes/default/images/id-ff-remove-nobg.png' alt=''></button><br>";
        a.innerHTML += "<input type='hidden' name='ff_field_deleted[" + condln + "]' id='ff_field_deleted" + condln + "' value='0'>"
        a.innerHTML += "<input type='hidden' name='ff_field_id[" + condln + "]' id='ff_field_id" + condln + "' value=''>";
    } else{
        a.innerHTML = condln +1;
    }
    a.style.width = '5%';

    var b = x.insertCell(1);
    //b.style.width = '18%';
    var viewStyle = 'display:none';
    if(action_sugar_grp1 == 'EditView'){viewStyle = '';}
    b.innerHTML = "<select style='width:158px;"+viewStyle+"' name='ff_field_field["+ condln +"]' id='ff_field_field" + condln + "' value='' title='' tabindex='115' onchange='checkModuleField(" + condln + ");'>" + ff_fields + "</select>";
    if(action_sugar_grp1 == 'EditView'){viewStyle = 'display:none';}else{viewStyle = '';}

    b.innerHTML += "<span style='width:158px;"+viewStyle+"' id='ff_field_field_label" + condln + "' ></span>";


    var c = x.insertCell(2);
    //c.style.width = '30%';     if(action_sugar_grp1 == 'EditView'){viewStyle = '';}
    var viewStyle = 'display:none';
    if(action_sugar_grp1 == 'EditView'){viewStyle = '';}
    c.innerHTML = "<select style='width:128px;"+viewStyle+"' name='ff_field_fieldtype["+ condln +"]' id='ff_field_fieldtype" + condln + "' value='' title='' tabindex='115' onchange='changeFieldTyle(this," + condln + ");'>" + ff_type + "</select>";
    c.innerHTML += "<select style='width:158px;"+viewStyle+"' name='ff_field_listfilter["+ condln +"]' id='ff_field_listfilter" + condln + "' value='' title='' tabindex='116' '>" + ff_extended_list + "</select>";
    //c.innerHTML += "<input style='width:158px;"+viewStyle+"' name='listfilter["+ condln +"]' id='listfilter" + condln + "' value='' title='' tabindex='118'>";
    if(action_sugar_grp1 == 'EditView'){viewStyle = 'display:none';}else{viewStyle = '';}
    c.innerHTML += "<span style='width:158px;"+viewStyle+"' id='ff_field_fieldtype_label" + condln + "' ></span>";
    changeFieldTyle($("#ff_field_fieldtype" + condln), condln );

    var d = x.insertCell(3);
    //d.style.width = '5%';
    d.innerHTML = "<input  type='checkbox' name='ff_field_att_required["+ condln +"]' id='ff_field_att_required" + condln + "' value='' title='' tabindex='116'>";

    var f = x.insertCell(4);
    //f.style.width = '10%';
    f.innerHTML = "<input  name='ff_field_mask["+ condln +"]' id='ff_field_mask" + condln + "' value='' title='' tabindex='118'>";

    var g = x.insertCell(5);
    //g.style.width = '15%';
    g.innerHTML = "<input  name='ff_field_default_val["+ condln +"]' id='ff_field_default_val" + condln + "' value='' title='' tabindex='118'>";

    var h = x.insertCell(6);
    //h.style.width = '15%';
    h.innerHTML = "<input  name='ff_field_label["+ condln +"]' id='ff_field_label" + condln + "' value='' title='' tabindex='118'>";

    var i = x.insertCell(7);
    //i.style.width = '15%';
    i.innerHTML = "<input  name='ff_field_label_b["+ condln +"]' id='ff_field_label_b" + condln + "' value='' title='' tabindex='118'>";

    condln++;
    condln_count++;

    return condln -1;
}

/*function changeOperator(ln){

    var aow_operator = document.getElementById("aow_conditions_operator["+ln+"]").value;

    if(aow_operator == 'is_null'){
        showModuleField(ln,aow_operator);
    } else {
        showElem('aow_conditions_fieldTypeInput' + ln);
        showElem('aow_conditions_fieldInput' + ln);
    }


}
*/


function markConditionLineDeleted(ln)
{
    // collapse line; update deleted value
    document.getElementById('haa_ff_field_body' + ln).style.display = 'none';
    document.getElementById('ff_field_deleted' + ln).value = '1';
    document.getElementById('btn_haa_ff_field_delete_line' + ln).onclick = '';

    condln_count--;
    if(condln_count == 0){
        document.getElementById('fieldLines_head').style.display = "none";
    }
}

function clearFieldLines(){

    if(document.getElementById('fieldLines') != null){
        var cond_rows = document.getElementById('fieldLines').getElementsByTagName('tr');
        var cond_row_length = cond_rows.length;
        var i;
        for (i=0; i < cond_row_length; i++) {
            if(document.getElementById('btn_haa_ff_field_delete_line'+i) != null){
                document.getElementById('btn_haa_ff_field_delete_line'+i).click();
            }
        }
    }
}


function hideElem(id){
    if(document.getElementById(id)){
        document.getElementById(id).style.display = "none";
        document.getElementById(id).value = "";
    }
}

function showElem(id){
    if(document.getElementById(id)){
        document.getElementById(id).style.display = "";
    }
}

function date_field_change(field){
    if(document.getElementById(field + '[1]').value == 'now'){
        hideElem(field + '[2]');
        hideElem(field + '[3]');
    } else {
        showElem(field + '[2]');
        showElem(field + '[3]');
    }
}

$(document).ready(function() {
	if (action_sugar_grp1 == 'EditView') {
    	$("#field_lines_label").hide(); //在EditView中可以消除左侧Label
	}else {
	    $('#LBL_EDITVIEW_PANEL2 td:first').hide();//以下在DetailView中生效，去除标签
    }
	$('#fieldLines tr td').css({
	    'border-bottom':'1px solid #efefef',
	    'vertical-align':'middle'
    });

});