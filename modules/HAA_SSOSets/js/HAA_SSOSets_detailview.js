

function AddToConfigs(){
	console.log("LineConfigEnable111");
	if ($("#http_referer_url").text() != '') {
		console.log("LineConfigEnable222");
	}else{
		console.log("LineConfigEnable333");
	}
}

$(document).ready(function(){
	$("#line_items_span").parent().prev().hide();
	//$("#edit_button").after("<input type='button'value='"+SUGAR.language.get('HAA_SSO_Login_Logs','LBL_CONFIG_LINE')+"'class='button'id='btn_add_config'onclick='AddToConfigs()'>");
	//$("#whole_subpanel_haa_valuesets_haa_values").replaceWith("");
	//$("#parent_flex_value_set_desc").text($("#description0").val());
	var str = "";
	for  (var i=1;i<=$("#keyword1").text().length;i++)
	{
		str += '*';
	}
	$("#keyword1").text(str);
	str = "";
	for  (var i=1;i<=$("#keyword2").text().length;i++)
	{
		str += '*';
	}
	$("#keyword2").text(str);
	str = "";
	for  (var i=1;i<=$("#keyword3").text().length;i++)
	{
		str += '*';
	}
	$("#keyword3").text(str);
	str = "";
	for  (var i=1;i<=$("#keyword4").text().length;i++)
	{
		str += '*';
	}
	$("#keyword4").text(str);
	str = "";
	for  (var i=1;i<=$("#certificate_key").text().length;i++)
	{
		str += '*';
	}
	$("#certificate_key").text(str);

	$("#btn_add_config").click(function(){
		var val=$("#http_referer_url").text();
		$.ajax({
	            url:"index.php?module=HAA_SSOSets&action=addToConfigs&to_pdf=true",
	            data:"&config_url="+val,
	            type:"POST",//PUT
	            success:function(result){
	                if (result == '1') {
	                    alert("配置生效!");
	                }else{
	                	alert("该配置没有代理url或该代理url已存在于文件中");
	                }
	            }
	    });
	});

});