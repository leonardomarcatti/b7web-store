<div class="my-ad-item">
    <div class="ad-image-area">
        @if(isset($buttons))
        <div class="ad-buttons">
            <div class="ad-button">
                <img src="temp/icons/deleteIcon.png" />
            </div>
            <div class="ad-button">
                <img src="temp/icons/editIcon.png" />
            </div>
        </div>
        @endif
        <img class="ad-image" src="{{$img}}" alt="" srcset="">
    </div>

    <div class="ad-title">{{$title}}</div>
    <div class="ad-price">R$ {{number_format($price, 2, ',', '.') }}</div>
</div>
