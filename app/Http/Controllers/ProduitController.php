<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Produit;
use App\Models\Contrat;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function adds($id)
    {
        // Assuming Client model is imported at the top
        $client = Client::where('client_id', $id)->first(); // Use first() instead of get() to get a single client
        
        if (!$client) {
            return response()->json(['status' => 'error', 'message' => 'Client not found'], 404);
        }
        
        $contrats = Contrat::where('client_id', $id)->get();
        
        foreach ($contrats as $contrat) {
            $produit = new Produit([
                'reference_contrat' => $contrat->id,
                'reference' => $client->tel,
                'nom_commercial' => 'your_nom_commercial_value_here',
                'etat' => 'your_etat_value_here',
                'etat_service' => 'your_etat_service_value_here',
            ]);
        
            $produit->save();
        }
        
        return response()->json([
            'status' => 200,
            'message' => 'Produits created successfully',
        ]);
    }
    





    public function add(Request $request) {
        $fields = $request->validate([
            'reference_contrat'=> 'required|string',
            'ref_produit_contrat'=> 'required|string',
            'reference'=> 'required|string',
            'nom_commercial'=> 'required|string',
            'etat'=> 'required|string',
            'etat_service'=> 'required|string',
        ]);
    
        $produit = Produit::create([
            'reference_contrat' => $fields['reference_contrat'],
            'ref_produit_contrat' => $fields['ref_produit_contrat'],
            'reference' => $fields['reference'],
            'nom_commercial' => $fields['nom_commercial'],
            'etat' => $fields['etat'],
            'etat_service' => $fields['etat_service'],
        ]);
    
        $response = [
            'produit' => $produit,
        ];
    
        return response($response, 201);
    }

    public function monc($id)
    {
        $contract = Contrat::where('client_id', $id)->get();
        return response()->json([
            'status' => 200,
            'contract' => $contract
        ]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
