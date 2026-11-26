<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chamujie – Artisanal Roasted Milk Tea Malang</title>
    <meta name="description" content="Roasted milk tea homemade dari Malang. Pesan mudah via WhatsApp, diproses maksimal 2 hari.">
    <meta property="og:title" content="Chamujie – Artisanal Roasted Milk Tea">
    <meta property="og:description" content="Seduhan teh panggang autentik — pesan mudah, diproses maksimal 2 hari.">
    <meta property="og:image" content="{{ asset('images/hero.jpg') }}">
    <meta name="theme-color" content="#5a3a1f">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@php
    $soc  = array_merge([
        'instagram' => $cfg['instagram'] ?? 'https://instagram.com/chamujie',
        'threads'   => 'https://www.threads.com/@chamujie',
    ], $cfg['socials'] ?? []);
    $ico  = ['instagram' => ['Instagram', 'IG'], 'threads' => ['Threads', '@']];
    $wa   = 'https://wa.me/' . ($cfg['wa_number'] ?? '');
@endphp
<body>
    <header class="sticky top-0 z-30 border-b border-brand/5 bg-white/90 backdrop-blur">
        <div class="mx-auto flex h-14 max-w-5xl items-center justify-between gap-3 px-5">
            <a href="#top" class="flex items-center gap-2">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo Chamujie" class="size-8 shrink-0 rounded-lg object-cover">
                <span class="leading-none"><b class="font-serif text-sm">Chamujie</b><br><small class="text-[8px] uppercase tracking-widest text-brand/60">Roasted Milk Tea</small></span>
            </a>

            {{-- Menu desktop --}}
            <nav class="hidden gap-6 text-xs font-medium md:flex" aria-label="Navigasi utama">
                <a data-nav href="#menu">Menu</a><a data-nav href="#about">About Us</a><a data-nav href="#how">How to Order</a><a data-nav href="#locations">Locations</a>
            </nav>

            <div class="flex items-center gap-2">
                <div class="hidden items-center gap-1.5 lg:flex">
                    @foreach ($ico as $k => [$label, $short])
                        @if (! empty($soc[$k]))<a href="{{ $soc[$k] }}" target="_blank" rel="noopener" title="{{ $label }}" aria-label="{{ $label }} Chamujie" class="grid size-7 place-items-center rounded-full border border-brand/15 text-[10px] font-bold hover:bg-sand">{{ $short }}</a>@endif
                    @endforeach
                </div>
                <button data-open-cart class="btn bg-sand !px-3 !py-1.5 text-xs" aria-label="Buka keranjang">🛒 Cart <span data-cart-count class="grid size-4 place-items-center rounded-full bg-brand text-[10px] text-white">0</span></button>
                {{-- Hamburger (mobile) --}}
                <button id="menu-toggle" class="grid size-8 place-items-center rounded-lg border border-brand/15 text-sm md:hidden" aria-label="Buka menu" aria-controls="mobile-menu" aria-expanded="false">☰</button>
            </div>
        </div>

        {{-- Menu mobile --}}
        <nav id="mobile-menu" class="hidden border-t border-brand/10 bg-white px-5 py-2 text-sm font-medium md:hidden" aria-label="Navigasi mobile">
            <a class="block border-b border-brand/5 py-3" href="#menu">Menu</a>
            <a class="block border-b border-brand/5 py-3" href="#about">About Us</a>
            <a class="block border-b border-brand/5 py-3" href="#how">How to Order</a>
            <a class="block py-3" href="#locations">Locations</a>
            <div class="flex gap-2 border-t border-brand/5 py-3">
                @foreach ($ico as $k => [$label, $short])
                    @if (! empty($soc[$k]))<a href="{{ $soc[$k] }}" target="_blank" rel="noopener" class="btn btn-ghost !py-1.5 text-xs">{{ $label }}</a>@endif
                @endforeach
            </div>
        </nav>
    </header>

    <main id="top">@yield('content')</main>

    <footer class="cmf">
        {{-- CSS footer sengaja ditulis langsung di sini supaya tampil benar walau `npm run build` belum dijalankan --}}
        <style>
            .cmf { border-top: 1px solid rgba(90, 58, 31, .1); background: #fff; padding: 2.5rem 0 7rem; }
            .cmf-in { max-width: 64rem; margin: 0 auto; padding: 0 1.25rem; display: flex; align-items: center; justify-content: space-between; gap: 1rem; text-align: left; }
            .cmf-brand { display: flex; align-items: center; gap: .625rem; text-decoration: none; color: inherit; }
            .cmf-logo { width: 40px; height: 40px; flex: none; border-radius: 12px; object-fit: cover; display: block; }
            .cmf-title { display: block; font-family: 'Playfair Display', Georgia, serif; font-size: 1rem; font-weight: 700; line-height: 1.25; color: #3b2412; }
            .cmf-sub { display: block; font-size: .75rem; line-height: 1.25; color: rgba(90, 58, 31, .7); margin-top: 2px; }
            .cmf-links { display: flex; flex-wrap: wrap; align-items: center; justify-content: flex-end; gap: .5rem; }
            .cmf-pill { display: inline-flex; align-items: center; gap: .5rem; padding: .5rem 1rem; border: 1px solid rgba(90, 58, 31, .15); border-radius: 9999px; background: rgba(244, 235, 227, .6); color: #5a3a1f; font-size: .75rem; font-weight: 600; text-decoration: none; transition: background .15s; }
            .cmf-pill:hover { background: #f4ebe3; }
            .cmf-pill span { font-weight: 500; color: rgba(90, 58, 31, .6); }
            @@media (max-width: 639px) {
                .cmf-in { flex-direction: column; text-align: center; }
                .cmf-links { justify-content: center; }
            }
        </style>
        <div class="cmf-in">
            <a href="#top" class="cmf-brand" aria-label="Chamujie, kembali ke atas">
                <img class="cmf-logo" src="{{ asset('images/logo.jpg') }}" width="40" height="40" alt="Logo Chamujie" loading="lazy">
                <div style="text-align:left">
                    <b class="cmf-title">Chamujie Artisanal Roasted Milk Tea</b>
                    <small class="cmf-sub">Small-Batch Pre-Order • Consignment &amp; Pop-Up Booths</small>
                </div>
            </a>
            <div class="cmf-links">
                @foreach ($ico as $k => [$label, $short])
                    @if (! empty($soc[$k]))
                        @php($handle = '@' . ltrim(basename(parse_url($soc[$k], PHP_URL_PATH) ?? ''), '@'))
                        <a class="cmf-pill" href="{{ $soc[$k] }}" target="_blank" rel="noopener noreferrer" title="{{ $label }} {{ $handle }}" aria-label="{{ $label }} Chamujie, buka di tab baru">
                            {{ $label }} <span>{{ $handle }}</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 3h6v6M10 14 21 3M18 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h5"/></svg>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </footer>

    @include('sections.cart')
</body>
</html>
