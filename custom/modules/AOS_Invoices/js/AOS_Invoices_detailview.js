
function deleteButtonClick(recordId){

	if(confirm('您确定要删除这条记录?')) {
		var _form = document.getElementById('formDetailView'); 
		_form.return_module.value='AOS_Invoices';
		_form.return_action.value='ListView'; 
		_form.action.value='Delete'; 
		$.ajax({
			url: 'index.php?to_pdf=true&module=AOS_Invoices&action=updateClearStatus&invoiceId='+recordId,
			success: function (data) {
				console.log(data);
			},
	            error: function () { //失败
	            	alert('Error loading document');
	            }
	        });
		SUGAR.ajaxUI.submitForm(_form);
	}
}