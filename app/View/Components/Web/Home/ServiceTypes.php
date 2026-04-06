<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\HomecareType;

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
        $homecareTypes = HomecareType::whereNull('parent_type_id')
            ->with(['children' => function($q) {
                $q->where('status', 1)->orderBy('sort_order');
            }])
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        return view('components.web.home.service-types', [
            'homecareTypes' => $homecareTypes
        ]);
    }
}
