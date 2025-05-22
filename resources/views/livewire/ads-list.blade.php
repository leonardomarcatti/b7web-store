<section>
    <div>
        <div class="hero-area">
            <div class="search-area-adsList">
                <input wire:model.live="text" class="search-text" type="text" placeholder="Estou procurando por..." />

                <div class="options-area">
                    <div class="categories-area">
                        <p>Categoria</p>
                        <select class="categories-options" wire:model.live="selectedCategory">
                            <option value="0">Todas</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="states-area">
                        <p class="state-label">Estados</p>
                        <select class="states" wire:model.live="selectedState">
                            <option value="0">Todos</option>
                            @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->state }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="search-mobile-button">Procurar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="ads">
        <div class="ads-title">Anúncios recentes</div>
        <div class="ads-area">
            @if(count($advertises) > 0)
            @foreach ($advertises as $advertise)
            @foreach($advertise->photos as $photo)
            @if($photo->mainPhoto)
            <x-ad
                img="{{ $photo->url }}"
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

        <div class="mt-8">
            {{ $advertises->links('pagination::tailwind') }}
        </div>
    </div>
</section>
