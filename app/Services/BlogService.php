<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogService
{
    public function store($request)
    {
        $image = $request->file('image');

        $imageName = time() . '.' . $image->extension();

        $image->move(public_path('images'), $imageName);

        return Blog::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $imageName,
        ]);
    }
}