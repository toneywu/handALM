function assignWoop(id,record){
	//alert(record);
	$.ajax({
		url: 'index.php?to_pdf=true&module=HAM_WOOP&action=assign_woop_people&id=' + id,
		success: function (data) {
			//alert(data);
			//alert("assignWoop")
			if(data!="Y"){
				window.location.href = "index.php?module=HAM_WOOP";
			}
		},
		error: function () { //失败
			alert('Error loading document');
		}
	});
	
}