{{-- Floating bar --}}
<button id="cart-bar" data-open-cart class="fixed inset-x-4 bottom-4 z-20 mx-auto hidden max-w-2xl items-center justify-between rounded-2xl bg-brand-dark px-5 py-3 text-left text-white shadow-2xl">
    <span><b class="text-sm"><span data-cart-count>0</span> Items in Cart | <span data-cart-total>Rp 0</span></b><br><small class="text-[10px] text-white/60">Ketuk untuk cek pesanan & buat format WhatsApp otomatis</small></span>
    <span class="rounded-full bg-leaf px-4 py-2 text-xs font-semibold">Checkout via WA</span>
</button>

{{-- Product modal --}}
<div id="product-modal" class="fixed inset-0 z-40 hidden items-center justify-center bg-black/50 p-4" data-close-modal>
    <div class="max-h-[92vh] w-full max-w-md overflow-y-auto rounded-3xl bg-cream shadow-2xl" onclick="event.stopPropagation()">
        <div class="relative"><img id="pm-img" class="h-36 w-full object-cover" alt=""><button data-close-modal class="absolute right-3 top-3 grid size-7 place-items-center rounded-full bg-white">✕</button>
            <h3 id="pm-name" class="absolute bottom-2 left-4 font-serif text-lg font-bold text-white drop-shadow"></h3></div>
        <div class="space-y-4 p-4">
            <p id="pm-desc" class="rounded-xl bg-sand p-3 text-xs"></p>
            <div><p class="mb-2 text-xs font-bold">1. Bottle Size <span class="float-right font-normal text-brand/60">Required</span></p><div id="pm-sizes" class="grid grid-cols-3 gap-2"></div></div>
            <div><p class="mb-2 text-xs font-bold">2. Sugar Level <span class="float-right font-normal text-brand/60">Recommended: 75%</span></p><div id="pm-sugar" class="grid grid-cols-5 gap-1.5"></div></div>
            <div><p class="mb-1 text-xs font-bold">Special Request (Optional)</p><input id="pm-note" class="w-full rounded-lg border border-brand/15 bg-white px-3 py-2 text-xs" placeholder="e.g., Extra roasted aroma, kurang manis..."></div>
            <div class="flex items-center gap-3">
                <div class="flex items-center rounded-full border border-brand/15 bg-white"><button id="pm-minus" class="px-3 py-1.5">−</button><b id="pm-qty" class="w-5 text-center text-sm">1</b><button id="pm-plus" class="px-3 py-1.5">+</button></div>
                <button id="pm-add" class="btn btn-primary flex-1 text-sm"></button>
            </div>
        </div>
    </div>
</div>

{{-- Cart drawer --}}
<div id="cart-drawer" class="fixed inset-0 z-50 hidden bg-black/40" data-close-cart>
    <aside class="absolute right-0 top-0 flex h-full w-full max-w-sm flex-col bg-white shadow-2xl" onclick="event.stopPropagation()">
        <div class="flex items-start justify-between border-b border-brand/10 p-4"><div><h3 class="font-serif font-bold">Your Temporary Cart</h3><p class="text-[11px] text-brand/60">Periksa detail pesanan & buat pesan Pre-Order WhatsApp otomatis</p></div><button data-close-cart>✕</button></div>
        <div class="flex-1 space-y-4 overflow-y-auto p-4">
            <div id="cart-items" class="space-y-3"></div>
            <div class="space-y-2 rounded-xl bg-cream p-3 text-xs">
                <b>Pickup / Delivery Details</b>
                <input id="f-name" class="w-full rounded-lg border border-brand/15 bg-white px-3 py-2" placeholder="Customer Name * (e.g., Mbak Fira / Budi)">
                <div class="grid grid-cols-2 gap-1 rounded-full bg-sand p-1" id="f-method">
                    <button data-method="Delivery" class="rounded-full bg-brand py-1.5 font-semibold text-white">Courier Delivery</button>
                    <button data-method="Self-Pickup" class="rounded-full py-1.5 font-semibold">Self-Pickup</button>
                </div>
                <input id="f-date" class="w-full rounded-lg border border-brand/15 bg-white px-3 py-2" value="Maksimal 2 hari setelah konfirmasi" placeholder="Estimated Process / Target Date">
                <textarea id="f-addr" rows="2" class="w-full rounded-lg border border-brand/15 bg-white px-3 py-2" placeholder="Delivery Address & Notes"></textarea>
            </div>
            <div class="rounded-xl border border-leaf/20 bg-leaf/5 p-3">
                <div class="mb-1 flex justify-between text-[10px] font-bold uppercase text-leaf">WhatsApp Message Preview <button id="copy-wa" class="font-semibold normal-case">Copy Text</button></div>
                <pre id="wa-preview" class="whitespace-pre-wrap font-sans text-[11px]"></pre>
            </div>
        </div>
        <div class="border-t border-brand/10 p-4">
            <div class="mb-3 flex justify-between text-sm"><span>Estimated Total</span><b data-cart-total>Rp 0</b></div>
            <button id="send-wa" class="btn w-full bg-leaf text-white disabled:opacity-40" disabled>Send Order via WhatsApp</button>
            <p id="wa-hint" class="mt-2 text-center text-[10px] text-brand/60">Isi nama pemesan dan tambahkan minimal 1 item.</p>
        </div>
    </aside>
</div>

<script>window.CHAMUJIE = @json(['products' => $cfg['products'], 'sizes' => $cfg['sizes'], 'wa' => $cfg['wa_number']]);</script>
