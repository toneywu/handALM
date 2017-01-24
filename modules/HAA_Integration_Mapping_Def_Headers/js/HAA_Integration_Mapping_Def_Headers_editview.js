//$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); //MessageBox
//$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');
function handle_system_header(interface_id) {
		$.ajax({
			async:false,
			url: 'index.php?to_pdf=true&module=HAA_Integration_Mapping_Def_Headers&action=handle_system_header',
			data: '&interface_id='+interface_id,
			type:'POST',
			success: function (data) {
				//data=$.parseJSON(data);
				//data=JSON.parse(data);
				$("#system_header_id").val(data);
			}
	});
}

function setExtendValReturn(popupReplyData){
	//console.log(popupReplyData);
  var id=popupReplyData['name_to_value_array']['haa_interfaces_id_c'];
  handle_system_header(id);
  set_return(popupReplyData);
}