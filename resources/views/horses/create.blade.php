@extends('layouts.app')

@section('content')
    <h1>Create Horse</h1>
    {!! Form::open(['action' => 'HorsesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{Form::label('barnName', 'Horse Barn Name')}}
                {{Form::text('barnName', '', ['class' => 'form-control', 'placeholder' => 'Horse Barn Name'])}}
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                {{Form::label('showName', 'Horse Show Name')}}
                {{Form::text('showName', '', ['class' => 'form-control', 'placeholder' => 'Horse Show Name'])}}
            </div>
        </div>    
    </div>  
    <div class="row">
        <div class="col">  
            <div class="form-group">
                {{Form::label('gender', 'Horse Gender')}}
                {{Form::text('gender', '', ['class' => 'form-control', 'placeholder' => 'Horse Gender'])}}
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                {{Form::label('weight', 'Horse Weight')}}
                {{Form::number('weight', '', ['class' => 'form-control', 'placeholder' => 'Horse Weight'])}}
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{Form::label('breed', 'Horse Breed')}}
                {{Form::text('breed', '', ['class' => 'form-control', 'placeholder' => 'Horse Breed'])}}
            </div>
        </div>
        <div class="col">  
            <div class="form-group">
                {{Form::label('dob', 'Horse Date Of Birth')}}
                {{Form::date('dob', '', ['class' => 'form-control', 'id' => 'datepicker'])}}
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{Form::label('lastWorked', 'Horse Last Worked')}}
                {{Form::date('lastWorked', '', ['class' => 'form-control', 'id' => 'datepicker'])}}
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                {{Form::label('feed', 'Horse Feed Type')}}
                {{Form::text('feed', '', ['class' => 'form-control', 'placeholder' => 'Horse Feed Type'])}}
            </div>
        </div>
    </div>        
    <div class="form-group">
        {{Form::label('feedRecipe', 'Horse Feed Recipe')}}
        {{Form::textarea('feedRecipe', '', ['class' => 'form-control', 'placeholder' => 'Horse Feed Recipe'])}}
    </div>

        <div class="form-group">
            {{Form::label('colourMarkings', 'Horse Colour Markings')}}
            {{Form::textarea('colourMarkings', '', ['class' => 'form-control', 'placeholder' => 'Horse Colour Markings'])}}
        </div>
        <div class="form-group">
            {{Form::label('healthIssues', 'Horse Health Issues')}}
            {{Form::textarea('healthIssues', '', ['class' => 'form-control', 'placeholder' => 'Horse Health Issues'])}}
        </div>
        <div class="form-group">
            {{Form::label('pastAilments', 'Horse Past Ailments')}}
            {{Form::textarea('pastAilments', '', ['class' => 'form-control', 'placeholder' => 'Horse Past Ailments'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('workSchedule', 'Horse Work/Lesson Schedule')}}
            {{Form::textarea('workSchedule', '', ['class' => 'form-control', 'placeholder' => 'Horse Work/Lesson Schedule'])}}
        </div>
        <div class="form-group">
            {{Form::label('notes', 'Notes For Horse')}}
            {{Form::textarea('notes', '', ['class' => 'form-control', 'placeholder' => 'Notes For Horse'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <br>
    <br>
@endsection