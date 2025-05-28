<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AdvertisesModel;

class CategoriesList extends Component
{
    use WithPagination;

    public $category, $title, $styles;

    public function mount($category, $title, $styles)
    {
        $this->category = $category;
        $this->title = $title;
        $this->styles = $styles;
    }

    public function advertisesFilter()
    {
        return AdvertisesModel::where('category_id', $this->category->id);
        $query->where('category_id', $this->category->id);
        return $query;
    }

    public function render()
    {
        return view('livewire.categories-list', ['advertises' => $this->advertisesFilter()->paginate(10)->withQueryString()]);
    }
}
