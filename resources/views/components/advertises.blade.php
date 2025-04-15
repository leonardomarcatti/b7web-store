<div class="categories-area">
    <div class="title">Categorias</div>
    <div class="buttons">
        <button class="cars">
            <img src="{{asset('temp/icons/carIcon.png')}}" alt="Ícone Carros" />
            Carros
        </button>
        <button class="eletronics">
            <img
                src="{{asset('temp/icons/eletronicsIcon.png')}}"
                alt="Ícone Eletrônicos" />
            Eletrônicos
        </button>
        <button class="clothes">
            <img src="{{asset('temp/icons/clothesIcon.png')}}" alt="Ícone Roupas" />
            Roupas
        </button>
        <button class="sports">
            <img src="{{asset('temp/icons/sportsIcon.png')}}" alt="Ícone Esportes" />
            Esportes
        </button>
        <button class="babies">
            <img src="{{asset('temp/icons/babiesIcon.png')}}" alt="Ícone Bebês" />
            Bebês
        </button>
    </div>
</div>
<div class="ads">
    <div class="ads-title">Anúncios recentes</div>
    <div class="ads-area">
        @foreach($advertiseList as $item)
        @foreach($item->photos as $photo)
        @if($photo->mainPhoto)
        <x-ad
            img="{{$photo->url}}"
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
