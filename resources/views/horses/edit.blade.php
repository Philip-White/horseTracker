@extends('layouts.app')

@section('content')
    <h1>Edit Horse</h1>
    {!! Form::open(['action' => ['HorsesController@update', $horse->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{Form::label('barnName', 'Horse Barn Name')}}
                {{Form::text('barnName', $horse->barnName, ['class' => 'form-control', 'placeholder' => $horse->barnName])}}
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                {{Form::label('showName', 'Horse Show Name')}}
                {{Form::text('showName', $horse->showName, ['class' => 'form-control', 'placeholder' => $horse->showName])}}
            </div>
        </div>    
    </div>  
    <div class="row">
        <div class="col">  
            <div class="form-group">
                {{Form::label('gender', 'Horse Gender')}}
                {{Form::text('gender', $horse->gender, ['class' => 'form-control', 'placeholder' => $horse->gender])}}
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                {{Form::label('weight', 'Horse Weight')}}
                {{Form::number('weight', $horse->weight, ['class' => 'form-control', 'placeholder' => $horse->weight])}}
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{Form::label('breed', 'Horse Breed')}}
                {{Form::text('breed', $horse->breed, ['class' => 'form-control', 'placeholder' => $horse->breed])}}
            </div>
        </div>
        <div class="col">  
            <div class="form-group">
                {{Form::label('dob', 'Horse Date Of Birth')}}
                {{Form::date('dob', $horse->dob, ['class' => 'form-control', 'id' => 'datepicker'])}}
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{Form::label('lastWorked', 'Horse Last Worked')}}
                {{Form::date('lastWorked', $horse->lastWorked, ['class' => 'form-control', 'id' => 'datepicker'])}}
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                {{Form::label('feed', 'Horse Feed Type')}}
                {{Form::text('feed', $horse->feed, ['class' => 'form-control', 'placeholder' => $horse->feed])}}
            </div>
        </div>
    </div>        
    <div class="form-group">
        {{Form::label('feedRecipe', 'Horse Feed Recipe')}}
        {{Form::textarea('feedRecipe', $horse->feedRecipe, ['class' => 'form-control'])}}
    </div>

        <div id="ColourMarkings" class="form-group">
            {{Form::label('colourMarkings', 'Horse Colour Markings')}}
            {{Form::textarea('colourMarkings', $horse->ColourMarkings, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('healthIssues', 'Horse Health Issues')}}
            {{Form::textarea('healthIssues', $horse->healthIssues, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('pastAilments', 'Horse Past Ailments')}}
            {{Form::textarea('pastAilments', $horse->pastAilments, ['class' => 'form-control'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('workSchedule', 'Horse Work/Lesson Schedule')}}
            {{Form::textarea('workSchedule', $horse->workSchedule, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('notes', 'Notes For Horse')}}
            {{Form::textarea('notes', $horse->notes, ['class' => 'form-control'])}}
        </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <br>
    <br>
@endsection