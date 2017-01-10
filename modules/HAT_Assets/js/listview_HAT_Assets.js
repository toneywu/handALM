$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); // MessageBox
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');
var loaded = false; 
$(document).ready(function(){
	console.log("dddddddddd");
	console.log("ddd"+$("error_message").val());
if (!loaded) { 
	if(typeof return_msg!="undefined" && return_msg!=""){
		console.log(return_msg);
		loaded=true;
		
		/* BootstrapDialog.show({
            message: 'Hi Apple! <br/>Hi Apple!'
        });*/
		var alter_msg = "";
		var return_msg_array = return_msg.split(";");
		for(var i=0;i<return_msg_array.length;i++){
			if(return_msg_array[i]!=""){
				alter_msg=alter_msg+return_msg_array[i]+"<br/>";
			}
		}
		
		
		console.log(alter_msg);
		jQuery.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js").done(function() {
					BootstrapDialog.show({
									size: BootstrapDialog.SIZE_NORMAL,
									message: alter_msg,
									buttons: [{
										label: 'Close',
										action: function(dialogItself){
											dialogItself.close();
											return_msg="";
											window.location.href="index.php?module=HAT_Assets&action=index";
										}
									}]
								});
		
		
		
		});

		
		/*BootstrapDialog.show({
            size: BootstrapDialog.SIZE_LARGE,
            message: return_msg,
            buttons: [{
                label: 'Close',
                action: function(dialogItself){
                    dialogItself.close();
					return_msg="";
					window.location.href="index.php?module=HAT_Assets&action=index";
                }
            }]
        });*/
		
		
		/*BootstrapDialog.alert({
					type : BootstrapDialog.TYPE_DANGER,
					title : SUGAR.language.get('app_strings',
							'LBL_EMAIL_ERROR_GENERAL_TITLE'),
					message : return_msg
				});*/
		
	}
	
	
}	
	
});