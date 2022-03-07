<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Models\Restaurante;
use App\Models\User;
use Auth;

class PedidoController extends Controller
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
        $pedido = Pedido::where('user_id', auth()->user()->id)->first();
        
        return view('pedidos.show', compact('pedido'));
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
     * @param  \App\Http\Requests\StorePedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidoRequest  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
    
    public function validar($restaurante, Pedido $pedido){
        $pedido->validado = 1;
        $pedido->save();
        $restaurante = Restaurante::find($pedido->restaurante_id);
        return redirect()->route('Restaurante.showPedidos', $restaurante);
    }
    public function repartir($restaurante, Pedido $pedido){
        
        $repartidor = User::where('rol','repartidor')->where('estado', 'libre')->first();
        $restaurante = Restaurante::find($pedido->restaurante_id);
        if($repartidor){
            $pedido->estado = 'De camino';
            $pedido->repartidor_id = $repartidor->id;
            $repartidor->estado = 'ocupado';
            $pedido->llegada_estimada = Carbon::now()->addHour();
            $pedido->save();
            $repartidor->save();
            return redirect()->route('Restaurante.showPedidos', $restaurante);
        }
        
        
        return redirect()->route('Restaurante.showPedidos', $restaurante)->with('success', 'no hay repartidores actualmente disponibles :( ');
        
    }
    
    public function pedidosCliente($cliente){
        $user = Auth::user();

        
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
        $pedidos = Pedido::where('user_id', $cliente)->get();
        return view('cliente.pedidos',compact('pedidos'));
        
    }
    
    public function pedidoCliente($cliente, $pedido){
        $user = Auth::user();

        
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
        $pedido = Pedido::where('id', $pedido)->first();
        return view('cliente.pedido',compact('pedido'));
    }
    public function entregado(Pedido $pedido){
        $pedido->estado = 'Entregado';
        $pedido->save();
        return redirect()->route('Restaurante.showPedidos', $restaurante);
    }
    
}
