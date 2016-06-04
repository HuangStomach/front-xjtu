@extends('layout.layout')

@section('body')
    @include('nav')

    @include('carousel')

<div class="container" style="width: 1000px;">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
				<div class="panel-body">
				    <p>仪器当前情况</p>
                </div>
                <div class="text-center" id="haha">
                    <h1 class="pie-content">what</h1>
                </div>
			</div>
		</div>
        <div class="col-md-4">
            <div class="panel panel-default">
				<div class="panel-body">
				Basic panel
				</div>
			</div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
				<div class="panel-body">
				Basic panel
				</div>
			</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
				<div class="panel-body">
				Basic panel
				</div>
			</div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
				<div class="panel-body">
				Basic panel
				</div>
			</div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
				<div class="panel-body">
				Basic panel
				</div>
			</div>
        </div>
    </div>
</div>
<script>

var width = 200,
    height = 200,
    radius = Math.min(width, height) / 2;

var color = d3.scale.ordinal()
    .range(["#98abc5", "#EEEEEE"]);

var arc = d3.svg.arc()
    .startAngle(0)
    .outerRadius(radius - 10)
    .innerRadius(radius - 30)
    .cornerRadius(100);

var pie = d3.layout.pie()
    .sort(null)
    .value(function(d) { 
        console.log(d.population);
        return d.population; 
    });

var svg = d3.select("#haha").append("svg")
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

d3.csv("csv/ex.csv", type, function(error, data) {
    if (error) throw error;

    var g = svg.selectAll(".arc")
        .data(pie(data))
        .enter()
        .append("g")
        .attr("class", "arc");

    g.append("path")
        .attr("d", arc.endAngle((2 * Math.PI) * 0.7))
        .style("fill", 'url(#bala)');
})

function type(d) {
    d.population = +d.population;
    return d;
}

</script>
@endsection
