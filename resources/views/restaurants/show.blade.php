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
        <br>
        @foreach ($comments as $comment)
            <div class="row">
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
                        </li>
                    </ol>
                </div>
                
            </div>
        @endforeach

            <div class="btn-group" role="group">
                @if (Auth::user()->type == 'admin' | Auth::user()->type == 'owner')
                    <a href="{{ route('restaurants.edit',$restaurant->id) }}" class="btn btn-warning mt-3">Editar</a>
                    {{ Form::open(['route' => ['restaurants.destroy',$restaurant->id], 'method' => 'delete','onsubmit' => 'xxxxxx']) }}
                        <button type="submit" class="btn btn-danger mt-3">Remover</button>
                    {!! Form::close() !!}
                @endif
                <a href="{{ URL::previous() }}" class="btn btn-primary mt-3">Volver</a>
            </div>  
       
       
    </div>
@endsection