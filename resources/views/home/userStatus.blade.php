<div class="text-center" id="userStatus" style="position: relative;">
    <div class="pie-content">
       <h1>3000</h1>
        总人数
    </div>
</div>
<div class="center-block" style="margin-top: 20px;">
校外用户100人，校内用户数2000人，设备管理员数量12人。
<div>

<script>
var width = 200,
    height = 220,
    radius = Math.min(width, height) / 1.9,
    spacing = .05;

var svg = d3.select("#userStatus").append("svg")
    .attr("width", width)
    .attr("height", height)

var bColor = ['rgb(16,251,235)','rgb(0,155,255)','rgb(23,206,250)','rgb(255,159,49)'];
var eColor = ['rgb(0,182,255)','rgb(130,54,233)','rgb(18,33,244)','rgb(255,76,0)'];

var start = 0
var rate = .9

$.each(fields(), function (index, item) {
    start += index / 10 + 8 * spacing
    rate -= .1

    var arc = d3.svg.arc()
    .startAngle(Math.PI * start)
    .outerRadius(rate * radius)
    .innerRadius((rate + spacing) * radius);

    var g = svg.append("g")
        .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

    g.append("g").append('path').attr('fill', '#EEEEEE').attr('d', arc.endAngle((2 + start) * Math.PI));

    var linear = g.append("defs")
        .append('linearGradient')
        .attr('id', 'userStatus-' + index)
        .attr('x1', '0%')
        .attr('y1', '0%')
        .attr('x2', '0%')
        .attr('y1', '100%')

        linear.append('stop')
        .attr('offset', '0%')
        .style('stop-color', bColor[index])
        .style('stop-opacity', '1')

        linear.append('stop')
        .attr('offset', '100%')
        .style('stop-color', eColor[index])
        .style('stop-opacity', '1')

    var front = g
        .append("g")
        .attr("class", "arc");

    front.append("path")
        .attr("d", arc.endAngle((3 * item.index + start) * Math.PI))
        .style("fill", "url(#userStatus-" + index + ")");
})

function fields() {
  var now = new Date;
  return [
    {index: .2},
    {index: .3},
    {index: .2},
    {index: .3},
  ];
}
</script>
