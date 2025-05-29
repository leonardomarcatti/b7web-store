<div class="newAd-page">
    <div class="newAd-title">Novo anúncio</div>
    <div class="newAd-areas">
        <div class="newAd-area-left">
            <div class="area-left-up">
                <div class="area-left-up-title">Imagens</div>
                <div class="area-left-up-img">
                    <img src="temp/icons/imageIcon.png" />
                    <div class="area-left-up-img-text">
                        <span>Clique aqui</span> para enviar uma imagem
                    </div>
                </div>
            </div>
            <div class="area-left-bottom">
                <div class="smallpics">
                    <img src="temp/icons/imageSmallIcon.png" />
                </div>
                <div class="smallpics">
                    <img src="temp/icons/imageSmallIcon.png" />
                </div>
                <div class="smallpics">
                    <img src="temp/icons/imageSmallIcon.png" />
                </div>
                <div class="smallpics">
                    <img src="temp/icons/imageSmallIcon.png" />
                </div>
                <div class="smallpics">
                    <img src="temp/icons/imageSmallIcon.png" />
                </div>
            </div>
        </div>
        <div class="newAd-area-right">
            <form class="newAd-form" wire:submit="saveNewAd">
                <div class="title-area">
                    <div class="title-label">Título do anúncio</div>
                    <input type="text" wire:model="title" name="title" id="title" placeholder="Digite o título do anúncio" />
                </div>
                <div class="value-area">
                    <div class="value-label">
                        <div class="value-area-text">Valor</div>
                        <input wire:model="price" type="number" step="0.01" name="price" id="price" placeholder="Digite o valor" />
                    </div>
                    <div class="negotiable-area">
                        <div class="negotiable-label">Negociável?</div>
                        <select wire:model="negotiate" name="negotiate" id="negotiate">
                            <option value="0" selected>Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                </div>
                <div class="newAd-categories-area">
                    <div class="newAd-categories-label">Categorias</div>
                    <select wire:model="category_id" name="category_id" id="category_id" class="newAd-categories">
                        <option selected hidden disabled value="">
                            Selecione uma categoria
                        </option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="description-area">
                    <div class="description-label">Descrição</div>
                    <textarea wire:model="description" name="description" id="description" class="description-text"
                        placeholder="Digite a descrição do anúncio">
                     </textarea>
                </div>
                <button class="newAd-button">Criar anúncio</button>
            </form>
        </div>
    </div>
</div>
