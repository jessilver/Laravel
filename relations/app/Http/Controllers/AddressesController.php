<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Address;
use Illuminate\Http\Request;


class AddressesController extends Controller
{
    public function index(Request $request)
    {
        $user = Address::all();

        return $user;
    }

    public function showOne(Request $request, $id)
    {
        $addres = Address::find($request->id);
        return $addres;
    }

    public function store(Request $request)
    {
        $addres = new Address();
        $addres->address = $request->address;
        $addres->save();
        return $addres;
    }

    public function update(Request $request)
    {
        $addres = Address::find($request->id);
        $addres->address = $request->address ?? $addres->address;
        $addres->save();

        return $addres;
    }
}
