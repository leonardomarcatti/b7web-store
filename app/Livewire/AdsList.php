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

    // #[Url(as: 't')]
    public $text = '';
    // #[Url(as: 's')]
    public $selectedState = 0;
    // #[Url(as: 'c')]
    public $selectedCategory = 0;
    public $page = 1;

    public $categories, $states;

    protected $listeners = ['gotoPage'];

    public function mount()
    {
        $this->states = StatesModel::all();
        $this->categories = CategoriesModel::all();
        $this->selectedCategory;
        $this->selectedState;
        $this->text;
    }

    // protected function queryString(): array
    // {
    //     return [
    //         'text' => ['as' => 't', 'except' => ''],
    //         'selectedCategory' => ['as' => 'c', 'except' => 0],
    //         'selectedState' => ['as' => 's', 'except' => 0],
    //     ];
    // }

    public function render()
    {
        $advertises = AdvertisesModel::query()
            ->when($this->text, function ($query) {
                $query->where('title', 'like', '%' . $this->text . '%');
            })
            ->when($this->selectedCategory != 0, function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->when($this->selectedState != 0, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('state_id', $this->selectedState);
                });
            })
            ->with('photos', 'user')
            ->paginate(10);

        $categories = CategoriesModel::all();
        $states = StatesModel::all();

        return view('livewire.ads-list', [
            'advertises' => $advertises,
            'categories' => $categories,
            'states' => $states,
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
