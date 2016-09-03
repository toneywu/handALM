function setBusinessTypePopupReturn(popupReplyData){//选择完产品后的动作
    set_return(popupReplyData);
    //开始建立flexFields
    triger_setFF($("#haa_ff_id").val(),"Contacts")
    $(".expandLink").click();
}


function DocumentReady() {

}


$(document).ready(DocumentReady);