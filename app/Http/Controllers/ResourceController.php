<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Resources', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'resources' => Resource::with('category')->latest()->get(),
        ]);
    }
    
    public function store(Request $request)
    {
        Resource::create([
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'creator_id' => $request->user()->id,
        ]);

        return Inertia::location('/');
    }

    public function search(Request $request)
    {
        return Resource::where('title', 'like', "%$request->search%")
        
            ->with('category')
            ->get();
    }
}
