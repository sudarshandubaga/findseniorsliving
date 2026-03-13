<?php

namespace App\View\Components\Web;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $footerMenus;
    public $footerDescription;
    public $socialLinks;
    public $siteLogo;
    public $siteTitle;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->siteLogo = \App\Models\Setting::where('key', 'site_logo')->value('value');
        $this->siteTitle = \App\Models\Setting::where('key', 'site_title')->value('value') ?? config('app.name');

        $aboutPage = \App\Models\Page::where('slug', 'about-us')->first();
        $this->footerDescription = $aboutPage ? ($aboutPage->meta_description ?? strip_tags($aboutPage->content)) : 'Your trusted partner in finding the perfect senior living options.';

        $this->socialLinks = \App\Models\Setting::where('key', 'like', 'social_%')->get()->pluck('value', 'key')->toArray();

        $this->footerMenus = [
            [
                "title" => "Senior Living",
                "links" => [
                    ["label" => "Assisted Living", "url" => route('listings.index', ['service' => 'assisted-living'])],
                    ["label" => "Memory Care", "url" => route('listings.index', ['service' => 'memory-care'])],
                    ["label" => "Independent Living", "url" => route('listings.index', ['service' => 'independent-living'])],
                    ["label" => "Home Care", "url" => route('listings.index', ['service' => 'home-care-non-medical'])],
                ]
            ],
            [
                "title" => "Resources",
                "links" => [
                    ["label" => "City Demographics", "url" => route('city-demographics.index')],
                    ["label" => "Our Blog", "url" => route('blog.index')],
                    ["label" => "Senior Care Listings", "url" => route('listings.index')],
                    ["label" => "Elderly Lawyers", "url" => route('lawyers.index')],
                ]
            ],
            [
                "title" => "About",
                "links" => [
                    ["label" => "About Us", "url" => route('pages.show', 'about-us')],
                    ["label" => "How it works", "url" => route('pages.show', 'how-it-works')],
                    ["label" => "Contact Us", "url" => route('contact.show')],
                ]
            ],
            [
                "title" => "Legal",
                "links" => [
                    ["label" => "Terms & Conditions", "url" => route('pages.show', 'terms-and-conditions')],
                    ["label" => "Privacy Policy", "url" => route('pages.show', 'privacy-policy')],
                    ["label" => "Disclaimer", "url" => route('pages.show', 'disclaimer')],
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