<main>
    <div class="ads">
        <div class="ads-title">Anúncios da categoria <b>{{$category->category}}</b></div>
        <div class="ads-area">
            @if(count($advertises) > 0)
            @foreach ($advertises as $advertise)
            @foreach($advertise->photos as $photo)
            @if($photo->mainPhoto)
            <x-ad
                img="{{ asset($photo->url) }}"
                title="{{ $advertise['title'] }}"
                value="150"
                :price="$advertise['price']"
                user="{{ $advertise->user->id == Auth::user()->id }}"
                :href="$advertise['href']"
                slug="{{ $advertise->slug }}" />
            @endif
            @endforeach
            @endforeach
            @else
            <span>Não há anúncios para exibir</span>
            @endif
        </div>
    </div>
    <div class="mt-8">
        {{ $advertises->links('pagination::tailwind', ['pageName' => 'page']) }}
    </div>
</main>
