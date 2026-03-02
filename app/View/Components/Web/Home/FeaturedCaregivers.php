<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedCaregivers extends Component
{
    public $caregivers;

    public function __construct($caregivers = [])
    {
        $this->caregivers = $caregivers;
    }

    public function render(): View|Closure|string
    {
        return view('components.web.home.featured-caregivers');
    }
}
