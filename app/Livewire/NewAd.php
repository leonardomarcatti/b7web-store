<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CategoriesModel;

class NewAd extends Component
{
    public $categories;
    public $title, $price, $negotiate, $category_id, $description;

    public function mount()
    {
        $this->categories = CategoriesModel::all();
    }

    public function render()
    {
        return view('livewire.new-ad');
    }

    public function saveNewAd()
    {
        \dd($this->title, $this->price, $this->negotiate, $this->category_id, $this->description);
    }
}
