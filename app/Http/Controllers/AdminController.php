<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Product;

class AdminController extends Controller
{
    //Duyệt
    public function pending()
    {
        $pendingNews = News::where('status', 'pending')->get();
        $pendingProducts = Product::where('status', 'pending')->get();

        return view('admin.page.pending', compact('pendingNews', 'pendingProducts'));
    }
}
