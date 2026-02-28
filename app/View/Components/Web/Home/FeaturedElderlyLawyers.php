<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedElderlyLawyers extends Component
{
    public $lawyers;

    public function __construct($lawyers = null)
    {
        $this->lawyers = $lawyers;
    }

    public function render(): View|Closure|string
    {
        return view('components.web.home.featured-elderly-lawyers');
    }
}
