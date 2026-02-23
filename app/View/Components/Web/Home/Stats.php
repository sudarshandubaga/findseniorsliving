<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Stats extends Component
{
    public $stats;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->stats = [
            ["label" => "PROJECTS COMPLETED", "value" => "6589"],
            ["label" => "EXPERT TECHNICIANS", "value" => "264"],
            ["label" => "HAPPY CUSTOMERS", "value" => "7530"],
            ["label" => "CUPS OF COFFEE", "value" => "2657"],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.home.stats');
    }
}
