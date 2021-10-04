@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>
            <small class="text-muted">Restaurante</small>
            {{$restaurant->name}}
        </h3>
       Servimos en {{ $restaurant->city }} en el horario de {{ $restaurant->shedule ?? "Sin agenda definida"}}<br>
       @if ($restaurant->delivery == 'y')
            Tenemos domicilios al numero {{ $restaurant->phone}}<br>
        @else
            Contactenos al numero {{ $restaurant->phone}}<br>
       @endif
       <div class="btn-group" role="group">
            <a href="{{ route('restaurants.edit',$restaurant->id) }}" class="btn btn-warning mt-3">Editar</a>
            {{ Form::open(['route' => ['restaurants.destroy',$restaurant->id], 'method' => 'delete','onsubmit' => 'xxxxxx']) }}
                <button type="submit" class="btn btn-danger mt-3">Remover</button>
            {!! Form::close() !!}
       </div>
    </div>
@endsection