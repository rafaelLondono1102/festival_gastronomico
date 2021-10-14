@extends('layouts.app')
@section('content')
<div class="container">
   <h1>Menu categorias</h1>
   <br>
   <a class="btn btn-primary" title="Crear nuevo restaurante" href="{{ route('categories.create') }}">Crear</a>
   <br>
   <br>
   <br>
   <ul class="list-group list-group-flush">
       @foreach ($categories as $category)
            <li class="list-group-item h4">
                <a href="{{route('categories.show',$category->id)}}" title="ver esta categoria">{{ $category->name }}</a>
                <div class="btn-group" role="group">
                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-warning mt-3">Editar</a>
                    {{ Form::open(['route' => ['categories.destroy',$category->id], 
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