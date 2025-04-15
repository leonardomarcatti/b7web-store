<div class="my-ad-item" href="{{route('adDetails', ['slug' => $slug])}}">
    @if(isset($user) && $user == true)
    <span class="pill my-ad-pill">Meu Anúncio</span>
    @endif
    <div class="ad-image-area">
        @if(isset($buttons))
        <div class="ad-buttons">
            <div class="ad-button">
                <a href="{{route('deleteAd', ['id' => $id])}}" class="delAd">
                    <img src="temp/icons/deleteIcon.png" />
                </a>
            </div>
            <div class="ad-button">
                <img src="temp/icons/editIcon.png" />
            </div>
        </div>
        @endif
        <a href="{{route('adDetails', ['slug' => $slug])}}">
            <img class="ad-image" src="{{$img ?? 'https://place-hold.it/300x300/transp/black'}}" alt="" srcset="">
        </a>
    </div>

    <div class="ad-title">{{$title}}</div>
    <div class="ad-price">R$ {{number_format($price, 2, ',', '.') }}</div>
</div>
