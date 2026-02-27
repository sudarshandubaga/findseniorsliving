<?php

namespace App\View\Components\Web\Home;

use App\Models\ElderlyLawyer;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedElderlyLawyers extends Component
{
    public $lawyers;

    public function __construct()
    {
        $this->lawyers = ElderlyLawyer::where('featured', 1)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.web.home.featured-elderly-lawyers');
    }
}
