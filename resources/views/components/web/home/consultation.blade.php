<section class="relative py-28 bg-[#1a1a1a] overflow-hidden">

    <!-- Right Image Section (desktop only) -->
    <div class="absolute right-0 top-0 bottom-0 w-1/2 hidden lg:block">
        <img src="https://picsum.photos/seed/cons/1200/1400" alt="Consultation"
            class="w-full h-full object-cover opacity-60" referrerpolicy="no-referrer" />
        <div class="absolute inset-0 bg-gradient-to-r from-[#1a1a1a] via-transparent to-transparent"></div>
    </div>

    <!-- Form Container -->
    <div class="container relative z-10">

        <div class="lg:w-1/2 lg:pr-20">

            <!-- Heading -->
            <h2 class="text-5xl font-bold text-white mb-6 tracking-tight">
                Request a Free Consultation
            </h2>

            <!-- Description -->
            <p class="text-gray-400 text-lg mb-12 leading-relaxed">
                We ready for your request, global management consulting firm that serves a private
            </p>

            <!-- Consultation Form -->
            <form class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <input type="text" placeholder="Full Name*"
                    class="bg-white p-5 rounded-sm text-sm outline-none focus:ring-2 focus:ring-primary transition-all shadow-sm" />

                <input type="email" placeholder="Email Address*"
                    class="bg-white p-5 rounded-sm text-sm outline-none focus:ring-2 focus:ring-primary transition-all shadow-sm" />

                <input type="text" placeholder="Phone*"
                    class="bg-white p-5 rounded-sm text-sm outline-none focus:ring-2 focus:ring-primary transition-all shadow-sm" />

                <input type="text" placeholder="Subject"
                    class="bg-white p-5 rounded-sm text-sm outline-none focus:ring-2 focus:ring-primary transition-all shadow-sm" />

                <textarea placeholder="Request Message" rows="5"
                    class="col-span-1 sm:col-span-2 bg-white p-5 rounded-sm text-sm outline-none focus:ring-2 focus:ring-primary transition-all shadow-sm"></textarea>

                <button type="submit"
                    class="bg-primary text-white px-12 py-5 rounded-sm font-bold uppercase tracking-widest hover:bg-opacity-90 transition-all shadow-xl hover:shadow-primary/30 w-full sm:w-fit flex items-center justify-center space-x-3 group">
                    <span>Send Request</span>
                    <i data-lucide="send"
                        class="w-5 h-5 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                </button>

            </form>

        </div>

    </div>

</section>