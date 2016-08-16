//这整个asset trans batch中有两个主要的文件，一个是当前的文件
//另一个在hmm_trans_lines/js/line_item.js

function getLovValueByText(focused_textfiled_id,list_Lov_id) { //根据LOV的Text，转为Value标准功能有BUG，返回的只能是TEXT
	var LovValue, LovText;
	LovText = $("#"+focused_textfiled_id).val();
	LovValue = $("#"+list_Lov_id+" option").filter(function() {return $(this).html() == LovText;}).val();
	return LovValue;
}


$(document).ready(function(){
	$('#LBL_EDITVIEW_PANEL1 td:first').hide();
});

