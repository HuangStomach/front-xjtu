@extends('layout.layout')

@section('body')
    @include('nav', ['navs' => $navs])

    @include('carousel', ['images' => $images])

<div class="container" style="width: 1000px;">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body" style="height: 340px;padding: 8px 15px;">
                    <p class="pie-title">仪器当前情况</p>
                    <div data-get="home/eqStatus"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body" style="height: 340px;padding: 8px 15px;">
                    <p class="pie-title">课题情况</p>
                    <div data-get="home/labStatus"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body" style="height: 340px;padding: 8px 15px;">
                    <p class="pie-title">人员情况</p>
                    <div data-get="home/userStatus"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body" style="height: 340px;padding: 8px 15px;">
                    <p class="pie-title">仪器预约排行</p>
                    <div data-get="home/reservRank"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body" style="height: 340px;padding: 8px 15px;">
                    <p class="pie-title">用户使用排行</p>
                    <div data-get="home/useRank"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body" style="height: 340px;padding: 8px 15px;">
                    <p class="pie-title">最新预约用户</p>
                    <div data-get="home/newReserve"></div>
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

    @include('footer', ['links' => $links])

@endsection
