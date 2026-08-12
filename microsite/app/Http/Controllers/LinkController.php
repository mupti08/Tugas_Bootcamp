<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class LinkController extends Controller
{
    // Menampilkan daftar data tautan
    public function index(): View
    {
        $links = Link::latest()->paginate(5);

        return view('admin.links.index', compact('links'));
    }

    // Menampilkan form untuk menambahkan data tautan
    public function create(): View
    {
        return view('admin.links.create');
    }

    // Menyimpan data tautan baru
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Menyiapkan path gambar
        $imagePath = null;

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('links', 'public');
        }

        // Mengambil status aktif dari checkbox
        $isActive = $request->boolean('is_active');

        // Menyimpan data ke database
        Link::create([
            'title' => $validated['title'],
            'url' => $validated['url'],
            'image' => $imagePath,
            'is_active' => $isActive,
            'clicks' => 0,
        ]);

        // Mengarahkan kembali ke halaman daftar link
        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan baru berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit data tautan
    public function edit(Link $link): View
    {
        return view('admin.links.edit', compact('link'));
    }

    // Memperbarui data tautan
    public function update(Request $request, Link $link): RedirectResponse
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Menggunakan gambar lama jika tidak ada gambar baru
        $imagePath = $link->image;

        // Mengganti gambar jika ada gambar baru
        if ($request->hasFile('image')) {

            // Menghapus gambar lama
            if ($link->image) {
                Storage::disk('public')->delete($link->image);
            }

            // Menyimpan gambar baru
            $imagePath = $request->file('image')->store('links', 'public');
        }

        // Memperbarui data di database
        $link->update([
            'title' => $validated['title'],
            'url' => $validated['url'],
            'image' => $imagePath,
            'is_active' => $request->boolean('is_active'),
        ]);

        // Mengarahkan kembali ke halaman daftar link
        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan berhasil diperbarui!');
    }

    // Menghapus data tautan dan gambar
    public function destroy(Link $link): RedirectResponse
    {
        // Menghapus gambar dari storage
        if ($link->image) {
            Storage::disk('public')->delete($link->image);
        }

        // Menghapus data dari database
        $link->delete();

        // Mengarahkan kembali ke halaman daftar link
        return redirect()
            ->route('admin.links.index')
            ->with(
                'success',
                'Tautan beserta berkas gambarnya berhasil dihapus secara permanen!'
            );
    }
}