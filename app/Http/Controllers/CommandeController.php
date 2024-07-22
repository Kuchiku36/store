<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Commande;
use App\Models\CommandeItem;
use Illuminate\Http\Request;
use Illuminate\Console\Command;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('commande.lister',compact('commandes')) ;    
    }
    // création de la commande et ajout des éléments du panier dans CommandeItem
    public function create()
    {
        //création de la commande 
        $commande = Commande::create(['user_id'=>auth()->user()->id,
                                        'numero'=>0,
                                        'total' => 0 ]);
        //lexture du panier
        $paniers = Panier::where('user_id',auth()->user()->id)->get();
        
        if(count($paniers) == 0 ){return 'vide ' ;}

        $total = 0 ;
        foreach ($paniers as $panier)
        {
            $commandeId = $commande->id ; //identifiant de la commande 
            $productId = $panier->product_id ; //identifiant du produit 
            $quantite = $panier->quantite ; //nombre de produit
            $price = $panier->product->price ; //prix du produit 
            $total += $price * $quantite ;
            
            // ajout dans la table CommandeItem
            CommandeItem::create(['commande_id' => $commandeId,    // peut être simplifier en écrivant 'commande_id' => $commandeId->id ; 
            'product_id' => $productId,
            'quantite' => $quantite,
            'price' => $price]);
            
        }
        //mise a jour du total de la commande 
        $commande->update(['numero'=>9999,'total'=>$total]);
        $commande->save();
        //suppression du panier
        Panier::where('user_id',auth()->user()->id)->delete();
        return 'commander';
    }

    
    //
}
