@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('repartir') }}</div>
                
                <div class="card-body">
                    Pedido Nº {{ $pedido->id }}
                    Cliente {{$pedido->user->name}}
                    {{$pedido->user->direccion}}
                    <form action="{{route('repartidor.entregado', $pedido)}}">
                        <input type="submit" value="Submit"/>
                    </form>
                        <div class="row">
                            <div class="col-4">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection