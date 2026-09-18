<!-- ========================================== -->
<!-- JAVASCRIPT CONTROLLERS & INTERACTION SCRIPTS -->
<!-- ========================================== -->
<script>
    // --- Product & Project Detailed Catalog Data Store ---
    const catalogData = {
        'psu': {
            title: "Smart Digital PSU V1.0.2 Kit",
            category: "Power Supply Unit",
            status: "Ready Stock",
            id: "IDS-PSU-01",
            price: "Rp 245.000",
            image: "{{ asset('projects/smart-psu/pcb/smart-psu-pcb.png') }}",
            desc: "Modul catu daya digital pintar (*Smart Digital Power Supply Unit V1.0.2*) dengan output variabel 1.5V–30V, mikrokontroler WiFi ESP-12F, ADC presisi 16-bit ADS1115 & sensor arus INA3221, multi-probe, serta kontrol monitoring telemetri via aplikasi Flutter & Windows Desktop.",
            note: "Desain PCB Sirkuit ESP-12F & Dual ADC — EasyEDA / EAGLE PCB",
            waText: "Halo IDS Store, saya tertarik untuk order produk Smart Digital PSU V1.0.2 Kit",
            icon: "fa-solid fa-bolt",
            iconColor: "text-rose-600",
            specs: [
                { icon: "fa-solid fa-microchip", color: "text-rose-500", label: "Mikrokontroler", val: "ESP-12F (WiFi 802.11 b/g/n 2.4GHz)" },
                { icon: "fa-solid fa-bolt", color: "text-amber-500", label: "Output Tegangan", val: "1.5V – 30V Variabel Presisi" },
                { icon: "fa-solid fa-chart-line", color: "text-cyan-500", label: "Sensor & ADC", val: "ADS1115 (16-bit ADC) & INA3221" },
                { icon: "fa-solid fa-network-wired", color: "text-purple-500", label: "Interface & Probe", val: "UART RX/TX, Probe Diode, Ohm, Volt" },
                { icon: "fa-solid fa-mobile-screen", color: "text-emerald-500", label: "Aplikasi Pendukung", val: "Flutter Android (APK) & Win Desktop" },
                { icon: "fa-solid fa-box-open", color: "text-blue-500", label: "Paket Pembelian", val: "Board Modul Jadi + Skematik + Source Code" }
            ]
        },
        'psu_app': {
            title: "Smart Digital PSU V1.0.2 — Aplikasi Desktop & Android",
            category: "Flutter Application",
            status: "Software Ready",
            id: "IDS-APP-PSU",
            price: "Include Paket PSU",
            image: "{{ asset('projects/smart-psu/app/smart-psu-desktop.png') }}",
            desc: "Aplikasi telemetri dan kendali perangkat catu daya secara realtime via WiFi/Serial USB berbasis Flutter cross-platform untuk Windows Desktop dan smartphone Android.",
            note: "Aplikasi Windows Desktop Realtime Telemetri & Kontrol — Flutter & Dart",
            waText: "Halo IDS Store, saya ingin tanya mengenai aplikasi Flutter Smart Digital PSU",
            icon: "fa-solid fa-desktop",
            iconColor: "text-cyan-600",
            specs: [
                { icon: "fa-brands fa-flutter", color: "text-cyan-500", label: "Framework UI", val: "Flutter & Dart (Desktop + Mobile)" },
                { icon: "fa-solid fa-wifi", color: "text-emerald-500", label: "Konektivitas", val: "TCP Socket / WebSockets / Serial UART" },
                { icon: "fa-solid fa-chart-area", color: "text-rose-500", label: "Fitur Telemetri", val: "Grafik Arus (mA) & Voltase Realtime" },
                { icon: "fa-solid fa-sliders", color: "text-purple-500", label: "Fitur Kontrol", val: "Preset Tegangan Cepat & Proteksi OCP/OVP" }
            ]
        },
        'esp32_relay': {
            title: "ESP32 4-Ch Relay & RS485 Industrial Board",
            category: "Industrial IoT Board",
            status: "Ready Stock",
            id: "IDS-IOT-32",
            price: "Rp 185.000",
            image: "{{ asset('img/projects/smart-psu-v1.png') }}",
            desc: "Board controller otomasi industri berbasis ESP32-WROOM-32D dengan 4 channel relay berisolasi optocoupler, port komunikasi serial RS485 Modbus RTU, OLED display header, dan input 12V-24V DC.",
            note: "Industrial Controller Board — EasyEDA / PCB Prototype",
            waText: "Halo IDS Store, saya tertarik untuk order ESP32 4-Ch Relay & RS485 Board",
            icon: "fa-solid fa-microchip",
            iconColor: "text-cyan-600",
            specs: [
                { icon: "fa-solid fa-microchip", color: "text-cyan-500", label: "Mikrokontroler", val: "ESP32 Dual-Core 240MHz (WiFi + BLE 4.2)" },
                { icon: "fa-solid fa-toggle-on", color: "text-emerald-500", label: "Kapasitas Relay", val: "4x Relay 10A 250VAC / 30VDC" },
                { icon: "fa-solid fa-shield-halved", color: "text-amber-500", label: "Isolasi Sinyal", val: "Optocoupler PC817 + Diode Flyback" },
                { icon: "fa-solid fa-network-wired", color: "text-blue-500", label: "Serial Bus", val: "RS485 Modbus RTU (MAX485 Isolated)" },
                { icon: "fa-solid fa-bolt", color: "text-rose-500", label: "Tegangan Input", val: "DC 12V – 24V Step-down Switching" },
                { icon: "fa-solid fa-file-code", color: "text-purple-500", label: "Firmware Ready", val: "Arduino IDE, ESP-IDF, Web Server IoT" }
            ]
        },
        'telemetry': {
            title: "Multi-Sensor Telemetry Node Kit",
            category: "Sensor & Telemetry",
            status: "Pre-Order",
            id: "IDS-TEL-01",
            price: "Rp 210.000",
            image: "{{ asset('projects/smart-psu/pcb/smart-psu-pcb.png') }}",
            desc: "Node akuisisi data sensor jarak jauh untuk monitoring lingkungan, cuaca, atau pertanian/hidroponik berbasis LoRa 915MHz dan WiFi, dilengkapi manajemen baterai Lithium dan charger Solar Panel.",
            note: "Low Power IoT Telemetry Board — EasyEDA",
            waText: "Halo IDS Store, saya tertarik untuk order Multi-Sensor Telemetry Kit",
            icon: "fa-solid fa-tower-broadcast",
            iconColor: "text-amber-600",
            specs: [
                { icon: "fa-solid fa-tower-broadcast", color: "text-amber-500", label: "Transmisi Jarak Jauh", val: "LoRa SX1276 (915MHz) / WiFi Sync" },
                { icon: "fa-solid fa-temperature-half", color: "text-rose-500", label: "Konektor Sensor", val: "I2C, Analog ADC, OneWire (Suhu/RH/TDS)" },
                { icon: "fa-solid fa-solar-panel", color: "text-emerald-500", label: "Power & Charger", val: "Solar Panel MPPT + 18650 Li-ion Charger" },
                { icon: "fa-solid fa-cloud-arrow-up", color: "text-cyan-500", label: "Cloud Sync", val: "MQTT Broker, ThingsBoard, REST API" },
                { icon: "fa-solid fa-bed", color: "text-purple-500", label: "Efisiensi Daya", val: "Ultra Low Deep Sleep Current < 15µA" },
                { icon: "fa-solid fa-box-archive", color: "text-blue-500", label: "Paket Hardware", val: "Board Node + Antena High-Gain" }
            ]
        },
        'custom_pcb': {
            title: "Jasa Desain PCB & Perakitan Prototype",
            category: "Custom Hardware Service",
            status: "Layanan Kilat",
            id: "IDS-SRV-KIT",
            price: "Mulai Rp 150.000",
            image: "{{ asset('projects/smart-psu/pcb/smart-psu-pcb.png') }}",
            desc: "Layanan perancangan sirkuit elektronik dari konsep skematik, routing layout PCB 2-layer/4-layer standar industri, perakitan solder komponen SMD/THT presisi, uji osiloskop, hingga pembuatan firmware siap pakai.",
            note: "Layanan Desain Skematik & Fabrikasi — EasyEDA / EAGLE",
            waText: "Halo IDS Store, saya ingin konsultasi jasa desain PCB dan pembuatan alat custom",
            icon: "fa-solid fa-layer-group",
            iconColor: "text-purple-600",
            specs: [
                { icon: "fa-solid fa-pen-ruler", color: "text-purple-500", label: "Software EDA", val: "EasyEDA Pro / Autodesk EAGLE / KiCAD" },
                { icon: "fa-solid fa-layer-group", color: "text-cyan-500", label: "Output File", val: "Gerber RS-274X, BOM & Pick & Place (CPL)" },
                { icon: "fa-solid fa-screwdriver-wrench", color: "text-amber-500", label: "Perakitan Fisik", val: "Soldering SMD (0805/0603/QFP) & THT" },
                { icon: "fa-solid fa-microscope", color: "text-emerald-500", label: "Quality Check", val: "Uji Osiloskop, Multimeter & Beban Nyata" },
                { icon: "fa-solid fa-code", color: "text-rose-500", label: "Firmware Support", val: "Arduino C++, ESP-IDF, FreeRTOS" },
                { icon: "fa-solid fa-handshake", color: "text-blue-500", label: "Jaminan Layanan", val: "Free Konsultasi & Garansi Revisi Skematik" }
            ]
        },
        'esp8266_switch': {
            title: "ESP8266 Smart Switch 2-Ch AC 220V",
            category: "Home Automation",
            status: "Ready Stock",
            id: "IDS-SW-8266",
            price: "Rp 95.000",
            image: "{{ asset('img/projects/smart-psu-v1.png') }}",
            desc: "Modul saklar pintar WiFi 2-channel untuk kontrol lampu dan beban listrik rumah tangga AC 220V dengan proteksi kelebihan beban, web dashboard lokal, dan dukungan MQTT Home Assistant.",
            note: "Smart Relay Module AC 220V — EasyEDA / PCB Prototype",
            waText: "Halo IDS Store, saya tertarik untuk order ESP8266 Smart Switch 2-Ch",
            icon: "fa-solid fa-house-signal",
            iconColor: "text-emerald-600",
            specs: [
                { icon: "fa-solid fa-microchip", color: "text-emerald-500", label: "Mikrokontroler", val: "ESP8266 ESP-12F Wi-Fi 2.4GHz" },
                { icon: "fa-solid fa-plug", color: "text-amber-500", label: "Beban Tegangan", val: "AC 110V–250V / 10A Dual Relay" },
                { icon: "fa-solid fa-shield-check", color: "text-rose-500", label: "Sistem Keamanan", val: "Fuse Fuseable Resistor + Varistor MOV" },
                { icon: "fa-solid fa-mobile-screen", color: "text-cyan-500", label: "Kontrol Jarak Jauh", val: "Web Dashboard & App Android / MQTT" }
            ]
        },
        'buck_5a': {
            title: "DC Buck Step-Down 5A Module",
            category: "Power Regulator",
            status: "Ready Stock",
            id: "IDS-DC-5A",
            price: "Rp 65.000",
            image: "{{ asset('projects/smart-psu/pcb/smart-psu-pcb.png') }}",
            desc: "Modul penurun tegangan DC-DC efisiensi tinggi dengan arus maksimal 5A, ripple rendah, dan kestabilan tegangan tinggi untuk mikrokontroler dan power supply sensor.",
            note: "High Precision DC-DC Step-Down Module",
            waText: "Halo IDS Store, saya tertarik untuk order DC Buck Step-Down 5A Module",
            icon: "fa-solid fa-bolt-lightning",
            iconColor: "text-rose-600",
            specs: [
                { icon: "fa-solid fa-bolt-lightning", color: "text-rose-500", label: "Input Tegangan", val: "DC 6V – 36V" },
                { icon: "fa-solid fa-arrow-down-wide-short", color: "text-amber-500", label: "Output Tegangan", val: "DC 1.25V – 32V (Multi-turn Trimpot)" },
                { icon: "fa-solid fa-gauge-high", color: "text-cyan-500", label: "Arus Maksimal", val: "5A Continous (dengan Heat Sink)" },
                { icon: "fa-solid fa-percent", color: "text-emerald-500", label: "Efisiensi Daya", val: "Hingga 96% Low Thermal Ripple" }
            ]
        },
        'perpus': {
            title: "PerpusDigi — Sistem Informasi Perpustakaan",
            category: "Web Application",
            status: "Laravel 11 & MySQL",
            id: "IDS-APP-PERPUS",
            price: "Custom Lisensi",
            image: "{{ asset('projects/perpustakaan/perpus-dashboard.jpg') }}",
            desc: "Sistem informasi perpustakaan digital modern berbasis web dengan katalog cepat (OPAC), manajemen peminjaman/pengembalian otomatis, kalkulasi denda, analitik data buku terpopuler, dan multi-role autentikasi.",
            note: "Dashboard & Katalog Digital — Fullstack Laravel & Tailwind CSS",
            waText: "Halo IDS Technology, saya tertarik untuk demo / lisensi sistem PerpusDigi",
            icon: "fa-solid fa-book-bookmark",
            iconColor: "text-blue-600",
            specs: [
                { icon: "fa-solid fa-server", color: "text-blue-500", label: "Backend Stack", val: "Laravel 11, PHP 8.3 & MySQL DB" },
                { icon: "fa-solid fa-palette", color: "text-indigo-500", label: "Frontend UI", val: "Tailwind CSS, Blade & Chart.js" },
                { icon: "fa-solid fa-book-open", color: "text-emerald-500", label: "Sirkulasi & Denda", val: "Auto Peminjaman, Pengembalian & Denda" },
                { icon: "fa-solid fa-shield-halved", color: "text-purple-500", label: "Autentikasi", val: "Multi-Role (Admin, Petugas, Anggota)" }
            ]
        },
        'perpus_katalog': {
            title: "PerpusDigi — Katalog Digital & OPAC Live Search",
            category: "Web Application",
            status: "Laravel 11 & MySQL",
            id: "IDS-APP-PERPUS-OPAC",
            price: "Custom Lisensi",
            image: "{{ asset('projects/perpustakaan/perpus-katalog.jpg') }}",
            desc: "Halaman katalog buku interaktif dengan pencarian langsung (live search), filter kategori, indikator ketersediaan stok buku, dan pemesanan pinjam online.",
            note: "Koleksi Buku & OPAC — Fullstack Laravel & Tailwind CSS",
            waText: "Halo IDS Technology, saya tertarik untuk info fitur OPAC PerpusDigi",
            icon: "fa-solid fa-book-open",
            iconColor: "text-indigo-600",
            specs: [
                { icon: "fa-solid fa-magnifying-glass", color: "text-indigo-500", label: "Fitur Pencarian", val: "Live Search Judul, Penulis & ISBN" },
                { icon: "fa-solid fa-filter", color: "text-cyan-500", label: "Filter & Kategori", val: "Kategori Buku, Rak & Ketersediaan" },
                { icon: "fa-solid fa-bookmark", color: "text-rose-500", label: "Status Buku", val: "Badge Tersedia / Sedang Dipinjam" },
                { icon: "fa-solid fa-mobile-screen", color: "text-emerald-500", label: "Responsif", val: "Mobile Friendly & Desktop Optimized" }
            ]
        }
    };

    // --- Light Theme Modal Trigger Handler ---
    function openProductModal(key) {
        const data = catalogData[key] || catalogData['psu'];
        const modal = document.getElementById('pcb-modal');
        if (!modal) return;

        // Set Images & Text
        const imgEl = document.getElementById('pcb-modal-img');
        const titleEl = document.getElementById('pcb-modal-title');
        const descEl = document.getElementById('pcb-modal-desc');
        const fullDescEl = document.getElementById('modal-product-desc-full');
        const idEl = document.getElementById('modal-product-id');
        const priceEl = document.getElementById('modal-product-price');
        const categoryBadge = document.getElementById('modal-badge-category');
        const statusBadge = document.getElementById('modal-badge-status');
        const iconEl = document.getElementById('modal-icon');
        const btnWa = document.getElementById('modal-btn-wa');
        const specsContainer = document.getElementById('modal-specs-container');

        if (imgEl) imgEl.src = data.image;
        if (titleEl) titleEl.innerText = data.title;
        if (descEl) descEl.innerText = data.note || data.title;
        if (fullDescEl) fullDescEl.innerText = data.desc;
        if (idEl) idEl.innerText = data.id || 'IDS-HW-01';
        if (priceEl) priceEl.innerText = data.price || 'Rp 0';
        if (categoryBadge) categoryBadge.innerText = data.category || 'HARDWARE DETAIL';
        if (statusBadge) statusBadge.innerText = data.status || 'Ready Stock';

        if (iconEl) {
            iconEl.className = data.icon || 'fa-solid fa-microchip';
        }

        if (btnWa) {
            btnWa.href = `https://wa.me/6281234567890?text=${encodeURIComponent(data.waText || 'Halo IDS Store, saya tertarik dengan produk ' + data.title)}`;
        }

        // Render Technical Specs Grid
        if (specsContainer && data.specs && Array.isArray(data.specs)) {
            specsContainer.innerHTML = data.specs.map(spec => `
                <div class="p-2 sm:p-2.5 rounded-lg bg-slate-50 border border-slate-100 flex items-start gap-2">
                    <div class="w-6 h-6 rounded-md bg-white border border-slate-200/80 ${spec.color || 'text-rose-500'} flex items-center justify-center text-[10px] flex-shrink-0 shadow-2xs mt-0.5">
                        <i class="${spec.icon || 'fa-solid fa-check'}"></i>
                    </div>
                    <div class="min-w-0">
                        <span class="text-[9px] sm:text-[9.5px] font-bold text-slate-700 block uppercase leading-none truncate">${spec.label}</span>
                        <p class="text-[9.5px] sm:text-[10px] text-slate-500 font-medium leading-tight mt-0.5">${spec.val}</p>
                    </div>
                </div>
            `).join('');
        }

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    // Backward-compatible openPcbModal
    function openPcbModal(src, title, desc) {
        if (typeof src === 'string' && catalogData[src]) {
            openProductModal(src);
            return;
        }

        // Cari item berdasarkan gambar atau fallback
        let matchedKey = null;
        for (const [key, val] of Object.entries(catalogData)) {
            if (val.image === src || val.title === title) {
                matchedKey = key;
                break;
            }
        }

        if (matchedKey) {
            openProductModal(matchedKey);
        } else {
            // Default fallback
            openProductModal('psu');
            if (src) document.getElementById('pcb-modal-img').src = src;
            if (title) document.getElementById('pcb-modal-title').innerText = title;
            if (desc) document.getElementById('pcb-modal-desc').innerText = desc;
        }
    }

    function closePcbModal() {
        const modal = document.getElementById('pcb-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closePcbModal();
    });

    // --- PSU Dual-Media Switcher Controller ---
    let currentPsuView = 'pcb';
    function switchPsuPreview(mode) {
        currentPsuView = mode;
        const img = document.getElementById('psu-preview-img');
        const btnApp = document.getElementById('tab-psu-app');
        const btnPcb = document.getElementById('tab-psu-pcb');

        if (mode === 'app') {
            if (img) img.src = catalogData['psu_app'].image;
            if (btnApp) btnApp.className = 'px-2.5 py-1 rounded-md bg-gradient-to-r from-cyan-500 to-blue-600 text-white transition-all flex items-center gap-1';
            if (btnPcb) btnPcb.className = 'px-2.5 py-1 rounded-md text-slate-400 hover:text-slate-200 transition-all flex items-center gap-1';
        } else {
            if (img) img.src = catalogData['psu'].image;
            if (btnPcb) btnPcb.className = 'px-2.5 py-1 rounded-md bg-gradient-to-r from-purple-600 to-rose-600 text-white transition-all flex items-center gap-1';
            if (btnApp) btnApp.className = 'px-2.5 py-1 rounded-md text-slate-400 hover:text-slate-200 transition-all flex items-center gap-1';
        }
    }

    function openCurrentPsuModal() {
        if (currentPsuView === 'app') {
            openProductModal('psu_app');
        } else {
            openProductModal('psu');
        }
    }

    // --- Perpustakaan Dual-Media Switcher Controller ---
    let currentPerpusView = 'dashboard';
    function switchPerpusPreview(mode) {
        currentPerpusView = mode;
        const img = document.getElementById('perpus-preview-img');
        const btnDash = document.getElementById('tab-perpus-dash');
        const btnKatalog = document.getElementById('tab-perpus-katalog');

        if (mode === 'katalog') {
            if (img) img.src = catalogData['perpus_katalog'].image;
            if (btnKatalog) btnKatalog.className = 'px-2.5 py-1 rounded-md bg-gradient-to-r from-indigo-500 to-purple-600 text-white transition-all flex items-center gap-1';
            if (btnDash) btnDash.className = 'px-2.5 py-1 rounded-md text-slate-400 hover:text-slate-200 transition-all flex items-center gap-1';
        } else {
            if (img) img.src = catalogData['perpus'].image;
            if (btnDash) btnDash.className = 'px-2.5 py-1 rounded-md bg-gradient-to-r from-blue-600 to-indigo-600 text-white transition-all flex items-center gap-1';
            if (btnKatalog) btnKatalog.className = 'px-2.5 py-1 rounded-md text-slate-400 hover:text-slate-200 transition-all flex items-center gap-1';
        }
    }

    function openCurrentPerpusModal() {
        if (currentPerpusView === 'katalog') {
            openProductModal('perpus_katalog');
        } else {
            openProductModal('perpus');
        }
    }

    // --- Store Category Filter ---
    function filterStoreCategory(category) {
        const buttons = document.querySelectorAll('.store-filter-btn');
        buttons.forEach(btn => {
            btn.className = 'store-filter-btn px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 text-[11px] whitespace-nowrap transition-all cursor-pointer';
        });

        const activeBtn = document.getElementById('filter-store-' + category);
        if (activeBtn) {
            activeBtn.className = 'store-filter-btn px-2.5 py-1 rounded-lg bg-slate-900 text-white shadow-xs text-[11px] whitespace-nowrap transition-all cursor-pointer';
        }

        const items = document.querySelectorAll('#store-products-grid .store-product-item');
        items.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // --- Store Horizontal Scroll Handler ---
    function scrollStore(direction) {
        const grid = document.getElementById('store-products-grid');
        if (!grid) return;
        const item = grid.querySelector('.store-product-item');
        const scrollAmount = item ? (item.offsetWidth + 10) * 2 : 320;
        const targetScroll = direction === 'left' 
            ? Math.max(0, grid.scrollLeft - scrollAmount) 
            : grid.scrollLeft + scrollAmount;
        grid.scrollTo({ left: targetScroll, behavior: 'smooth' });
    }

    // --- Animated Smooth Slider Engine ---
    const activeSliderAnimations = {};

    function smoothAnimateScroll(slider, targetPos, duration = 480, onComplete) {
        if (!slider) return;
        if (activeSliderAnimations[slider.id]) {
            cancelAnimationFrame(activeSliderAnimations[slider.id]);
        }

        const startPos = slider.scrollLeft;
        const distance = targetPos - startPos;
        if (Math.abs(distance) < 2) {
            slider.scrollLeft = targetPos;
            if (onComplete) onComplete();
            return;
        }

        slider.style.scrollBehavior = 'auto';
        slider.style.scrollSnapType = 'none';

        const startTime = performance.now();
        const easeOutQuint = (t) => 1 - Math.pow(1 - t, 4);

        function step(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const ease = easeOutQuint(progress);

            slider.scrollLeft = startPos + (distance * ease);

            if (progress < 1) {
                activeSliderAnimations[slider.id] = requestAnimationFrame(step);
            } else {
                slider.scrollLeft = targetPos;
                slider.style.scrollBehavior = 'smooth';
                slider.style.scrollSnapType = 'x mandatory';
                delete activeSliderAnimations[slider.id];
                if (onComplete) onComplete();
            }
        }

        activeSliderAnimations[slider.id] = requestAnimationFrame(step);
    }

    function createSmoothSlider(config) {
        const slider = document.getElementById(config.sliderId);
        if (!slider) return null;

        let isDown = false;
        let isDragging = false;
        let startX = 0;
        let startScrollLeft = 0;
        let lastX = 0;
        let velocity = 0;
        let lastTime = 0;

        const getStep = config.getStep;

        const updateUI = () => {
            if (config.onScroll) {
                const step = getStep();
                const maxIndex = (config.getItemCount ? config.getItemCount() : 10) - 1;
                const index = Math.min(Math.max(Math.round(slider.scrollLeft / step), 0), maxIndex);
                config.onScroll(index, slider.scrollLeft);
            }
        };

        slider.addEventListener('scroll', () => {
            if (!isDown) updateUI();
        }, { passive: true });

        slider.addEventListener('mousedown', (e) => {
            if (e.target.closest('button, a, input, select, textarea')) return;
            if (activeSliderAnimations[slider.id]) {
                cancelAnimationFrame(activeSliderAnimations[slider.id]);
                delete activeSliderAnimations[slider.id];
            }

            isDown = true;
            isDragging = false;
            startX = e.pageX;
            lastX = e.pageX;
            startScrollLeft = slider.scrollLeft;
            lastTime = performance.now();
            velocity = 0;

            slider.style.scrollBehavior = 'auto';
            slider.style.scrollSnapType = 'none';
            slider.classList.add('cursor-grabbing');
            slider.classList.remove('cursor-grab');
        });

        window.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            const x = e.pageX;
            const walk = (x - startX);

            if (Math.abs(walk) > 4) {
                isDragging = true;
            }

            const now = performance.now();
            const dt = Math.max(now - lastTime, 8);
            velocity = (x - lastX) / dt;
            lastX = x;
            lastTime = now;

            slider.scrollLeft = startScrollLeft - (walk * (config.dragSpeed || 1.15));
            updateUI();
        });

        const endDrag = () => {
            if (!isDown) return;
            isDown = false;
            slider.classList.remove('cursor-grabbing');
            slider.classList.add('cursor-grab');

            const step = getStep();
            let targetScroll = slider.scrollLeft;

            if (Math.abs(velocity) > 0.25) {
                const direction = velocity > 0 ? -1 : 1;
                const currentIdx = Math.round((slider.scrollLeft + (direction * step * 0.35)) / step);
                targetScroll = Math.max(0, currentIdx * step);
            } else {
                targetScroll = Math.max(0, Math.round(slider.scrollLeft / step) * step);
            }

            smoothAnimateScroll(slider, targetScroll, 420, updateUI);

            setTimeout(() => {
                isDragging = false;
            }, 80);
        };

        window.addEventListener('mouseup', endDrag);

        slider.addEventListener('click', (e) => {
            if (isDragging) {
                e.preventDefault();
                e.stopPropagation();
            }
        }, true);

        return {
            scroll: (direction) => {
                const step = getStep();
                const currentIdx = Math.round(slider.scrollLeft / step);
                const maxIdx = (config.getItemCount ? config.getItemCount() : 10) - 1;
                const nextIdx = direction === 'left' ? Math.max(0, currentIdx - 1) : Math.min(maxIdx, currentIdx + 1);
                smoothAnimateScroll(slider, nextIdx * step, 480, updateUI);
            },
            goTo: (index) => {
                const step = getStep();
                smoothAnimateScroll(slider, Math.max(0, index * step), 500, updateUI);
            }
        };
    }

    // --- Init Skills Slider ---
    const skillDots = document.querySelectorAll('#slider-dots .dot');
    const skillsController = createSmoothSlider({
        sliderId: 'skills-slider',
        getStep: () => {
            const slider = document.getElementById('skills-slider');
            if (!slider) return 300;
            const card = slider.querySelector('.skill-card');
            return card ? card.offsetWidth + 14 : 300;
        },
        getItemCount: () => skillDots.length || 5,
        dragSpeed: 1.1,
        onScroll: (index) => {
            skillDots.forEach((dot, idx) => {
                if (idx === index) {
                    dot.className = 'dot w-4 h-1.5 rounded-full bg-rose-500 transition-all duration-300';
                } else {
                    dot.className = 'dot w-1.5 h-1.5 rounded-full bg-slate-300 transition-all duration-300';
                }
            });
        }
    });

    function scrollSkills(direction) {
        if (skillsController) skillsController.scroll(direction);
    }
    function goToSlide(index) {
        if (skillsController) skillsController.goTo(index);
    }

    // --- Init Projects Slider ---
    const projectDots = document.querySelectorAll('#project-dots .p-dot');
    const pCurrentNum = document.getElementById('project-current-num');
    const projectsController = createSmoothSlider({
        sliderId: 'project-slider',
        getStep: () => {
            const slider = document.getElementById('project-slider');
            if (!slider) return 800;
            const card = slider.querySelector('.project-card');
            return card ? (card.offsetWidth + 16) : (slider.clientWidth + 16);
        },
        getItemCount: () => projectDots.length || 2,
        dragSpeed: 1.1,
        onScroll: (index) => {
            if (pCurrentNum) pCurrentNum.innerText = index + 1;
            projectDots.forEach((dot, idx) => {
                if (idx === index) {
                    dot.className = 'p-dot w-6 h-1.5 rounded-full bg-slate-900 transition-all duration-300 cursor-pointer';
                } else {
                    dot.className = 'p-dot w-1.5 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300 cursor-pointer';
                }
            });
        }
    });

    function scrollProjectSlide(direction) {
        if (projectsController) projectsController.scroll(direction);
    }
    function goToProjectSlide(index) {
        if (projectsController) projectsController.goTo(index);
    }
</script>
