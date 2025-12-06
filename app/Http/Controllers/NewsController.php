<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::where('status', 'approved')->paginate(5);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'content' => 'required|string'
        ]);

        $newsData = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'user_id' => Auth::id(),
        ];

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('news', $imageName, 'public');
            $newsData['thumbnail'] = $imageName;
        }

        News::create($newsData);

        return redirect()->route('admin.news.index')->with('success', 'Bài viết đã được tạo!');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');

            return asset('storage/' . $path); // Trả URL ảnh để Summernote hiển thị
        }

        return response()->json(['error' => 'Không có ảnh'], 400);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'content' => 'required|string'
        ]);

        // Tạo slug duy nhất
        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;
        $counter = 1;
        while (News::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        $newsData = [
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'status' => 'pending', // Sau khi cập nhật, về chờ duyệt
        ];

        // Xử lý ảnh mới nếu có
        if ($request->hasFile('thumbnail')) {
            // Xóa ảnh cũ
            if ($news->thumbnail) {
                Storage::disk('public')->delete('news/' . $news->thumbnail);
            }

            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('news', $imageName, 'public');
            $newsData['thumbnail'] = $imageName;
        }

        $news->update($newsData);

        return redirect()->route('admin.news.index')
            ->with('success', 'Cập nhật bài viết thành công, đang chờ duyệt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->thumbnail && Storage::disk('public')->exists('news/' . $news->thumbnail)) {
            Storage::disk('public')->delete('news/' . $news->thumbnail);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Xóa bài viết thành công!');
    }

    // Duyệt bài viết
    public function approve($id)
    {
        $news = News::findOrFail($id);
        $news->status = 'approved';
        $news->save();

        return redirect()->back()->with('success', 'Bài viết đã được duyệt.');
    }

    // Từ chối bài viết
    public function reject($id)
    {
        $news = News::findOrFail($id);
        $news->status = 'rejected';
        $news->save();

        return redirect()->back()->with('success', 'Bài viết đã bị từ chối.');
    }
}
