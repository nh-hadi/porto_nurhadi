<!-- ========================================== -->
<!-- PREVIEW & SPESIFIKASI DETAIL MODAL (LIGHT THEME) -->
<!-- ========================================== -->
<div id="pcb-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-md p-3 sm:p-5 flex items-center justify-center overflow-y-auto" onclick="closePcbModal()">
    <div class="relative max-w-4xl w-full bg-white rounded-2xl border border-slate-200 shadow-2xl text-left overflow-hidden my-auto transform transition-all" onclick="event.stopPropagation()">
        
        <!-- Modal Top Bar Header (Light Theme) -->
        <div class="flex items-center justify-between px-4 sm:px-6 py-3 border-b border-slate-100 bg-slate-50/80">
            <div class="flex items-center gap-2.5 sm:gap-3">
                <div id="modal-icon-box" class="w-8 h-8 rounded-lg bg-rose-50 border border-rose-200 text-rose-600 flex items-center justify-center text-sm flex-shrink-0">
                    <i id="modal-icon" class="fa-solid fa-microchip"></i>
                </div>
                <div>
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <span id="modal-badge-category" class="text-[9px] font-racing font-bold px-2 py-0.5 rounded-full bg-slate-200/80 text-slate-700 uppercase">
                            HARDWARE DETAIL
                        </span>
                        <span id="modal-badge-status" class="text-[9px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">
                            Ready Stock
                        </span>
                    </div>
                    <h4 id="pcb-modal-title" class="font-extrabold text-slate-900 text-sm sm:text-base leading-tight mt-0.5">
                        Nama Produk
                    </h4>
                </div>
            </div>
            <button type="button" onclick="closePcbModal()" class="w-8 h-8 rounded-lg bg-white hover:bg-rose-50 text-slate-400 hover:text-rose-600 border border-slate-200 transition-colors flex items-center justify-center cursor-pointer shadow-2xs active:scale-90" aria-label="Tutup Preview">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <!-- Modal Body Content Grid (2 Columns: Image Slider & Specs) -->
        <div class="p-4 sm:p-6 grid grid-cols-1 md:grid-cols-12 gap-5 max-h-[78vh] overflow-y-auto">
            
            <!-- Left: High-Res Interactive Media & Slider Container -->
            <div class="md:col-span-6 flex flex-col justify-between">
                <div>
                    <!-- Project Mode Switcher Tabs (Desain Layout vs Tampilan App) -->
                    <div id="modal-media-tabs" class="hidden mb-2.5 flex items-center gap-1.5 bg-slate-100 p-1 rounded-xl border border-slate-200 text-xs font-bold">
                        <!-- Populated by JavaScript -->
                    </div>

                    <!-- Photo Slider Box with Touch Swipe & Arrows -->
                    <div id="modal-slider-box" class="relative w-full rounded-xl bg-slate-950 p-3 sm:p-4 overflow-hidden border border-slate-800 flex items-center justify-center group shadow-inner min-h-[220px] sm:min-h-[280px] select-none cursor-grab active:cursor-grabbing">
                        <!-- Ambient Lighting Effects -->
                        <div class="absolute -top-12 -left-12 w-36 h-36 bg-rose-500/20 rounded-full blur-2xl pointer-events-none"></div>
                        <div class="absolute -bottom-12 -right-12 w-36 h-36 bg-cyan-500/20 rounded-full blur-2xl pointer-events-none"></div>
                        
                        <!-- Main Display Image with Fade Animation -->
                        <img id="pcb-modal-img" src="{{ asset('projects/smart-psu/pcb/smart-psu-pcb.png') }}" alt="Product Full Preview" class="max-h-[240px] sm:max-h-[270px] w-auto max-w-full object-contain transition-all duration-300">
                        
                        <!-- Prev Arrow Button -->
                        <button type="button" id="modal-img-prev-btn" onclick="geserFotoModal('prev')" class="hidden absolute left-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-slate-900/80 hover:bg-slate-900 text-white border border-slate-700 flex items-center justify-center transition-all cursor-pointer shadow-md active:scale-90 z-20" aria-label="Foto Sebelumnya">
                            <i class="fa-solid fa-chevron-left text-xs"></i>
                        </button>
                        
                        <!-- Next Arrow Button -->
                        <button type="button" id="modal-img-next-btn" onclick="geserFotoModal('next')" class="hidden absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-slate-900/80 hover:bg-slate-900 text-white border border-slate-700 flex items-center justify-center transition-all cursor-pointer shadow-md active:scale-90 z-20" aria-label="Foto Selanjutnya">
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </button>

                        <!-- Floating Counter Badge (Foto 1 / 3) -->
                        <div id="modal-img-counter" class="hidden absolute top-2 right-2.5 bg-slate-900/90 backdrop-blur-xs px-2 py-0.5 rounded-full text-[9px] font-mono text-slate-300 border border-slate-700 z-10 font-bold">
                            <span id="modal-img-current-idx">1</span> / <span id="modal-img-total-count">3</span>
                        </div>

                        <!-- Floating Tech Watermark -->
                        <div class="absolute bottom-2 left-2.5 bg-slate-900/90 backdrop-blur-xs px-2 py-0.5 rounded text-[9px] font-racing text-amber-300 border border-slate-700 z-10">
                            <i class="fa-solid fa-certificate text-[8px] mr-1"></i> IDS STORE TECHNOLOGY
                        </div>
                    </div>

                    <!-- Dots Pagination for Multi-Photos -->
                    <div id="modal-img-dots-container" class="hidden flex items-center justify-center gap-1.5 mt-2">
                        <!-- Populated by JavaScript -->
                    </div>
                </div>

                <!-- Media Footer Note / Caption -->
                <p id="pcb-modal-desc" class="text-[10.5px] text-slate-500 mt-2 italic text-center font-medium">
                    Layout PCB & Desain Skematik — EasyEDA / EAGLE PCB
                </p>
            </div>

            <!-- Right: Detailed Specifications & Ordering / Downloads -->
            <div class="md:col-span-6 flex flex-col justify-between space-y-3 sm:space-y-4">
                <div>
                    <!-- Section Subheading -->
                    <div class="flex items-center justify-between pb-1.5 border-b border-slate-100">
                        <span class="text-[11px] font-racing font-bold text-slate-800 uppercase tracking-wider flex items-center gap-1.5">
                            <i class="fa-solid fa-list-check text-rose-500 text-xs"></i>
                            <span id="modal-section-subtitle">Spesifikasi & Fitur Teknis</span>
                        </span>
                        <span id="modal-product-id" class="text-[9px] font-mono font-bold text-slate-500 bg-slate-100 px-1.5 py-0.5 rounded border border-slate-200">
                            IDS-HW-01
                        </span>
                    </div>

                    <!-- Description -->
                    <p id="modal-product-desc-full" class="text-xs text-slate-600 mt-2 leading-relaxed">
                        Deskripsi lengkap produk...
                    </p>

                    <!-- Technical Specs Dynamic Grid -->
                    <div id="modal-specs-container" class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-2 text-left">
                        <!-- Filled dynamically by Javascript -->
                    </div>

                    <!-- Optional Project Download Buttons Container -->
                    <div id="modal-downloads-container" class="hidden mt-3 pt-2.5 border-t border-slate-100 flex flex-wrap gap-2">
                        <!-- Filled dynamically for projects -->
                    </div>
                </div>

                <!-- Bottom Price Bar & Action Buttons -->
                <div id="modal-bottom-bar" class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-2.5 bg-slate-50/70 -mx-4 -mb-4 sm:-mx-6 sm:-mb-6 p-3.5 sm:p-5">
                    <div id="modal-price-wrapper">
                        <span id="modal-price-label" class="text-[8.5px] sm:text-[9px] text-slate-400 font-bold uppercase block leading-none">Harga Resmi</span>
                        <span id="modal-product-price" class="font-racing font-extrabold text-base sm:text-lg text-slate-900">
                            Rp 245.000
                        </span>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <!-- Order WA / Action Button -->
                        <a id="modal-btn-wa" href="https://wa.me/6281234567890" target="_blank" class="flex-1 sm:flex-none px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-xl bg-gradient-to-r from-rose-500 to-amber-500 hover:from-rose-600 hover:to-amber-600 text-white font-racing font-bold text-[10px] sm:text-xs tracking-wider shadow-md shadow-rose-500/20 hover:scale-105 active:scale-95 transition-all flex items-center justify-center gap-1.5">
                            <i class="fa-brands fa-whatsapp text-sm text-emerald-300"></i>
                            <span id="modal-btn-action-text">ORDER VIA WHATSAPP</span>
                        </a>

                        <!-- Close Button -->
                        <button type="button" onclick="closePcbModal()" class="px-3 py-2 sm:py-2.5 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-slate-700 font-bold text-[11px] sm:text-xs transition-colors cursor-pointer active:scale-95">
                            Tutup
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
