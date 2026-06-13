<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - HP Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-blue-800 to-purple-800 text-white">
            <div class="p-5">
                <div class="flex items-center space-x-2 mb-8">
                    <i class="fas fa-microchip text-2xl"></i>
                    <span class="text-xl font-bold">Admin Panel</span>
                </div>
                <nav class="space-y-2">
                    <a href="#gallery" class="flex items-center space-x-2 p-3 rounded-lg hover:bg-white/20 transition">
                        <i class="fas fa-images"></i><span>Galeri</span>
                    </a>
                    <a href="#testimonials" class="flex items-center space-x-2 p-3 rounded-lg hover:bg-white/20 transition">
                        <i class="fas fa-comments"></i><span>Testimoni</span>
                    </a>
                </nav>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <div class="bg-white shadow p-4">
                <h1 class="text-2xl font-bold">Dashboard Admin</h1>
            </div>
            
            <div class="p-6">
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif
                
                <!-- Gallery Management -->
                <div id="gallery" class="mb-12">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Manajemen Galeri</h2>
                        <button onclick="showUploadForm()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            <i class="fas fa-plus mr-2"></i>Tambah Foto
                        </button>
                    </div>
                    
                    <!-- Upload Form -->
                    <div id="uploadForm" style="display:none;" class="bg-white rounded-lg shadow p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4">Tambah Foto Baru</h3>
                        <form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" name="title" placeholder="Judul" class="border rounded-lg px-3 py-2" required>
                                <input type="file" name="image" accept="image/*" class="border rounded-lg px-3 py-2" required>
                                <select name="category" class="border rounded-lg px-3 py-2" required>
                                    <option value="phones">HP</option>
                                    <option value="accessories">Aksesoris</option>
                                    <option value="spareparts">Sparepart</option>
                                    <option value="tools">Alat Kerja</option>
                                    <option value="process">Proses Pengerjaan</option>
                                </select>
                                <select name="device_type" class="border rounded-lg px-3 py-2">
                                    <option value="">Pilih Device (Opsional)</option>
                                    <option value="iphone">iPhone</option>
                                    <option value="android">Android</option>
                                    <option value="old_phone">HP Jadul</option>
                                </select>
                                <textarea name="description" placeholder="Deskripsi" class="border rounded-lg px-3 py-2 col-span-2"></textarea>
                                <div class="col-span-2 flex justify-end space-x-2">
                                    <button type="button" onclick="hideUploadForm()" class="px-4 py-2 border rounded-lg">Batal</button>
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Gallery List -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach($galleries as $gallery)
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-bold">{{ $gallery->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $gallery->category }}</p>
                                <div class="flex justify-between mt-3">
                                    <span class="text-xs {{ $gallery->is_active ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $gallery->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                    <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Testimonials Management -->
                <div id="testimonials">
                    <h2 class="text-2xl font-bold mb-6">Manajemen Testimoni</h2>
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left">Nama</th>
                                    <th class="px-4 py-3 text-left">Device</th>
                                    <th class="px-4 py-3 text-left">Testimoni</th>
                                    <th class="px-4 py-3 text-left">Rating</th>
                                    <th class="px-4 py-3 text-left">Status</th>
                                    <th class="px-4 py-3 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                <tr class="border-t">
                                    <td class="px-4 py-3">{{ $testimonial->name }}</td>
                                    <td class="px-4 py-3">{{ $testimonial->device }}</td>
                                    <td class="px-4 py-3 max-w-xs">{{ Str::limit($testimonial->message, 50) }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                            @endfor
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 rounded-full text-xs {{ $testimonial->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $testimonial->is_approved ? 'Disetujui' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.testimonial.approve', $testimonial->id) }}" class="text-green-600 hover:text-green-800">
                                                <i class="fas fa-check-circle"></i>
                                            </a>
                                            <form action="{{ route('admin.testimonial.delete', $testimonial->id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function showUploadForm() {
            document.getElementById('uploadForm').style.display = 'block';
        }
        function hideUploadForm() {
            document.getElementById('uploadForm').style.display = 'none';
        }
    </script>
</body>
</html>