<section id="how" class="scroll-mt-14 py-16">
    <div class="mx-auto max-w-5xl px-5">
        <p class="eyebrow">Simple Pre-Order Flow</p>
        <h2 class="mt-1 font-serif text-2xl font-bold">How to Order Chamujie</h2>
        <p class="mt-1 max-w-lg text-sm text-brand-dark/70">Tidak perlu lagi bingung atau salah pesan. Atur detail minumanmu di sini dan kirim format pesanan yang rapi langsung ke WhatsApp.</p>

        <ol class="mt-6 grid gap-4 sm:grid-cols-2 md:grid-cols-4">
            @foreach ([
                ['Check PO Schedule & Pick Menu', 'Cek status slot Pre-Order di bagian atas halaman, lalu pilih varian teh favoritmu.', '#po', 'Lihat status PO →'],
                ['Customize Size & Sugar Level', 'Pilih ukuran botol (250ml / 500ml / 1L) dan tingkat kemanisan (0%–100%) sesuai seleramu.', '#menu', 'Pilih menu →'],
                ['Review Cart & Fill Info', 'Buka keranjang sementara untuk cek ulang pesanan, lalu isi nama serta detail ambil atau kirim.', null, 'Buka keranjang →'],
                ['Auto Send to WhatsApp', 'Satu klik akan menyusun detail pesanan secara rapi dan langsung meneruskannya ke WhatsApp Admin.', null, null],
            ] as $i => [$t, $d, $href, $cta])
                <li class="card flex flex-col p-4">
                    <span class="grid size-7 place-items-center rounded-full bg-sand text-xs font-bold text-brand">{{ $i + 1 }}</span>
                    <h3 class="mt-3 font-serif text-sm font-bold">{{ $t }}</h3>
                    <p class="mt-1 flex-1 text-[11px] leading-relaxed text-brand-dark/70">{{ $d }}</p>
                    @if ($cta && $href)
                        <a href="{{ $href }}" class="mt-3 text-[11px] font-semibold text-brand underline">{{ $cta }}</a>
                    @elseif ($cta)
                        <button data-open-cart class="mt-3 text-left text-[11px] font-semibold text-brand underline">{{ $cta }}</button>
                    @endif
                </li>
            @endforeach
        </ol>

        {{-- Info tambahan dari mitra: proses, pengiriman, alternatif beli langsung --}}
        <div class="mt-5 grid gap-3 text-[11px] sm:grid-cols-3">
            <div class="rounded-xl bg-sand/70 p-3"><b class="block text-xs">⏱ Proses Pre-Order</b>Dibuat segar setelah konfirmasi, maksimal 2 hari.</div>
            <div class="rounded-xl bg-sand/70 p-3"><b class="block text-xs">🚚 Pengiriman</b>Malang: kurir instan. Luar kota: ekspedisi Paxel. Atau ambil sendiri.</div>
            <div class="rounded-xl bg-sand/70 p-3"><b class="block text-xs">🏪 Butuh hari ini?</b>Beli langsung di <a href="#locations" class="font-semibold underline">toko mitra &amp; bazaar</a> tanpa menunggu PO.</div>
        </div>

        <div class="mt-6"><a href="#menu" class="btn btn-primary">Mulai Pesan Sekarang →</a></div>
    </div>
</section>
