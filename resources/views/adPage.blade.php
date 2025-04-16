@extends('layout.layout')

@section('content')
<main>
    <div class="ad-area">
        <livewire:galery :images="$ad->photos" />
        <div class="ad-area-right">
            <div class="categories-state">{{$ad->user->state->state}} / {{$ad->category->category}}</div>
            <div class="ad-page-title">{{$ad->title}}</div>
            <div class="ad-page-date">Publicado em {{$ad->date}} às {{$ad->time}}</div>
            <div class="ad-page-price">{{$ad->price}}</div>
            @if($ad->negotiate)
            <div class="contact">
                <img src="{{asset('temp/icons/wppIcon.png')}}" />
                <div class="contact-text">Negociável</div>
            </div>
            <div class="negociable">*Esse valor poderá ser negociado.</div>
            @endif
            <div class="ad-page-text">
                It is a long established fact that a reader will be distracted by
                the readable content of a page when looking at its layout.
            </div>
            <button class="get-touch" id="whatsApp_btn" data-contact="{{$ad->contact}}" data-message="Sobre o anúncio do {{$ad->title}}">Entrar em contato</button>
            <div class="views">
                <img src="{{asset('temp/icons/eyeGrayIcon.png')}}" />
                <div class="views-text">{{$ad->views}} visualizações neste anúncio</div>
            </div>
        </div>
    </div>
    <div class="ads">
        <div class="ads-title">Anúncios relacionados</div>
        <div class="ads-area">
            @if(count($relatedAds) > 0)
            @foreach($relatedAds as $relatedAd)

            <x-ad img="{{asset($relatedAd->photos->first()->url) ?? ''}}" title="{{$relatedAd->title}}" value="150" price="{{$relatedAd->price}}" href="{{$relatedAd->slug}}" slug="{{$relatedAd->slug}}" />
            @endforeach
            @else
            <span>Não há anuncios relacionados</span>
            @endif
        </div>
    </div>
</main>
@endsection
