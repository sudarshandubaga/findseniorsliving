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
    public function __construct($features = null)
    {
        $this->features = ($features && count($features) > 0) ? $features : [
            [
                "title" => "Unique Business Idea",
                "description" => "Tailored senior living and caregiving plans",
                "icon" => "lightbulb"
            ],
            [
                "title" => "Fast Approval",
                "description" => "Consultations with top elder lawyers today",
                "icon" => "check-circle"
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
