<head>
     <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.app')

@if (Auth::check())
@include('includes.header_logged_in')
@else
@include('includes.header')
@endif

<div class="home-page">
  <div class="banner">
    <div class="container">
      <h1 class="logo-font">conduit</h1>
      <p>A place to share your knowledge.</p>
    </div>
  </div>

  <div class="container page">
    <div class="row">
      <div class="col-md-9">
        <div class="feed-toggle">
          <ul class="nav nav-pills outline-active">
            <li class="nav-item">
              <a class="nav-link" href="">Your Feed</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="">Global Feed</a>
            </li>
          </ul>
        </div>
        @foreach($conduit as $con)
        <div class="article-preview">
          <div class="article-meta">
          <a href="/profile/eric-simons">
            <img src="{{ asset('storage/demo-avatar.png') }}" alt="Image">
          </a>
            <div class="info">
              <a href="/profile/eric-simons" class="author">{{$con->author}}</a>
              <span class="date">{{ \Carbon\Carbon::parse($con->timestamp)->format('F j, Y') }}</span>
            </div>
            <button class="btn btn-outline-primary btn-sm pull-xs-right">
              <i class="ion-heart"></i> {{$con->heart}}
            </button>
          </div>
          <a href="{{route('article_headline',$con->headline)}}" class="preview-link">
            <h1>{{$con->headline}}</h1>
            <p>{{$con->headline2}}</p>
            <span>Read more...</span>
            <ul class="tag-list">
                @foreach(explode(':', $con->tags) as $tag)
                    <li class="tag-default tag-pill tag-outline">{{ $tag }}</li>
                @endforeach
            </ul>
          </a>
        </div>

        @endforeach
        {{ $conduit->links() }}
        
      </div>

      <div class="col-md-3">
        <div class="sidebar">
          <p>Popular Tags</p>

          <div class="tag-list">
            <a href="" class="tag-pill tag-default">programming</a>
            <a href="" class="tag-pill tag-default">javascript</a>
            <a href="" class="tag-pill tag-default">emberjs</a>
            <a href="" class="tag-pill tag-default">angularjs</a>
            <a href="" class="tag-pill tag-default">react</a>
            <a href="" class="tag-pill tag-default">mean</a>
            <a href="" class="tag-pill tag-default">node</a>
            <a href="" class="tag-pill tag-default">rails</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.footer')