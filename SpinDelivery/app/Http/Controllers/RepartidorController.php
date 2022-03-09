<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Auth;

class RepartidorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function showRepartos(){
        $user = Auth::user();

        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
        $pedido = Pedido::where('repartidor_id', auth()->user()->id)->where('estado', 'De camino')->orderBy('id', 'DESC')->first();
        return view('repartidor.show', compact('pedido'));
    }
    
    public function cambiarestado(){
        $user = Auth::user();

        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
        if (Auth::user()->estado == "libre"){
            $user->estado = 'outservice';
            $user->save();
            return redirect()->route('repartidor.showRepartos');
        }else{
            $user->estado = 'libre';
            $user->save();
            return redirect()->route('repartidor.showRepartos');
        }
        
        
    }
}
