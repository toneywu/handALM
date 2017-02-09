function closePopup() {
   /* var closePopup =  window.document.close_popup;
   if (closePopup) {*/
   	window.close();
   // }
 }

 function send_back(id, value, description) {
  window.opener.window._id_column=GetQueryString('idColumnName');  
  window.opener.window._value_column=GetQueryString('valueColumnName');  
  window.opener.window._description_column=GetQueryString('meanColumnName'); 
  window.opener.window._id=id;  
  window.opener.window._value=value;  
  window.opener.window._description=description; 
  closePopup();

}
var psql;
function onJumpPage(offset){
	var form = document.getElementById("p_form");
	var hideInput = document.createElement("input");  
  hideInput.type="hidden";  
  hideInput.name= "next_offset"
  hideInput.value= offset;
  form.appendChild(hideInput);
  var hideInput = document.createElement("input");  
  hideInput.type="hidden";  
  hideInput.name= "sql"
  hideInput.value= psql;
  form.appendChild(hideInput);    
  form.submit();
}

function GetQueryString(name)
{
 var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
 var r = window.location.search.substr(1).match(reg);
 if(r!=null)return  unescape(r[2]); return null;
}