<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Facture;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($clientId)
    {
        $factures = Facture::where('client_id', $clientId)->get();
        return response()->json($factures);
    }
    public function monf($id)
    {
        $facture =  Facture::where('client_id', $clientId)->first();
        return response()->json([
            'status' => 200,
            'facture' => $facture
        ]);
    }


    public function login(Request $request) {
        
    
        
    
        $fac = Facture::where('code_Client', $request->code_Client)->first();
    
        if(!$client) {
            return response()->json([
                'message' => 'Informations incorrectes'
            ], 401);
        }
    
        // Assuming $name is a valid field in your Client model
        $clientinfo = $client;
    
        $token = $client->createToken('myapptoken')->plainTextToken;
    
        return response()->json([
            'status' => 200,
            'client' => $clientinfo, 
            'token' => $token,
            'message' => 'Connecté avec succès!',  
        ]);
    }

    public function add(Request $request) {
        $fields = $request->validate([
            'client_id'=> 'required|string',
            'montant_a_payer'=> 'required|string',
            'reste_a_payer'=> 'required|string',
            'prise_en_charge'=> 'required|string',
            'echeance'=> 'required|string',
            
        ]);

        $facture = Facture::create([
            'client_id' => $fields['client_id'],
            'montant_a_payer' => $fields['montant_a_payer'],
            'reste_a_payer' => $fields['reste_a_payer'],
            'prise_en_charge' => $fields['prise_en_charge'],
            'echeance' => $fields['echeance'],
        ]);

        

        $response = [
            'Facture' => $facture,
            
        ];

        return response($response, 201);
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
