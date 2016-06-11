@extends('layout.layout')

@section('body')
<div class="container">
    <div class="row">
        @include('admin/sidebar', ['active' => $active])
        <div style="margin-left: 60px;">
            <h2><small>控制面板</small></h2>
            <h2 style="margin-bottom: 20px;">
                链接管理
                <div class="pull-right">
                    <a href="/link/add" class="btn btn-raised btn-success" style="margin: 0;">添加连接</a>
                </div>
            </h2>
            @if (session('message'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('message') }}
            </div>
            @endif
            <div style="margin-top: 20px;" id="links">
                <div class="col-md-6">
                    <h3>底部连接</h3>
                    <div class="list-group">
                    @foreach ($links as $link)
                        <div class="list-group-item">
                            <div class="row-picture">
                                 <img class="circle" src="/{{ $link->icon }}" alt="icon">
                           </div>
                            <div class="row-content">
                                <div class="action-secondary">
                                    <i data-get="link/delete/{{ $link->id }}" class="fa fa-times" style="color: #f44336;" aria-hidden="true"></i>
                                </div>
                                <h4 class="list-group-item-heading">{{ $link->title }}</h4>
                                <p class="list-group-item-text">{{ $link->href }}</p>
                            </div>
                        </div>
                        <div class="list-group-separator"></div>
                    @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>顶部连接</h3>
                    <div class="list-group">
                    @foreach ($navs as $nav)
                        <div class="list-group-item">
                            <div class="row-picture">
                                <i class="fa fa-link" aria-hidden="true"></i>
                            </div>
                            <div class="row-content">
                                <div class="action-secondary">
                                    <i data-get="link/delete/{{ $nav->id }}" class="fa fa-times" style="color: #f44336;" aria-hidden="true"></i>
                                </div>
                                <h4 class="list-group-item-heading">{{ $nav->title }}</h4>
                                <p class="list-group-item-text">{{ $nav->href }}</p>
                            </div>
                        </div>
                        <div class="list-group-separator"></div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$('#links').on('click', '[data-get]', function (e) {
    var me = $(this);
    $.get('/ajax/' + me.data('get'), function (result) {
        $('body').append(result);
    })
})
</script>
@endsection
