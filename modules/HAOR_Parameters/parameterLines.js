var lt = 0;
/**
* 创建报表页面加载自定义参数行*/
function insertParameterLine(parameter){
    var span = $('<tr></tr>');
    var removeButton = $('<button type="button" class="removeParameterButton"><img src="themes/default/images/id-ff-remove-nobg.png" alt=""></button>');
    removeButton.click(function(){
        removeButton.closest('tr').remove();
        if($("[name='aor_parameter_id\\[\\]']").size() == 0){
            $('#cparameterHead').hide();
        }
    });
    var cell = $('<td></td>');
    cell.append(removeButton);
    var id = '';
    if(parameter['id']){
        id = parameter['id'];
    }
    cell.append("<td><input type='hidden' id='aor_parameter_id"+lt+"' name='aor_parameter_id[]' value='"+id+"'></td>");
    span.append(cell);
    var title = '';
    if(parameter['name']){
        title = parameter['name'];
    }
    var pDescription = '';
    if(parameter['description']){ 
        pDescription = parameter['description'];
    }
    var placeholder = SUGAR.language.translate('AOR_Reports','LBL_PARAMETER_NAME');
    span.append("<td><input type='text' id='aor_parameter_name"+lt+"' name='aor_parameter_name[]' placeholder='"+placeholder+"' value='"+title+"'></td>");
    span.append("<td><input type='text' id='aor_parameter_des"+lt+"' name='aor_parameter_des[]' value='"+pDescription+"'></td>");
    
    var cell = $('<td></td>');
    var select = $("<select  onchange='typeOnChange("+lt+")' id='aor_parameter_type"+lt+"' name='aor_parameter_type[]'></select>");
    $.each(SUGAR.language.languages['app_list_strings']['aor_parameter_type_list'],function(key,value){
        var option = $('<option></option>');
        option.val(key);
        option.text(value);
        if(parameter['type'] === key){
            option.attr('selected','selected');
        }

        select.append(option);
    });
    cell.append(select);
    span.append(cell);
    span.append("<td id='field_relation"+lt+"_td'></td>");
    var pModule = '';
    if(parameter['source_module']){ 
        pModule = parameter['source_module'];
    }
    //span.append("<td><input type='text' id='aor_parameter_relevance_module"+lt+"' name='aor_parameter_relevance_module[]' placeholder='关联型参数须填写' value='"+pModule+"'></td>");
    var pList = '';
    if(parameter['list_options_name']){ 
        pList = parameter['list_options_name'];
    }
    //span.append("<td><input type='text' id='aor_parameter_relevance_list"+lt+"' onchange='listOnChange("+lt+")' name='aor_parameter_relevance_list[]' placeholder='列表型参数须填写' value='"+pList+"'></td>");
   
    var pValue = '';
    if(parameter['value']){ 
        pValue = parameter['value'];
    }
    span.append("<td id='aor_parameter_value"+lt+"_td' style='width:178px;'></td>");
    /* <input type='text' id='aor_parameter_value"+lt+"' name='aor_parameter_value[]' value='"+pValue+"'>*/
    $('#cparameterLines tbody').append(span);
    $('#cparameterHead').show();
    typeOnChange(lt);
    $("#aor_parameter_value"+lt).val(pValue);
    if($('#aor_parameter_type'+lt).val()=='lov'){
        $("#aor_parameter_lov_id"+lt).val(parameter['value_id']);
        $("#aor_parameter_relevance_module"+lt).val(pModule);
    }else if($('#aor_parameter_type'+lt).val()=='list'){
        $("#aor_parameter_relevance_list"+lt).val(pList);
        listOnChange(lt,pValue);
    }else if($('#aor_parameter_type'+lt).val()=='sql'){
        $("#aor_parameter_lov_sql_id"+lt).val(parameter['value_id']);
        $("#aor_parameter_sql_statement"+lt).val(parameter['sql_statement']);
    }
    lt++;
}
/**
* 创建参数时类型变化响应函数*/
function typeOnChange(n){
    var newType = $('#aor_parameter_type'+n).val();
    var pr = '';
    var pl = '';
    if(newType=='lov'){
        pr = "<input type='text' id='aor_parameter_relevance_module"+n+"' name='aor_parameter_relevance_module[]' placeholder='关联型参数须填写' value=''>";  

        var id_file = 'aor_parameter_lov_id'+n;
        var name_file = 'aor_parameter_value'+n;
        pl = "<span class='id-ff multiple' style='width:178px;'><input type='text' id='aor_parameter_value"+n+"' name='aor_parameter_value[]' style='width:110px;' value=''>";
        pl += "<input type='hidden' id='aor_parameter_lov_id"+n+"' name='aor_parameter_lov_id[]'  value=''>";
        pl += "<button type='button' name='btn_open_popup"+n+"' id='btn_open_popup"+n+"' tabindex='1' title='选择[Alt+T]' class='button firstChild' value='选择' onclick='open_popup_add_pl("+n+",\""+id_file+"\",\""+name_file+"\")'>";
        pl += '<img src="custom/themes/SuiteR_HANDALM/images/id-ff-select.png?v=6T2wqZkzRRtQXSbbOJRC2A"></button>';
        pl += "<button id='btn_clr_file"+n+"' name='btn_clr_file"+n+"' class='button lastChild' type='button' tabindex='1' title='清除选择' onclick='clearRelateFiles_pl(\""+id_file+"\",\""+name_file+"\")' value='清除选择'>";
        pl += '<img src="custom/themes/SuiteR_HANDALM/images/id-ff-clear.png?v=6T2wqZkzRRtQXSbbOJRC2A"></button></span>';
        
    }else if(newType=='list'){
        pr = "<input type='text' id='aor_parameter_relevance_list"+n+"' onchange='listOnChange("+n+")' name='aor_parameter_relevance_list[]' placeholder='列表型参数须填写' value=''>";  

        pl = $("<select id='aor_parameter_value"+n+"' name='aor_parameter_value[]' style='width:178px;'></select>");
        var options_name = $('#aor_parameter_relevance_list'+n).val();
        var options_list = SUGAR.language.languages['app_list_strings'][options_name];
        if(typeof(options_list)!='undefined'){
            $.each(options_list,function(key,value){
                var listoption = $('<option></option>');
                listoption.val(key);
                listoption.text(value);
                pl.append(listoption);
            });
        }
    }else if(newType=='date'){
        pl = "<span id='span_date"+n+"' class='input-group date' style='width:178px;'>";
        pl += "<input id='aor_parameter_value"+n+"' class='date_input' autocomplete='off' name='aor_parameter_value[]' value='' title='' tabindex='0' type='text'>";
        pl += "<span class='input-group-addon'>";
        pl += "<span class='glyphicon glyphicon-calendar'></span></span></span>";

        pl += '<script type="text/javascript">'
        + 'var Datetimepicker=$("#span_date'+n+'");'
        + 'var dateformat="Y-m-d H:M";'
        + 'dateformat = dateformat.replace(/Y/,"yyyy");'
        + 'dateformat = dateformat.replace(/m/,"mm");'
        + 'dateformat = dateformat.replace(/d/,"dd");'
        + 'dateformat = dateformat.split(" ",1);'
        + 'Datetimepicker.datetimepicker({'
        + 'language: "zh_CN",'
        + 'format: dateformat[0],'
        + 'showMeridian: true,'
        + 'minView: 2,'
        + 'todayBtn: true,'
        + 'autoclose: true,'
        + '});'
        + '</script>';
    }else if(newType=='sql'){
        pr = "<input type='text' id='aor_parameter_sql_statement"+n+"' name='aor_parameter_sql_statement[]' placeholder='关联型参数须填写' value=''>";  

        var id_file = 'aor_parameter_lov_sql_id'+n;
        var name_file = 'aor_parameter_value'+n;
        pl = "<span class='id-ff multiple'><input type='text' id='aor_parameter_value"+n+"' name='aor_parameter_value[]' style='width:110px;' value=''>";
        pl += "<input type='hidden' id='aor_parameter_lov_sql_id"+n+"' name='aor_parameter_lov_sql_id[]'  value=''>";
        pl += "<button type='button' name='btn_open_popup"+n+"' id='btn_open_popup"+n+"' tabindex='1' title='选择[Alt+T]' class='button firstChild' value='选择' onclick='open_sql_add_pl("+n+",\""+id_file+"\",\""+name_file+"\")'>";
        pl += '<img src="custom/themes/SuiteR_HANDALM/images/id-ff-select.png?v=6T2wqZkzRRtQXSbbOJRC2A"></button>';
        pl += "<button id='btn_clr_file"+n+"' name='btn_clr_file"+n+"' class='button lastChild' type='button' tabindex='1' title='清除选择' onclick='clearRelateFiles_pl(\""+id_file+"\",\""+name_file+"\")' value='清除选择'>";
        pl += '<img src="custom/themes/SuiteR_HANDALM/images/id-ff-clear.png?v=6T2wqZkzRRtQXSbbOJRC2A"></button></span>';
        
    }else{
        pl="<input type='text' id='aor_parameter_value"+n+"' name='aor_parameter_value[]' value=''>";
    }
    $('#field_relation'+n+'_td').html(pr);
    $('#aor_parameter_value'+n+'_td').html(pl);
}
/**
* 创建参数时list项变化响应函数*/
function listOnChange(n,list_v){
    var type = $('#aor_parameter_type'+n).val();
    if(type=='list'){
        var pl = $('#aor_parameter_value'+n);
        var options_name = $('#aor_parameter_relevance_list'+n).val();
        var options_list = SUGAR.language.languages['app_list_strings'][options_name];
        if(typeof(options_list)!='undefined'){
            $.each(options_list,function(key,value){
                var listoption = $('<option></option>');
                listoption.val(key);
                listoption.text(value);
                if(list_v === key){
                 listoption.attr('selected','selected');
                }
             pl.append(listoption);
         });
        }
    }
}
/**
* 创建参数页面弹出lov窗口*/
function open_popup_add_pl(n,id_file,name_file){
    var module = $("#aor_parameter_relevance_module"+n).val();
    open_popup_pl(module,id_file,name_file);
}
function open_sql_add_pl(n,id_file,name_file){
    var sql = $("#aor_parameter_sql_statement"+n).val();
    var id = "";
    open_sql_pl(id,sql,id_file,name_file);
}

var ln = 0;
/**
* 报表详情页面加载自定义参数头*/
function loadCParameterHead(){
    $('#detailpanel_parameters').removeClass('hidden');
    $('#conditionLines').append($('<thead id="cparameterHead"></thead>'));
    $('#conditionLines').append($('<tbody id="cparameterBody"></tbody>'));
    var span = $('<tr></tr>');
    span.append("<td style='width: 5%;'> </td>");
    span.append("<td style='color: rgb(0, 0, 0);'>参数名称</td>");  
    span.append("<td style='color: rgb(0, 0, 0);'>类型</td>");  
    span.append("<td style='color: rgb(0, 0, 0);'>值</td>");  
    $('#cparameterHead').append(span);
}
/**
* 报表详情页面加载自定义参数行*/
function loadCParameterLine(parameter){
    var span = $('<tr></tr>');
    var id = '';
    if(parameter['id']){
        id = parameter['id'];
    }
    span.append("<td style='width: 5%;'>"+(ln+1)+"<input type='hidden' id='aor_parameter_id"+ln+"' class='aor_parameters_id' value='"+id+"'></td>");
    var title = '';
    if(parameter['name']){
        title = parameter['name'];
    }
    var pDescription = '';
    if(parameter['description']){ 
        pDescription = parameter['description'];
    }
    span.append("<td style='width: 15%;'> <input type='hidden' id='aor_parameter_name"+ln+"' value='"+title+"'> <span id='aor_parameter_des"+ln+"' style='width:178px;'>"+pDescription+"</span></td>");
    
    var cell = $('<td style="width: 15%;"></td>');
    var select = $("<select id='aor_parameter_type"+ln+"' name='aor_parameter_type"+ln+"' style='width:178px;'></select>");
    $.each(SUGAR.language.languages['app_list_strings']['aor_parameter_type_list'],function(key,value){
        var option = $('<option></option>');
        option.val(key);
        option.text(value);
        if(parameter['type'] === key){
            option.attr('selected','selected');
            select.append(option);
        }
    });
    cell.append(select);
    span.append(cell);

    var pValue = '';
    if(parameter['value']){ 
        pValue = parameter['value'];
    }

    var p4 = "<td style='width: 30%;'>";
    if(parameter['type'] == 'lov'){
        var module = parameter['source_module'];
        var value_id = parameter['value_id'];
        var id_file = 'aor_parameter_lov_id'+ln;
        var name_file = 'aor_parameter_value'+ln;
        p4 += "<span class='id-ff multiple'><input type='text' id='aor_parameter_value"+ln+"' style='width:178px;' value='"+pValue+"'>";
        p4 += "<input type='hidden' id='aor_parameter_lov_id"+ln+"' style='width:178px;' value='"+value_id+"'>";
        p4 += "<button type='button' name='btn_open_popup"+ln+"' id='btn_open_popup"+ln+"' tabindex='1' title='选择[Alt+T]' class='button firstChild' value='选择' onclick='open_popup_pl(\""+module+"\",\""+id_file+"\",\""+name_file+"\")'>";
        p4 += '<img src="custom/themes/SuiteR_HANDALM/images/id-ff-select.png?v=6T2wqZkzRRtQXSbbOJRC2A"></button>';
        p4 += "<button id='btn_clr_file"+ln+"' name='btn_clr_file"+ln+"' class='button lastChild' type='button' tabindex='1' title='清除选择' onclick='clearRelateFiles_pl(\""+id_file+"\",\""+name_file+"\")' value='清除选择'>";
        p4 += '<img src="custom/themes/SuiteR_HANDALM/images/id-ff-clear.png?v=6T2wqZkzRRtQXSbbOJRC2A"></button></span>';
        p4 += "</td>";
        span.append(p4);
    }else if(parameter['type'] == 'date'){
        p4 += "<span id='span_date"+ln+"' class='input-group date' style='width:178px;'>";
        p4 += "<input id='aor_parameter_value"+ln+"' class='date_input' autocomplete='off' name='aor_parameter_value"+ln+"' value='"+pValue+"' title='' tabindex='0' type='text'>";
        p4 += "<span class='input-group-addon'>";
        p4 += "<span class='glyphicon glyphicon-calendar'></span></span></span>";

        p4 += '<script type="text/javascript">'
        + 'var Datetimepicker=$("#span_date'+ln+'");'
        + 'var dateformat="Y-m-d H:M";'
        + 'dateformat = dateformat.replace(/Y/,"yyyy");'
        + 'dateformat = dateformat.replace(/m/,"mm");'
        + 'dateformat = dateformat.replace(/d/,"dd");'
        + 'dateformat = dateformat.split(" ",1);'
        + 'Datetimepicker.datetimepicker({'
        + 'language: "zh_CN",'
        + 'format: dateformat[0],'
        + 'showMeridian: true,'
        + 'minView: 2,'
        + 'todayBtn: true,'
        + 'autoclose: true,'
        + '});'
        + '</script>';
        p4 += "</td>";
        span.append(p4);    
    }else if(parameter['type'] == 'list'){
        var listcell = $('<td style="width: 30%;"></td>');
        var listselect = $("<select id='aor_parameter_value"+ln+"' name='aor_parameter_value"+ln+"' style='width:178px;'></select>");
        var options_name = parameter['list_options_name'];
        //alert("name:"+options_name);
        $.each(SUGAR.language.languages['app_list_strings'][options_name],function(key,value){
            var listoption = $('<option></option>');
            listoption.val(key);
            listoption.text(value);
            if(parameter['value'] === key){
                listoption.attr('selected','selected');
            }
            listselect.append(listoption);
        });
        listcell.append(listselect);
        span.append(listcell);
    }else if(parameter['type'] == 'sql'){
        var sql = '';
        var value_id = parameter['value_id'];
        var id_file = 'aor_parameter_lov_id'+ln;
        var name_file = 'aor_parameter_value'+ln;
        p4 += "<span class='id-ff multiple'><input type='text' id='aor_parameter_value"+ln+"' style='width:178px;' value='"+pValue+"'>";
        p4 += "<input type='hidden' id='aor_parameter_lov_id"+ln+"' style='width:178px;' value='"+value_id+"'>";
        p4 += "<button type='button' name='btn_open_popup"+ln+"' id='btn_open_popup"+ln+"' tabindex='1' title='选择[Alt+T]' class='button firstChild' value='选择' onclick='open_sql_pl(\""+id+"\",\""+sql+"\",\""+id_file+"\",\""+name_file+"\")'>";
        p4 += '<img src="custom/themes/SuiteR_HANDALM/images/id-ff-select.png?v=6T2wqZkzRRtQXSbbOJRC2A"></button>';
        p4 += "<button id='btn_clr_file"+ln+"' name='btn_clr_file"+ln+"' class='button lastChild' type='button' tabindex='1' title='清除选择' onclick='clearRelateFiles_pl(\""+id_file+"\",\""+name_file+"\")' value='清除选择'>";
        p4 += '<img src="custom/themes/SuiteR_HANDALM/images/id-ff-clear.png?v=6T2wqZkzRRtQXSbbOJRC2A"></button></span>';
        p4 += "</td>";
        span.append(p4);
    }else{
        p4 += "<span><input type='text' id='aor_parameter_value"+ln+"' style='width:178px;' value='"+pValue+"'></span>";
        p4 += "</td>";
        span.append(p4);
    }
    $('#cparameterBody').append(span);
    ln++;
}
function clearParameterLines(){
    $('.removeParameterButton').click();
}
/**
* 报表详情页面弹出lov窗口*/
function open_popup_pl(module,id_file,name_file){
    var popup_request_data = {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":id_file,"name":name_file}};
    open_popup(module,600,400,"",true,false,popup_request_data,"single",true);
}
/**
* 清除关联字段*/
function clearRelateFiles_pl(id_file,name_file){
    $("#"+id_file).val("");
    $("#"+name_file).val("");
}


var win;//open 窗口对象  
var wTimer;//计时器变量, 监听窗口关闭  
function openWindow(name)  
{  
    win = window.open('about:blank',name,'height=800, width=800, top=0, left=0, toolbar=yes, menubar=yes, scrollbars=yes, resizable=yes,location=yes, status=yes');   
    //window.open(url,"name1","width=800,height=600");    
    if (win)  
        window.win.focus();//判断窗口是否打开,如果打开,窗口前置  
    wTimer=window.setInterval("wisclosed()",500);  
} 
function wisclosed(){  
    if(win.closed){  
        //alert(window._id+window._name);//子窗体返回值  
        //这里可以做赋值操作
        $("#"+window._id_file).val(window._id);  
        $("#"+window._name_file).val(window._name); 
        window.clearInterval(wTimer)  
    }  
}  
/**
* 报表详情页面根据sql参数弹出窗口*/
function open_sql_pl(id,sql,id_file,name_file){
    //var url = "index.php?to_pdf=true&module=AOR_Parameters&action=getSqlParameter&id_file="+id_file+"&name_file="+name_file;
    var url = "index.php?to_pdf=true&module=HAOR_Parameters&action=getSqlParameter";
    var name = (new Date()).valueOf();
    var tempForm = document.createElement("form");  
    tempForm.id="tempForm1";  
    tempForm.method="post";  
    tempForm.action=url;  
    tempForm.target=name;  
    var hideInput = document.createElement("input");  
    hideInput.type="hidden";  
    hideInput.name= "id"
    hideInput.value= id;
    tempForm.appendChild(hideInput);
    var hideInput = document.createElement("input");  
    hideInput.type="hidden";  
    hideInput.name= "sql"
    hideInput.value= sql;
    tempForm.appendChild(hideInput);
    var hideInput = document.createElement("input");  
    hideInput.type="hidden";  
    hideInput.name= "id_file"
    hideInput.value= id_file;
    tempForm.appendChild(hideInput);   
    var hideInput = document.createElement("input");  
    hideInput.type="hidden";  
    hideInput.name= "name_file"
    hideInput.value= name_file;
    tempForm.appendChild(hideInput);
    var hideInput = document.createElement("input");  
    hideInput.type="hidden";  
    hideInput.name= "form_name"
    hideInput.value= name;
    tempForm.appendChild(hideInput);    
    tempForm.onsubmit=function(){ 
        openWindow(name);
    };
   /* tempForm.addEventListener("submit",function(){ 
        openWindow(name);
    },false);*/
    document.body.appendChild(tempForm);  
    var evt = document.createEvent('HTMLEvents');  
    evt.initEvent('submit',true,true);  
    tempForm.dispatchEvent(evt);  
    //tempForm.fireEvent("onsubmit");
    tempForm.submit();
    document.body.removeChild(tempForm);

    /*win = window.open(url,"name1","width=800,height=600");    
    if (win)  
        window.win.focus();//判断窗口是否打开,如果打开,窗口前置  
    wTimer=window.setInterval("wisclosed()",500);  */
}

