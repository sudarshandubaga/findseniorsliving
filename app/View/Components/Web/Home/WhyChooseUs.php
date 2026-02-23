<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WhyChooseUs extends Component
{
    public $features;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->features = [
            [
                "title" => "Unique Business Idea",
                "icon" => "lightbulb"
            ],
            [
                "title" => "Fast Approval",
                "icon" => "check-circle"
            ],
            [
                "title" => "Refinancing",
                "icon" => "refresh"
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.home.why-choose-us');
    }
}
