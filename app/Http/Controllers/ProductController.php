<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //home show last product and all categories
    public function index()
    {
        return 'home' ;
    }

    //detail: show product detail
    public function show()
    {
        return 'show';
    }
    
    //show  last product by category
    public function productByCategory()
    {
        return 'product by category';
    }
    //
}
