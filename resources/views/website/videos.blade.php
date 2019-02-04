@php
$videos = App\Video::all()->sortKeysDesc();
@endphp

@if($videos)
<div class="container-fluid">
	<div class="owl-carousel owl-theme" style="height: 400px">
	    @foreach($videos as $video)
	    <div class="item-video border bg-dark img-fluid">
	        <a class="owl-video img-fluid" href="{{$video->link}}"></a>
	    </div>
	    @endforeach
	</div>
</div>
@endif