@extends('layout.layout')

@section('body')
<div class="modal show">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center text-primary">登陆</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="inputToken" class="col-md-2 control-label">账号</label>
                        <div class="col-md-10">
                            <input type="text" name="token" class="form-control" id="inputToken" placeholder="请输入账号">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-2 control-label">密码</label>
                        <div class="col-md-10">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="请输入密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-8">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
