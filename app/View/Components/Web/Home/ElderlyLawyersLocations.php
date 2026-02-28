<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ElderlyLawyersLocations extends Component
{
    public $cities;
    public $states;

    public function __construct($cities = [], $states = [])
    {
        $this->cities = $cities;
        $this->states = $states;
    }

    public function render(): View|Closure|string
    {
        return view('components.web.home.elderly-lawyers-locations');
    }
}
