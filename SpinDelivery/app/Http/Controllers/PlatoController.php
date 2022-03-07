<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlatoRequest;
use App\Http\Requests\UpdatePlatoRequest;
use App\Models\Plato;
use App\Models\Restaurante;
use Auth;

class PlatoController extends Controller
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
    public function create($restaurante)
    {
        return view('platos.create', compact('restaurante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlatoRequest $request, $restaurante)
    {
        $user = Auth::user();

        
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
         $plato = (new Plato)->firstOrCreate([
            'nombre' => $request->nombre
        ], [
            'restaurante_id' => $restaurante,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'ingredientes'=> $request->ingredientes,
            'alergenos'=> $request->alergenos,
            'es_vegano'=> $request->es_vegano === 'on' ? 1 : 0,
            'foto'=> $request->foto,
        ]);
        if (isset($request->image)) {
            $name = $request->file('image')->getClientOriginalName();
            $full_path = $request->file('image')->store('public/images');
            $path = 'storage/' . substr($full_path, 7);
            $plato->foto = $path;
            $plato->save();
        }
        if($plato->wasRecentlyCreated){
             return redirect('/restaurantes/' . $restaurante);
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function show($restaurante , Plato $plato)
    {
        $user = Auth::user();

        
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login');
        }
         $restaurante = Restaurante::find($plato->restaurante_id);
         return view('platos.show', compact('plato','restaurante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit($restaurante, Plato $plato)
    {
        $restaurante = Restaurante::find($plato->restaurante_id);
         if($restaurante->user_id == auth()->user()->id || auth()->user()->rol == 'administrador'){
         return view('platos.edit', compact('plato','restaurante'));
        }
        return abort(401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlatoRequest  $request
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlatoRequest $request,$restaurante , Plato $plato)
    {
        $plato->update(['nombre' => $request->nombre,
        'precio' => $request->precio,
        'descripcion' => $request->descripcion,
        'ingredientes' => $request->ingredientes,
        'alergenos' => $request->alergenos,
        'es_vegano' => $request->es_vegano === 'on' ? 1 : 0,
        ]);
        if (isset($request->image)) {
            $name = $request->file('image')->getClientOriginalName();
            $full_path = $request->file('image')->store('public/images');
            $path = 'storage/' . substr($full_path, 7);
            $plato->foto = $path;
            $plato->save();
        }
        return redirect()->route('platos.show',[$restaurante, $plato]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante, Plato $plato)
    {
        $plato->delete();
        return redirect('/restaurantes/' . $restaurante->id);
    }
}
