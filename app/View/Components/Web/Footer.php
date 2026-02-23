<?php

namespace App\View\Components\Web;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $footerMenus;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->footerMenus = [
            [
                "title" => "Senior Living",
                "links" => [
                    "Assisted Living",
                    "Memory Care",
                    "Independent Living",
                    "Home Care",
                    "Support Services"
                ]
            ],
            [
                "title" => "Resources",
                "links" => [
                    "Living Guides",
                    "Caregiver Support",
                    "Financial Help",
                    "Safety & Wellness",
                    "Lifestyle Tips"
                ]
            ],
            [
                "title" => "About",
                "links" => [
                    "Our Mission",
                    "How it works",
                    "Contact Us"
                ]
            ],
            [
                "title" => "Legal",
                "links" => [
                    "Terms & Conditions",
                    "Privacy Policy",
                    "Disclaimer"
                ]
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.web.footer');
    }
}
