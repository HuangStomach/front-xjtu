<nav class="navbar navbar-default">
    <div class="container" style="width: 1000px">
        <ul class="nav navbar-nav navbar-left">
            <li><a>友情链接:</a></li>
            @foreach ($links as $link)
            <li><a href="{{ $link->href }}">{{ $link->title }}</a></li>
            @endforeach
        </ul>
    </div>
</nav>
<footer class="text-center">
<p>Copyright2015. 西安交通大学大型仪器设备物联网共享系统. All Right Reserved</p>
<p>基理科技 运维支持</p>
</footer>