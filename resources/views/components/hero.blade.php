<section class="hero-area">
    <h3 class="subtitle">Aqui você encontra o que tanto procura!</h3>
    <h1 class="title">O que você está procurando?</h1>
    <form class="search-area" action="{{route('adsList')}}" method="get">
        <input class="search-text" name="t" type="text" placeholder="Estou procurando por..." />
        <select class="categories-options" name="c">
            <option selected hidden disabled value="">Categoria</option>
            @foreach ($categories as $categorie)
            <option value="{{$categorie['id']}}">{{$categorie['category']}}</option>
            @endforeach
        </select>
        <select class="states" name="s">
            <option selected hidden disabled value="">Estado</option>
            @foreach($states as $state)
            <option value="{{$state['id']}}">{{$state['state']}}</option>
            @endforeach
        </select>
        <button type="submit" class="search-button">Procurar</button>
    </form>
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
</section>
