<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    public function index(Request $request)
    {
        $user = Address::all();

        return $user;
    }
}
