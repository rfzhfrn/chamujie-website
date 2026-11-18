<section id="locations" class="scroll-mt-14 bg-sand/60 py-16">
    <div class="mx-auto max-w-2xl px-5 text-center">
        <p class="eyebrow">Find Chamujie Offline</p>
        <h2 class="mt-1 font-serif text-2xl font-bold">Consignment Stores &amp; Pop-Up Bazaars</h2>
        <p class="mt-2 text-sm text-brand-dark/70">Ingin menikmati Chamujie langsung hari ini tanpa menunggu proses PO maksimal 2 hari? Dapatkan stok dingin di toko mitra konsinyasi kami atau kunjungi booth bazaar akhir pekan.</p>
        <div class="mt-5 inline-flex gap-2" id="loc-tabs">
            <button data-tab="stores" class="btn btn-primary !py-1.5 text-xs">Partner Stores</button>
            <button data-tab="bazaars" class="btn btn-ghost !py-1.5 text-xs">Pop-Up Bazaars</button>
        </div>
        <div data-panel="stores" class="mt-5 space-y-4 text-left">
            @foreach ($cfg['stores'] as $s)
                <div class="card p-5">
                    <div class="flex justify-between text-[11px]"><span>{{ $s['area'] }}</span><span class="rounded-full bg-leaf/10 px-2 py-0.5 text-leaf">{{ $s['stock'] }}</span></div>
                    <h3 class="mt-1 font-serif font-bold">{{ $s['name'] }}</h3>
                    <p class="mt-2 text-xs">📍 {{ $s['address'] }}</p><p class="text-xs">🕒 {{ $s['hours'] }}</p>
                    <a href="{{ $s['map'] }}" target="_blank" rel="noopener" class="btn btn-ghost mt-3 w-full text-xs">Open in Google Maps ↗</a>
                </div>
            @endforeach
        </div>
        <div data-panel="bazaars" class="mt-5 hidden">
            <div class="card p-6 text-sm text-brand-dark/70">
                @forelse ($cfg['bazaars'] as $b)
                    <b>{{ $b['name'] }}</b>
                @empty
                    Belum ada bazaar terjadwal. Pantau Threads &amp; Instagram @@chamujie untuk info terbaru.
                @endforelse
            </div>
        </div>
    </div>
</section>
