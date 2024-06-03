<?php

namespace App\Http\Controllers;

use App\Models\DemandeMigration;
use App\Models\DemandeTransfertLigne;
use Illuminate\Http\Request;

class DemandeTransfertLigneController extends Controller
{
    public function add(Request $request, $clientId) {
        $fields = $request->validate([
            'adsl_num' => 'required|string',
            'new_num_tel' => 'required|string',
            'state_line_prop' => 'required|boolean',
            'nic' => 'nullable|string',
            'current_address' => 'required|string',
            'new_address' => 'required|string',

        ]);

        $fields['Ticket'] = uniqid();  
        $fields['Previous_Number'] = $fields['prev_num'];
        $fields['New_Number'] = $fields['new_num_tel'];
        $fields['State'] = 'In progress';  
        $fields['created_at'] = now();
        $fields['Remarque'] = ' ';
        $fields['client_id'] = $clientId;

        try {
            // Create a new demande transfert ligne with the validated data
            $demandeTransfertLigne = DemandeTransfertLigne::create($fields);
        
            // Return a success response with the newly created demande transfert ligne
            return response()->json(['DemandeTransfertLigne' => $demandeTransfertLigne], 201);
        } catch (\Exception $e) {
            // Handle any exceptions that occur during creation
            return response()->json(['message' => 'Failed to create DemandeTransfertLigne', 'error' => $e->getMessage()], 500);
        }
    }

    public function history($clientId) {
        $Line = DemandeTransfertLigne::where('client_id', $clientId)
            ->select(['Ticket', 'Previous_Number', 'New_Number', 'created_at', 'State', 'Remarque'])
            ->get();
        return response()->json([
            'status' => 200,
            'Line' => $Line
        ]);
    }
}