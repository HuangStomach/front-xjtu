<div class="list-group" style="margin-top: 20px;">
    @foreach ($users as $user)
    <div class="list-group-item" style="padding: 0px;margin-bottom: 20px;">
        <div class="row-picture">
            <img class="circle" src="{{ $user['icon'] }}" alt="icon" style="width:45px;height:45px;">
        </div>
        <div class="row-content" style="min-height: 55px;width: 205px;">
            <p class="list-group-item-heading" style="font-size: 16px">
                {{ $user['name'] }}
                <span class="pull-right"> 
                <?php
                if (mb_strlen($user['equipment']) > 8) {
                    echo mb_substr($user['equipment'], 0, 8) . '...';
                }
                else {
                    echo $user['equipment'];
                }
                ?>
                </span>
            </p>                
            <small>
                <?php
                if (mb_strlen($user['group']) > 6) {
                    echo mb_substr($user['group'], 0, 6) . '...';
                }
                else {
                    echo $user['group'];
                }
                ?>
                <span class="pull-right">{{ $user['dtstart'] }}</span>
            </small>
        </div>
    </div>
    @endforeach
</div>
