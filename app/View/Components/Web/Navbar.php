<?php

namespace App\View\Components\Web;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $siteLogo;
    public $siteTitle;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->siteLogo = \App\Models\Setting::where('key', 'site_logo')->value('value');
        $this->siteTitle = \App\Models\Setting::where('key', 'site_title')->value('value') ?? config('app.name');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.navbar');
    }
}