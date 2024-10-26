<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index(Request $request)
    {
        return Pedido::all();
    }

    public function showOne(Request $request)
    {
        $pedido = Pedido::find($request->id);
        $pedido['user'] = $pedido->user;
        $pedido['address'] = $pedido->address;

        return $pedido;
    }

    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->title = $request->title;
        $pedido->description = $request->description;
        $pedido->valor = $request->valor;
        $pedido->save();

        return $pedido;
    }

    public function update(Request $request)
    {
        $pedido = Pedido::find($request->id);
        $pedido->user_id = $request->user_id ?? $pedido->user_id;
        $pedido->address_id = $request->address_id ?? $pedido->address_id;
        $pedido->title = $request->title ?? $pedido->title;
        $pedido->description = $request->description ?? $pedido->description;
        $pedido->valor = $request->valor ?? $pedido->valor;
        $pedido->save();

        return $pedido;
    }

    public function showAddresses(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        return $pedido->address;
    }

    public function showUsers(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        return $pedido->user;
    }
}
