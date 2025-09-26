<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('site.blog.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $moreNews = Blog::where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        return view('site.blog.show', compact('blog', 'moreNews'));
    }
}
