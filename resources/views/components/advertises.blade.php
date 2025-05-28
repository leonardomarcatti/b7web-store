<div class="ads">
    <div class="ads-title">Anúncios recentes</div>
    <div class="ads-area">
        @foreach($advertiseList as $item)
        @foreach($item->photos as $photo)
        @if($photo->mainPhoto)
        <x-ad
            img="{{asset($photo->url)}}"
            title="{{$item['title']}}"
            value="150"
            :price="$item['price']"
            user="{{($item->user->id == Auth::user()->id) ? true : false}}"
            :href="$item['href']"
            slug="{{$item->slug}}" />
        @endif
        @endforeach
        @endforeach
    </div>
</div>
