<section id="menu" class="scroll-mt-14 py-16">
    <div class="mx-auto max-w-5xl px-5">
        <p class="eyebrow">Artisanal Menu</p>
        <h2 class="mt-1 font-serif text-2xl font-bold">Roasted Milk Tea Catalog</h2>
        <p class="mt-1 max-w-md text-sm text-brand-dark/70">Ketuk varian minuman untuk memilih ukuran botol dan takaran gula sesuai selera.</p>
        <div class="mt-6 grid gap-5 sm:grid-cols-2 md:grid-cols-3">
            @foreach ($cfg['products'] as $p)
                <article class="card overflow-hidden">
                    <button data-open-product="{{ $p['id'] }}" class="relative block w-full">
                        <img src="{{ asset($p['image']) }}" alt="{{ $p['name'] }}" class="h-44 w-full object-cover">
                        @if ($p['badge'])<span class="absolute left-3 top-3 rounded-full bg-brand px-2.5 py-1 text-[10px] font-semibold text-white">🔥 {{ $p['badge'] }}</span>@endif
                    </button>
                    <div class="p-4">
                        <h3 class="font-serif text-sm font-bold">{{ $p['name'] }}</h3>
                        <div class="mt-3 flex items-center justify-between">
                            <b class="text-sm">Rp {{ number_format($p['price'], 0, ',', '.') }}</b>
                            <button data-open-product="{{ $p['id'] }}" class="btn btn-primary !px-3 !py-1.5 text-xs">+ Add</button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
