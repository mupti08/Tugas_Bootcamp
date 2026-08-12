<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
     public function index(): View{
        // 1. Querying data: Filter hanya record dengan status is_active = true
        $links = Link::where('is_active', true)
                     ->latest()
                     ->paginate(5);

        // 2. Render view publik dengan mengoper koleksi $links
        return view('public.index', compact('links'));
    }
}
