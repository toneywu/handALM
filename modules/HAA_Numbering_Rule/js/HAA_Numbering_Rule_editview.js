$(document).ready(function(){
	//将SR编号、创建人字段标识的不可修改
	$("#current_number,#nextval").attr("readonly",true);
	$("#current_number,#nextval").css("background-Color","#efefef");
	
	$("#perfix").change(function(){
	  reset_nextval();
	});

	$("#min_num_strlength").change(function(){
	  reset_nextval();
	});

function reset_nextval() {

	var current_num = "" + $("#current_number").val()
	var padding_len = $("#min_num_strlength").val()
	var padding_str = "";

	for(var i=0; i<padding_len; i++) {
		 padding_str =  padding_str+ "0";
	}
	//alert(padding_str);
	padding_str = padding_str.substring(0, padding_str.length - current_num.length) + current_num;

	$("#nextval").val($("#perfix").val()+padding_str);
}

});
