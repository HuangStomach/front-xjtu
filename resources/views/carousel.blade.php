<div class="carousel-outer" style="margin-bottom: 20px;">
    <div class="container" style="width: 1000px; position: relative;">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($images as $index => $image)
                <li data-target="#carousel-example-generic" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            @foreach ($images as $index => $image)
                <div class="item {{ $index == 0 ? 'active' : ''}}">
                    <div class="text-center" style="width: 740px;">
                       <img src="{{ $image->path }}" style="height: 100%;">
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="panel panel-default panel-login">
            <div class="panel-body">
                <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                    <li class="active"><a style="margin-right: 20px; font-size: 15px;" href="#home" data-toggle="tab">校内用户登陆</a></li>
                    <li><a style="margin-left: 20px; font-size: 15px;" href="#profile" data-toggle="tab">校外用户登陆</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade text-center active in" id="home">
                        <div class="text-center">
                            <img style="margin: 10px;" src="img/icon.png" alt="..." class="img-circle">
                        </div>
                        <a href="http://equip.xjtu.edu.cn/lims/xjtu/cas/login" class="btn btn-radius btn-raised btn-info">统一身份认证</a>
                    </div>
                    <div class="tab-pane fade text-center" id="profile">
                        <form class="form-horizontal" action="http://equip.xjtu.edu.cn/lims/login" method="post">
                            <div class="form-group" style="margin-top: 15px;">
                                <div class="col-md-10 col-md-offset-1">
                                    <input type="text" class="form-control" name="token" placeholder="用户名">
                                    <input type="hidden" name="token_backend" value="database">
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 15px;">
                                <div class="col-md-10 col-md-offset-1">
                                    <input name="password" type="password" class="form-control" placeholder="密码">
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-radius btn-raised btn-info">登陆</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
