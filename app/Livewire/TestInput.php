<?php

namespace App\Livewire;

use Livewire\Component;

class TestInput extends Component
{
    public $name = '';

    public function updatedName($value)
    {
        logger("updatedInputValue chamado com valor: $value");
    }

    public function render()
    {
        return view('livewire.test-input');
        logger('Render do TestInput chamado');
    }
}
