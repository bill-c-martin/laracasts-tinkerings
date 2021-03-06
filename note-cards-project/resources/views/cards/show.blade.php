@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{$card->title}}</h1>
            <ul class="list-group">
                @foreach($card->notes as $note)
                    <li class="list-group-item">
                        {{ $note->body }}
                        <a href="#">- {{ $note->user->username }}</a>
                        <a href="/notes/{{ $note->id }}/edit" class="pull-right">edit</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <h3>Add a New Note</h3>

        @if(count($errors))
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif()

        <form method="POST" action="/cards/{{ $card->id }}/notes">
            {{ csrf_field() }}

            <div class="form-group">
              <textarea name="body" class="form-control">{{ old('body') }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Note</button>
            </div>
        </form>
    </div>
@stop