@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('cliente') }}</div>
                <div class="col-8"><a>pedido: {{$pedido->id}}</a></div>
                            <div class="col-4">
                                
                            </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                            </div>
                        </div>
                        @foreach($pedido->lineas as $linea)
                        <div class="row">
                            <div class="col-8"><a>linea: {{$linea->id}}</a></div>
                            <div class="col-4">
                                {{$linea}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection