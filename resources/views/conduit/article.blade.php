@extends('layouts.app')

@if (Auth::check())
    @include('includes.header_logged_in')
@else
    @include('includes.header')
@endif


<div class="article-page">
  <div class="banner">
    <div class="container">
      <h1>{{$conduit->headline}}</h1>

      <div class="article-meta">
        <a href="/profile/eric-simons"><img src="{{ asset('storage/demo-avatar.png') }}" /></a>
        <div class="info">
          <a href="/profile/eric-simons" class="author">{{$conduit->author}}</a>
          <span class="date">January 20th</span>
        </div>
        <button class="btn btn-sm btn-outline-secondary">
          <i class="ion-plus-round"></i>
          &nbsp; Follow Eric Simons <span class="counter">(10)</span>
        </button>
        &nbsp;&nbsp;
        <button class="btn btn-sm btn-outline-primary">
          <i class="ion-heart"></i>
          &nbsp; Favorite Post <span class="counter">{{$conduit->heart}}</span>
        </button>
        <button class="btn btn-sm btn-outline-secondary">
          <i class="ion-edit"></i> Edit Article
        </button>
        <button class="btn btn-sm btn-outline-danger">
          <i class="ion-trash-a"></i> Delete Article
        </button>
      </div>
    </div>
  </div>

  <div class="container page">
    <div class="row article-content">
      <div class="col-md-12">
        <p>{{$conduit->text}}</p>
        <ul class="tag-list">
          @foreach(explode(':', $conduit->tags) as $tag)
            <li class="tag-default tag-pill tag-outline">{{ $tag }}</li>
          @endforeach
        </ul>
      </div>
    </div>

    <hr />

    <div class="article-actions">
      <div class="article-meta">
        <a href="profile.html"><img src="{{ asset('storage/demo-avatar.png') }}" /></a>
        <div class="info">
          <a href="" class="author">{{$conduit->author}}</a>
          <span class="date">{{ \Carbon\Carbon::parse($conduit->timestamp)->format('F j, Y') }}</span>
        </div>

        <button class="btn btn-sm btn-outline-secondary">
          <i class="ion-plus-round"></i>
          &nbsp; Follow Eric Simons
        </button>
        &nbsp;
        <button class="btn btn-sm btn-outline-primary">
          <i class="ion-heart"></i>
          &nbsp; Favorite Article <span class="counter">{{$conduit->heart}}</span>
        </button>
        <button class="btn btn-sm btn-outline-secondary">
          <i class="ion-edit"></i> Edit Article
        </button>
        <button class="btn btn-sm btn-outline-danger">
          <i class="ion-trash-a"></i> Delete Article
        </button>
      </div>
    </div>
    @auth
    <div class="row">
      <div class="col-xs-12 col-md-8 offset-md-2">
        <form class="card comment-form">
          <div class="card-block">
            <textarea class="form-control" placeholder="Write a comment..." rows="3"></textarea>
          </div>
          <div class="card-footer">
            <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
            <button class="btn btn-sm btn-primary">Post Comment</button>
          </div>
        </form>

        <div class="card">
          <div class="card-block">
            <p class="card-text">
              With supporting text below as a natural lead-in to additional content.
            </p>
          </div>
          <div class="card-footer">
            <a href="/profile/author" class="comment-author">
              <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
            </a>
            &nbsp;
            <a href="/profile/jacob-schmidt" class="comment-author">Jacob Schmidt</a>
            <span class="date-posted">{{ \Carbon\Carbon::parse($conduit->timestamp)->format('F j, Y') }}</span>
          </div>
        </div>

        <div class="card">
          <div class="card-block">
            <p class="card-text">
              With supporting text below as a natural lead-in to additional content.
            </p>
          </div>
          <div class="card-footer">
            <a href="/profile/author" class="comment-author">
              <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
            </a>
            &nbsp;
            <a href="/profile/jacob-schmidt" class="comment-author">Jacob Schmidt</a>
            <span class="date-posted">Dec 29th</span>
            <span class="mod-options">
              <i class="ion-trash-a"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
    @endauth
  </div>
</div>

@include('layouts.footer')