<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientRepository
{

    public static function allData()
    {
        return Client::all();
    }

    public static function insertOrChangeData(Request $request, $id = null)
    {
        return Client::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'email' => $request->email
        ]);
    }

    public static function findData($id)
    {
        return Client::findOrFail($id);
    }

    public static function removeData($id)
    {
        $client =  Client::findOrFail($id);
        $client->delete();
    }
}
