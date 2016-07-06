<div>
    <ul style="margin-bottom: 30px;"class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#reserv" class="pie-title" aria-controls="reserv" role="tab" data-toggle="tab" style="padding-top: 0px;margin-right: 35px;font-size:16px;">仪器预约排行</a>
        </li>
        <li role="presentation">
            <a href="#use" class="pie-title" aria-controls="use" role="tab" data-toggle="tab" style="padding-top: 0px;margin-left: 35px;font-size: 16px;">用户使用排行</a>
        </li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="reserv">
            <div class="list-group">
            @foreach ($reservs as $index => $reserv)
                <div class="list-group-item" style="padding: 0px;">
                    <div class="row-action-primary">
                        <h4 style="color: #4264d8;"><em>No.{{ $index + 1 }}</em></h4>
                    </div>
                    <div class="row-content" style="min-height: 55px;">
                        <div class="least-content" style="top: 5px;right: 0px;">
                            {{ (int)($reserv['time'] / 3600) }}小时
                        </div>
                        <p class="list-group-item-heading" style="font-size: 16px">
                            <?php 
                                if (mb_strlen($reserv['name']) > 6) {
                                    echo mb_substr($reserv['name'], 0, 6) . '...';
                                }
                                else {
                                    echo $reserv['name'];
                                }
                            ?>
                        </p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="use">
            <div class="list-group">
            @foreach ($uses as $index => $use)
                <div class="list-group-item" style="padding: 0px;">
                    <div class="row-action-primary">
                        <h4 style="color: #4264d8;"><em>No.{{ $index + 1 }}</em></h4>
                    </div>
                    <div class="row-content" style="min-height: 55px;">
                        <div class="least-content" style="top: 5px;right: 0px;">
                            {{ (int)($use['time'] / 3600) }}小时
                        </div>
                        <p class="list-group-item-heading" style="font-size: 16px">
                            <?php 
                                if (mb_strlen($use['name']) > 6) {
                                    echo mb_substr($use['name'], 0, 6) . '...';
                                }
                                else {
                                    echo $use['name'];
                                }
                            ?>
                        </p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
