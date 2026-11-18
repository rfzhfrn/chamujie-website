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
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="sticky top-0 z-30 border-b border-brand/5 bg-white/90 backdrop-blur">
        <div class="mx-auto flex h-14 max-w-5xl items-center justify-between px-5">
            <a href="#top" class="flex items-center gap-2">
                <span class="grid size-8 place-items-center rounded-lg bg-brand text-white">☕</span>
                <span class="leading-none"><b class="font-serif text-sm">Chamujie</b><br><small class="text-[8px] uppercase tracking-widest text-brand/60">Roasted Milk Tea</small></span>
            </a>
            <nav class="hidden gap-6 text-xs font-medium md:flex">
                <a href="#menu">Menu</a><a href="#about">About Us</a><a href="#how">How to Order</a><a href="#locations">Locations</a>
            </nav>
            <button data-open-cart class="btn bg-sand !px-3 !py-1.5 text-xs">🛒 Cart <span data-cart-count class="grid size-4 place-items-center rounded-full bg-brand text-[10px] text-white">0</span></button>
        </div>
    </header>

    <main id="top">@yield('content')</main>

    <footer class="border-t border-brand/10 py-8 pb-28">
        <div class="mx-auto flex max-w-5xl items-center justify-between gap-4 px-5 text-xs">
            <div><b class="font-serif text-sm">Chamujie Artisanal Roasted Milk Tea</b><br><span class="text-brand/60">Small Batch Pre-Order • Consignment &amp; Pop Up Booths</span></div>
            <a href="{{ $cfg['instagram'] }}" target="_blank" rel="noopener" class="btn btn-ghost !py-1.5 text-xs">@@chamujie ↗</a>
        </div>
    </footer>

    @include('sections.cart')
</body>
</html>
