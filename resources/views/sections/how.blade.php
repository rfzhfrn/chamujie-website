<section id="how" class="scroll-mt-14 py-16">
    <div class="mx-auto max-w-5xl px-5">
        <p class="eyebrow">Simple Pre-Order Flow</p>
        <h2 class="mt-1 font-serif text-2xl font-bold">How to Order Chamujie</h2>
        <p class="mt-1 max-w-lg text-sm text-brand-dark/70">Tidak perlu lagi bingung atau salah pesan. Atur detail minumanmu di sini dan kirim format pesanan yang rapi langsung ke WhatsApp.</p>
        <div class="mt-6 grid gap-4 sm:grid-cols-2 md:grid-cols-4">
            @foreach ([
                ['Check PO Schedule & Pick Menu','Cek ketersediaan slot Pre-Order (proses maksimal 2 hari) di bagian atas, lalu pilih varian teh favoritmu.'],
                ['Customize Size & Sugar Level','Pilih ukuran botol (250ml / 500ml / 1L) dan tingkat kemanisan (0%–100%) sesuai seleramu.'],
                ['Review Cart & Fill Info','Buka keranjang sementara untuk cek ulang pesanan, lalu isi nama serta detail ambil atau kirim.'],
                ['Auto Send to WhatsApp','Satu klik akan menyusun detail pesanan secara rapi dan langsung meneruskannya ke WhatsApp Admin.'],
            ] as $i => [$t, $d])
                <div class="card p-4">
                    <span class="text-xs font-bold text-brand/40">0{{ $i + 1 }}</span>
                    <h3 class="mt-2 font-serif text-sm font-bold">{{ $t }}</h3>
                    <p class="mt-1 text-[11px] leading-relaxed text-brand-dark/70">{{ $d }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
