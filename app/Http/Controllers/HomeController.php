<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(3)->get();
        $products = Product::latest()->take(3)->get();

        return view('home.index', compact('news', 'products'));
    }

    public function introduce() {
        return view('home.introduce');
    }

    public function product(Request $request)
    {
        $categories = Product::select('category')->distinct()->pluck('category');

        if ($request->has('category') && $request->category != '') {
            $products = Product::where('category', $request->category)
                ->where('status', 'approved')
                ->get();
        } else {
            $products = Product::where('status', 'approved')->get();
        }

        return view('home.product', compact('products', 'categories'));
    }

    public function showProducts($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('home.showproduct', compact('product', 'relatedProducts'));
    }

    public function news()
    {
        $news = News::latest()->get();
        return view('home.news', compact('news'));
    }

    public function showNews($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $relatedNews = News::where('id', '!=', $news->id)->latest()->take(3)->get();

        return view('home.shownew', compact('news', 'relatedNews'));
    }


    public function contact() {
        return view('home.contact');
    }
}
