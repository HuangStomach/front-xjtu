<ul class="nav nav-stacked sidebar">
    <li role="presentation">
        <a href="{{ URL::to('/') }}" class="text-center" 
        data-toggle="tooltip" data-placement="right" title="返回首页">
            <i class="fa fa-home" aria-hidden="true"></i>
        </a>
    </li>
    <li role="presentation" @if ($active == 'user') class="active" @endif>
        <a href="{{ URL::to('admin/user') }}" class="text-center" 
        data-toggle="tooltip" data-placement="right" title="用户管理">
            <i class="fa fa-users" aria-hidden="true"></i>
        </a>
    </li>
    <li role="presentation" @if ($active == 'image') class="active" @endif>
        <a href="{{ URL::to('admin/image') }}" class="text-center"
        data-toggle="tooltip" data-placement="right" title="图片轮播">
            <i class="fa fa-picture-o" aria-hidden="true"></i>
        </a>
    </li>
    <li role="presentation" @if ($active == 'link') class="active" @endif>
        <a href="{{ URL::to('admin/link') }}" class="text-center" 
        data-toggle="tooltip" data-placement="right" title="友情链接">
            <i class="fa fa-link" aria-hidden="true"></i>
        </a>
    </li>
</ul>

<script>
$(function () {
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    })
})
</script>
