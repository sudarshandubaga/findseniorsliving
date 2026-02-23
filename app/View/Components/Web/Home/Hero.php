<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public $slides;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->slides = [
            [
                "title" => "Get Quality Services For Grow Your Business.",
                "image" => "https://picsum.photos/seed/finance1/1920/1080"
            ],
            [
                "title" => "Expert Solutions For Your Financial Success.",
                "image" => "https://picsum.photos/seed/finance2/1920/1080"
            ],
            [
                "title" => "Innovative Strategies To Scale Your Company.",
                "image" => "https://picsum.photos/seed/finance3/1920/1080"
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.home.hero');
    }
}
