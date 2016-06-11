@extends('layout.layout')

@section('body')
<div class="container">
    <div class="row">
        @include('admin/sidebar', ['active' => $active])
        <div class="table-responsive" style="margin-left: 60px;">
            <h2><small>控制面板</small></h2>
            <h2>
                用户管理
                <div class="pull-right">
                    <a href="/user/add" class="btn btn-raised btn-success" style="margin: 0;">添加用户</a>
                </div>
            </h2>
            @if (session('message'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('message') }}
            </div>
            @endif
            <table class="table table-hover table-striped" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th width="80">序号</th>
                        <th>姓名</th>
                        <th>账号</th>
                        <th>添加时间</th>
                        <th>修改时间</th>
                        <th class="text-right" width="200">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->token }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td class="table-btn text-right">
                            @if ($user->token != 'genee')
                            <a href="/user/update/{{ $user->id }}" class="btn btn-info">修改</a>
                            <a data-get="user/delete/{{ $user-> id}}" href="javascript:void(0)" class="btn btn-danger">删除</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$('.table-responsive').on('click', '[data-get]', function (e) {
    var me = $(this);
    $.get('/ajax/' + me.data('get'), function (result) {
        $('body').append(result);
    })
})
</script>
@endsection
