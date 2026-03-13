<?php

namespace App\View\Components\Web;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Topbar extends Component
{
    public $siteEmail;
    public $sitePhone;
    public $siteAddress;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->siteEmail = \App\Models\Setting::where('key', 'site_email')->value('value');
        $this->sitePhone = \App\Models\Setting::where('key', 'site_phone')->value('value');
        $this->siteAddress = \App\Models\Setting::where('key', 'site_address')->value('value');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.topbar');
    }
}
