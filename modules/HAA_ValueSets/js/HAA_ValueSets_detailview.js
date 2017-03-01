//引用了IP解析代码
//REF：https://github.com/franksrevenge/IPSubnetCalculator
//
//    console.log( IpSubnetCalculator.toDecimal( '127.0.0.1' ) ); // "2130706433"
 //  console.log( IpSubnetCalculator.calculate( '5.4.3.21', '6.7.8.9' ) );
function check_type() {
	var valueset_type=document.getElementById('valueset_type').value;
	//console.log("valueset_type   " + "      " + valueset_type);
	
	//类型为表验证时,隐藏值集段值定义
	if (valueset_type == 'F') {
		$("#detailpanel_0").show();
		$("#tab0").parent().next().show()
		$("#detailpanel_1").hide();//
		$("#detailpanel_2").hide();
	 	$("#tab0").parent().next().next().hide()
	 	$("#tab0").parent().next().next().next().hide()
	 } else if(valueset_type == 'D'){
	 	$("#detailpanel_0").hide();
	 	$("#detailpanel_1").show();//
	 	$("#detailpanel_2").show();//
	 	$("#tab0").parent().next().hide()
	 	$("#tab0").parent().next().next().show()
	 	$("#tab0").parent().next().next().next().show()
	 }else if (valueset_type == 'I') {
	 	$("#detailpanel_0").hide();
	 	$("#detailpanel_1").hide();
		$("#detailpanel_2").show();
		$("#tab0").parent().next().hide()
	 	$("#tab0").parent().next().next().hide()
	 	$("#tab0").parent().next().next().next().show()
	 } else if (valueset_type == 'T') {
	 	
	 }
};



$(document).ready(function(){
	check_type();
	$("#line_items_span").parent().prev().hide();
	$("#parent_flex_value_set_desc").text($("#description0").val());
	//将Subpanel的内容前移到上方TAB中
	//$("#LBL_DETAILVIEW_PANEL3").after("<div class='tab_subpanel'>"+$("#whole_subpanel_haa_valuesets_haa_values").html()+"</div>");
	//隐藏通过关系自动建的行的面板
	$("#whole_subpanel_haa_valuesets_haa_values").replaceWith("");

	

	//$("#LBL_EDITVIEW_PANEL_WOLINES").after("<div class='tab_subpanel'>"+$("#detailpanel_1").html()+"</div>");
});