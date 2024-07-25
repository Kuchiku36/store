<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Commande;
use Stripe\StripeClient;
use App\Models\CommandeItem;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

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
        //lecture du panier
        $paniers = Panier::where('user_id',auth()->user()->id)->get();
        
        //création de la commande 
        $commande = Commande::create(['user_id'=>auth()->user()->id,
                                        'numero'=>0,   
                                        'total' => 0 ]);

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
        // je vide le panier
        Panier::where('user_id',auth()->user()->id)->delete();

            $urlpaiment = $this->stripeCheckout($total, $commande->id) ;
        return redirect($urlpaiment);
    }

    public function stripeCheckout($total, $commandeId)
    {
        //parametrage de l'api
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        //url de confirmation de paiment
        $redirectUrl = route('commande.success') . '?session_id={CHECKOUT_SESSION_ID}';
        //création de la session de paiement stripe 
        $response =  $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'payment_method_types' => ['link', 'card'],
            'customer_email'=>auth()->user()->email ,
            'client_reference_id'=> $commandeId ,
            'line_items' => [
                [
                    'price_data'  => [
                        'product_data' => [
                            'name' => $commandeId,
                        ],
                        'unit_amount'  => 100 * $total,
                        'currency'     => 'USD',
                    ],
                    'quantity'    => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => false
        ]);

        // generation de l'url de paiment
        return $response['url'];
    }

    //control et validation de paiment 
    // public function success(Request $request)
    // {
    //     $stripe = new StripeClient(env('STRIPE_SECRET'));
    //     $session = $stripe->checkout->sessions->retrieve($request->session_id);
        
    //     if($session->payment_status==='paid' && $session->status==='complete')
    //     $commande = Commande::find($session->client_reference_id);

    //     $commande->update(['numero' => $session->payment_intent]);
    //     $commande->save();
    //     return redirect(route('commande.lister')) ;    
    // }
    
    public function webhook(Request $request)
    {
        if( $request->object === "checkout.session" &&
            $request->payment_status==='paid' && 
            $request->status==='complete')
        
            $commande = Commande::find($request->client_reference_id);

        $commande->update(['numero' => $request->payment_intent]);
        $commande->save();
        return redirect(route('commande.lister')) ;    
        return 'ok' ;    
    }
    //
}
