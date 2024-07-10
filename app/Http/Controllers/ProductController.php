<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //home show last product and all categories
    public function index()
    {
        $categories = Category::all() ;
        // dd($categories);
        $products = Product::orderBy('id','desc')->paginate(10) ;

        return view('product.products', compact('categories','products')) ;
    }

    //detail: show product detail
    public function show()
    {
        return view('product.show');
    }
    
    //show  last product by category
    public function productByCategory()
    {
        return view('product.products');
    }
    //
}
