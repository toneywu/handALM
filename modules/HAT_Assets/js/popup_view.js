$(document).ready(function() {
	console.log("ready go 11232");
	//$("#framework_advanced").after("<input type='hidden' id='target_owning_org_id_advanced' value='54b17458-3c99-15cd-ce95-57ad8b859112'>");
	$("#owning_org_id_advanced").hide();
	$("#enable_it_rack_advanced").hide();
	//$("#asset_type_advanced").hide();
	//console.log(owning_org_id);
	$("#framework_advanced").after("<input type='hidden' id='asset_type' value=''>");
	if(typeof owning_org_id!="undefined"){

		$("#framework_advanced").after("<input type='hidden' id='target_using_org_id_advanced' value='"+owning_org_id+"'>");
	}
	//
    if(typeof asset_type!="undefined"&&asset_type!=""){
		//document.getElementById("asset_type_advanced").value=asset_type;
		$("#asset_type").val(asset_type);
		if(asset_type=="ODF"){
			$(".list.view").children().eq(1).find("th").each(function(){
				if($(this).index()!="5"&&$(this).index()!="6"){
					$(this).css("display","none");
					
				}
			});
			
			$(".list.view").children().eq(2).find("td").each(function(){
				if($(this).index()!="5"&&$(this).index()!="6"){
					$(this).css("display","none");
				}
			});
			
			$(".list.view").children().eq(1).find("th").eq(5).each(function(){
				$(this).find("a").eq(0).text("A端盒名");
			});
			$(".list.view").children().eq(1).find("th").eq(6).each(function(){
				$(this).find("a").eq(0).text("B端盒名");
			});
			
		}else{
			$(".list.view").children().eq(1).find("th").each(function(){
				console.log($(this).index());	
				if($(this).index()=="5"||$(this).index()=="6"){
					$(this).css("display","none");
				}
			});
			$(".list.view").children().eq(2).find("td").each(function(){
				if($(this).index()=="5"||$(this).index()=="6"){
					$(this).css("display","none");
				}
			});
			
			
			
		}
	}
	
	
	if(typeof current_framework!="undefined"){
		$("#haa_frameworks_id_advanced").val(current_framework);
	}
	$("#popup_query_form").attr("action",window.location.href);
});