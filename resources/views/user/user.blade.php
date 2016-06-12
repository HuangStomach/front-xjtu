@extends('layout.layout')

@section('body')
<div class="container">
    <div class="row">
        @include('admin/sidebar', ['active' => $active])
        <div class="table-responsive" style="margin-left: 60px;">
            <h2><small>控制面板</small></h2>
            <h2>
                {{ $title }}
            </h2>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <form class="form-horizontal" method="post" action="{{ URL::to($action) }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="inputToken" class="col-md-1 control-label">账号</label>
                    <div class="col-md-5">
                       <input value="{{ isset($user) ? $user->token : '' }}" 
                        name="token" type="text" class="form-control" id="inputToken" placeholder="请输入账号"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-md-1 control-label">姓名</label>
                    <div class="col-md-5">
                       <input value="{{ isset($user) ? $user->name : '' }}" 
                        name="name" type="text" class="form-control" id="inputName" placeholder="请输入姓名"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input" class="col-md-1 control-label">密码</label>
                    <div class="col-md-5">
                       <input name="password" type="password" class="form-control" id="inputToken" placeholder="请输入密码"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputToken" class="col-md-1 control-label">确认密码</label>
                    <div class="col-md-5">
                       <input name="confirm" type="password" class="form-control" id="inputToken" placeholder="请再次输入密码"/>
                    </div>
                </div>
                @if (isset($user))
                <input name=id type="hidden" value="{{ $user->id }}" />
                @endif
                <div class="form-group">
                    <div class="col-md-12 col-md-offset-8">
                        <a href="/admin/user" class="btn btn-raised btn-default">返回</a>
                        <button type="submit" class="btn btn-raised btn-success">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
