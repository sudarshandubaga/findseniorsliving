<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedSeniorCare extends Component
{
    public $listings;

    public function __construct($listings = null)
    {
        $this->listings = $listings;
    }

    public function render(): View|Closure|string
    {
        return view('components.web.home.featured-senior-care');
    }
}
