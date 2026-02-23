<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Activities extends Component
{
    public $activities;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->activities = [
            [
                "title" => "Corporate Services",
                "subtitle" => "Best Analysis",
                "icon" => "briefcase",
                "image" => "https://picsum.photos/seed/act1/600/400"
            ],
            [
                "title" => "Financial Planing",
                "subtitle" => "Analysis Finance",
                "icon" => "trending-up",
                "image" => "https://picsum.photos/seed/act2/600/400"
            ],
            [
                "title" => "Business Consulting",
                "subtitle" => "Free Consulting",
                "icon" => "user",
                "image" => "https://picsum.photos/seed/act3/600/400"
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.home.activities');
    }
}
