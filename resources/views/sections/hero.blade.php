<section class="bg-gradient-to-b from-sand/70 to-white">
    <div class="mx-auto grid max-w-5xl items-center gap-10 px-5 py-14 md:grid-cols-2">
        <div>
            <span class="inline-block rounded-full border border-brand/15 bg-white px-3 py-1 text-[11px]">🍃 Artisanal Roasted Milk Tea</span>
            <h1 class="mt-5 font-serif text-4xl font-bold leading-tight md:text-5xl">Authentic Bold Aroma of Artisanal <em class="text-brand">Roasted Milk Tea</em></h1>
            <p class="mt-4 max-w-sm text-sm text-brand-dark/80">Seduhan teh panggang autentik—pesan mudah, diproses maksimal 2 hari.</p>
            <div class="mt-6 flex gap-3">
                <a href="#menu" class="btn btn-primary">Order Now →</a>
                <a href="#about" class="btn btn-ghost">About Us</a>
            </div>
            <p class="mt-4 flex gap-3 text-[11px] underline"><a href="#how">How to Order</a><span>•</span><a href="#locations">Stores &amp; Bazaar</a></p>
        </div>
        <div>
            <img src="{{ asset('images/hero.jpg') }}" alt="Chamujie Roasted Milk Tea" class="h-64 w-full rounded-3xl object-cover shadow-xl md:h-80">
            <div class="mt-3 grid grid-cols-3 gap-3">
                @foreach ($cfg['products'] as $p)
                    <button data-open-product="{{ $p['id'] }}" class="card p-1.5 text-left">
                        <img src="{{ asset($p['image']) }}" alt="" class="h-16 w-full rounded-lg object-cover">
                        <b class="mt-1 block truncate font-serif text-[10px]">{{ $p['name'] }}</b>
                        <small class="text-[10px]">Rp {{ number_format($p['price'], 0, ',', '.') }}</small>
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</section>
