function rewriteSave(){
	$(".button.primary").attr('onclick','saveLinearElement()').attr('type','button');
}
function saveLinearElement(){
	var jsonObj = {};
	jsonObj['parent_asset_id']=$("#parent_asset_id").val();
	jsonObj['name']=$("#name").val();
	jsonObj['description']=$("#description").val();
	$.ajax({
			type:"POST",
			url: "index.php?to_pdf=true&module=HAT_Linear_Elements&action=saveLinearElement",
			data: jsonObj,
			success: function(msg){ 
				console.log("msg = "+msg);
				$("#name").val('');
				$("#description").val('');
				window.location.href = "index.php?module=HAT_Assets&action=DetailView&record=" + $("#parent_asset_id").val();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				 alert('Error loading document');
				 console.log(textStatus+errorThrown);
			},
		});
}