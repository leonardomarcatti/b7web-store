@extends('layout.layout')

@section('content')
<div class="my-ads-page">
    <x-sideBar class="config-myAds" />
    <div class="myAds-area">
        <h3 class="myAds-title">Meus Anúncios</h3>
        <div class="myAds-ads-area">
            @if($advertises->count() > 0)
            @foreach($advertises as $ad)
            @foreach($ad->photos as $photo)
            @if($photo->mainPhoto)
            <x-ad title="{{$ad->title}}" price="{{$ad->price}}" :img="$photo->url" id="{{$ad->id}}" buttons slug="{{$ad->slug}}" />
            @endif
            @endforeach
            @endforeach
            @else
            <h4>Você ainda não criou anúncios</h4>
            @endif
        </div>
    </div>
</div>
@endsection
