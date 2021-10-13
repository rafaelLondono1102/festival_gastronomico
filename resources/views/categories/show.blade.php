@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>
            <small class="text-muted">Categoria</small>
            {{$category->name}}
        </h3>
       <p>{{ $category->description }}</p>
       
       <div class="btn-group" role="group">
            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-warning mt-3">Editar</a>
            {{ Form::open(['route' => ['categories.destroy',$category->id], 'method' => 'delete','onsubmit' => 'xxxxxx']) }}
                <button type="submit" class="btn btn-danger mt-3">Remover</button>
            {!! Form::close() !!}
       </div>
    </div>
@endsection