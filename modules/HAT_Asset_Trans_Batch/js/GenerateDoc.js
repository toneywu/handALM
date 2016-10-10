
SUGAR.util.doWhen("typeof tinymce != 'undefined'", function(){
	tinymce.init({
	  selector: 'textarea',
    content_css : 'custom/themes/pdf.css',
	  height: 500,
	  language: 'zh_CN',
    plugins: [
      "advlist autolink autosave link image lists charmap print preview hr  pagebreak spellchecker",
      "searchreplace wordcount visualblocks visualchars fullscreen insertdatetime",
      "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
    ],

    toolbar1: "| undo redo | cut copy paste removeformat | searchreplace | bullist numlist | outdent indent | link unlink image table | charmap emoticons | hr pagebreak | spellchecker | insertdatetime preview ",//fullscreen",
    toolbar2: "bold italic underline strikethrough | subscript superscript | forecolor backcolor   | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect",
    table_class_list: [
        {title: 'None', value: ''},
        {title: 'table-standard', value: 'table-standard'},
        {title: 'table-minimalist', value: 'table-hor-minimalist'},
        {title: 'table-box', value: 'table-box'},
        {title: 'table-newspaper', value: 'table-newspaper'},
      ]
  });
});


function SaveAsPDF(task, module, uid, templateID){
  document.getElementById('GenerateDocForm').action = "index.php?module="+module+"&action=GenerateDoc&uid="+uid+"&templateID="+templateID+"&task="+task;
  document.getElementById('GenerateDocForm').submit();
}