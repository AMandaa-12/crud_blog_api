<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Services\BlogService;

class BlogController extends Controller {
    protected $blogService;
    public function __construct(BlogService $blogService) {
        $this->blogService = $blogService;
    }
    public function store(BlogRequest $request) {
        $blog = $this->blogService->store($request);

        return response()->json([
            'message' => 'Blog berhasil dibuat',
            'data' => new BlogResource($blog)
        ]);
    }

    public function index() {
        $blogs = Blog::latest()->get();

        return response()->json([
            'message' => 'Data blog',
            'data' => BlogResource::collection($blogs)
        ]);
    }

    public function update(BlogRequest $request, $id) {
        $blog = Blog::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $blog->image = $imageName;
        }

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->save();

        return response()->json([
            'message' => 'Blog berhasil diupdate',
            'data' => new BlogResource($blogs)
        ]);
    }

    public function destroy($id) {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return response()->json([
            'message' => 'Blog berhasil dihapus'
        ]);
    }
}