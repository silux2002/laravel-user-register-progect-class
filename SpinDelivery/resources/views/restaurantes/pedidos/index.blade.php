@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Restaurante') }}</div>

                <div class="card-body">
                    @foreach($pedidos as $pedido)
                        <div class="row">
                            <div class="col-8"><a>pedido: {{$pedido->id}}</a></div>
                            <div class="col-4">
                                @if($pedido->validado == 0)
                                <a class="btn btn-success" href="{{route('Pedido.validar',[$restaurante, $pedido])}}">Validar</a>
                                @else
                                 <a class="btn btn-warning" href="{{route('Pedido.repartir',[$restaurante, $pedido])}}">Repartir</a>
                                @endif
                                @if (session()->get('success'))
                                
                                        {{ session()->get('success') }}
                                
                                
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



