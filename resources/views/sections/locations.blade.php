@php
    // Event yang tanggalnya sudah lewat otomatis disembunyikan (zona waktu WIB).
    $today  = \Illuminate\Support\Carbon::today('Asia/Jakarta');
    $events = collect($cfg['bazaars'] ?? [])
        ->filter(fn ($b) => \Illuminate\Support\Carbon::parse($b['date'], 'Asia/Jakarta')->gte($today))
        ->sortBy('date')->values();
    $stores = collect($cfg['stores'] ?? []);
    $soc    = $cfg['socials'] ?? ['instagram' => $cfg['instagram'] ?? '#'];
@endphp

<section id="locations" class="scroll-mt-14 bg-sand/60 py-16">
    <div class="mx-auto max-w-2xl px-5 text-center">
        <p class="eyebrow">Find Chamujie Offline</p>
        <h2 class="mt-1 font-serif text-2xl font-bold">Consignment Stores &amp; Pop-Up Bazaars</h2>
        <p class="mt-2 text-sm text-brand-dark/70">Ingin menikmati Chamujie langsung hari ini tanpa menunggu proses PO maksimal 2 hari? Dapatkan stok dingin di toko mitra konsinyasi kami atau kunjungi booth bazaar akhir pekan.</p>

        <div class="mt-5 inline-flex gap-2" id="loc-tabs" role="tablist">
            <button data-tab="stores" role="tab" class="btn btn-primary !py-1.5 text-xs">Partner Stores ({{ $stores->count() }})</button>
            <button data-tab="bazaars" role="tab" class="btn btn-ghost !py-1.5 text-xs">Pop-Up Bazaars @if ($events->count())({{ $events->count() }})@endif</button>
        </div>

        {{-- Toko mitra konsinyasi --}}
        <div data-panel="stores" class="mt-5 space-y-4 text-left">
            @forelse ($stores as $s)
                <div class="card p-5">
                    <div class="flex items-center justify-between gap-2 text-[11px]">
                        <span>{{ $s['area'] ?? '' }}</span>
                        @if (! empty($s['stock']))<span class="rounded-full bg-leaf/10 px-2 py-0.5 text-leaf">{{ $s['stock'] }}</span>@endif
                    </div>
                    <h3 class="mt-1 font-serif font-bold">{{ $s['name'] }}</h3>
                    <p class="mt-2 text-xs">📍 {{ $s['address'] }}</p>
                    @if (! empty($s['hours']))<p class="text-xs">🕒 {{ $s['hours'] }}</p>@endif
                    @if (! empty($s['updated']))<p class="mt-2 text-[10px] text-brand/50">Stok diperbarui {{ $s['updated'] }}</p>@endif
                    <a href="{{ $s['map'] }}" target="_blank" rel="noopener" class="btn btn-ghost mt-3 w-full text-xs">Open in Google Maps ↗</a>
                </div>
            @empty
                <div class="card p-6 text-center text-sm text-brand-dark/70">Belum ada toko mitra yang terdaftar. Pesan lewat Pre-Order di bagian <a href="#menu" class="font-semibold underline">Menu</a>.</div>
            @endforelse
        </div>

        {{-- Event & bazaar (US-11) --}}
        <div data-panel="bazaars" class="mt-5 hidden space-y-4 text-left">
            @forelse ($events as $b)
                @php($d = \Illuminate\Support\Carbon::parse($b['date'], 'Asia/Jakarta')->locale('id'))
                <div class="card flex gap-4 p-5">
                    <div class="grid size-16 shrink-0 place-items-center rounded-xl bg-brand text-center leading-tight text-white">
                        <span><b class="block font-serif text-xl">{{ $d->format('j') }}</b><small class="text-[10px] uppercase tracking-wide">{{ $d->translatedFormat('M') }}</small></span>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="rounded-full bg-leaf/10 px-2 py-0.5 text-[10px] font-semibold text-leaf">Upcoming Event</span>
                        <h3 class="mt-1 font-serif font-bold">{{ $b['name'] }}</h3>
                        <p class="mt-1 text-xs">📅 {{ $d->translatedFormat('l, j F Y') }}@if (! empty($b['time'])) • 🕒 {{ $b['time'] }}@endif</p>
                        <p class="text-xs">📍 {{ $b['place'] }}</p>
                        <a href="{{ $b['map'] }}" target="_blank" rel="noopener" class="btn btn-ghost mt-3 !py-1.5 text-xs">Open in Google Maps ↗</a>
                    </div>
                </div>
            @empty
                {{-- State khusus: tidak ada event --}}
                <div class="card p-6 text-center">
                    <p class="text-2xl">🗓</p>
                    <h3 class="mt-1 font-serif font-bold">Belum ada event terdekat</h3>
                    <p class="mt-1 text-xs text-brand-dark/70">Jadwal bazaar &amp; booth Chamujie diumumkan lewat media sosial. Pantau terus ya!</p>
                    <div class="mt-3 flex flex-wrap justify-center gap-2">
                        @foreach (['threads' => 'Threads', 'instagram' => 'Instagram'] as $k => $label)
                            @if (! empty($soc[$k]))<a href="{{ $soc[$k] }}" target="_blank" rel="noopener" class="btn btn-ghost !py-1.5 text-xs">{{ $label }} ↗</a>@endif
                        @endforeach
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
