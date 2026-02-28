@extends('web.layouts.app')

@section('content')

    <x-web.home.hero />
    <x-web.home.service-types />
    <x-web.home.featured-senior-care :listings="$featuredListings" />
    <x-web.home.location-listings :cities="$cities" :states="$states" />
    <x-web.home.featured-elderly-lawyers :lawyers="$featuredLawyers" />
    <x-web.home.elderly-lawyers-locations :cities="$lawyerCities" :states="$lawyerStates" />
    <x-web.home.why-choose-us />
    <x-web.home.blog />

    <style>
        .slick-dots {
            bottom: -40px;
        }

        .slick-dots li button:before {
            color: var(--color-primary, #FB923C);
            font-size: 10px;
        }

        .slick-dots li.slick-active button:before {
            color: var(--color-primary, #FB923C);
        }

        /* Custom Navigation Styling */
        .slick-arrow {
            position: static;
            transform: none;
            width: 40px;
            height: 40px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 50%;
            display: flex !important;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
            z-index: 10;
        }

        .slick-arrow:hover {
            background: var(--color-primary, #FB923C);
            border-color: var(--color-primary, #FB923C);
        }

        .slick-arrow:before {
            color: #1a1a1a;
            font-size: 18px;
            transition: all 0.3s ease;
            font-family: 'slick';
        }

        .slick-arrow:hover:before {
            color: #fff;
        }

        .slick-prev:before {
            content: '←';
        }

        .slick-next:before {
            content: '→';
        }
    </style>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.featured-care-slider').slick({
                    dots: true,
                    infinite: true,
                    speed: 500,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    appendArrows: '#care-nav',
                    responsive: [{
                        breakpoint: 1280,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                    ]
                });

                $('.featured-lawyers-slider').slick({
                    dots: true,
                    infinite: true,
                    speed: 500,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    appendArrows: '#lawyers-nav',
                    responsive: [{
                        breakpoint: 1280,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                    ]
                });
            });
        </script>
    @endpush
@endsection