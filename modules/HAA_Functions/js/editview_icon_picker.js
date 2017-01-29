

$.getScript("custom/resources/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-glyphicon.min.js");
$.getScript("custom/resources/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-materialdesign-icomoon.js");

function icon_edit_init(icon_field_obj) {
	icon_field_obj.hide();
	icon_field_obj.after('<button class="btn btn-default"  id="target_iconpicker" role="iconpicker"></button>');

	$.getScript("custom/resources/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js",
	function () {

		$('#target_iconpicker').iconpicker();
		$('#target_iconpicker').iconpicker('setCols', 9);
		$('#target_iconpicker').iconpicker('setIconset', 'materialdesign');
		$('#target_iconpicker').iconpicker('setSearch', false);

		//初始值
		$('#target_iconpicker').iconpicker('setIcon', icon_field_obj.val());
		$("#asset_icon").hide();
	});


		$('#target_iconpicker').on('change', function(e) {
			icon_field_obj.val(e.icon);
		});
};

