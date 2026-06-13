<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $galleries = Gallery::latest()->get();
        $testimonials = Testimonial::latest()->get();
        return view('admin.dashboard', compact('galleries', 'testimonials'));
    }

    public function uploadGallery(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required',
            'description' => 'nullable'
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title' => $request->title,
            'image' => $path,
            'category' => $request->category,
            'device_type' => $request->device_type,
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->back()->with('success', 'Galeri berhasil ditambahkan');
    }

    public function deleteGallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();
        return redirect()->back()->with('success', 'Galeri berhasil dihapus');
    }

    public function approveTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['is_approved' => !$testimonial->is_approved]);
        return redirect()->back()->with('success', 'Status testimoni berhasil diubah');
    }

    public function deleteTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->avatar && Storage::disk('public')->exists($testimonial->avatar)) {
            Storage::disk('public')->delete($testimonial->avatar);
        }
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimoni berhasil dihapus');
    }

    public function storeTestimonial(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'device' => 'required',
            'device_type' => 'required',
            'message' => 'required',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Testimonial::create([
            'name' => $request->name,
            'device' => $request->device,
            'device_type' => $request->device_type,
            'message' => $request->message,
            'rating' => $request->rating,
            'is_approved' => false
        ]);

        return response()->json(['success' => true, 'message' => 'Testimoni berhasil dikirim']);
    }
}