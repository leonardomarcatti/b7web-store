<div class="newAd-page">
    <h1 class="newAd-title">Novo anúncio</h1>
    <div class="newAd-areas">
        <div class="newAd-area-left">
            <div class="area-left-up">
                <div class="area-left-up-title">Imagens</div>
                @error('photos')
                <small class="error">{{$message}}</small>
                @enderror
                <div class="area-left-up-img">
                    <img src="temp/icons/imageIcon.png" />
                    <div class="area-left-up-img-text">
                        <span id="clique_aqui">Clique aqui</span> para enviar uma imagem
                    </div>
                </div>
            </div>
            <div class="area-left-bottom">
                @foreach ($photos as $photo)
                <div class="smallpics">
                    <img src="{{$photo->temporaryUrl()}}" />
                </div>
                @endforeach
                @for ($i=0; $i<(5 - count($photos)); $i++)
                    <div class="smallpics">
                    <img src="temp/icons/imageSmallIcon.png" />
            </div>
            @endfor
        </div>
    </div>

    <div class="newAd-area-right">
        <form class="newAd-form" wire:submit="saveNewAd">
            <input type="file" name="photos" id="photos" hidden wire:model="photos" accept="image/bmp, image/jpeg, image/png" multiple />
            <div class="title-area">
                <label class="title-label" for="title">Título do anúncio</label>
                <input type="text" wire:model="title" name="title" id="title" placeholder="Digite o título do anúncio" />
                @error('title')
                <small class="error">{{$message}}</small>
                @enderror
            </div>
            <div class="value-area">
                <div class="value-label">
                    <label for="price" class="value-area-text">Valor</label>
                    <input wire:model="price" type="number" step="0.01" name="price" id="price" placeholder="Digite o valor" />
                    @error('price')
                    <small class="error">{{$message}}</small>
                    @enderror
                </div>
                <div class="negotiable-area">
                    <label for="negotiate" class="negotiable-label">Negociável?</label>
                    <select wire:model="negotiate" name="negotiate" id="negotiate">
                        <option value="0" selected>Não</option>
                        <option value="1">Sim</option>
                    </select>
                    @error('negotiate')
                    <small class="error">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="newAd-categories-area">
                <label for="category_id" class="newAd-categories-label">Categorias</label>
                <select wire:model="category_id" name="category_id" id="category_id" class="newAd-categories">
                    <option selected hidden value="">Selecione uma categoria</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <small class="error">{{$message}}</small>
                @enderror
            </div>
            <div class="description-area">
                <label for="description" class="description-label">Descrição</label>
                <textarea wire:model="description" name="description" id="description" class="description-text" placeholder="Digite a descrição do anúncio"></textarea>
                @error('description')
                <small class="error">{{$message}}</small>
                @enderror
            </div>
            <button class="newAd-button">Criar anúncio</button>
        </form>
    </div>
</div>
</div>
