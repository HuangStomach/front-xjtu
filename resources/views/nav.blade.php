<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container" style="width: 1000px;">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
            <img alt="Brand" src="img/icon.png" style="height: 40px;width: 40px;display: inline;margin-top: -5px;">
                大型仪器设备物联共享系统
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li style="border-bottom: 4px solid #4264d8;height: 50px;">
                <a style="color: #4264d8;" href="{{ URL::to('/') }}">首页</a>
            </li>
            @foreach ($navs as $nav)
            <li><a href="{{ $nav->href }}">{{ $nav->title }}</a></li>
            @endforeach
        </ul>
    </div>
</nav>
