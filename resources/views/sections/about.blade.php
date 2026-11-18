<section id="about" class="scroll-mt-14 bg-sand/60 py-16">
    <div class="mx-auto grid max-w-5xl items-center gap-10 px-5 md:grid-cols-[1fr_1.4fr]">
        <div class="relative">
            <img src="{{ asset('images/about.jpg') }}" alt="Teh panggang Chamujie" class="h-72 w-full rounded-3xl object-cover shadow-lg">
            <span class="absolute bottom-4 left-4 rounded-full bg-white/90 px-3 py-1 text-[10px] font-semibold">Small-Batch Roasted Tea Leaves</span>
        </div>
        <div>
            <p class="eyebrow">About Us</p>
            <h2 class="mt-1 font-serif text-2xl font-bold">Authentic Craft in Every Bottle</h2>
            <p class="mt-3 text-sm leading-relaxed text-brand-dark/80">Setiap botol Chamujie diracik dari daun teh utuh pilihan yang dipanggang perlahan di atas suhu terkontrol hingga aromanya harum mendalam, lalu diseduh bersama susu segar yang creamy—tanpa bubuk instan maupun perisa buatan.</p>
            <div class="mt-5 grid gap-3 sm:grid-cols-3">
                @foreach ([['Slow-Roasted','Aroma karamel panggang yang khas dan mendalam'],['Made-to-Order','Selalu diseduh segar, diproses maksimal 2 hari'],['Zero Essence','100% daun teh asli & susu segar pilihan']] as [$t,$d])
                    <div><b class="text-xs">{{ $t }}</b><p class="mt-1 text-[11px] text-brand-dark/70">{{ $d }}</p></div>
                @endforeach
            </div>
            <a href="#menu" class="mt-5 inline-block text-xs font-semibold underline">See All Variants →</a>
        </div>
    </div>
</section>
