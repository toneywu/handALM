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
        //这里可以做赋值操作
        if(typeof(window._value_column)!="undefined"){
            $("#"+window._value_column).val(window._value); 
            if(window._id_column!=""&&window._id_column!="undefined"){
                $("#"+window._id_column).val(window._id);  
            }
            if(window._description_column!=""&&window._description_column!="undefined"){
                $("#"+window._description_column).val(window._description);
            }
            /*if(window._id_column!=""&&window._id_column!="undefined"){
                alert(window._id_column+":"+window._id);
            }
            alert(window._value_column+":"+window._value);
            if(window._description_column!=""&&window._description_column!="undefined"){
                alert(window._description_column+"--:"+window._description);
            }*/
        }
        window.clearInterval(wTimer);
    }  
}  
/***
* 值集弹出窗口
* @parameter valueSetCode  值集代码
* @parameter valueColumnName 值列的返回位置
* @parameter idColumnName 标识列的返回位置
* @parameter meanColumnName 说明列的返回位置
**/
function openValueSetPopup(valueSetCode,valueColumnName,idColumnName,meanColumnName){
    var url = "index.php?to_pdf=true&module=HAA_ValueSets&action=ValueSetOpenWindows&valueColumnName="+valueColumnName+"&idColumnName="+idColumnName+"&meanColumnName="+meanColumnName;
    var name = (new Date()).valueOf();
    var dataForm = document.createElement("form");  
    dataForm.id="dataForm";  
    dataForm.method="post";  
    dataForm.action=url;  
    dataForm.target=name;  
    var hideInput = document.createElement("input");  
    hideInput.type="hidden";  
    hideInput.name= "value_set_code"
    hideInput.value= valueSetCode;
    dataForm.appendChild(hideInput);
    var hideInput = document.createElement("input");  
    hideInput.type="hidden";  
    hideInput.name= "value_column_name"
    hideInput.value= valueColumnName;
    dataForm.appendChild(hideInput);   
    var hideInput = document.createElement("input");  
    hideInput.type="hidden";  
    hideInput.name= "id_column_name"
    hideInput.value= idColumnName;
    dataForm.appendChild(hideInput);
    var hideInput = document.createElement("input");  
    hideInput.type="hidden";  
    hideInput.name= "form_name"
    hideInput.value= name;
    dataForm.appendChild(hideInput);    
    dataForm.onsubmit=function(){ 
        openWindow(name);
    };
    document.body.appendChild(dataForm);  
    var evt = document.createEvent('HTMLEvents');  
    evt.initEvent('submit',true,true);  
    dataForm.dispatchEvent(evt);  
    dataForm.submit();
    document.body.removeChild(dataForm);

}