<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientModel;

class ClientController extends Controller
{
    public function index($filtre  = 'client')
    {
        $data = ClientModel::orderBy($filtre, 'asc')->paginate(10);

        return view('component.client.client-list', $data);
    }

    public function adminIndex($filtre  = 'client')
    {
        $data = ClientModel::orderBy($filtre, 'asc')->paginate(10);

        return view('component.client.admin-client-list', $data);
    }

    public function validator(Request $request){
        return $request->validate([
            'client' => 'required',
            'statut' => 'required',
            'contact' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'adresse' => 'required',
        ]);
    }

    public function saveData($request, ClientModel $client){
        $client->client = $request->client;
        $client->statut = $request->statut;
        $client->contact = $request->contact;
        $client->whatsapp = $request->whatsapp;
        $client->email = $request->email;
        $client->adresse = $request->adresse;
        return  $client->save();
    }
    public function create(Request $request)
    {
        $client = new ClientModel();
        $clientController = new ClientController(); 
        $clientController->validator($request);
        $data = $clientController->saveData($request,$client);
        if ($data) {
            return redirect()->route('client')->with('success', 'Le produit a été créé avec succès');
       } else {
            return response()->json(['message' => 'Erreur lors de la création du produit']);
        }
    }

    public function show($id)
    {
        try {
            $data = ClientModel::findOrFail($id);
            return view('component.client.client-edit', ['data' => $data]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('client')->with('Error', 'Produit introuvable');
        }
    }

    public function update(Request $request, $id)
    {
        $client = ClientModel::findOrFail($id);
        $clientController = new ClientController();
        $clientController->validator($request);
        $data = $clientController->saveData($request,$client);
        if ($data) {
            return redirect()->route('client')->with('success', 'Le produit a été créé avec succès');
        } else {
            return response()->json(['message' => 'Erreur lors de la création du produit']);
        }
    }

    public function destroy($id)
    {
        ClientModel::where('id', $id)->delete();
        $data = ClientModel::latest()->paginate(10);
        return view('component.client.client-list', $data);
    }
}
