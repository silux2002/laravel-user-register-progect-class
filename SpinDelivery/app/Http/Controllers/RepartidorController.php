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
        $pedido = Pedido::where('repartidor_id', auth()->user()->id)->where('estado', 'De camino')->first();
        return view('repartidor.show', compact('pedido'));
    }
}
