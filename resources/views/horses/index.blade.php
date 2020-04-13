@extends('layouts.app')

@section('content')
    <h1>Horses</h1>
    @if(count($horses) > 0)
        @foreach($horses as $horse)
            <div class='card'>
                <div class='row'>
                    <div class='col-md-4 col-sm-4'>
                        <img style="width: 100%" src="/storage/cover_images/{{$horse->cover_image}}" class="cardSize">
                    </div>
                    <div class='col-md-8 col-sm-8'>
                <h3><a href="/horses/{{$horse->id}}">{{$horse->barnName}}</a></h3>
                <small>Written on {{$horse->created_at}} by {{$horse->user->name}}</small>
            </div>
        </div>
    </div>
        @endforeach
        {{$horses->links()}}
    @else
    <p>No posts found..</p>
    @endif
@endsection()