<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\AdvertisesModel;

class Advertises extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $advertiseList = AdvertisesModel::all();
        return view('components.advertises', ['advertiseList' => $advertiseList]);
    }
}
