<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom: 20px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach ($images as $index => $image)
		<li data-target="#carousel-example-generic" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="row">
        <div class="carousel-inner col-md-6" role="listbox">
        @foreach ($images as $index => $image)
            <div class="item {{ $index == 0 ? 'active' : ''}}">
                <div class="col-md-6 text-right">
                   <img src="{{ $image->path }}" style="height: 100%;">
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
