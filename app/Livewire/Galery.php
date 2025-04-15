<?php

namespace App\Livewire;

use Livewire\Component;

class Galery extends Component
{
    public $images, $url;

    public function mount($images)
    {
        $this->images = $images;
        $this->url = $images->where('mainPhoto', 1)->first()->url ?? 'https://place-hold.it/500x500/gray/black';
    }

    public function render()
    {
        return view('livewire.galery');
    }

    public function setURL(string $url)
    {
        $this->url = $url;
    }
}
