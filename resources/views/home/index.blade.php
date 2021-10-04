@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Mis restaurantes</h1>
   <br>
   <a class="btn btn-primary" title="Crear nuevo restaurante" href="{{ route('restaurants.create') }}">Crear</a>
   <br>
   <br>
   <br>
   <ul class="list-group list-group-flush">
       @foreach ($restaurants as $restaurant)
            <li class="list-group-item h4">
               <!-- TODO: agregar el enlace a ver restaurante de propietario -->
                <a href="" title="Visitar este restaurante">{{ $restaurant->name }}</a>
            </li>
       @endforeach
    
  </ul>
</div>
@endsection
