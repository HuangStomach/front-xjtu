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
            <form class="form-horizontal" method="post" action="{{ URL::to($action) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="inputTitle" class="col-md-1 control-label">标题</label>
                    <div class="col-md-5">
                       <input value="{{ isset($link) ? $link->title : '' }}" 
                        name="title" type="text" class="form-control" id="inputTitle" placeholder="请输入标题"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputHref" class="col-md-1 control-label">地址</label>
                    <div class="col-md-5">
                       <input value="{{ isset($link) ? $link->href : 'http://' }}" 
                        name="href" type="text" class="form-control" id="inputHref" placeholder="请输入地址"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputWeight" class="col-md-1 control-label">排序</label>
                    <div class="col-md-5">
                       <input value="{{ isset($link) ? $link->weight : 0 }}" 
                        name="weight" type="text" class="form-control" id="inputWeight" placeholder="请输入序号"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputType" class="col-md-1 control-label">类别</label>
                    <div class="col-md-5">
                        <select id="inputType" name="type" class="form-control">
                            <option value="1" {{ (isset($link) and $link->type == 1) ? 'selected' : '' }}>顶部导航</option>
                            <option value="2" {{ (isset($link) and $link->type == 2) ? 'selected' : '' }}>底部连接</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFile" class="col-md-1 control-label">图标</label>
                    <div class="col-md-5">
                       <input name="icon" type="file" class="form-control file" id="inputFile" />
                    </div>
                </div>
                @if (isset($link))
                <input name=id type="hidden" value="{{ $link->id }}" />
                @endif
                <div class="form-group">
                    <div class="col-md-12 col-md-offset-8">
                        <a href="{{ URL::to('admin/link') }}" class="btn btn-raised btn-default">返回</a>
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
    @if (isset($link) && $link->icon)
    ,initialPreview: [
        "<img src='{{ URL::to($link->icon) }}' class='file-preview-image'>"
    ]
    @endif
});
</script>
@endsection
