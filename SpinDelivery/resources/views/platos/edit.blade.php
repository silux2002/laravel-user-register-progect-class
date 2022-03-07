@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('edit Ptato') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('platos.update', [$restaurante, $plato]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="nombre" value="{{$plato->nombre }}"   autocomplete="nombre" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('descripcion') }}</label>

                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{$plato->descripcion }}"   autocomplete="descripcion" autofocus>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('precio') }}</label>

                            <div class="col-md-6">
                                <input id="precio" type="number" step="0.01" min="0" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{$plato->precio }}"   autocomplete="precio" autofocus>
                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alergenos" class="col-md-4 col-form-label text-md-end">{{ __('alergenos') }}</label>

                            <div class="col-md-6">
                                <input id="alergenos" type="text" class="form-control @error('alergenos') is-invalid @enderror" name="alergenos" value="{{$plato->alergenos }}"   autocomplete="alergenos" autofocus>

                                @error('alergenos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="es_vegano" class="col-md-4 col-form-label text-md-end">{{ __('Es Vegano') }}</label>

                            <div class="col-md-6">
                                <input id="es_vegano" type="checkbox" class="form-check-label @error('es_vegano') is-invalid @enderror" name="es_vegano" autocomplete="es_vegano" style="margin-top:5px;" @if ($plato->es_vegano) checked @endif >

                                @error('es_vegano')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alergenos" class="col-md-4 col-form-label text-md-end">{{ __('foto') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="image" placeholder="Choose image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{$plato->foto }}" autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ingredientes') }}</label>

                            <div class="col-md-6">
                                <textarea id="ingredientes" name="ingredientes" class="form-control @error('name') is-invalid @enderror" rows="3" rows="4" cols="50">{{$plato->ingredientes }}</textarea>
                                @error('ingredientes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
