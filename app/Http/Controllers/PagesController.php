<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\StatesModel;
use App\Models\AdvertisesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class PagesController extends Controller
{

    public function getUserData(): array
    {
        $user = Auth::user();
        $name = \explode(' ', $user->name);
        return ['name' => $name, 'user' => $user];
    }

    public function index(): View
    {
        $data = $this->getUserData();
        $data['title'] = 'B7Web Store';
        return view('home', $data);
    }

    public function myProfile(): View
    {
        $userData = $this->getUserData();
        $states = StatesModel::all();
        $data = ['states' => $states, 'user' => $userData['user'], 'name' => $userData['name'], 'title' => "Update Profile", 'styles' => "myAccountStyle"];
        return view('myProfile', $data);
    }

    public function myAds(): View
    {
        $userData = $this->getUserData();
        $data = ['name' => $userData['name'], 'styles' => 'myAdsStyle', 'title' => 'B7Store - Meus anúncios', 'advertises' => $userData['user']->advertises];
        return view('myAds', $data);
    }

    public function deleteAd(Request $r): string
    {
        $id =  $r->id;
        $ad = AdvertisesModel::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if ($ad) {
            $ad->delete();
            return back();
        }

        return \redirect()->route('home');
    }

    private function updateAdvertiseViews(object $ad): bool
    {
        return $ad->save();
    }

    private function formatAdData(object $ad): object
    {
        $ad->date = Carbon::parse($ad->created_at)->format('d/M/y');
        $ad->time = Carbon::parse($ad->created_at)->format('H:i');
        $ad->price = Number::currency($ad->price, 'BRL', 'pt_BR', 2);
        return $ad;
    }

    private function getAdvertise(string $slug)
    {
        $ad = AdvertisesModel::where('slug', $slug)->first();
        if ($ad) {
            $ad->views += 1;
            return $ad;
        }

        return false;
    }

    public function getRaletedAds(object $ad): object
    {
        $ads = AdvertisesModel::where([['category_id', $ad->category_id], ['user_id', '<>', Auth::user()->id], ['slug', '<>', $ad->slug]])
            ->orderBy('created_at', 'desc')->orderBy('views', 'desc')->limit(4)->get();
        return $ads;
    }

    public function adDetails(string $slug)
    {
        $ad = $this->getAdvertise($slug);
        if ($ad) {
            $this->updateAdvertiseViews($ad);
            $this->formatAdData($ad);
            $userData = $this->getUserData();
            $relatedAds = $this->getRaletedAds($ad);
            return view('adPage', ['title' => 'Detalhes', 'styles' => 'adPageStyle', 'name' => $userData['name'], 'ad' => $ad, 'relatedAds' => $relatedAds]);
        }

        return \redirect()->back();
    }

    public function adsList(): View
    {
        $data = $this->getUserData();
        $data['title'] = 'B7Web Store';
        $data['styles'] = 'adsListStyle';
        return view('adsListPage', $data);
    }
}
