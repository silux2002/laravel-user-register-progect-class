<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestauranteRequest;
use App\Http\Requests\UpdateRestauranteRequest;
use App\Models\Restaurante;
use App\Models\Plato;
use App\Models\Pedido;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Auth;

use DataTables;

class RestauranteController extends Controller
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
        $user = Auth::user();

        
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
        $restaurantes = Restaurante::all();
        return view('restaurantes.index', compact('restaurantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestauranteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestauranteRequest $request)
    {
        $restaurante = (new Restaurante)->firstOrCreate([
            'nombre' => $request->nombre
        ], [
            'user_id' => auth()->user()->id,
            'descripcion' => $request->descripcion,
            'direccion' => $request->direccion,
        ]);
        if($restaurante->wasRecentlyCreated){
            return 'creado nuevo';
        }else{
            return 'ya existe';
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurante $restaurante)
    {
        $user = Auth::user();

        
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
        //$restaurante = Restaurante::where('id', $restaurante)->first();
        $platos = Plato::where('restaurante_id',$restaurante->id)->get();
        return view('restaurantes.show', compact('restaurante', 'platos'));
    }
    
    public function showPedidos(Restaurante $restaurante){
        $user = Auth::user();
        
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
        $pedidos = Pedido::where('restaurante_id', $restaurante->id)->get();
        if($restaurante->user_id == auth()->user()->id || auth()->user()->rol == 'administrador'){
            return view('restaurantes.pedidos.index', compact('pedidos', 'restaurante'));
        }
        return abort(401);
        //dd($pedidos);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurante $restaurante)
    {    //dd($restaurante);
        //$restaurante = Restaurante::where('id', $restaurante)->first();
        if($restaurante->user_id == auth()->user()->id || auth()->user()->rol == 'administrador'){
            return view('restaurantes.edit',compact('restaurante'));
        }
        return abort(401);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestauranteRequest  $request
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestauranteRequest $request, Restaurante $restaurante)
    {
        $restaurante->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'direccion' => $request->direccion,
            ]);
            return redirect()->route('restaurantes.show',$restaurante);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante)
    {
        //
    }
    public function getRestaurante(Request $request)
    {
        $user = Auth::user();

        
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
        if ($request->ajax()) {
            $user = Auth::user();
            if($user->rol == 'administrador'){
                $data = Restaurante::all();
            }else{
                $data = Restaurante::where('user_id', $user->id)->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function listadoRestaurantes(){
        $user = Auth::user();

        
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
        return view('restaurantes.admin.index');
    }
}
