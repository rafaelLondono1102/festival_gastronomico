@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>
            <small class="text-muted">Restaurante</small>
            {{ $restaurant->name }}
        </h3>
        <img src="../images/{{ $restaurant->logo }}" width="150" />
        <br>
        Sobre nosotros: {{ $restaurant->description }}
        <br>
        Estamos ubicados en: {{ $restaurant->city }} 
        <br>
        Abrimos a partir de las: {{ $restaurant->schedule ?? "Sin agenda definida"}}
        <br>
        @if ($restaurant->delivery == 'y')
            Tenemos domicilios al numero: {{ $restaurant->phone}}<br>
        @else
            Contactenos al numero: {{ $restaurant->phone }}<br>
        @endif
        <br>
        Siguenos en Nuestras Redes Sociales:
        <br>
        <a href="{{$restaurant->facebook}}">Facebook</a>
        <a href="{{$restaurant->twitter}}">Twitter</a>
        <a href="{{$restaurant->instagram}}">Instagram</a>
        <a href="{{$restaurant->youtube}}">Youtube</a>
        <br>
        <div class="btn-group" role="group">
            <a href="{{ route('restaurants.edit',$restaurant->id) }}" class="btn btn-warning mt-3">Editar</a>
            {{ Form::open(['route' => ['restaurants.destroy',$restaurant->id], 'method' => 'delete','onsubmit' => 'xxxxxx']) }}
                <button type="submit" class="btn btn-danger mt-3">Remover</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection