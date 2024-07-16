<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index()
    {
        return 'liste';
    }
    public function ajouter(Product $product)
    {
        // dd($product);

        //search product in database
        $existProduct = Panier::where('user_id','=', auth()->user()->id)
                                ->where('product_id','=', $product->id)
                                ->first();
        // dd($existProduct);

        // if product exist update quantities
        if (isset($existProduct)){

            $existProduct->quantite = $existProduct->quantite+1;
            $existProduct->save() ;

        }else{

            Panier::create(['user_id'=>auth()->user()->id,
                            'product_id'=>$product->id
                            ]);
        }

        // else add the product
        return 'ajouter';
    }
    public function commander()
    {
        return 'commander';
    }
    //
}
