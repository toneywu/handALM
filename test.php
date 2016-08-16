<!-- 
<script type="text/javascript" src="custom/resources/d3/d3.js"></script>
<script type="text/javascript" src="custom/resources/nvd3/build/nv.d3.js"></script> -->
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="cache/include/javascript/sugar_grp1_jquery.js?v=ehf-FkQ5ENVuqzsrdphKxQ"></script>
<script type="text/javascript" src="cache/include/javascript/sugar_grp1_yui.js?v=ehf-FkQ5ENVuqzsrdphKxQ"></script>
<script type="text/javascript" src="cache/include/javascript/sugar_grp1.js?v=ehf-FkQ5ENVuqzsrdphKxQ"></script>
<script type="text/javascript" src="include/javascript/calendar.js?v=ehf-FkQ5ENVuqzsrdphKxQ"></script>

<!-- <script type="text/javascript" src="custom/resources/d3/d3.min.js"></script> -->
<!-- <script type="text/javascript" src="custom/resources/nvd3/build/nv.d3.js"></script>
 -->
    <style>
        text {
            font: 12px sans-serif;
        }
        svg {
            display: block;
        }
        html, body, svg {
            margin: 0px;
            padding: 0px;
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>

<svg id="test1"></svg>

<script>
$('head').append('<link href="custom/resources/nvd3/build/nv.d3.min.css" rel="stylesheet" type="text/css" />');
$.getScript("custom/resources/d3/d3.min.js");
$.getScript("custom/resources/nvd3/build/nv.d3.js");

alert(new Date('2016-08-01').getTime())

 SUGAR.util.doWhen("typeof nv != 'undefined' && typeof d3 != 'undefined'", function(){
    nv.addGraph({
        generate: function() {
            var width = nv.utils.windowSize().width - 40,
                height = nv.utils.windowSize().height - 40;

            var chart = nv.models.line()
                .width(width)
                .height(height)
                .margin({top: 20, right: 20, bottom: 20, left: 20});

            chart.dispatch.on('renderEnd', function(){
                console.log('render complete');
            });

            d3.select('#test1')
                .attr('width', width)
                .attr('height', height)
                .datum(sinAndCos())
                .call(chart);

            return chart;
        },
        callback: function(graph) {
            window.onresize = function() {
                var width = nv.utils.windowSize().width - 40,
                    height = nv.utils.windowSize().height - 40,
                    margin = graph.margin();

                if (width < margin.left + margin.right + 20)
                    width = margin.left + margin.right + 20;

                if (height < margin.top + margin.bottom + 20)
                    height = margin.top + margin.bottom + 20;

                graph.width(width).height(height);

                d3.select('#test1')
                    .attr('width', width)
                    .attr('height', height)
                    .call(graph);
            };
        }
    });

    function sinAndCos() {
        var sin = [],
            cos = [];

        for (var i = 0; i < 100; i++) {
            sin.push({x: i, y: Math.sin(i/10)});
            cos.push({x: i, y: .5 * Math.cos(i/10)});
        }

        return [
            {
                values: sin,
                key: "Sine Wave",
                color: "#ff7f0e"
            },
            {
                values: cos,
                key: "Cosine Wave",
                color: "#2ca02c",
                strokeWidth: 3
            }
        ];
    }
});
</script>
</body>
</html>