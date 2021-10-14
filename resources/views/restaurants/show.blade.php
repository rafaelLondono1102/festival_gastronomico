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
            Contactenos al numero {{ $restaurant->phone}}<br>
        <br>

       <div class="jumbotron">
           <h3>Cuentanos que opinas !</h3>
            {!! Form::open(['route' => ['comments.store'],'method' => 'post']) !!}
                <div class="mb-3">
                    {{ Form::label('comment','Comentario',['class' => 'form-label']) }}
                    {{ Form::textArea('comment',null,['class' => 'form-control']) }}
                    {{ Form::hidden('restaurant_id', $restaurant->id) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('score','Puntuacion',['class' => 'form-label']) }}
                    {{ Form::select('score', [1 => '1 estrella', 2 => '2 estrellas', 3 => '3 estrellas', 4 => '4 estrellas', 5 => '5 estrellas'],null,['class' => 'form-control']); }}
                </div>
                {{ Form::submit('Crear',['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
       </div>



        @foreach ($comments as $comment)
            <div class="row mt-3">
                <div class="col">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2">
                                <div class="fw-bold">
                                    <div class="row">
                                        <b>{{ $comment->user->name}}</b>
                                        @for ($i = 0; $i < $comment->score; $i++)
                                            <i class="fas fa-star"></i>  
                                        @endfor
                                    </div>
                                </div>
                                {{ $comment->comment }}
                            </div>
                            @if (Auth::check())
                                @if (Auth::user()->type == 'admin')
                                    {!! Form::open(['route' => ['comments.destroy',$comment->id],'method' => 'delete',
                                    'onsubmit' => 'return confirm(\'Esta segura que desea remover el restaurante\nEsta accion no se puede deshacer\')']) !!}
                                        <button type="submit" class="btn btn-danger mt-3" onsubmit="">Remover</button>
                                    {!! Form::close() !!}
                                @endif
                            @endif
                            
                            
                        </li>
                    </ol>
                </div>
            </div>
        @endforeach

            <div class="btn-group" role="group">
                @if (Auth::check())
                    @if (Auth::user()->type == 'admin' | Auth::user()->type == 'owner')
                        <a href="{{ route('restaurants.edit',$restaurant->id) }}" class="btn btn-warning mt-3">Editar</a>
                        {{ Form::open(['route' => ['restaurants.destroy',$restaurant->id], 'method' => 'delete','onsubmit' => 'xxxxxx']) }}
                            <button type="submit" class="btn btn-danger mt-3">Remover</button>
                        {!! Form::close() !!}
                    @endif
                @endif
                
                <a href="{{ URL::previous() }}" class="btn btn-primary mt-3">Volver</a>
            </div>  
       
       
    </div>
@endsection