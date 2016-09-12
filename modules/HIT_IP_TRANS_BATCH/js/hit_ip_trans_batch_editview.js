function setEventTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	setEventTypeFields();
}

function setEventTypeFields() {
	$.ajax({//
		url: 'index.php?to_pdf=true&module=HAT_EventType&action=getTransSetting&id=' + $("#hat_eventtype_id").val(),//e74a5e34-906f-0590-d914-57cbe0e5ae89
		async: false,
		success: function (data) {
			var obj = jQuery.parseJSON(data);
			//console.log(obj);
			for(var i in obj) {
				$("#"+i).val(obj[i]);//向隐藏的字段中复制值，从而所有的EventType值都会提供到隐藏的字段中
			}
			resetEventType();
		},
		error: function () { //失败
			alert('Error loading document');
		}
	})
}

function resetEventType(){
};

$(document).ready(function(){

	//...

});
