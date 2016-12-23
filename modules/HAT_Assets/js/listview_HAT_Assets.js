$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); // MessageBox
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');
var loaded = false; 
$(document).ready(function(){
if (!loaded) { 
	if(typeof return_msg!="undefined" && return_msg!=""){
		console.log(return_msg);
		loaded=true;
		
		jQuery.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js").done(function() {
					BootstrapDialog.show({
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