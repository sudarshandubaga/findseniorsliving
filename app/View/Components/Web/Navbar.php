<?php

namespace App\View\Components\Web;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menuItems = [
            [
                "title" => "Senior Living Options",
                "dropdown" => [
                    "Assisted Living",
                    "Memory Care",
                    "Independent Living",
                    "Home Care Services",
                    "Senior Support Services"
                ]
            ],
            [
                "title" => "Browse Listings",
                "link" => route('listings.index'),
                "dropdown" => [
                    "By Location",
                    "By Care Type",
                    "By Service Type"
                ]
            ],
            [
                "title" => "Resources",
                "dropdown" => [
                    "Senior Living Guides",
                    "Caregiver Support",
                    "Financial & Legal Help",
                    "Safety & Wellness",
                    "Senior Lifestyle Tips"
                ]
            ],
            [
                "title" => "Blog",
                "dropdown" => [
                    "Latest Articles",
                    "Popular Topics",
                    "Expert Insights"
                ]
            ],
            ["title" => "Find Care Near You", "link" => route('listings.index')],
            ["title" => "Compare Options", "link" => "#"]
        ];
        return view('components.web.navbar', compact('menuItems'));
    }
}
