<div class="ad-area-left">
    <img class="main-photo" src="{{asset($url)}}" />
    <div class="secundary-photos">
        @foreach($images as $img)
        <img wire:click="setURL('{{asset($img->url)}}')" class="secundary-image" src="{{asset($img->url)}}" />
        @endforeach
    </div>

</div>
