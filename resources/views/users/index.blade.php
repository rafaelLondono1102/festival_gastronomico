@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Mis Usuarios</h1>
   <br>
   <a class="btn btn-primary" title="Crear nuevo usuario" href="{{ route('users.create') }}">Crear</a>
   <br>
   <br>
   <br>
   <ul class="list-group list-group-flush">
       @foreach ($users as $user)
            <li class="list-group-item h4">
                <div class="btn-group" role="group">
                    <ul>{{ $user->name }}</ul>
                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning ml-2">Editar</a>
                    {{ Form::open(['route' => ['users.destroy',$user->id], 
                    'method' => 'delete',
                    'onsubmit' => 'return confirm(\'Esta seguro que desea remover el usuario\nEsta accion no se puede deshacer\')'
                    ]) }}
                        <button type="submit" class="btn btn-danger ml-2">Remover</button>
                   {!! Form::close() !!}
                </div>
               
            </li>
       @endforeach
    
  </ul>
</div>
@endsection
