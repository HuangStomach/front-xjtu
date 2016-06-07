<div class="text-center" id="labStatus" style="position: relative;">
</div>
<div class="center-block">
    <p>共100个总课题数，其中有58个课题，在这里进行了203次测试。</p>
<div>

<script>
var margin = {top: 40, right: 0, bottom: 20, left: 110},
    width = 270 - margin.left - margin.right,
    height = 240 - margin.top - margin.bottom;

var x = d3.scale.linear()
    .range([0, width]);

var y = d3.scale.ordinal()
    .rangeRoundBands([0, height], 0.1);

var svg = d3.select("#labStatus")
    .append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)

var g = svg.append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var json = $.parseJSON('[{"name":"测试数","value":203}, {"name":"总课题数","value":100}, {"name":"课题组","value":58}]');

var bColor = ['rgb(16,251,235)','rgb(255,73,233)','rgb(23,206,250)'];
var eColor = ['rgb(0,182,255)','rgb(255,32,95)','rgb(18,33,244)'];

x.domain(d3.extent(json, function(d) { return d.value; })).nice();
$.each(json, function(index, item) {
    var rect = g.append("rect")
        .attr("x", function() { return x(Math.min(0, item.value)); })
        .attr("y", function() { return 6 + index * 56; })
        .attr("width", function() { return Math.abs(x(item.value) - x(0)); })
        .attr("height", 24)
        .style('fill', "url(#labStatus-" + index + ")");
 
    g.append("text")
        .attr("x", function(d) { 
            return -105;
        })
        .attr("y", rect.attr("y"))
        .attr("transform", "translate(0,18)")
        .text(item.name);

    g.append("text")
        .attr("x", function(d) { 
            var left =  x(Math.min(0, item.value)),
                width = rect.attr("width");
            return left + (width/2);
        })
        .attr("y", rect.attr("y"))
        .attr("transform", function () {
            var length = item.value.toString().length
            return "translate(-" + length * 4 + ",18)"
        })
        .style("fill", "#FFFFFF")
        .text(item.value);

    var linear = svg.append("defs")
        .append('linearGradient')
        .attr('id', 'labStatus-' + index)
        .attr('x1', '100%')
        .attr('y1', '0%')
        .attr('x2', '0%')
        .attr('y1', '0%')

        linear.append('stop')
        .attr('offset', '0%')
        .style('stop-color', bColor[index])
        .style('stop-opacity', '1')

        linear.append('stop')
        .attr('offset', '100%')
        .style('stop-color', eColor[index])
        .style('stop-opacity', '1')
})

function type(d) {
  d.value = +d.value;
  return d;
}

</script>
