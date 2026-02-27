<?php

namespace App\View\Components\Web\Home;

use App\Models\ServiceType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceTypes extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.home.service-types');
    }
}
