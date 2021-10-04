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
    </div>
@endsection