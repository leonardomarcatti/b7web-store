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
            @foreach ($categories as $category)
            <a href="{{route('category', ['slug' => $category->slug])}}" class="{{$category->slug}}">
                <img src="{{asset('temp/icons/' . $category->slug . '.png')}}" />
                {{$category->category}}
            </a>
            @endforeach
        </div>
    </div>
</section>
