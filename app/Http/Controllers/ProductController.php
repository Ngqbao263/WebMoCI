<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function indexByCategory($category)
    {
        $products = Product::where('category', $category)
            ->where('status', 'approved')
            ->paginate(10);

        return view('admin.products.index', compact('products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'category'          => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'long_description'  => 'nullable|string',
            'thumbnail'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $slug = Str::slug($request->name);
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->name) . '-' . $counter++;
        }

        $data = $request->only('name', 'category', 'short_description', 'long_description');
        $data['slug'] = $slug;
        $data['status'] = 'pending';
        $data['user_id'] = Auth::id();

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('products', $imageName, 'public');
            $data['thumbnail'] = $imageName;
        }

        Product::create($data);

        return redirect()->to(url()->previous())->with('success', 'Thêm sản phẩm thành công, vui lòng chờ duyệt!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'category'          => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'long_description'  => 'nullable|string',
            'thumbnail'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only('name', 'category', 'short_description', 'long_description');

        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail && Storage::disk('public')->exists('products/' . $product->thumbnail)) {
                Storage::disk('public')->delete('products/' . $product->thumbnail);
            }
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('products', $imageName, 'public');
            $data['thumbnail'] = $imageName;
        }

        $product->update($data);

        return redirect()->to(url()->previous())->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->thumbnail && Storage::disk('public')->exists('products/' . $product->thumbnail)) {
            Storage::disk('public')->delete('products/' . $product->thumbnail);
        }
        $product->delete();

        return redirect()->to(url()->previous())->with('success', 'Xóa sản phẩm thành công!');
    }

    //Duyệt sản phẩm
    public function approve(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->status = 'approved';
        $product->save();

        return redirect()->route('admin.page.pending', ['tab' => $request->tab])
                         ->with('success', 'Sản phẩm đã được duyệt.');
    }

    public function reject(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->status = 'rejected';
        $product->save();

        return redirect()->route('admin.page.pending', ['tab' => $request->tab])
                         ->with('success', 'Sản phẩm đã bị từ chối.');
    }
}
