@extends('layouts.app')

@section('content')
  <a href="/posts" class="btn btn-default">Go back</a>

  <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
  <br><br>
    <div class="">
      {!!$post->body!!}
    </div>
    <hr>
    <small>Written in {{$post->created_at}}  by {{$post->user->name}}</small>
    <hr>

    @if(!Auth::guest())
       {{-- Untuk membuat agar yang mengakses yang sesuai dengan id usernya --}}
      @if(Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

        {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
      @endif
  @endif
@endsection
