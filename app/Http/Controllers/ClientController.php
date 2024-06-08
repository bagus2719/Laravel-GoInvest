<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Clients::all();
        return view('clients.client', compact('clients'));
    }

    public function create()
    {
        $users = User::all();
        return view('clients.create-client', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        Clients::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function show($id)
    {
        $clients = Clients::findOrFail($id);
        return view('clients.show-client', compact('clients'));
    }

    public function edit($id)
    {
        $clients = Clients::findOrFail($id);
        $users = User::all();
        return view('clients.edit-client', compact('clients', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $clients = Clients::findOrFail($id);
        $clients->update($request->all());
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {
        $clients = Clients::findOrFail($id);
        $clients->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}