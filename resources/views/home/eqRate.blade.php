<div class="text-center" id="eqRate" style="position: relative;">
    <div class="pie-content"> 
        <div class="media">
            <div class="media-left media-middle">
                <i class="fa fa-circle" style="color: #EEEEEE" aria-hidden="true"></i>
            </div>
            <div class="media-body text-left">
                <h4 class="media-headiang">共{{ $total }}台</h4>
            </div>
        </div>
        <div class="media">
            <div class="media-left media-middle">
                <i class="fa fa-circle" style="color: #4863f3" aria-hidden="true"></i>
            </div>
            <div class="media-body text-left">
                <h4 class="media-headiang">{{ $using }}在使用</h4>
            </div>
        </div>
    </div>
</div>
<div class="center-block" style="width: 180px;">
    <p>共有{{ $total }}台设备，其中{{ $using }}台正在使用中。</p>
<div>

<script>
var width = 200,
    height = 240,
    radius = Math.min(width, height) / 2;

var arc = d3.svg.arc()
    .startAngle(2 * Math.PI * 0.3)
    .outerRadius(radius - 10)
    .innerRadius(radius - 30)
    .cornerRadius(100);

var pie = d3.layout.pie()
    .sort(null)
    .value(function(d) { 
        return d.population; 
    });

var svg = d3.select("#eqRate").append("svg")
    .attr("width", width)
    .attr("height", height)
    .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

var linear = svg.append("defs")
    .append('linearGradient')
    .attr('id', 'balaa')
    .attr('x1', '0%')
    .attr('y1', '0%')
    .attr('x2', '0%')
    .attr('y1', '100%')

linear.append('stop')
    .attr('offset', '0%')
    .style('stop-color', 'rgb(16,251,235)')
    .style('stop-opacity', '1')

linear.append('stop')
    .attr('offset', '100%')
    .style('stop-color', 'rgb(0,182,255)')
    .style('stop-opacity', '1')

var meter = svg.append("g")
    .append('path')
    .attr('fill', '#EEEEEE')
    .attr('d', arc.endAngle(2.7 * Math.PI));

var g = svg.append("g").attr("class", "arc");

g.append("path")
    .attr("d", arc.endAngle((2.7 * Math.PI) * {{ $rate }}))
    .style("fill", 'url(#balaa)');

function type(d) {
    d.population = +d.population;
    return d;
}

</script>
