@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('repartir pedido') }}</div>
                    @if (Auth::user()->estado == "libre")
                        <a class="btn btn-warning" href="{{route('repartidor.cambiarestado')}}">Terminar de trabajar</a>
                    @else
                        @if (Auth::user()->estado == "ocupado")
                            <p class="btn btn-danger">todavía no as entregado el pedido</p>
                        @else
                            <a class="btn btn-primary" href="{{route('repartidor.cambiarestado')}}">Empezar a trabajar</a>
                        @endif
                    @endif
                    
                <div class="card-body">
                    @if($pedido != null)
                        <div class="row">
                            <div class="col-9">    
                            Pedido Nº {{ $pedido->id }}
                            Cliente {{$pedido->user->name}}
                            {{$pedido->user->direccion}}
                            </div>
                            <div class="col-3">
                            <form action="{{route('repartidor.entregado', $pedido)}}">
                                <input type="submit" value="Marcar Entregado"/>
                            </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection