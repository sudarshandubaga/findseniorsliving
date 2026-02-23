<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Solutions extends Component
{
    public $solutions;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->solutions = [
            ["title" => "Fast Loan Approval", "icon" => "clock"],
            ["title" => "Business Consulting", "icon" => "briefcase"],
            ["title" => "Investment Trade", "icon" => "trending-up"],
            ["title" => "Business Idea", "icon" => "lightbulb"],
            ["title" => "Market Analysis", "icon" => "chart"],
            ["title" => "Business Policy", "icon" => "shield"],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.home.solutions');
    }
}
