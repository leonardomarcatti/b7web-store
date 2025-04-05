<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\StatesModel;
use App\Models\AddressesModel;
use App\Models\AdvertisesModel;
use Illuminate\Http\Request;

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
        return view('home', ['name' => $data['name'][0]]);
    }

    public function myProfile(): View
    {
        $userData = $this->getUserData();
        $states = StatesModel::all();
        $data = ['states' => $states, 'user' => $userData['user'], 'name' => $userData['name'][0], 'title' => "Update Profile", 'styles' => "myAccountStyle"];
        return view('myProfile', $data);
    }

    public function myAds(): View
    {
        $userData = $this->getUserData();
        $data = ['name' => $userData['name'][0], 'styles' => 'myAdsStyle', 'title' => 'B7Store - Meus anúncios', 'advertises' => $userData['user']->advertises];
        return view('myAds', $data);
    }

    public function deleteAd(Request $r): string
    {
        $id =  $r->id;

        if (AdvertisesModel::find($id)) {
            return 'ok';
        }

        return 'error';
    }
}
