<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLineaPedidoRequest;
use App\Http\Requests\UpdateLineaPedidoRequest;
use App\Models\LineaPedido;
use App\Models\Pedido;
use App\Models\Plato;
use Auth;

class LineaPedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreLineaPedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLineaPedidoRequest $request, $plato)
    {
        $user = Auth::user();

        
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
        $plato = Plato::find($plato);
        //dd($plato);
        
        $pedido = (new Pedido)->firstOrCreate([
            'user_id' => auth()->user()->id,
            'validado' => 0,
            'restaurante_id' => $plato->restaurante_id,
        ], [
            'precio' => 0,
            
        ]);
        
        $lineaPedido = (new LineaPedido)->firstOrCreate([
            'pedido_id' => $pedido->id,
            'plato_id' => $plato->id,
        ], [
            'precio' => $plato->precio * $request->cantidad,
            'cantidad' => $request->cantidad,
            'anotaciones' => $request->anotaciones,
        ]);
        if(!$lineaPedido->wasRecentlyCreated){
            $lineaPedido->precio = $plato->precio * $request->cantidad;
            $lineaPedido->cantidad = $request->cantidad;
            $lineaPedido->anotaciones = $request->anotaciones;
            $lineaPedido->save();
        }
        
        //dd($pedido->lineas());
        $totalprecio = 0;
        foreach ($pedido->lineas as $linea) {
            $totalprecio += $linea->precio;
        }
        $pedido->precio = $totalprecio;
        $pedido->save();
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function show(LineaPedido $lineaPedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function edit(LineaPedido $lineaPedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLineaPedidoRequest  $request
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLineaPedidoRequest $request, LineaPedido $lineaPedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(LineaPedido $lineaPedido)
    {
        //
    }
}
