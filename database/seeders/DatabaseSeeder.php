<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Sample Testimonials
        Testimonial::create([
            'name' => 'Sarah Wijaya',
            'device' => 'iPhone 11',
            'device_type' => 'iphone',
            'message' => 'Service sangat cepat dan profesional! iPhone 11 saya mati total, 1 hari sudah selesai.',
            'rating' => 5,
            'is_approved' => true
        ]);
        
        Testimonial::create([
            'name' => 'Budi Santoso',
            'device' => 'Samsung S22 Ultra',
            'device_type' => 'android',
            'message' => 'Ganti LCD hasilnya sempurna seperti baru. Harga terjangkau dan garansi panjang.',
            'rating' => 5,
            'is_approved' => true
        ]);
    }
}