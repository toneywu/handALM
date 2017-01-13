/**
 * Advanced OpenReports, SugarCRM Reporting.
 * @package Advanced OpenReports for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */
var file_name='';
$(document).ready(function() {

    $('#download_pdf_button_old').click(function() {
        //Update the Detail view form to have the parameter info and reload the page
        var _form = $('#formDetailView');
        $('#formDetailView :input[name="action"]').val("DownloadPDF");
        //Add each parameter to the form in turn
        $('.aor_conditions_id').each(function(index, elem){
            $elem = $(elem);
            var ln = $elem.attr('id').substr(17);
            var id = $elem.val();
            _form.append('<input type="hidden" name="parameter_id[]" value="'+id+'">');
            var operator = $("#aor_conditions_operator\\["+ln+"\\]").val();
            _form.append('<input type="hidden" name="parameter_operator[]" value="'+operator+'">');
            var fieldType = $('#aor_conditions_value_type\\['+ln+'\\]').val();
            _form.append('<input type="hidden" name="parameter_type[]" value="'+fieldType+'">');
            var fieldInput = $('#aor_conditions_value\\['+ln+'\\]').val();
            _form.append('<input type="hidden" name="parameter_value[]" value="'+fieldInput+'">');
        });

        //Get the data url of each of the rgraph canvases for PDF generation on the server
        var encodedGraphs = [];
        var rgraphs = document.getElementsByClassName('resizableCanvas');
        for(var i = 0; i < rgraphs.length; i++)
        {
            //encodedGraphs.push(rgraphs[i].toDataURL());

            _form.append('<input type="hidden" id="graphsForPDF" name="graphsForPDF[]" value='+rgraphs[i].toDataURL()+'>');
        }

        //$('#formDetailView :input[name="encodedGraphs"]').val(JSON.stringify(encodedGraphs));
        //var graphString = JSON.stringify(encodedGraphs);

        _form.submit();

        //$('#graphsForPDF').remove();
        $("#formDetailView #graphsForPDF").remove();
    });

    $('#download_csv_button_old').click(function() {
        //Add By ling.zhang01 20161227
        $('#myModal1').modal('show');  
        //Add Instance By ling.zhang01 20161227 End
        
        //Update the Detail view form to have the parameter info and reload the page
        var _form = $('#formDetailView');
        $('#formDetailView :input[name="action"]').val("Export");
        //Add each parameter to the form in turn
        //Update By ling.zhang01 20170110
        if($('#report_type').val()=='Custom'){
             $('.aor_parameters_id').each(function(index, elem){
                $elem = $(elem);
                var ln = $elem.attr('id').substr(16);
                var id = $elem.val();
                _form.append('<input type="hidden" class="parameter" name="parameter_id[]" value="'+id+'">');
               
                var fieldInput="";
                var file_type = $('#aor_parameter_type'+ln).val();
                if (file_type == 'lov'||file_type == 'sql'){
                    fieldInput = $('#aor_parameter_lov_id'+ln).val();
                } else {
                    fieldInput = $('#aor_parameter_value'+ln).val();
                }
                _form.append('<input type="hidden" class="parameter" name="parameter_value[]" value="'+fieldInput+'">');
            });
        }else{
            $('.aor_conditions_id').each(function(index, elem){
                $elem = $(elem);
                var ln = $elem.attr('id').substr(17);
                var id = $elem.val();
                _form.append('<input type="hidden" class="parameter" name="parameter_id[]" value="'+id+'">');
                var operator = $("#aor_conditions_operator\\["+ln+"\\]").val();
                _form.append('<input type="hidden" class="parameter" name="parameter_operator[]" value="'+operator+'">');
                var fieldType = $('#aor_conditions_value_type\\['+ln+'\\]').val();
                _form.append('<input type="hidden" class="parameter" name="parameter_type[]" value="'+fieldType+'">');
                var fieldInput = $('#aor_conditions_value\\['+ln+'\\]').val();
                _form.append('<input type="hidden" class="parameter" name="parameter_value[]" value="'+fieldInput+'">');
            });
        }
        //Add By ling.zhang01 20161227
        var options={  
        //target : file_name,    // 把服务器返回的内容放入id为output的元素中  
        //beforeSubmit : showRequest,    // 提交前的回调函数  
        success : closeDialog,    // 提交后的回调函数  
        // url : url,    //默认是form的action，如果申明，则会覆盖  
        //type : 'GET',    // 默认值是form的method("GET" or "POST")，如果声明，则会覆盖  
        //dataType : 'xml',    // html（默认）、xml、script、json接受服务器端返回的类型  
        // clearForm : true,    // 成功提交后，清除所有表单元素的值  
        // resetForm : true,    // 成功提交后，重置所有表单元素的值  
        // timeout : 3000    // 限制请求的时间，当请求大于3秒后，跳出请求  
        }  ;
        // _form.submit();   //原form提交方式
        _form.ajaxSubmit(options);  
        $(".parameter").remove();
        //Add Instance By ling.zhang01 20161227 End
    });
});
/**
* Add By ling.zhang01 20161227
* 提交后的回调函数
*/
function closeDialog(data){
    $('#myModal1').modal('hide');
    file_name = encodeURIComponent(data) ;
    download();
}
/**
* 从服务器下载报表数据文件
*/
function download(){
    if($('.ifrm')==null){   
            var objIframe=document.createElement("IFRAME");   
            document.body.appendChild(objIframe);
            objIframe.outerHTML="<iframe name=ifrm style='width:0;hieght:0' ></iframe>";   
            var re=setTimeout("download()",1);
     }else{   
            clearTimeout(re)   
            files=window.open('custom/modules/AOR_Reports/rpt_data_files/'+file_name,"ifrm");
            files.document.execCommand("SaveAs");
            $('.ifrm').remove();
    }
}
//Add Instance By ling.zhang01 20161227 End

function openProspectPopup(){

    var popupRequestData = {
        "call_back_function" : "setProspectReturn",
        "form_name" : "EditView",
        "field_to_name_array" : {
            "id" : "prospect_id"
        }
    };

    open_popup('ProspectLists', '600','400', '', true, false, popupRequestData);

}

function setProspectReturn(popup_reply_data){

    var callback = {
        success: function(result) {
            //report_rel_modules = result.responseText;
            //alert('pass '+result.responseText);
        },
        failure: function(result) {
            //alert('fail '+result.responseText);
        }
    }

    var prospect_id = popup_reply_data.name_to_value_array.prospect_id;
    var record = document.getElementsByName('record')[0].value;

    YAHOO.util.Connect.asyncRequest ("GET", "index.php?module=AOR_Reports&action=addToProspectList&record="+record+"&prospect_id="+prospect_id,callback);




}


function changeReportPage(record, offset, group){
    var callback = {
        success: function(result) {
           document.getElementById('report_table'+group).innerHTML = result.responseText;
        }
    }
    var query = "?module=AOR_Reports&action=changeReportPage&record="+record+"&offset="+offset+"&group="+group;
    $('.aor_conditions_id').each(function(index, elem){
        $elem = $(elem);
        var ln = $elem.attr('id').substr(17);
        var id = $elem.val();
        query += "&parameter_id[]="+id;
        var operator = $("#aor_conditions_operator\\["+ln+"\\]").val();
        query += "&parameter_operator[]="+operator;
        var fieldType = $('#aor_conditions_value_type\\['+ln+'\\]').val();
        query += "&parameter_type[]="+fieldType;
        var fieldInput = $('#aor_conditions_value\\['+ln+'\\]').val();
        query += "&parameter_value[]="+fieldInput;
    });

    YAHOO.util.Connect.asyncRequest ("GET", "index.php"+query,callback);
}