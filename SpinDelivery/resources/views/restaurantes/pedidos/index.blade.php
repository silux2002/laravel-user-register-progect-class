@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Comanda del Restaurante') }}</div>

                <div class="card-body">
                    @forelse($pedidos as $pedido)
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
                                <div class="my-2">
                                    @if( $pedido->llegada_estimada != null)
                                    <div class="text-right">
                                      Fecha estimada de llegada:
                                      <span style="color: #ffbe33">{{ $pedido->llegada_estimada }}</span>
                                    </div>
                                    @endif
                                </div>
                                <hr style="border:2px solid black;">
                            @foreach ($pedido->lineas as $linea)
                            <div class="col-12 my-2">
                                <div class="row">
                                <div class="d-flex flex-column col-5">
                                <div ><a class="text-info" href="{{ route('platos.show', [$linea->plato->restaurante_id, $linea->plato->id]) }}">{{ $linea->plato->nombre }}</a></div>
                                <div>
                                  <small>{{ $linea->plato->restaurante->nombre }}</small>
                                  
                                </div>
                              </div>
                              <div class="col-3">{{ $linea->anotaciones }}</div>
                              <div class="col-2">{{ $linea->cantidad }} uds.</div>
                              <div class="col-2">{{ $linea->precio }}€</div>
                              </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                        @empty
                        <div class="col-12 my-2">No hay por ahora ningun pedido ...</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



