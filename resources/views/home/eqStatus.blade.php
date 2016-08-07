<div class="text-center" id="eqStatus" style="position: relative;">
    <div class="pie-content"> 
        <div class="media">
            <div class="media-left media-middle">
                <i class="fa fa-circle" style="color: #EEEEEE" aria-hidden="true"></i>
            </div>
            <div class="media-body text-left">
                <h4 style="font-size: 16px;" class="media-headiang">共{{ $total }}台</h4>
            </div>
        </div>
        <div class="media">
            <div class="media-left media-middle">
                <i class="fa fa-circle" style="color: #4863f3" aria-hidden="true"></i>
            </div>
            <div class="media-body text-left">
                <h4 style="font-size: 16px;" class="media-headiang">{{ $control }}台入网</h4>
            </div>
        </div>
    </div>
</div>
<div class="center-block" style="width: 125px;">
    <div class="media">
        <div class="media-left media-middle">
            <i class="fa fa-lg fa-play-circle-o" style="font-weight:normal;color: #ff0363" aria-hidden="true"></i>
        </div>
        <div class="media-body text-right">
            <h4 class="media-headiang" style="font-weight:normal;"><span style="font-weight:normal;color: 009bff;">{{ $using }} </span>台在使用</h4>
        </div>
    </div>
    <div class="media">
        <div class="media-left media-middle">
            <i class="fa fa-lg fa-stop-circle-o" style="font-weight:normal;color: #00d686" aria-hidden="true"></i>
        </div>
        <div class="media-body text-right">
            <h4 class="media-headiang" style="font-weight:normal;"><span style="font-weight:normal;color: 009bff;">{{ $wait - $down }} </span>台待机中</h4>
        </div>
    </div>
    <div class="media">
        <div class="media-left media-middle">
            <i class="fa fa-lg fa-times-circle-o" style="font-weight:normal;color: #cccccc" aria-hidden="true"></i>
        </div>
        <div class="media-body text-right">
            <h4 class="media-headiang" style="font-weight:normal;"><span style="font-weight:normal;color: 009bff;">{{ $down }} </span>台出故障</h4>
        </div>
    </div>
<div>

<script>
var width = 200,
    height = 210,
    radius = Math.min(width, height) / 2;

var arc = d3.svg.arc()
    .startAngle(0)
    .outerRadius(radius - 10)
    .innerRadius(radius - 30)
    .cornerRadius(100);

var svg = d3.select("#eqStatus").append("svg")
    .attr("width", width)
    .attr("height", height)
    .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

var linear = svg.append("defs")
    .append('linearGradient')
    .attr('id', 'bala')
    .attr('x1', '0%')
    .attr('y1', '0%')
    .attr('x2', '0%')
    .attr('y1', '100%')

linear.append('stop')
    .attr('offset', '0%')
    .style('stop-color', 'rgb(0,155,255)')
    .style('stop-opacity', '1')

linear.append('stop')
    .attr('offset', '100%')
    .style('stop-color', 'rgb(130,54,233)')
    .style('stop-opacity', '1')

var meter = svg.append("g");
meter.append('path').attr('fill', '#EEEEEE').attr('d', arc.endAngle(2 * Math.PI));

var g = svg
    .append("g")
    .attr("class", "arc");

g.append("path")
    .attr("d", arc.endAngle((2 * Math.PI) * {{ $rate }}))
    .style("fill", 'url(#bala)');

function type(d) {
    d.population = +d.population;
    return d;
}

</script>
