@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Search for Posts</h1>
    {!! Form::open(['method' => 'GET', 'action' => 'PostController@search']) !!}

      <div class="input-group">
        {!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => 'Search for a post...', 'name' => 'q']) !!}
        <span class="input-group-btn">
          {!! Form::submit('Search Post', ['class' => 'btn btn-primary', 'name' => 'submit']) !!}
        </span>
      </div>
    {!! Form::close() !!}
    <hr />

    @foreach ($results as $post)
      <div class="row" style="margin-top: 20px;">
        <div class="col-md-8">
          <a href="{{ route('posts.show', $post->id) }}"><h3>{{ $post->title }}</h3></a>
        </div>
        <div class="col-md-4">
          @if ($post->published)
            <h4><span class="label label-success pull-right">PUBLISHED</span><h4>
          @else
            <h4><span class="label label-default pull-right">DRAFT</span><h4>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p>
            {{ str_limit($post->content, 250) }}
          </p>
        </div>
      </div>
    @endforeach

    @if (count($results) > 0)
      <hr />

      <div class="text-center">
        {{ $results->links() }}
      </div>
    @endif
  </div>
@endsection
