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
                <img src="../images/{{ $restaurant->logo }}" width="100">
                <a href="{{route('restaurants.show',$restaurant->id)}}" title="Visitar este restaurante">{{ $restaurant->name }}</a>
                <div class="btn-group" role="group">
                    <a href="{{ route('restaurants.edit',$restaurant->id) }}" class="btn btn-warning mt-3">Editar</a>
                    {{ Form::open(['route' => ['restaurants.destroy',$restaurant->id], 
                    'method' => 'delete',
                    'onsubmit' => 'return confirm(\'Esta segura que desea remover el restaurante\nEsta accion no se puede deshacer\')'
                    ]) }}
                        <button type="submit" class="btn btn-danger mt-3">Remover</button>
                   {!! Form::close() !!}
                </div>
               
            </li>
       @endforeach
    
  </ul>
</div>
@endsection
