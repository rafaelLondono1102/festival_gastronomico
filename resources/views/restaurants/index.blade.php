@extends('layouts.app')
@section('content')
    <table> 
        @foreach ($restaurant as $restaurant)
            <tr>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->description }}</td>
            </tr>
        @endforeach
    </table>
@endsection
