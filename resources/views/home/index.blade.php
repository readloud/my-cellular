@extends('layouts.app')

@section('title', 'HP Service Professional - Service HP Cepat & Berkualitas')

@section('content')
<!-- Hero Section -->
<section id="home" class="min-h-screen flex items-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 opacity-90"></div>
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c')] bg-cover bg-center mix-blend-overlay"></div>
    
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full animate-bounce" style="animation-duration: 3s;"></div>
        <div class="absolute bottom-20 right-10 w-32 h-32 bg-white/10 rounded-full animate-bounce" style="animation-duration: 4s;"></div>
        <div class="absolute top-1/3 right-1/4 w-16 h-16 bg-white/10 rounded-full animate-ping"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl text-white">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fadeInUp">
                                Service HP <span class="text-yellow-300">Profesional</span>
                            </h1>
            <p class="text-xl md:text-2xl mb-8 animate-fadeInUp opacity-0" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                Perbaikan Cepat, Bergaransi & Bisa Ditunggu
            </p>
            <div class="flex flex-wrap gap-4 animate-fadeInUp opacity-0" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                <a href="#contact" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:shadow-xl transition-all hover:scale-105">
                    Konsultasi Gratis
                </a>
                <a href="#gallery" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition-all">
                    Lihat Galeri
                </a>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#services" class="text-white"><i class="fas fa-chevron-down text-2xl"></i></a>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Layanan Kami</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto"></div>
            <p class="text-gray-600 mt-4">Service profesional semua merk HP dengan garansi & kualitas terbaik</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="group bg-gradient-to-br from-blue-50 to-purple-50 p-6 rounded-2xl shadow-lg hover-lift">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center mb-4 transition-all group-hover:scale-110 group-hover:rotate-12">
                    <i class="fas fa-mobile-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Service HP</h3>
                <p class="text-gray-600">Semua merk (Android, iPhone, HP Jadul)</p>
                <div class="mt-4 text-blue-600 font-semibold">Mulai Rp50.000</div>
            </div>
            
            <div class="group bg-gradient-to-br from-green-50 to-teal-50 p-6 rounded-2xl shadow-lg hover-lift">
                <div class="w-16 h-16 bg-gradient-to-r from-green-600 to-green-700 rounded-full flex items-center justify-center mb-4 transition-all group-hover:scale-110 group-hover:rotate-12">
                    <i class="fas fa-microchip text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Ganti Sparepart</h3>
                <p class="text-gray-600">Sparepart original & berkualitas</p>
                <div class="mt-4 text-green-600 font-semibold">Garansi 3 Bulan</div>
            </div>
            
            <div class="group bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-2xl shadow-lg hover-lift">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-purple-700 rounded-full flex items-center justify-center mb-4 transition-all group-hover:scale-110 group-hover:rotate-12">
                    <i class="fas fa-headphones text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Aksesoris</h3>
                <p class="text-gray-600">Perlengkapan original lengkap</p>
                <div class="mt-4 text-purple-600 font-semibold">100% Original</div>
            </div>
            
            <div class="group bg-gradient-to-br from-yellow-50 to-orange-50 p-6 rounded-2xl shadow-lg hover-lift">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-600 to-orange-600 rounded-full flex items-center justify-center mb-4 transition-all group-hover:scale-110 group-hover:rotate-12">
                    <i class="fas fa-clock text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Bisa Ditunggu</h3>
                <p class="text-gray-600">Pengerjaan cepat & tepat waktu</p>
                <div class="mt-4 text-orange-600 font-semibold">1 Hari Jadi</div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="p-6 rounded-xl">
                <i class="fas fa-smile text-4xl mb-3"></i>
                <div class="text-3xl font-bold counter" data-target="1500">0</div>
                <p class="mt-2">Pelanggan Puas</p>
            </div>
            <div class="p-6 rounded-xl">
                <i class="fas fa-mobile-alt text-4xl mb-3"></i>
                <div class="text-3xl font-bold counter" data-target="5000">0</div>
                <p class="mt-2">HP Terservice</p>
            </div>
            <div class="p-6 rounded-xl">
                <i class="fas fa-star text-4xl mb-3"></i>
                <div class="text-3xl font-bold counter" data-target="4.9">0</div>
                <p class="mt-2">Rating Kepuasan</p>
            </div>
            <div class="p-6 rounded-xl">
                <i class="fas fa-trophy text-4xl mb-3"></i>
                <div class="text-3xl font-bold counter" data-target="7">0</div>
                <p class="mt-2">Tahun Pengalaman</p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Galeri</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto"></div>
            <p class="text-gray-600 mt-4">Hasil pekerjaan & peralatan profesional kami</p>
        </div>
        
        <div x-data="{ activeTab: 'phones' }">
            <div class="flex flex-wrap justify-center gap-2 mb-8">
                @php
                    $tabs = [
                        'phones' => ['icon' => 'fa-mobile-alt', 'label' => 'HP (Android/iPhone/Jadul)'],
                        'accessories' => ['icon' => 'fa-headphones', 'label' => 'Aksesoris'],
                        'spareparts' => ['icon' => 'fa-microchip', 'label' => 'Sparepart'],
                        'tools' => ['icon' => 'fa-tools', 'label' => 'Alat Kerja'],
                        'process' => ['icon' => 'fa-cogs', 'label' => 'Proses Pengerjaan']
                    ];
                @endphp
                @foreach($tabs as $key => $tab)
                <button @click="activeTab = '{{ $key }}'" 
                        :class="activeTab === '{{ $key }}' ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg' : 'bg-gray-200 text-gray-700'"
                        class="px-6 py-2 rounded-full font-semibold transition-all hover:scale-105">
                    <i class="fas {{ $tab['icon'] }} mr-2"></i>{{ $tab['label'] }}
                </button>
                @endforeach
            </div>
            
            @foreach($tabs as $key => $tab)
            <div x-show="activeTab === '{{ $key }}'" x-transition.duration.500ms>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($galleries[$key] ?? [] as $gallery)
                    <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer gallery-item" data-image="{{ asset('storage/' . $gallery->image) }}">
                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                             alt="{{ $gallery->title }}" 
                             class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end">
                            <div class="p-4 text-white">
                                <h3 class="font-semibold">{{ $gallery->title }}</h3>
                                <p class="text-sm">{{ $gallery->description }}</p>
                                @if($gallery->device_type)
                                <span class="inline-block mt-2 px-2 py-1 rounded-full text-xs {{ $gallery->device_type == 'iphone' ? 'bg-blue-500' : ($gallery->device_type == 'android' ? 'bg-green-500' : 'bg-orange-500') }}">
                                    {{ ucfirst($gallery->device_type) }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-4 text-center py-12 text-gray-500">
                        <i class="fas fa-images text-5xl mb-3 opacity-50"></i>
                        <p>Belum ada foto di kategori ini</p>
                    </div>
                    @endforelse
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="lightbox-img">
</div>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Testimoni Pelanggan</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto"></div>
            <p class="text-gray-600 mt-4">Apa kata mereka tentang layanan kami</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($testimonials as $testimonial)
            <div class="bg-gradient-to-br from-gray-50 to-blue-50 p-6 rounded-2xl shadow-lg hover-lift">
                <div class="flex items-center mb-4">
                    <img src="{{ $testimonial->avatar ?? 'https://randomuser.me/api/portraits/' . (rand(0,1) ? 'women' : 'men') . '/' . rand(1,50) . '.jpg' }}" 
                         alt="{{ $testimonial->name }}" 
                         class="w-16 h-16 rounded-full object-cover border-4 border-blue-600">
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-800">{{ $testimonial->name }}</h3>
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic">"{{ $testimonial->message }}"</p>
                <p class="text-sm text-blue-600 mt-2">Device: {{ $testimonial->device }}</p>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 text-gray-500">
                <i class="fas fa-comment-dots text-5xl mb-3 opacity-50"></i>
                <p>Belum ada testimoni. Jadilah yang pertama!</p>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <button onclick="showTestimonialForm()" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-full font-semibold hover:shadow-xl transition-all hover:scale-105">
                <i class="fas fa-pen mr-2"></i>Tulis Testimoni
            </button>
        </div>
    </div>
</section>

<!-- Testimonial Form Modal -->
<div id="testimonialModal" style="display:none; position:fixed; z-index:1001; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.8); align-items:center; justify-content:center;">
    <div style="background:white; width:90%; max-width:500px; margin:50px auto; padding:30px; border-radius:20px; position:relative;">
        <span onclick="closeTestimonialForm()" style="position:absolute; right:20px; top:20px; font-size:30px; cursor:pointer;">&times;</span>
        <h3 class="text-2xl font-bold mb-4">Tulis Testimoni</h3>
        <form id="testimonialFormAjax">
            @csrf
            <input type="text" name="name" placeholder="Nama Anda" class="w-full px-4 py-2 mb-3 border rounded-lg" required>
            <input type="text" name="device" placeholder="Device (contoh: iPhone 11)" class="w-full px-4 py-2 mb-3 border rounded-lg" required>
            <select name="device_type" class="w-full px-4 py-2 mb-3 border rounded-lg" required>
                <option value="iphone">iPhone</option>
                <option value="android">Android</option>
                <option value="old_phone">HP Jadul</option>
            </select>
            <textarea name="message" placeholder="Testimoni Anda..." rows="4" class="w-full px-4 py-2 mb-3 border rounded-lg" required></textarea>
            <div class="mb-3">
                <p class="mb-2">Rating:</p>
                <div class="flex gap-2 text-2xl text-gray-300 rating-stars-container">
                    @for($i = 1; $i <= 5; $i++)
                    <i class="far fa-star rating-star" data-rating="{{ $i }}"></i>
                    @endfor
                </div>
                <input type="hidden" name="rating" id="selectedRating" value="0">
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-2 rounded-lg font-semibold">Kirim Testimoni</button>
        </form>
    </div>
</div>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gradient-to-br from-blue-900 to-purple-900 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Hubungi Kami</h2>
            <div class="w-24 h-1 bg-white mx-auto"></div>
            <p class="mt-4 text-blue-200">Konsultasi gratis & cepat respon</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <div class="space-y-6">
                    <div class="flex items-center space-x-4 group">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center transition-all group-hover:scale-110">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </div>
                        <div><p class="font-semibold">WhatsApp</p><p class="text-blue-200">+62 812-3456-7890</p></div>
                    </div>
                    <div class="flex items-center space-x-4 group">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center transition-all group-hover:scale-110">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div><p class="font-semibold">Email</p><p class="text-blue-200">info@hpservice.com</p></div>
                    </div>
                    <div class="flex items-center space-x-4 group">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center transition-all group-hover:scale-110">
                            <i class="fas fa-phone text-xl"></i>
                        </div>
                        <div><p class="font-semibold">Telepon</p><p class="text-blue-200">(021) 1234-5678</p></div>
                    </div>
                    <div class="flex items-center space-x-4 group">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center transition-all group-hover:scale-110">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div><p class="font-semibold">Alamat</p><p class="text-blue-200">Jl. Raya Service No. 123, Jakarta Selatan</p></div>
                    </div>
                    <div class="mt-8 p-4 bg-white/10 rounded-xl">
                        <h3 class="font-bold mb-3"><i class="far fa-clock mr-2"></i>Jam Operasional</h3>
                        <p>Senin - Sabtu: 09:00 - 20:00</p>
                        <p>Minggu: By Appointment</p>
                    </div>
                </div>
            </div>
            
            <div>
                <form id="contactForm" class="space-y-4">
                    @csrf
                    <input type="text" name="name" placeholder="Nama Anda" required class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/70 focus:outline-none focus:border-white transition">
                    <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/70 focus:outline-none focus:border-white transition">
                    <input type="tel" name="phone" placeholder="No. WhatsApp" required class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/70 focus:outline-none focus:border-white transition">
                    <select name="device" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:border-white transition">
                        <option value="" disabled selected>Tipe Device</option>
                        <option value="iphone">iPhone</option>
                        <option value="android">Android</option>
                        <option value="old_phone">HP Jadul</option>
                        <option value="accessory">Aksesoris</option>
                    </select>
                    <select name="service_type" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:border-white transition">
                        <option value="" disabled selected>Jenis Service</option>
                        <option value="lcd">Ganti LCD</option>
                        <option value="battery">Ganti Battery</option>
                        <option value="charging">Port Charging</option>
                        <option value="camera">Camera Repair</option>
                        <option value="software">Software Update</option>
                        <option value="other">Lainnya</option>
                    </select>
                    <textarea name="message" rows="4" placeholder="Jelaskan masalah yang dialami" required class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/70 focus:outline-none focus:border-white transition"></textarea>
                    <button type="submit" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:shadow-xl transition-all w-full hover:scale-105">
                        <i class="fab fa-whatsapp mr-2"></i>Konsultasi Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/6281234567890" target="_blank" class="fixed bottom-8 right-8 bg-gradient-to-r from-green-500 to-green-600 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all z-50 hover:scale-110">
    <i class="fab fa-whatsapp text-2xl"></i>
</a>

@push('scripts')
<script>
function showTestimonialForm() {
    document.getElementById('testimonialModal').style.display = 'flex';
}

function closeTestimonialForm() {
    document.getElementById('testimonialModal').style.display = 'none';
}

// Rating stars
let selectedRating = 0;
document.querySelectorAll('.rating-star').forEach(star => {
    star.addEventListener('click', function() {
        selectedRating = parseInt(this.getAttribute('data-rating'));
        document.getElementById('selectedRating').value = selectedRating;
        document.querySelectorAll('.rating-star').forEach(s => {
            const rating = parseInt(s.getAttribute('data-rating'));
            if (rating <= selectedRating) {
                s.classList.remove('far');
                s.classList.add('fas');
                s.style.color = '#fbbf24';
            } else {
                s.classList.remove('fas');
                s.classList.add('far');
                s.style.color = '#d1d5db';
            }
        });
    });
});

// Ajax testimonial submit
document.getElementById('testimonialFormAjax')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('rating', selectedRating);
    
    try {
        const response = await fetch('{{ route("testimonial.store") }}', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
            body: formData
        });
        const result = await response.json();
        if (result.success) {
            alert(result.message);
            closeTestimonialForm();
            this.reset();
            selectedRating = 0;
            document.querySelectorAll('.rating-star').forEach(s => {
                s.classList.remove('fas');
                s.classList.add('far');
                s.style.color = '#d1d5db';
            });
        }
    } catch (error) {
        alert('Terjadi kesalahan, silakan coba lagi');
    }
});

// Contact form
document.getElementById('contactForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const name = this.querySelector('[name="name"]').value;
    const device = this.querySelector('[name="device"]').value;
    const serviceType = this.querySelector('[name="service_type"]').value;
    const message = this.querySelector('[name="message"]').value;
    const phone = this.querySelector('[name="phone"]').value || '6281234567890';
    const text = `Halo, saya ${name}%0A%0A*Device:* ${device}%0A*Jenis Service:* ${serviceType}%0A*Keluhan:* ${message}%0A%0AMohon informasi lebih lanjut. Terima kasih.`;
    window.open(`https://wa.me/${phone.replace(/[^0-9]/g, '')}?text=${text}`, '_blank');
});

// Scroll animations
const observerScroll = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.service-card, .testimonial-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'all 0.6s ease-out';
    observerScroll.observe(el);
});
</script>
@endpush
@endsection