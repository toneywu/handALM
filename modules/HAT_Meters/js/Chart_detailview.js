$('head').append('<link href="custom/resources/nvd3/build/nv.d3.min.css" rel="stylesheet" type="text/css" />');
$.getScript("custom/resources/d3/d3.min.js");
$.getScript("custom/resources/nvd3/build/nv.d3.js");


function data_for_chart() {
/*  var sin = [],
      cos = [];

  for (var i = 0; i < 10; i++) {
    sin.push({x: i, y: Math.sin(i/10)});
    cos.push({x: i, y: .5 * Math.cos(i/10)});
  }
console.log(sin);*/


  	var render_data=[];

	$.ajax({//读取子地点
		url: 'index.php?to_pdf=true&module=HAT_Meters&action=getMeterChartData&id=bfe48c6a-4535-d02a-a59d-57a2f0856f6f', //+ id,
		//dataType: "json",
		success: function (data) {
			var obj = jQuery.parseJSON(data);
			//console.log(obj);
			for (var i in obj) {
				render_data.push({x: new Date(obj[i].x).getTime(), y: obj[i].y});
			};
/*			console.log(render_data);
			console.log(new Date('2016-08-01').getTime());*/
		},
		error: function () { //失败
			alert('Error loading document');
		}
	});


	return [
		    {
				      key: '读数/计量结果',
				      color: '#ff7f0e',
				      values: render_data
			},
		    /*{
				      key: '读数/计量结果2',
				      color: 'green',
				      values: [{x: new Date('2016-08-01').getTime(), y: 800},{x: new Date('2016-08-17').getTime(), y: 800},{x: new Date('2016-08-25').getTime(), y: 800}]
			},	*/];
}

function render_chart() {
	nv.addGraph(function() {
	  var chart = nv.models.lineChart()
	    .useInteractiveGuideline(true)
	    ;

	  chart.xAxis
	    .axisLabel('Date (day)')
	    /*.tickFormat(d3.format(',r'))
	    ;*/
		.tickFormat(function(d) {
         return d3.time.format('%Y-%m-%d')(new Date(d))
      });

	  chart.yAxis
	    .axisLabel('Measuring Unit')
	    .tickFormat(d3.format('.02f'))
	    ;

	  d3.select('#chart svg')
	    .datum(data_for_chart())
	    .transition().duration(500)
	    .call(chart)
	    ;

	  nv.utils.windowResize(chart.update);
	 	console.log(chart);
	  return chart;
	});
}

$(document).ready(function(){
	$("#list_subpanel_hat_meters_subpanel_hat_meter_reading").after("<div id='chart' style='height:300px'><svg></svg></div>")

	SUGAR.util.doWhen("typeof nv != 'undefined' && typeof d3 != 'undefined'", function(){
		render_chart();
	});

});

