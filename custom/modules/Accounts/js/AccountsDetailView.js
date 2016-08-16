function DocumentReady() {

    if( $('#is_le_c').is(':checked')) {
        $("#detailpanel_4").show();
    } else {
        $("#detailpanel_4").hide();
    }

    if( $('#is_customer_c').is(':checked')) {
        $("#detailpanel_3").show();
    } else {
        $("#detailpanel_3").hide();
    }

}


$(document).ready(DocumentReady);