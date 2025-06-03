<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CategoriesModel;
use Livewire\WithFileUploads;

class NewAd extends Component
{
    use WithFileUploads;

    public $categories;
    public $title, $price, $negotiate = 0, $category_id, $description;
    public $photos = [];

    protected function rules(): array
    {
        return [
            'photos' => 'required|array|min:1|max:5',
            'photos.*' => 'image|max:2048',
            'title' => 'required|min:8|max:255',
            'price' => 'required|numeric',
            'negotiate' => 'required|boolean',
            'description' => 'required|min:8|max:255',
            'category_id' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O :attribute é obrigatório.',
            'title.min' => 'O :attribute é muito curto.',
            'title.max' => 'O :attribute é muito longo.',
            'price.required' => 'O :attribute é obrigatório.',
            'price.numeric' => 'O :attribute deve ser um número.',
            'negotiate.required' => 'O :attribute é obrigatório.',
            'negotiate.boolean' => 'O :attribute pode ser negociado.',
            'description.required' => 'A :attribute é obrigatória.',
            'description.min' => 'O :attribute é muito curto.',
            'description.max' => 'O :attribute é muito longo.',
            'title.max' => 'O :attribute é muito longo.',
            'category_id.required' => 'Escolha uma categoria',
            'category_id.min' => 'A categoria deve ser um número.',
        ];
    }

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
        // $this->validate();

        \dd($this->photos);
    }
}
