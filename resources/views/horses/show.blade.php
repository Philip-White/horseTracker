@extends('layouts.app')

@section('content')

    <!--
    <h1>{{$horse->barnName}}</h1>
    <div>
        {!! $horse->showName !!}
        <br>
        <h1>{{$horse->gender}}</h1>
        <h1>{{$horse->weight}}</h1>
        <h1>{{$horse->colourMarkings}}</h1>
        <h1>{{$horse->breed}}</h1>
        <h1>{{$horse->dob}}</h1>
        <h1>{!! $horse->healthIssues !!}</h1>
        <h1>{!!$horse->pastAilments!!}</h1>
        <h1>{{$horse->lastWorked}}</h1>
        <h1>{!!$horse->workSchedule!!}</h1>
        <h1>{{$horse->feed}}</h1>
        <h1>{{$horse->feedRecipe}}</h1>
        <h1>{!!$horse->notes!!}</h1>
    -->



    <div class="card" style="width: auto;">
        <img src="/storage/cover_images/{{$horse->cover_image}}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">{{$horse->barnName}}</h5>
          <p style="text-align: center;"><button class="btn1 btn btn-primary">Stats</button>
            <button class="btn2 btn btn-primary">Health</button></p>
            <div id="stats">
                <br>
                <br>
          <div id=""class="grid-container">
                <div class="grid-item blue">Barn Name: </div>
                <div class="grid-item white">{!! $horse->barnName !!}</div>
                <div class="grid-item blue">Show Name: </div>  
                <div class="grid-item white">{!! $horse->showName !!}</div>
                <div class="grid-item blue">Gender:</div>
                <div class="grid-item white">{!! $horse->gender !!}</div>  
                <div class="grid-item blue">Weight in lb:</div>
                <div class="grid-item white">{!! $horse->weight !!}</div>
                <div class="grid-item blue">Breed:</div>  
                <div class="grid-item white">{!! $horse->breed !!}</div>
                <div class="grid-item blue">DOB:</div>  
                <div class="grid-item white">{!! $horse->dob !!}</div>
                <div class="grid-item blue">Last Worked:</div>  
                <div class="grid-item white">{!! $horse->lastWorked !!}</div>
                <div class="grid-item blue">Feed:</div>  
                <div class="grid-item white">{!! $horse->feed !!}</div>
           </div>
           <br>
           <br>
        </div><!--stats-->

                <div id="health">
                    <h5>Colour Markings</h5>
                        <div class="healthInfo">{!! $horse->ColourMarkings !!}</div>
                        <h5>Health Issues</h5>
                            <div class="healthInfo">{!! $horse->healthIssues !!}</div>
                            <h5>Past Ailments</h5>
                                <div class="healthInfo">{!! $horse->pastAilments !!}</div>
                                
                                    <h5>Work schedule</h5>
                                        <div class="healthInfo">{!! $horse->workSchedule !!}</div>
                                        <h5>Feed Recipe</h5>
                                            <div class="healthInfo">{!! $horse->feedRecipe !!}</div>
                                            <h5>Notes</h5>
                                                <div class="healthInfo">{!! $horse->notes !!}</div>
                                                <br>
                                                <br>
                </div>

                   
      </div>
    </div>
    <hr>
    <small>Horse Created at {{$horse->created_at}} by {{$horse->user->name}}</small>
    <hr>
    @if(!Auth::guest())
    @if(Auth::user()->id == $horse->user_id)
    <a href="/horses/{{$horse->id}}/edit" class="btn btn-primary">Edit</a>
        {!! Form::open(['action' => ['HorsesController@destroy', $horse->id], 'method' => 'POST', 'class' =>'float-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!}
        @endif
        <br>
        <br>
    @endif
@endsection
