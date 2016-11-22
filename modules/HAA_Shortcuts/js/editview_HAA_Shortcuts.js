


$(document).ready(function(){

	//加载图标选择器，从modules\HAT_Assets\js\editview_icon_picker.js

	SUGAR.util.doWhen("typeof icon_edit_init == 'function'", function(){
		icon_edit_init($("#shortcut_icon"));
	});


});



