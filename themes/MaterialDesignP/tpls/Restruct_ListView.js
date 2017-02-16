$(document).ready(function(){
	//创建快捷按钮
	$("#preload_menu").hide()

	var view=action_sugar_grp1;
	switch (view) {
		case 'index':
			$("#preload_menu").appendTo($(".moduleTitle").first());
			$("#preload_menu").show()
			break;
		case 'DetailView':
		    $("#preload_menu").appendTo($("#formDetailView .buttons").first());
			$("#preload_menu").show()
			break;
	}
	//加载按钮上的图片

	var btn_icon = {}
	btn_icon["icon-Create"] = "plus";
	btn_icon["icon-List"] = "list";
	btn_icon["icon-View"] = "list";
	btn_icon["icon-Import"] = "import";
	btn_icon["icon-Create_Contact_Vcard"] = "file";
	btn_icon["icon-TreeView"] = "eye-open";

	$("#preload_menu .side-bar-action-icon").each(function(){
		//$(this).append("<img src='themes/MaterialDesignP/images/btns/"+$(this).context.classList[0]+".svg'/>")
		$(this).append("<i class='glyphicon glyphicon-"+btn_icon[$(this).context.classList[0]]+"'></i>")
	});

})
