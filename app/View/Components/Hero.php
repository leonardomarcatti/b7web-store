<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\CategoriesModel;
use App\Models\StatesModel;

class Hero extends Component
{
    /**
     * Create a new component instance.
     */

    public array $data;
    public function __construct()
    {
        $this->data['states'] = StatesModel::all();
        $this->data['categories'] = CategoriesModel::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.hero', $this->data);
    }
}
