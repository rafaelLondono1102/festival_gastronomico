@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Nueva Categoria</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
                
            </div>
        @endif

        {{ Form::open(['route' => 'categories.store','method' => 'post']) }}
            @include('categories.form_field')

            {{ Form::submit('Crear',['class' => 'btn btn-primary']) }}
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
        {!! Form::close() !!}
        
    </div>
@endsection