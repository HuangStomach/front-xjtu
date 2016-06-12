@extends('layout.layout')

@section('body')
<div class="container">
    <div class="row">
        @include('admin/sidebar', ['active' => $active])
        <div style="margin-left: 60px;">
            <h2><small>控制面板</small></h2>
            <h2>
                图片轮播
                <div class="pull-right">
                    <a href="{{ URL::to('image/add') }}" class="btn btn-raised btn-success" style="margin: 0;">添加图片</a>
                </div>
            </h2>
            @if (session('message'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('message') }}
            </div>
            @endif
            <div id="carousels" style="margin-top: 20px;">
            @foreach ($images as $image)
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="/{{ $image->path }}" class="img-rounded" style="width: 100%;">
                        </div>
                        <div class="panel-footer text-right">
                            <a data-get="image/delete/{{ $image->id }}" href="javascript:void(0)" 
                            class="btn btn-danger" style="margin: 0;padding: 0 5px;">删除</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

<script>
$('#carousels').on('click', '[data-get]', function (e) {
    var me = $(this);
    $.get('ajax/' + me.data('get'), function (result) {
        $('body').append(result);
    })
})
</script>
@endsection
