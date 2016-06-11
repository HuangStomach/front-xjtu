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
            <form class="form-horizontal" method="post" action="{{ $action }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="inputFile" class="col-md-1 control-label">图片</label>
                    <div class="col-md-11">
                       <input name="carousel" type="file" class="form-control file" id="inputFile" />
                    </div>
                </div>
                @if (isset($user))
                <input name=id type="hidden" value="{{ $user->id }}" />
                @endif
                <div class="form-group">
                    <div class="col-md-12 col-md-offset-9">
                        <a href="/admin/image" class="btn btn-raised btn-default">返回</a>
                        <button type="submit" class="btn btn-raised btn-success">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$('#inputFile').fileinput({
    language: 'zh',
    showUpload: false,
    allowedFileExtensions : ['jpg', 'jpeg', 'png', 'gif', 'bmp']
});
</script>
@endsection
