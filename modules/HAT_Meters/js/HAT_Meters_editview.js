function setMeterTypePopupReturn(popupReplyData) {
    set_return(popupReplyData);
    //在选择了资产后，自动将名称命名为 资产-仪表类型
    $("#name").val($("#asset").val()+"-"+$("#meter_type").val());
}

function setAssetPopupReturn(popupReplyData) {
    set_return(popupReplyData);
    $("#name").val($("#asset").val()+"-"+$("#meter_type").val());
}


$(document).ready(function(){

	//在地点、资产下方添加一个说明的span
	$("#location").parent().append("<span style='display:block' id='location_desc_text'></span><input type='hidden' id='location_desc' name='location_desc'>");
	$("#asset").parent().append("<span style='display:block' id='asset_desc_text'></span><input type='hidden' id='asset_desc' name='asset_desc'>");
    //这两个变量从view/view.edit.php中传递来
    if (typeof js_var_location_title !== "undefined") {
        $("#location_desc_text").text(js_var_location_title);
    }
    if (typeof js_var_asset_desc !== "undefined") {
            $("#asset_desc_text").text(js_var_asset_desc);
    }
})