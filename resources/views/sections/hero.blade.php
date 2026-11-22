@php
    // Status slot Pre-Order (US-10). Nanti dibaca dari Google Sheets; default dipakai bila config belum diisi.
    $po = array_merge([
        'status' => 'available', // available | limited | full
        'title'  => 'Open PO — jadwal akan diumumkan',
        'note'   => 'Pesanan diproses maksimal 2 hari setelah konfirmasi.',
    ], $cfg['po'] ?? []);
    $poStyle = [
        'available' => ['Available',    'bg-leaf/10 text-leaf',      'bg-leaf'],
        'limited'   => ['Limited Slot', 'bg-amber-100 text-amber-800', 'bg-amber-500'],
        'full'      => ['Fully Booked', 'bg-red-100 text-red-700',     'bg-red-500'],
    ][$po['status']] ?? ['Available', 'bg-leaf/10 text-leaf', 'bg-leaf'];
@endphp

<section class="bg-gradient-to-b from-sand/70 to-white">
    <div class="mx-auto grid max-w-5xl items-center gap-10 px-5 py-10 md:grid-cols-2 md:py-14">
        <div>
            <span class="inline-block rounded-full border border-brand/15 bg-white px-3 py-1 text-[11px]">🍃 Artisanal Roasted Milk Tea</span>
            <h1 class="mt-5 font-serif text-4xl font-bold leading-tight md:text-5xl">Authentic Bold Aroma of Artisanal <em class="text-brand">Roasted Milk Tea</em></h1>
            <p class="mt-4 max-w-sm text-sm text-brand-dark/80">Seduhan teh panggang autentik—pesan mudah, diproses maksimal 2 hari.</p>

            <div class="mt-6 flex flex-wrap gap-3">
                <a href="#menu" class="btn btn-primary">Pesan Sekarang →</a>
                <a href="#locations" class="btn btn-ghost">Cek Event Terdekat</a>
            </div>
            <p class="mt-4 flex gap-3 text-[11px] underline"><a href="#how">How to Order</a><span>•</span><a href="#locations">Stores &amp; Bazaar</a></p>

            {{-- Indikator slot Pre-Order --}}
            <div id="po" class="card mt-6 scroll-mt-20 max-w-sm p-4">
                <div class="flex items-center justify-between gap-3">
                    <p class="eyebrow">Pre-Order Status</p>
                    <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-[10px] font-semibold {{ $poStyle[1] }}">
                        <i class="size-1.5 rounded-full {{ $poStyle[2] }}"></i>{{ $poStyle[0] }}
                    </span>
                </div>
                <b class="mt-2 block font-serif text-sm">{{ $po['title'] }}</b>
                <p class="mt-1 text-[11px] text-brand-dark/70">{{ $po['note'] }}</p>
                @if ($po['status'] === 'full')
                    <p class="mt-2 text-[11px] font-semibold text-red-700">Slot penuh. Cek <a href="#locations" class="underline">toko mitra</a> untuk stok langsung.</p>
                @endif
            </div>
        </div>

        <div>
            <img src="{{ asset('images/hero.jpg') }}" alt="Botol Chamujie Roasted Milk Tea" width="599" height="900" fetchpriority="high" class="h-64 w-full rounded-3xl object-cover shadow-xl md:h-80">
            <div class="mt-3 grid grid-cols-3 gap-3">
                @foreach ($cfg['products'] as $p)
                    <button data-open-product="{{ $p['id'] }}" class="card p-1.5 text-left">
                        <img src="{{ asset($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy" class="h-16 w-full rounded-lg object-cover">
                        <b class="mt-1 block truncate font-serif text-[10px]">{{ $p['name'] }}</b>
                        <small class="text-[10px]">Rp {{ number_format($p['price'], 0, ',', '.') }}</small>
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</section>
