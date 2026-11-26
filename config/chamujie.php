<?php

// Data sementara (statis). Nanti diganti pembacaan Google Sheets via App\Services\SheetService.
return [
    'wa_number' => '6287754167157', // GANTI dengan nomor WhatsApp admin Chamujie (format 62...)
    'socials' => [
        'instagram' => 'https://instagram.com/chamujie',
        'threads'   => 'https://www.threads.net/@chamujie',
],
    'po' => [
        'status' => 'available', // available | limited | full
        'title'  => 'Open PO — Sabtu, 29 Nov',
        'note'   => 'Pesanan diproses maksimal 2 hari setelah konfirmasi.',
    ],
    'sizes' => [
        ['id' => '250ml', 'label' => '250ml', 'note' => '1 Personal Serving', 'price' => 18000],
        ['id' => '500ml', 'label' => '500ml', 'note' => '2 Generous Servings', 'price' => 30000],
        ['id' => '1L', 'label' => '1L', 'note' => '4–5 Servings', 'price' => 60000],
    ],
    'products' => [
        ['id' => 'roasted', 'name' => 'Royal Roasted Milk Tea', 'price' => 18000, 'badge' => 'Best Seller', 'image' => 'images/roasted.jpg',
         'desc' => 'Racikan andalan dari daun teh hitam dan oolong yang dipanggang perlahan, diseduh dengan susu segar lembut serta sentuhan karamel gula aren.'],
        ['id' => 'green', 'name' => 'Royal Green Tea', 'price' => 18000, 'badge' => 'Best Seller', 'image' => 'images/green.jpg',
         'desc' => 'Teh hijau panggang yang segar dengan susu creamy dan aroma herbal yang lembut.'],
        ['id' => 'chathai', 'name' => 'Royal Cha Thai', 'price' => 18000, 'badge' => null, 'image' => 'images/chathai.jpg',
         'desc' => 'Thai tea khas dengan rasa rempah hangat dan susu segar yang creamy.'],
    ],
    'stores' => [
        ['area' => 'South Jakarta • Kemang', 'name' => 'Kopi Serambi & Bakehouse', 'address' => 'Jl. Kemang Timur No. 24, Jakarta Selatan', 'hours' => 'Daily, 08:00–21:00 WIB', 'stock' => '14 bottles in chiller', 'map' => 'https://maps.google.com/?q=Kemang+Timur+24+Jakarta'],
    ],
    'bazaars' => [],
];


