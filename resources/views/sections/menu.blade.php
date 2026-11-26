@php
    $categories = collect($cfg['products'])->pluck('category')->filter()->unique()->values();
    $fromPrice  = collect($cfg['sizes'])->min('price');
    $badgeIcon  = ['Best Seller' => '🔥', 'Limited Batch' => '⏳', 'New Release' => '✨'];
@endphp

<section id="menu" class="scroll-mt-14 py-16">
    <div class="mx-auto max-w-5xl px-5">
        <p class="eyebrow">Artisanal Menu</p>
        <h2 class="mt-1 font-serif text-2xl font-bold">Roasted Milk Tea Catalog</h2>
        <p class="mt-1 max-w-md text-sm text-brand-dark/70">Ketuk varian minuman untuk memilih ukuran botol dan takaran gula sesuai selera.</p>

        {{-- Filter kategori (US-04): muncul otomatis bila ada 2+ kategori --}}
        @if ($categories->count() > 1)
            <div class="mt-5 flex flex-wrap gap-2" role="group" aria-label="Filter kategori menu">
                <button data-filter="all" aria-pressed="true" class="btn btn-primary !py-1.5 text-xs">Semua</button>
                @foreach ($categories as $c)
                    <button data-filter="{{ $c }}" aria-pressed="false" class="btn btn-ghost !py-1.5 text-xs">{{ $c }}</button>
                @endforeach
            </div>
        @endif

        <div class="mt-6 grid gap-5 sm:grid-cols-2 md:grid-cols-3">
            @foreach ($cfg['products'] as $p)
                @php($avail = ($p['available'] ?? true) !== false)
                <article data-category="{{ $p['category'] ?? 'Menu' }}" class="card flex flex-col overflow-hidden">
                    <button data-open-product="{{ $p['id'] }}" @disabled(! $avail) class="relative block w-full" aria-label="Lihat detail {{ $p['name'] }}">
                        <img src="{{ asset($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy" width="960" height="720" style="aspect-ratio: 4 / 3" class="block w-full object-cover {{ $avail ? '' : 'grayscale' }}">
                        @if (! empty($p['badge']))
                            <span class="absolute left-3 top-3 rounded-full bg-brand px-2.5 py-1 text-[10px] font-semibold text-white">{{ $badgeIcon[$p['badge']] ?? '⭐' }} {{ $p['badge'] }}</span>
                        @endif
                        @unless ($avail)
                            <span class="absolute inset-0 grid place-items-center bg-white/60"><b class="rounded-full bg-brand-dark px-3 py-1 text-xs text-white">Habis</b></span>
                        @endunless
                    </button>
                    <div class="flex flex-1 flex-col p-4">
                        <h3 class="font-serif text-sm font-bold">{{ $p['name'] }}</h3>
                        <p class="mt-1 line-clamp-2 flex-1 text-[11px] leading-relaxed text-brand-dark/70">{{ $p['desc'] ?? '' }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <div class="leading-tight"><small class="block text-[10px] text-brand/60">Mulai</small><b class="text-sm">Rp {{ number_format($fromPrice ?: $p['price'], 0, ',', '.') }}</b></div>
                            <button data-open-product="{{ $p['id'] }}" @disabled(! $avail) class="btn btn-primary !px-3 !py-1.5 text-xs disabled:cursor-not-allowed disabled:opacity-40">{{ $avail ? '+ Add' : 'Habis' }}</button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <p id="menu-empty" class="mt-6 hidden rounded-xl bg-sand/70 p-4 text-center text-sm text-brand-dark/70">Belum ada menu di kategori ini.</p>
    </div>
</section>
