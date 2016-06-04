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
                    <div data-get="home/eqStatus"></div>
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
                    <p>仪器开机率</p>
                    <div data-get="home/eqRate"></div>
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
$("[data-get]").each(function (index, e) {
    $.get('ajax/' + $(e).data('get'), function (result) {
        $(e).html(result);
    })
})
</script>
@endsection
