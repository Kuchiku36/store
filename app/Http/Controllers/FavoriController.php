<?php

namespace App\Http\Controllers;

use App\Models\Favori;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriController extends Controller
{
    public function index()
    {
       

        // return view('favori.liste', compact('favoris'));

        return 'index';
    }

    // si il n'y a pas de favori ajoute en favoris sinon suprime 
    public function edit(Product $product)
    {
        $favoris = Favori::where('user_id', auth()->user()->id)
                                    ->where('product_id', $product->id)->first() ;

            if(isset($favoris)){
                $favoris->delete();
            }else{
                Favori::create(['user_id' => auth()->user()->id,
                                'product_id'=>$product->id]) ;
            }

        return back();   
    }

    // public function ajouter(Product $product)
    // {
    // //     // dd($product);

    // //     //search product in database
    // //     $existProduct = Favori::where('user_id','=', auth()->user()->id)
    // //                             ->where('product_id','=', $product->id)
    // //                             ->first();
    // //     // dd($existProduct);

    // //     // if product exist update quantities
    // //     if (isset($existProduct)){

    // //         $existProduct->quantite = $existProduct->quantite+1;
    // //         $existProduct->save() ;

    // //     }else{

    // //         Favori::create(['user_id'=>auth()->user()->id,
    // //                         'product_id'=>$product->id
    // //                         ]);
    // //     }

    // //     // else add the product
    // //     return redirect()->route('favori.lister');
    // // }
    
    //
}
