<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StatesModel;
use App\Models\AdvertisesModel;
use App\Models\CategoriesModel;

class AdsList extends Component
{
    public $categories, $states, $advertises, $selectedCategory, $selectedState;


    public function mount()
    {
        $this->advertises = AdvertisesModel::all();
        $this->states = StatesModel::all();
        $this->categories = CategoriesModel::all();
    }

    public function render()
    {
        return view('livewire.ads-list');
    }
    /**
     * !TODO - CRIAR FUNÇÃO
     */
    public function applyFilters(): void
    {
        if ($this->selectedCategory == 0 && $this->selectedState == 0) {
            $this->advertises = AdvertisesModel::all();
            return;
        }

        if ($this->selectedCategory != 0 && $this->selectedState != 0) {
            $this->advertises = AdvertisesModel::where('category_id', $this->selectedCategory)->get();
            $filteredAdvertises = [];
            foreach ($this->advertises as $key => $ad) {
                if ($ad->user->state_id == $this->selectedState) {
                    $filteredAdvertises[$key] = $ad;
                }
            }
            $this->advertises = $filteredAdvertises;
            return;
        }

        if ($this->selectedCategory != 0 && $this->selectedState == 0) {
            $this->advertises = AdvertisesModel::where('category_id', $this->selectedCategory)->get();
            return;
        }

        if ($this->selectedCategory == 0 && $this->selectedState != 0) {
            $this->advertises = AdvertisesModel::all();
            $filteredAdvertises = [];
            foreach ($this->advertises as $key => $ad) {
                if ($ad->user->state_id == $this->selectedState) {
                    $filteredAdvertises[$key] = $ad;
                }
            }
            $this->advertises = $filteredAdvertises;
            return;
        }
    }

    public function updatedSelectedCategory(): void
    {
        $this->applyFilters();
        return;
    }

    public function updatedSelectedState(): void
    {
        $this->applyFilters();
        return;
    }
}
