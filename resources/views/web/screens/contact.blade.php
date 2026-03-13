@extends('web.layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-gray-900 py-32 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="https://picsum.photos/seed/contact-us/1920/600" alt="Background" class="w-full h-full object-cover">
    </div>
    <div class="container relative z-10 text-white text-center">
        <h1 class="text-5xl md:text-7xl font-black tracking-tighter mb-6">Get in Touch</h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">Have questions about senior living? Our expert team is here to help you find the perfect community for your loved ones.</p>
    </div>
</div>

<section class="py-24 bg-white relative">
    <div class="container">
        <div class="flex flex-col lg:flex-row gap-16 -mt-32 relative z-20">
            
            <!-- Contact Info Cards -->
            <div class="lg:w-1/3 space-y-6">
                <div class="bg-white p-8 rounded-[2rem] shadow-xl border border-gray-50 group hover:bg-primary transition-all duration-500">
                    <div class="bg-primary/10 w-14 h-14 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/20 transition-colors">
                        <i data-lucide="mail" class="w-6 h-6 text-primary group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 group-hover:text-white">Email Us</h3>
                    <p class="text-gray-500 group-hover:text-white/80 mb-4 text-sm font-medium">Available 24/7 for your inquiries</p>
                    <a href="mailto:{{ $settings['site_email'] ?? 'support@findseniorsliving.com' }}" class="text-primary font-black group-hover:text-white text-lg transition-colors">{{ $settings['site_email'] ?? 'support@findseniorsliving.com' }}</a>
                </div>

                <div class="bg-white p-8 rounded-[2rem] shadow-xl border border-gray-50 group hover:bg-primary transition-all duration-500">
                    <div class="bg-blue-50 w-14 h-14 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/20 transition-colors">
                        <i data-lucide="phone" class="w-6 h-6 text-blue-600 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 group-hover:text-white">Call Us</h3>
                    <p class="text-gray-500 group-hover:text-white/80 mb-4 text-sm font-medium">Mon-Fri from 9am to 6pm</p>
                    <a href="tel:{{ $settings['site_phone'] ?? '+18001234567' }}" class="text-[#1a1a1a] font-black group-hover:text-white text-lg transition-colors">{{ $settings['site_phone'] ?? '+1 (800) 123-4567' }}</a>
                </div>

                <div class="bg-[#1a1a1a] p-8 rounded-[2rem] shadow-xl text-white">
                    <h3 class="text-xl font-bold mb-6">Our Location</h3>
                    <p class="text-gray-400 mb-8 leading-relaxed italic">{{ $settings['site_address'] ?? '123 Senior Care Lane, Family Plaza, Suite 400, New York, NY 10001' }}</p>
                    <div class="flex gap-4">
                        @foreach(['facebook', 'twitter', 'instagram', 'linkedin'] as $platform)
                            @if(isset($settings['social_'.$platform]))
                                <a href="{{ $settings['social_'.$platform] }}" target="_blank" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-primary transition-all">
                                    <i data-lucide="{{ $platform }}" class="w-4 h-4"></i>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:w-2/3">
                <div class="bg-white p-10 md:p-16 rounded-[2rem] shadow-2xl shadow-gray-200/50 border border-gray-100">
                    <h2 class="text-3xl font-black text-[#1a1a1a] mb-8">Send us a Message</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-50 text-green-700 p-6 rounded-2xl mb-8 flex items-center gap-4 border border-green-100 italic">
                            <i data-lucide="check-circle" class="w-6 h-6"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-black uppercase tracking-widest text-gray-400 ml-1">Full Name</label>
                                <input type="text" name="name" required placeholder="John Doe" 
                                    class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-primary transition-all text-[#1a1a1a] font-medium">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-black uppercase tracking-widest text-gray-400 ml-1">Email Address</label>
                                <input type="email" name="email" required placeholder="john@example.com" 
                                    class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-primary transition-all text-[#1a1a1a] font-medium">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400 ml-1">Subject</label>
                            <input type="text" name="subject" required placeholder="How can we help?" 
                                class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-primary transition-all text-[#1a1a1a] font-medium">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400 ml-1">Your Message</label>
                            <textarea name="message" required rows="6" placeholder="Tell us more about your requirements..." 
                                class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-primary transition-all text-[#1a1a1a] font-medium resize-none"></textarea>
                        </div>

                        <button type="submit" class="bg-primary text-white px-10 py-5 rounded-2xl font-black uppercase tracking-[0.2em] text-sm hover:shadow-2xl hover:shadow-primary/30 transition-all hover:-translate-y-1">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@push('scripts')
<script>
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>
@endpush
@endsection
