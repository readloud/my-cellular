<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->groupBy('category');
        
        $testimonials = Testimonial::where('is_approved', true)
            ->latest()
            ->take(6)
            ->get();
        
        return view('home.index', compact('galleries', 'testimonials'));
    }
}