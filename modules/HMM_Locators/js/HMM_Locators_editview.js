$.getScript("custom/resources/jQuery-Mask-Plugin/dist/jquery.mask.min.js");
//ref:http://igorescobar.github.io/jQuery-Mask-Plugin/
//
$(document).ready(function(){
  $('#name').mask($('#locator_coding_mask').val(),{'translation':{
  						'A':{pattern:/[A-Za-z]/},
  						'S':{pattern:/[A-Za-z]/},
  						'X':{pattern:/[A-Za-z0-9]/},
  						'Z':{pattern:/[0-9]/,optional:true}
  						'N':{pattern:/[0-9]/},
  						'0':{pattern:/\d/},
  						'9':{pattern:/\d/, optional: true},
  						'#':{pattern:/\d/, recursive: true},
  				}});
});