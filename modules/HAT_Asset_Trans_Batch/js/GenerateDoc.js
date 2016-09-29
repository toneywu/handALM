
SUGAR.util.doWhen("typeof tinymce != 'undefined'", function(){
	tinymce.init({
	  selector: 'textarea',
	  height: 500,
	  language: 'zh_CN',
  height: 500,
  plugins: [
    "advlist autolink autosave link image lists charmap print preview hr  pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars fullscreen insertdatetime",
    "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
  ],

  toolbar1: "| undo redo | cut copy paste removeformat | searchreplace | bullist numlist | outdent indent | link unlink image table | charmap emoticons | hr pagebreak | spellchecker | insertdatetime preview ",//fullscreen",
  toolbar2: "bold italic underline strikethrough | subscript superscript | forecolor backcolor   | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect",

	});
});
