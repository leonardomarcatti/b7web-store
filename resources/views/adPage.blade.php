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
            @foreach($relatedAds as $relatedAd)
            @if($ad->slug != $relatedAd->slug)
            <a href="{{$relatedAd->slug}}" class="ad-item">
                <img class="ad-image" src="{{asset($relatedAd->photos->first()->url ?? '')}}" />
                <div class="ad-title">{{$relatedAd->title}}</div>
                <div class="ad-price">{{$relatedAd->price}}</div>
            </a>
            @endif
            @endforeach
        </div>
    </div>
</main>
@endsection
