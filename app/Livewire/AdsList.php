<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StatesModel;
use App\Models\AdvertisesModel;
use App\Models\CategoriesModel;
use Livewire\WithPagination;

class AdsList extends Component
{
    use WithPagination;
    public $categories, $states, $selectedCategory, $selectedState, $text;


    public function mount()
    {
        $this->states = StatesModel::all();
        $this->categories = CategoriesModel::all();
        $this->selectedCategory = 0;
        $this->selectedState = 0;
        $this->text = '';
    }

    public function render()
    {
        return view('livewire.ads-list', [
            'advertises' => $this->applyFilters()->paginate(10),
            'states' => $this->states ?? StatesModel::all(),
            'categories' => $this->categories ?? CategoriesModel::all(),
        ]);
    }

    public function applyFilters()
    {
        $query = AdvertisesModel::query();

        if ($this->selectedCategory && $this->selectedCategory != 0) {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->selectedState && $this->selectedState != 0) {
            $query->whereHas('user', function ($q) {
                $q->where('state_id', $this->selectedState);
            });
        }

        if (trim($this->text) != '') {
            $query->where('title', 'like', '%' . $this->text . '%');
        }

        return $query;
    }

    public function updatedSelectedCategory()
    {
        $this->resetPage();
    }

    public function updatedSelectedState()
    {
        $this->resetPage();
    }

    public function updatedText()
    {
        $this->resetPage();
    }
}
