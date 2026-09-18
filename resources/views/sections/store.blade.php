<!-- ========================================== -->
<!-- IDS STORE SHOWCASE / KATALOG PRODUK (#store) -->
<!-- ========================================== -->
<section id="store" class="mt-12 sm:mt-14 w-full text-left">
    <!-- Header Simpel & Navigasi Filter -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-4 px-1 gap-3">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                <span class="font-racing font-bold text-[11px] uppercase tracking-wider bg-gradient-to-r from-amber-600 via-rose-600 to-cyan-600 bg-clip-text text-transparent">
                    IDS STORE TECHNOLOGY • OFFICIAL HARDWARE
                </span>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                    Katalog Produk & Hardware
                </h2>
                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                    Ready Stock & Custom
                </span>
            </div>
            <p class="text-xs text-slate-500 mt-0.5 font-medium">
                Modul elektronik presisi, dev-kit IoT, dan perakitan hardware teruji siap pakai dengan dukungan teknis.
            </p>
        </div>

        <!-- Controls: Category Filters & Slide Navigation Buttons -->
        <div class="flex items-center justify-between sm:justify-end gap-2 w-full sm:w-auto">
            <!-- Minimalist Filter Pills -->
            <div class="flex items-center gap-1 overflow-x-auto pb-0.5 no-scrollbar text-xs font-semibold">
                <button type="button" onclick="filterStoreCategory('all')" id="filter-store-all" class="store-filter-btn px-2.5 py-1 rounded-lg bg-slate-900 text-white shadow-xs text-[11px] whitespace-nowrap transition-all cursor-pointer">
                    Semua <span class="text-[9px] opacity-75 font-normal ml-0.5">(6)</span>
                </button>
                <button type="button" onclick="filterStoreCategory('psu')" id="filter-store-psu" class="store-filter-btn px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 text-[11px] whitespace-nowrap transition-all cursor-pointer">
                    Power & PSU <span class="text-[9px] opacity-75 font-normal ml-0.5">(2)</span>
                </button>
                <button type="button" onclick="filterStoreCategory('iot')" id="filter-store-iot" class="store-filter-btn px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 text-[11px] whitespace-nowrap transition-all cursor-pointer">
                    IoT Board <span class="text-[9px] opacity-75 font-normal ml-0.5">(3)</span>
                </button>
                <button type="button" onclick="filterStoreCategory('custom')" id="filter-store-custom" class="store-filter-btn px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 text-[11px] whitespace-nowrap transition-all cursor-pointer">
                    Jasa Custom <span class="text-[9px] opacity-75 font-normal ml-0.5">(1)</span>
                </button>
            </div>

            <!-- Slide Arrows for Horizontal Navigation -->
            <div class="flex items-center gap-1 flex-shrink-0">
                <button type="button" onclick="scrollStore('left')" class="w-7 h-7 rounded-lg bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white text-slate-700 transition-all flex items-center justify-center shadow-xs active:scale-95 cursor-pointer" title="Geser Kiri" aria-label="Geser Kiri">
                    <i class="fa-solid fa-chevron-left text-[10px]"></i>
                </button>
                <button type="button" onclick="scrollStore('right')" class="w-7 h-7 rounded-lg bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white text-slate-700 transition-all flex items-center justify-center shadow-xs active:scale-95 cursor-pointer" title="Geser Kanan" aria-label="Geser Kanan">
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- 
      Product Cards Container:
      - Mobile: 2 Rows x 2 Columns visible (4 items on screen), smooth horizontal swipe for 6+ items
      - Tablet/Desktop: Clean 3-4 Columns Responsive Grid
    -->
    <div id="store-products-grid" class="-mx-3 px-3 sm:mx-0 sm:px-0 grid grid-rows-2 grid-flow-col auto-cols-[calc(50%-5px)] xs:auto-cols-[calc(50%-6px)] sm:auto-cols-auto sm:grid-rows-none sm:grid-flow-row sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-3 sm:gap-4 overflow-x-auto pb-2 pt-0.5 snap-x snap-mandatory scroll-smooth no-scrollbar select-none" style="scrollbar-width: none; -ms-overflow-style: none; -webkit-overflow-scrolling: touch;">
        
        <!-- PRODUK 1: Smart Digital PSU V1.0.2 Kit -->
        <div class="store-product-item snap-start group bg-white rounded-2xl border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-slate-300 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden" data-category="psu">
            <div>
                <!-- Media Header with Ambient Glow & Floating Quick Actions -->
                <div class="relative w-full h-32 xs:h-36 sm:h-40 bg-slate-950 p-2.5 overflow-hidden flex items-center justify-center border-b border-slate-100 group/img cursor-pointer" onclick="openProductModal('psu')">
                    <!-- Ambient Glow Effects -->
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-rose-500/25 rounded-full blur-xl pointer-events-none"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-cyan-500/25 rounded-full blur-xl pointer-events-none"></div>
                    
                    <!-- Product Image -->
                    <img src="{{ asset('projects/smart-psu/pcb/smart-psu-pcb.png') }}" alt="Smart Digital PSU" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500 z-1">
                    
                    <!-- Top Left Category & Stock Badge -->
                    <div class="absolute top-2 left-2 z-10 flex items-center gap-1">
                        <span class="px-1.5 py-0.5 rounded-md bg-white/90 backdrop-blur-xs text-slate-800 text-[8px] sm:text-[8.5px] font-racing font-bold shadow-xs">
                            PSU UNIT
                        </span>
                        <span class="px-1.5 py-0.5 rounded-md bg-emerald-500/90 text-white text-[8px] font-bold shadow-xs">
                            Ready
                        </span>
                    </div>

                    <!-- Top Right Quick View Eye Button -->
                    <button type="button" onclick="event.stopPropagation(); openProductModal('psu')" class="absolute top-2 right-2 w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-slate-900/80 hover:bg-rose-600 text-white flex items-center justify-center transition-all z-10 cursor-pointer shadow-xs active:scale-90" title="Buka Detail Spesifikasi">
                        <i class="fa-solid fa-eye text-[9px] sm:text-[10px]"></i>
                    </button>

                    <!-- Bottom Chip Tag -->
                    <div class="absolute bottom-1.5 right-2 text-[8px] sm:text-[9px] font-mono text-slate-400 z-10 bg-slate-900/80 px-1.5 py-0.5 rounded border border-slate-800">
                        ESP-12F • 16-Bit ADC
                    </div>
                </div>

                <!-- Content Body -->
                <div class="p-2.5 sm:p-3.5">
                    <div class="flex items-center justify-between">
                        <span class="text-[8.5px] sm:text-[9.5px] font-bold text-rose-600 uppercase tracking-wider">Precision Power</span>
                        <span class="text-[8.5px] font-mono text-slate-400">IDS-PSU-01</span>
                    </div>
                    
                    <h3 class="font-extrabold text-slate-900 text-xs sm:text-sm mt-0.5 group-hover:text-rose-600 transition-colors line-clamp-1">
                        Smart Digital PSU V1.0.2
                    </h3>
                    
                    <!-- Structured Micro-Specs Chips -->
                    <div class="mt-2 space-y-1 text-[9px] sm:text-[9.5px]">
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-bolt text-amber-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">Output 1.5V – 30V Variabel</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-chart-line text-cyan-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">ADS1115 (16-bit ADC) & INA3221</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-mobile-screen text-purple-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">App Desktop & Android APK</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Price, Eye Preview Button & WA CTA -->
            <div class="p-2.5 sm:p-3.5 pt-2 sm:pt-2.5 border-t border-slate-100 flex items-center justify-between gap-1.5 bg-slate-50/70">
                <div class="min-w-0">
                    <span class="text-[7.5px] sm:text-[8px] text-slate-400 font-bold uppercase block leading-none">Harga</span>
                    <span class="font-racing font-extrabold text-xs sm:text-sm text-slate-900 truncate block mt-0.5">Rp 245.000</span>
                </div>
                <div class="flex items-center gap-1.5 flex-shrink-0">
                    <!-- Tombol Mata (Quick Preview + Spesifikasi Lengkap) -->
                    <button type="button" onclick="openProductModal('psu')" class="w-7 h-7 rounded-xl bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 text-slate-600 hover:text-white flex items-center justify-center transition-all cursor-pointer shadow-2xs active:scale-95" title="Lihat Spesifikasi Lengkap">
                        <i class="fa-solid fa-eye text-[10px]"></i>
                    </button>
                    <!-- Tombol Beli WA -->
                    <a href="https://wa.me/6281234567890?text=Halo%20IDS%20Store%2C%20saya%20tertarik%20order%20Smart%20Digital%20PSU%20V1.0.2%20Kit" target="_blank" class="px-2.5 py-1.5 rounded-xl bg-slate-900 hover:bg-rose-600 text-white font-racing font-bold text-[8.5px] sm:text-[9.5px] tracking-wider transition-all flex items-center gap-1 shadow-2xs active:scale-95">
                        <i class="fa-brands fa-whatsapp text-[10px] text-emerald-400"></i>
                        <span>BELI</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- PRODUK 2: ESP32 4-Ch Relay Industrial Board -->
        <div class="store-product-item snap-start group bg-white rounded-2xl border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-slate-300 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden" data-category="iot">
            <div>
                <!-- Media Header with Ambient Glow & Floating Quick Actions -->
                <div class="relative w-full h-32 xs:h-36 sm:h-40 bg-slate-950 p-2.5 overflow-hidden flex flex-col items-center justify-center border-b border-slate-100 group/img cursor-pointer" onclick="openProductModal('esp32_relay')">
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-cyan-500/25 rounded-full blur-xl pointer-events-none"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-blue-500/25 rounded-full blur-xl pointer-events-none"></div>
                    
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 mb-1 group-hover:scale-110 transition-transform z-1">
                        <i class="fa-solid fa-microchip text-lg sm:text-xl"></i>
                    </div>
                    <span class="font-racing text-[9px] sm:text-[10px] font-bold text-white tracking-wider z-1">ESP32 CONTROLLER</span>
                    
                    <!-- Top Left Category & Stock Badge -->
                    <div class="absolute top-2 left-2 z-10 flex items-center gap-1">
                        <span class="px-1.5 py-0.5 rounded-md bg-white/90 backdrop-blur-xs text-slate-800 text-[8px] sm:text-[8.5px] font-racing font-bold shadow-xs">
                            IOT BOARD
                        </span>
                        <span class="px-1.5 py-0.5 rounded-md bg-emerald-500/90 text-white text-[8px] font-bold shadow-xs">
                            Ready
                        </span>
                    </div>

                    <!-- Top Right Quick View Eye Button -->
                    <button type="button" onclick="event.stopPropagation(); openProductModal('esp32_relay')" class="absolute top-2 right-2 w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-slate-900/80 hover:bg-cyan-600 text-white flex items-center justify-center transition-all z-10 cursor-pointer shadow-xs active:scale-90" title="Buka Detail Spesifikasi">
                        <i class="fa-solid fa-eye text-[9px] sm:text-[10px]"></i>
                    </button>

                    <div class="absolute bottom-1.5 right-2 text-[8px] sm:text-[9px] font-mono text-slate-400 z-10 bg-slate-900/80 px-1.5 py-0.5 rounded border border-slate-800">
                        RS485 Modbus
                    </div>
                </div>

                <!-- Content Body -->
                <div class="p-2.5 sm:p-3.5">
                    <div class="flex items-center justify-between">
                        <span class="text-[8.5px] sm:text-[9.5px] font-bold text-cyan-600 uppercase tracking-wider">Industrial IoT</span>
                        <span class="text-[8.5px] font-mono text-slate-400">IDS-IOT-32</span>
                    </div>

                    <h3 class="font-extrabold text-slate-900 text-xs sm:text-sm mt-0.5 group-hover:text-cyan-600 transition-colors line-clamp-1">
                        ESP32 4-Ch Relay Board
                    </h3>
                    
                    <div class="mt-2 space-y-1 text-[9px] sm:text-[9.5px]">
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-toggle-on text-cyan-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">4x Relay 10A Optocoupler</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-network-wired text-blue-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">RS485 Modbus RTU Bus</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-wifi text-emerald-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">Dual-Core WiFi + BLE 4.2</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-2.5 sm:p-3.5 pt-2 sm:pt-2.5 border-t border-slate-100 flex items-center justify-between gap-1.5 bg-slate-50/70">
                <div class="min-w-0">
                    <span class="text-[7.5px] sm:text-[8px] text-slate-400 font-bold uppercase block leading-none">Harga</span>
                    <span class="font-racing font-extrabold text-xs sm:text-sm text-slate-900 truncate block mt-0.5">Rp 185.000</span>
                </div>
                <div class="flex items-center gap-1.5 flex-shrink-0">
                    <!-- Tombol Mata (Quick Preview + Spesifikasi Lengkap) -->
                    <button type="button" onclick="openProductModal('esp32_relay')" class="w-7 h-7 rounded-xl bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 text-slate-600 hover:text-white flex items-center justify-center transition-all cursor-pointer shadow-2xs active:scale-95" title="Lihat Spesifikasi Lengkap">
                        <i class="fa-solid fa-eye text-[10px]"></i>
                    </button>
                    <!-- Tombol Beli WA -->
                    <a href="https://wa.me/6281234567890?text=Halo%20IDS%20Store%2C%20saya%20tertarik%20order%20ESP32%204-Ch%20Relay%20Board" target="_blank" class="px-2.5 py-1.5 rounded-xl bg-slate-900 hover:bg-cyan-600 text-white font-racing font-bold text-[8.5px] sm:text-[9.5px] tracking-wider transition-all flex items-center gap-1 shadow-2xs active:scale-95">
                        <i class="fa-brands fa-whatsapp text-[10px] text-emerald-400"></i>
                        <span>BELI</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- PRODUK 3: Multi-Sensor Telemetry Node -->
        <div class="store-product-item snap-start group bg-white rounded-2xl border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-slate-300 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden" data-category="iot">
            <div>
                <!-- Media Header with Ambient Glow & Floating Quick Actions -->
                <div class="relative w-full h-32 xs:h-36 sm:h-40 bg-slate-950 p-2.5 overflow-hidden flex flex-col items-center justify-center border-b border-slate-100 group/img cursor-pointer" onclick="openProductModal('telemetry')">
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-amber-500/25 rounded-full blur-xl pointer-events-none"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-rose-500/25 rounded-full blur-xl pointer-events-none"></div>
                    
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-amber-500/10 border border-amber-500/30 flex items-center justify-center text-amber-400 mb-1 group-hover:scale-110 transition-transform z-1">
                        <i class="fa-solid fa-tower-broadcast text-lg sm:text-xl"></i>
                    </div>
                    <span class="font-racing text-[9px] sm:text-[10px] font-bold text-white tracking-wider z-1">TELEMETRY NODE</span>
                    
                    <!-- Top Left Category & Stock Badge -->
                    <div class="absolute top-2 left-2 z-10 flex items-center gap-1">
                        <span class="px-1.5 py-0.5 rounded-md bg-white/90 backdrop-blur-xs text-slate-800 text-[8px] sm:text-[8.5px] font-racing font-bold shadow-xs">
                            TELEMETRY
                        </span>
                        <span class="px-1.5 py-0.5 rounded-md bg-amber-500/90 text-white text-[8px] font-bold shadow-xs">
                            Pre-Order
                        </span>
                    </div>

                    <!-- Top Right Quick View Eye Button -->
                    <button type="button" onclick="event.stopPropagation(); openProductModal('telemetry')" class="absolute top-2 right-2 w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-slate-900/80 hover:bg-amber-600 text-white flex items-center justify-center transition-all z-10 cursor-pointer shadow-xs active:scale-90" title="Buka Detail Spesifikasi">
                        <i class="fa-solid fa-eye text-[9px] sm:text-[10px]"></i>
                    </button>

                    <div class="absolute bottom-1.5 right-2 text-[8px] sm:text-[9px] font-mono text-slate-400 z-10 bg-slate-900/80 px-1.5 py-0.5 rounded border border-slate-800">
                        LoRa 915MHz • Solar
                    </div>
                </div>

                <!-- Content Body -->
                <div class="p-2.5 sm:p-3.5">
                    <div class="flex items-center justify-between">
                        <span class="text-[8.5px] sm:text-[9.5px] font-bold text-amber-600 uppercase tracking-wider">Remote Sensor</span>
                        <span class="text-[8.5px] font-mono text-slate-400">IDS-TEL-01</span>
                    </div>

                    <h3 class="font-extrabold text-slate-900 text-xs sm:text-sm mt-0.5 group-hover:text-amber-600 transition-colors line-clamp-1">
                        Multi-Sensor Telemetry Kit
                    </h3>
                    
                    <div class="mt-2 space-y-1 text-[9px] sm:text-[9.5px]">
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-tower-broadcast text-amber-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">LoRa SX1276 & Wi-Fi Node</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-solar-panel text-emerald-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">Solar MPPT + 18650 Li-ion</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-cloud-arrow-up text-cyan-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">MQTT / ThingsBoard / REST API</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-2.5 sm:p-3.5 pt-2 sm:pt-2.5 border-t border-slate-100 flex items-center justify-between gap-1.5 bg-slate-50/70">
                <div class="min-w-0">
                    <span class="text-[7.5px] sm:text-[8px] text-slate-400 font-bold uppercase block leading-none">Harga</span>
                    <span class="font-racing font-extrabold text-xs sm:text-sm text-slate-900 truncate block mt-0.5">Rp 210.000</span>
                </div>
                <div class="flex items-center gap-1.5 flex-shrink-0">
                    <!-- Tombol Mata (Quick Preview + Spesifikasi Lengkap) -->
                    <button type="button" onclick="openProductModal('telemetry')" class="w-7 h-7 rounded-xl bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 text-slate-600 hover:text-white flex items-center justify-center transition-all cursor-pointer shadow-2xs active:scale-95" title="Lihat Spesifikasi Lengkap">
                        <i class="fa-solid fa-eye text-[10px]"></i>
                    </button>
                    <!-- Tombol Pesan WA -->
                    <a href="https://wa.me/6281234567890?text=Halo%20IDS%20Store%2C%20saya%20tertarik%20order%20Multi-Sensor%20Telemetry%20Kit" target="_blank" class="px-2.5 py-1.5 rounded-xl bg-slate-900 hover:bg-amber-600 text-white font-racing font-bold text-[8.5px] sm:text-[9.5px] tracking-wider transition-all flex items-center gap-1 shadow-2xs active:scale-95">
                        <i class="fa-brands fa-whatsapp text-[10px] text-emerald-400"></i>
                        <span>PESAN</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- PRODUK 4: Jasa Desain PCB & Prototype Custom -->
        <div class="store-product-item snap-start group bg-white rounded-2xl border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-slate-300 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden" data-category="custom">
            <div>
                <!-- Media Header with Ambient Glow & Floating Quick Actions -->
                <div class="relative w-full h-32 xs:h-36 sm:h-40 bg-slate-950 p-2.5 overflow-hidden flex flex-col items-center justify-center border-b border-slate-100 group/img cursor-pointer" onclick="openProductModal('custom_pcb')">
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-purple-500/25 rounded-full blur-xl pointer-events-none"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-indigo-500/25 rounded-full blur-xl pointer-events-none"></div>
                    
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-purple-500/10 border border-purple-500/30 flex items-center justify-center text-purple-400 mb-1 group-hover:scale-110 transition-transform z-1">
                        <i class="fa-solid fa-layer-group text-lg sm:text-xl"></i>
                    </div>
                    <span class="font-racing text-[9px] sm:text-[10px] font-bold text-white tracking-wider z-1">CUSTOM PROTOTYPE</span>
                    
                    <!-- Top Left Category & Stock Badge -->
                    <div class="absolute top-2 left-2 z-10 flex items-center gap-1">
                        <span class="px-1.5 py-0.5 rounded-md bg-white/90 backdrop-blur-xs text-slate-800 text-[8px] sm:text-[8.5px] font-racing font-bold shadow-xs">
                            SERVICE
                        </span>
                        <span class="px-1.5 py-0.5 rounded-md bg-purple-500/90 text-white text-[8px] font-bold shadow-xs">
                            Kilat
                        </span>
                    </div>

                    <!-- Top Right Quick View Eye Button -->
                    <button type="button" onclick="event.stopPropagation(); openProductModal('custom_pcb')" class="absolute top-2 right-2 w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-slate-900/80 hover:bg-purple-600 text-white flex items-center justify-center transition-all z-10 cursor-pointer shadow-xs active:scale-90" title="Buka Detail Spesifikasi">
                        <i class="fa-solid fa-eye text-[9px] sm:text-[10px]"></i>
                    </button>

                    <div class="absolute bottom-1.5 right-2 text-[8px] sm:text-[9px] font-mono text-slate-400 z-10 bg-slate-900/80 px-1.5 py-0.5 rounded border border-slate-800">
                        EasyEDA • Gerber • Assembly
                    </div>
                </div>

                <!-- Content Body -->
                <div class="p-2.5 sm:p-3.5">
                    <div class="flex items-center justify-between">
                        <span class="text-[8.5px] sm:text-[9.5px] font-bold text-purple-600 uppercase tracking-wider">Custom Service</span>
                        <span class="text-[8.5px] font-mono text-slate-400">IDS-SRV-KIT</span>
                    </div>

                    <h3 class="font-extrabold text-slate-900 text-xs sm:text-sm mt-0.5 group-hover:text-purple-600 transition-colors line-clamp-1">
                        Desain PCB & Perakitan Alat
                    </h3>
                    
                    <div class="mt-2 space-y-1 text-[9px] sm:text-[9.5px]">
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-pen-ruler text-purple-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">Skematik EasyEDA / EAGLE</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-screwdriver-wrench text-amber-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">Solder SMD/DIP & QC Uji Beban</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-code text-cyan-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">Firmware Siap Pakai & Revisi</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-2.5 sm:p-3.5 pt-2 sm:pt-2.5 border-t border-slate-100 flex items-center justify-between gap-1.5 bg-slate-50/70">
                <div class="min-w-0">
                    <span class="text-[7.5px] sm:text-[8px] text-slate-400 font-bold uppercase block leading-none">Mulai</span>
                    <span class="font-racing font-extrabold text-xs sm:text-sm text-slate-900 truncate block mt-0.5">Rp 150.000</span>
                </div>
                <div class="flex items-center gap-1.5 flex-shrink-0">
                    <!-- Tombol Mata (Quick Preview + Spesifikasi Lengkap) -->
                    <button type="button" onclick="openProductModal('custom_pcb')" class="w-7 h-7 rounded-xl bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 text-slate-600 hover:text-white flex items-center justify-center transition-all cursor-pointer shadow-2xs active:scale-95" title="Lihat Spesifikasi Lengkap">
                        <i class="fa-solid fa-eye text-[10px]"></i>
                    </button>
                    <!-- Tombol Konsultasi WA -->
                    <a href="https://wa.me/6281234567890?text=Halo%20IDS%20Store%2C%20saya%20ingin%20konsultasi%20jasa%20desain%20PCB%20dan%20alat%20custom" target="_blank" class="px-2.5 py-1.5 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-racing font-bold text-[8.5px] sm:text-[9.5px] tracking-wider transition-all flex items-center gap-1 shadow-2xs active:scale-95">
                        <i class="fa-brands fa-whatsapp text-[10px]"></i>
                        <span>KONSUL</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- PRODUK 5: ESP8266 Smart Switch 2-Ch Module -->
        <div class="store-product-item snap-start group bg-white rounded-2xl border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-slate-300 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden" data-category="iot">
            <div>
                <!-- Media Header with Ambient Glow & Floating Quick Actions -->
                <div class="relative w-full h-32 xs:h-36 sm:h-40 bg-slate-950 p-2.5 overflow-hidden flex flex-col items-center justify-center border-b border-slate-100 group/img cursor-pointer" onclick="openProductModal('esp8266_switch')">
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-emerald-500/25 rounded-full blur-xl pointer-events-none"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-teal-500/25 rounded-full blur-xl pointer-events-none"></div>
                    
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 mb-1 group-hover:scale-110 transition-transform z-1">
                        <i class="fa-solid fa-house-signal text-lg sm:text-xl"></i>
                    </div>
                    <span class="font-racing text-[9px] sm:text-[10px] font-bold text-white tracking-wider z-1">SMART SWITCH</span>
                    
                    <!-- Top Left Category & Stock Badge -->
                    <div class="absolute top-2 left-2 z-10 flex items-center gap-1">
                        <span class="px-1.5 py-0.5 rounded-md bg-white/90 backdrop-blur-xs text-slate-800 text-[8px] sm:text-[8.5px] font-racing font-bold shadow-xs">
                            AUTOMATION
                        </span>
                        <span class="px-1.5 py-0.5 rounded-md bg-emerald-500/90 text-white text-[8px] font-bold shadow-xs">
                            Ready
                        </span>
                    </div>

                    <!-- Top Right Quick View Eye Button -->
                    <button type="button" onclick="event.stopPropagation(); openProductModal('esp8266_switch')" class="absolute top-2 right-2 w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-slate-900/80 hover:bg-emerald-600 text-white flex items-center justify-center transition-all z-10 cursor-pointer shadow-xs active:scale-90" title="Buka Detail Spesifikasi">
                        <i class="fa-solid fa-eye text-[9px] sm:text-[10px]"></i>
                    </button>

                    <div class="absolute bottom-1.5 right-2 text-[8px] sm:text-[9px] font-mono text-slate-400 z-10 bg-slate-900/80 px-1.5 py-0.5 rounded border border-slate-800">
                        AC 220V • ESP-12F
                    </div>
                </div>

                <!-- Content Body -->
                <div class="p-2.5 sm:p-3.5">
                    <div class="flex items-center justify-between">
                        <span class="text-[8.5px] sm:text-[9.5px] font-bold text-emerald-600 uppercase tracking-wider">Home Automation</span>
                        <span class="text-[8.5px] font-mono text-slate-400">IDS-SW-8266</span>
                    </div>

                    <h3 class="font-extrabold text-slate-900 text-xs sm:text-sm mt-0.5 group-hover:text-emerald-600 transition-colors line-clamp-1">
                        ESP8266 Smart Switch 2-Ch
                    </h3>
                    
                    <div class="mt-2 space-y-1 text-[9px] sm:text-[9.5px]">
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-plug text-emerald-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">AC 220V / 10A Dual Relay</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-mobile-screen text-cyan-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">Web Dashboard & Android MQTT</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-shield-check text-purple-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">Fuse + Varistor Overvoltage</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-2.5 sm:p-3.5 pt-2 sm:pt-2.5 border-t border-slate-100 flex items-center justify-between gap-1.5 bg-slate-50/70">
                <div class="min-w-0">
                    <span class="text-[7.5px] sm:text-[8px] text-slate-400 font-bold uppercase block leading-none">Harga</span>
                    <span class="font-racing font-extrabold text-xs sm:text-sm text-slate-900 truncate block mt-0.5">Rp 95.000</span>
                </div>
                <div class="flex items-center gap-1.5 flex-shrink-0">
                    <!-- Tombol Mata (Quick Preview + Spesifikasi Lengkap) -->
                    <button type="button" onclick="openProductModal('esp8266_switch')" class="w-7 h-7 rounded-xl bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 text-slate-600 hover:text-white flex items-center justify-center transition-all cursor-pointer shadow-2xs active:scale-95" title="Lihat Spesifikasi Lengkap">
                        <i class="fa-solid fa-eye text-[10px]"></i>
                    </button>
                    <!-- Tombol Beli WA -->
                    <a href="https://wa.me/6281234567890?text=Halo%20IDS%20Store%2C%20saya%20tertarik%20order%20ESP8266%20Smart%20Switch%202-Ch" target="_blank" class="px-2.5 py-1.5 rounded-xl bg-slate-900 hover:bg-emerald-600 text-white font-racing font-bold text-[8.5px] sm:text-[9.5px] tracking-wider transition-all flex items-center gap-1 shadow-2xs active:scale-95">
                        <i class="fa-brands fa-whatsapp text-[10px] text-emerald-400"></i>
                        <span>BELI</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- PRODUK 6: DC-DC Buck Converter 5A High Precision -->
        <div class="store-product-item snap-start group bg-white rounded-2xl border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-slate-300 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden" data-category="psu">
            <div>
                <!-- Media Header with Ambient Glow & Floating Quick Actions -->
                <div class="relative w-full h-32 xs:h-36 sm:h-40 bg-slate-950 p-2.5 overflow-hidden flex flex-col items-center justify-center border-b border-slate-100 group/img cursor-pointer" onclick="openProductModal('buck_5a')">
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-rose-500/25 rounded-full blur-xl pointer-events-none"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-amber-500/25 rounded-full blur-xl pointer-events-none"></div>
                    
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-rose-500/10 border border-rose-500/30 flex items-center justify-center text-rose-400 mb-1 group-hover:scale-110 transition-transform z-1">
                        <i class="fa-solid fa-bolt-lightning text-lg sm:text-xl"></i>
                    </div>
                    <span class="font-racing text-[9px] sm:text-[10px] font-bold text-white tracking-wider z-1">BUCK STEP-DOWN</span>
                    
                    <!-- Top Left Category & Stock Badge -->
                    <div class="absolute top-2 left-2 z-10 flex items-center gap-1">
                        <span class="px-1.5 py-0.5 rounded-md bg-white/90 backdrop-blur-xs text-slate-800 text-[8px] sm:text-[8.5px] font-racing font-bold shadow-xs">
                            REGULATOR
                        </span>
                        <span class="px-1.5 py-0.5 rounded-md bg-emerald-500/90 text-white text-[8px] font-bold shadow-xs">
                            Ready
                        </span>
                    </div>

                    <!-- Top Right Quick View Eye Button -->
                    <button type="button" onclick="event.stopPropagation(); openProductModal('buck_5a')" class="absolute top-2 right-2 w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-slate-900/80 hover:bg-rose-600 text-white flex items-center justify-center transition-all z-10 cursor-pointer shadow-xs active:scale-90" title="Buka Detail Spesifikasi">
                        <i class="fa-solid fa-eye text-[9px] sm:text-[10px]"></i>
                    </button>

                    <div class="absolute bottom-1.5 right-2 text-[8px] sm:text-[9px] font-mono text-slate-400 z-10 bg-slate-900/80 px-1.5 py-0.5 rounded border border-slate-800">
                        5A Max • 96% Eff
                    </div>
                </div>

                <!-- Content Body -->
                <div class="p-2.5 sm:p-3.5">
                    <div class="flex items-center justify-between">
                        <span class="text-[8.5px] sm:text-[9.5px] font-bold text-rose-600 uppercase tracking-wider">Power Step-Down</span>
                        <span class="text-[8.5px] font-mono text-slate-400">IDS-DC-5A</span>
                    </div>

                    <h3 class="font-extrabold text-slate-900 text-xs sm:text-sm mt-0.5 group-hover:text-rose-600 transition-colors line-clamp-1">
                        DC Buck Step-Down 5A Module
                    </h3>
                    
                    <div class="mt-2 space-y-1 text-[9px] sm:text-[9.5px]">
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-arrow-down-wide-short text-rose-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">In 6V–36V / Out 1.25V–32V</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-gauge-high text-amber-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">Arus 5A & Efisiensi 96%</span>
                        </div>
                        <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                            <i class="fa-solid fa-temperature-arrow-down text-cyan-500 text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                            <span class="text-slate-700 font-medium truncate">Low Ripple & Heat Sink Pad</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-2.5 sm:p-3.5 pt-2 sm:pt-2.5 border-t border-slate-100 flex items-center justify-between gap-1.5 bg-slate-50/70">
                <div class="min-w-0">
                    <span class="text-[7.5px] sm:text-[8px] text-slate-400 font-bold uppercase block leading-none">Harga</span>
                    <span class="font-racing font-extrabold text-xs sm:text-sm text-slate-900 truncate block mt-0.5">Rp 65.000</span>
                </div>
                <div class="flex items-center gap-1.5 flex-shrink-0">
                    <!-- Tombol Mata (Quick Preview + Spesifikasi Lengkap) -->
                    <button type="button" onclick="openProductModal('buck_5a')" class="w-7 h-7 rounded-xl bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 text-slate-600 hover:text-white flex items-center justify-center transition-all cursor-pointer shadow-2xs active:scale-95" title="Lihat Spesifikasi Lengkap">
                        <i class="fa-solid fa-eye text-[10px]"></i>
                    </button>
                    <!-- Tombol Beli WA -->
                    <a href="https://wa.me/6281234567890?text=Halo%20IDS%20Store%2C%20saya%20tertarik%20order%20DC%20Buck%20Step-Down%205A%20Module" target="_blank" class="px-2.5 py-1.5 rounded-xl bg-slate-900 hover:bg-rose-600 text-white font-racing font-bold text-[8.5px] sm:text-[9.5px] tracking-wider transition-all flex items-center gap-1 shadow-2xs active:scale-95">
                        <i class="fa-brands fa-whatsapp text-[10px] text-emerald-400"></i>
                        <span>BELI</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Swipe Hint on Mobile (Hidden on Desktop) -->
    <div class="sm:hidden flex items-center justify-between text-[10.5px] text-slate-400 font-medium px-1 mt-1 mb-2">
        <span class="flex items-center gap-1 text-slate-500">
            <i class="fa-solid fa-arrows-left-right text-[10px] text-amber-500 animate-pulse"></i>
            <span>Geser horizontal untuk produk lainnya</span>
        </span>
        <span class="text-[9.5px] font-racing text-slate-400 font-bold">2x2 GRID</span>
    </div>

    <!-- Simple Trust Micro-Grid (3 Columns) -->
    <div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-2 text-left">
        <div class="p-2.5 sm:p-3 rounded-xl bg-white border border-slate-200/80 shadow-2xs flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-xs flex-shrink-0">
                <i class="fa-solid fa-circle-check text-sm"></i>
            </div>
            <div class="min-w-0">
                <h4 class="text-[11px] font-bold text-slate-900 leading-tight">100% QC Tested</h4>
                <p class="text-[9.5px] text-slate-500 truncate">Uji osiloskop & beban nyata sebelum kirim</p>
            </div>
        </div>

        <div class="p-2.5 sm:p-3 rounded-xl bg-white border border-slate-200/80 shadow-2xs flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-cyan-50 text-cyan-600 flex items-center justify-center text-xs flex-shrink-0">
                <i class="fa-solid fa-file-code text-sm"></i>
            </div>
            <div class="min-w-0">
                <h4 class="text-[11px] font-bold text-slate-900 leading-tight">Skematik & Source Code</h4>
                <p class="text-[9.5px] text-slate-500 truncate">File skematik & pustaka kode disertakan</p>
            </div>
        </div>

        <div class="p-2.5 sm:p-3 rounded-xl bg-white border border-slate-200/80 shadow-2xs flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-xs flex-shrink-0">
                <i class="fa-solid fa-headset text-sm"></i>
            </div>
            <div class="min-w-0">
                <h4 class="text-[11px] font-bold text-slate-900 leading-tight">Garansi & Support</h4>
                <p class="text-[9.5px] text-slate-500 truncate">Konsultasi teknis & instalasi siap bantu</p>
            </div>
        </div>
    </div>
</section>
