function closePopup() {
   /* var closePopup =  window.document.close_popup;
   if (closePopup) {*/
   	window.close();
   // }
}

function send_back(id_file,name_file,id, name) {
	window.opener.window._id_file=id_file;  
	window.opener.window._name_file=name_file; 
	window.opener.window._id=id;  
	window.opener.window._name=name; 
	closePopup();

}

function onJumpPage(offset){
	var form = document.getElementById("p_form");
	var hideInput = document.createElement("input");  
		hideInput.type="hidden";  
		hideInput.name= "next_offset"
		hideInput.value= offset;
		form.appendChild(hideInput);
	form.submit();
}