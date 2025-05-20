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
    #[Url(as: 't')]
    public $text = '';
    #[Url(as: 's')]
    public $selectedState = 0;
    #[Url(as: 'c')]
    public $selectedCategory = 0;

    public $categories, $states;

    public function mount()
    {
        $this->states = StatesModel::all();
        $this->categories = CategoriesModel::all();
        $this->selectedCategory;
        $this->selectedState;
        $this->text;
    }

    protected function queryString(): array
    {
        return ['text' => ['as' => 't'], 'selectedCategory' => ['as' => 'c'], 'selectedState' => ['as' => 's']];
    }

    public function render()
    {
        return view('livewire.ads-list', [
            'advertises' => $this->applyFilters()->paginate(10),
            'states' => $this->states,
            'categories' => $this->categories,
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

    public function updated(): void
    {
        $this->resetPage();
    }
}
