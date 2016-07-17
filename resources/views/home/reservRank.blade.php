<div class="list-group" style="margin-top: 20px;">
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
