<?php

namespace App\View\Components\Web\Home;

use App\Models\Listing;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedSeniorCare extends Component
{
    public $listings;

    public function __construct()
    {
        $this->listings = Listing::where('is_featured', 1)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.web.home.featured-senior-care');
    }
}
