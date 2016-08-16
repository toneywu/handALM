function DocumentReady() {
//$("#maps_lat_c").css("background-Color", "#efefe");
//$("#maps_lat_c").val("new value");

//$("#Users0emailAddress0").css("background-Color", "red");
//$("#primary_email_c").css("background-Color", "red");
//$("#primary_email_c").val($("#Users0emailAddress0").val());//无法从Mail录取到值

$('#email_options').hide();
$('#last_name_label').hide();
$('#last_name').hide();


$('#primary_email_c').change(function(){
	var current_email = $("#primary_email_c").val();
	$("#Users0emailAddress0").val(current_email);
	if (isEmail(current_email)) {
		$("#primary_email_c").css("background-Color", 'white');
		$("#primary_email_c").css("border-Color", '#cccccc');
	}else{
		$("#primary_email_c").css("background-Color", "#ffbfdf");
		$("#primary_email_c").css("border-Color", 'red');
	}
}); 
addToValidate('EditView','primary_email_c', 'email', true, 'EMAIL');
}


function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}



$(document).ready(DocumentReady);

