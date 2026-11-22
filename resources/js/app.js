import './bootstrap';

const { products, sizes, wa } = window.CHAMUJIE;
const SUGAR = [[0, 'No Sugar'], [25, 'Hint'], [50, 'Half'], [75, 'Less Sweet'], [100, 'Normal']];
const rp = (n) => 'Rp ' + n.toLocaleString('id-ID');
const $ = (s, r = document) => r.querySelector(s);
const $$ = (s, r = document) => [...r.querySelectorAll(s)];
const show = (el, on, flex = false) => { el.classList.toggle('hidden', !on); el.classList.toggle(flex ? 'flex' : 'block', on && flex); };

let cart = [];
let method = 'Delivery';
let sel = { product: null, size: sizes[0], sugar: 75, qty: 1 };

/* ---------- Product modal ---------- */
const modal = $('#product-modal');
function renderModal() {
    $('#pm-sizes').innerHTML = sizes.map((s) => `<button data-size="${s.id}" class="rounded-xl border p-2 text-center text-[11px] ${s.id === sel.size.id ? 'border-brand bg-sand' : 'border-brand/15 bg-white'}"><b class="block text-xs">${s.label}</b>${s.note}<br><b>${rp(s.price)}</b></button>`).join('');
    $('#pm-sugar').innerHTML = SUGAR.map(([v, l]) => `<button data-sugar="${v}" class="rounded-xl border py-2 text-center text-[10px] ${v === sel.sugar ? 'border-brand bg-brand text-white' : 'border-brand/15 bg-white'}"><b class="block text-xs">${v}%</b>${l}</button>`).join('');
    $('#pm-qty').textContent = sel.qty;
    $('#pm-add').textContent = `Add to Cart — ${rp(sel.size.price * sel.qty)}`;
}
function openProduct(id) {
    sel = { product: products.find((p) => p.id === id), size: sizes[0], sugar: 75, qty: 1 };
    $('#pm-img').src = '/' + sel.product.image;
    $('#pm-name').textContent = sel.product.name;
    $('#pm-desc').textContent = sel.product.desc;
    $('#pm-note').value = '';
    renderModal();
    show(modal, true, true);
}
$$('[data-open-product]').forEach((b) => b.addEventListener('click', () => openProduct(b.dataset.openProduct)));
$$('[data-close-modal]').forEach((b) => b.addEventListener('click', () => show(modal, false)));
$('#pm-sizes').addEventListener('click', (e) => { const b = e.target.closest('[data-size]'); if (b) { sel.size = sizes.find((s) => s.id === b.dataset.size); renderModal(); } });
$('#pm-sugar').addEventListener('click', (e) => { const b = e.target.closest('[data-sugar]'); if (b) { sel.sugar = +b.dataset.sugar; renderModal(); } });
$('#pm-plus').addEventListener('click', () => { sel.qty++; renderModal(); });
$('#pm-minus').addEventListener('click', () => { sel.qty = Math.max(1, sel.qty - 1); renderModal(); });
$('#pm-add').addEventListener('click', () => {
    const note = $('#pm-note').value.trim();
    const hit = cart.find((c) => c.pid === sel.product.id && c.size.id === sel.size.id && c.sugar === sel.sugar && c.note === note);
    if (hit) hit.qty += sel.qty;
    else cart.push({ pid: sel.product.id, name: sel.product.name, image: sel.product.image, size: sel.size, sugar: sel.sugar, note, qty: sel.qty });
    show(modal, false);
    renderCart();
});

/* ---------- Cart ---------- */
const drawer = $('#cart-drawer');
const total = () => cart.reduce((t, c) => t + c.size.price * c.qty, 0);
const count = () => cart.reduce((t, c) => t + c.qty, 0);

function buildMessage() {
    const name = $('#f-name').value.trim() || '(Your Name)';
    const lines = cart.map((c, i) => `${i + 1}. *${c.name}* (${c.size.label}) x${c.qty}\n • Sugar: ${c.sugar}%${c.note ? `\n • Note: ${c.note}` : ''}\n • Subtotal: ${rp(c.size.price * c.qty)}`);
    const addr = $('#f-addr').value.trim();
    return [
        '*CHAMUJIE PRE-ORDER REQUEST*', 'Process Time: Max. 2 Days (Made-to-Order)', '-------------------------------',
        `*Customer:* ${name}`, `*Method:* ${method}`, `*Target Date:* ${$('#f-date').value.trim() || '-'}`,
        ...(addr ? [`*Address/Notes:* ${addr}`] : []), '-------------------------------',
        '*Order Summary:*', ...(lines.length ? lines : ['(Cart kosong)']), '-------------------------------',
        `*TOTAL ESTIMATE:* ${rp(total())}`, '', 'Hi Chamujie Admin! Please confirm my Pre-Order slot and payment details. Thank you!',
    ].join('\n');
}

function renderCart() {
    $$('[data-cart-count]').forEach((e) => (e.textContent = count()));
    $$('[data-cart-total]').forEach((e) => (e.textContent = rp(total())));
    const bar = $('#cart-bar');
    bar.classList.toggle('hidden', cart.length === 0);
    bar.classList.toggle('flex', cart.length > 0);
    $('#cart-items').innerHTML = cart.length ? cart.map((c, i) => `
        <div class="flex gap-3 rounded-xl border border-brand/10 p-2">
            <img src="/${c.image}" class="size-14 rounded-lg object-cover" alt="">
            <div class="flex-1 text-xs"><b class="font-serif">${c.name}</b><br><span class="text-brand/60">${c.size.label} • Sugar ${c.sugar}%${c.note ? ' • ' + c.note : ''}</span><br><b>${rp(c.size.price * c.qty)}</b></div>
            <div class="flex flex-col items-end justify-between text-xs"><button data-del="${i}" class="text-brand/50">🗑</button>
                <span class="rounded-full border border-brand/15"><button data-dec="${i}" class="px-2">−</button>${c.qty}<button data-inc="${i}" class="px-2">+</button></span></div>
        </div>`).join('') : '<p class="py-6 text-center text-xs text-brand/60">Keranjang masih kosong. Pilih menu dulu ya!</p>';
    updatePreview();
}
function updatePreview() {
    $('#wa-preview').textContent = buildMessage();
    const ok = cart.length > 0 && $('#f-name').value.trim() !== '';
    $('#send-wa').disabled = !ok;
    $('#wa-hint').classList.toggle('hidden', ok);
}
$('#cart-items').addEventListener('click', (e) => {
    const t = e.target; const i = +(t.dataset.del ?? t.dataset.inc ?? t.dataset.dec);
    if (Number.isNaN(i)) return;
    if (t.dataset.inc !== undefined) cart[i].qty++;
    else if (t.dataset.dec !== undefined) cart[i].qty = Math.max(1, cart[i].qty - 1);
    else cart.splice(i, 1);
    renderCart();
});
['#f-name', '#f-date', '#f-addr'].forEach((s) => $(s).addEventListener('input', updatePreview));
$('#f-method').addEventListener('click', (e) => {
    const b = e.target.closest('[data-method]'); if (!b) return;
    method = b.dataset.method;
    $$('#f-method button').forEach((x) => { const on = x === b; x.classList.toggle('bg-brand', on); x.classList.toggle('text-white', on); });
    updatePreview();
});
$$('[data-open-cart]').forEach((b) => b.addEventListener('click', () => show(drawer, true)));
$$('[data-close-cart]').forEach((b) => b.addEventListener('click', () => show(drawer, false)));
$('#copy-wa').addEventListener('click', (e) => { navigator.clipboard?.writeText(buildMessage()); e.target.textContent = 'Copied!'; setTimeout(() => (e.target.textContent = 'Copy Text'), 1500); });
$('#send-wa').addEventListener('click', () => window.open(`https://wa.me/${wa}?text=${encodeURIComponent(buildMessage())}`, '_blank', 'noopener'));

/* ---------- Locations tabs ---------- */
$$('#loc-tabs [data-tab]').forEach((b) => b.addEventListener('click', () => {
    $$('#loc-tabs [data-tab]').forEach((x) => { const on = x === b; x.classList.toggle('btn-primary', on); x.classList.toggle('btn-ghost', !on); });
    $$('[data-panel]').forEach((p) => p.classList.toggle('hidden', p.dataset.panel !== b.dataset.tab));
}));

renderCart();
/* ---------- Navbar: menu mobile & penanda section aktif ---------- */
const menuBtn = $('#menu-toggle');
const mobileMenu = $('#mobile-menu');
const setMenu = (open) => {
    mobileMenu.classList.toggle('hidden', !open);
    menuBtn.setAttribute('aria-expanded', String(open));
    menuBtn.textContent = open ? '✕' : '☰';
};
menuBtn?.addEventListener('click', () => setMenu(mobileMenu.classList.contains('hidden')));
$$('#mobile-menu a').forEach((a) => a.addEventListener('click', () => setMenu(false)));
window.matchMedia('(min-width: 768px)').addEventListener('change', (e) => e.matches && setMenu(false));

const navLinks = $$('[data-nav]');
const spy = new IntersectionObserver((entries) => entries.forEach((en) => {
    if (!en.isIntersecting) return;
    navLinks.forEach((l) => {
        const on = l.getAttribute('href') === '#' + en.target.id;
        ['font-bold', 'underline', 'underline-offset-4'].forEach((c) => l.classList.toggle(c, on));
    });
}), { rootMargin: '-45% 0px -50% 0px' });
['menu', 'about', 'how', 'locations'].forEach((id) => { const el = document.getElementById(id); if (el) spy.observe(el); });
