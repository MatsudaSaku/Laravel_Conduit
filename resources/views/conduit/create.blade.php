@extends('layouts.app')

@if (Auth::check())
    @include('includes.header_logged_in')
@else
    @include('includes.header')
@endif

<div class="editor-page">
  <div class="container page">
    <div class="row">
      <div class="col-md-10 offset-md-1 col-xs-12">
        <ul class="error-messages">
          <li>That title is required</li>
        </ul>

        <form method="POST" action="{{ route('create') }}">
        @csrf
          <fieldset>
            <fieldset class="form-group">
              <input type="text" class="form-control form-control-lg" name="headline" placeholder="Article Title" />
            </fieldset>
            <fieldset class="form-group">
              <input type="text" class="form-control" name="headline2" placeholder="What's this article about?" />
            </fieldset>
            <fieldset class="form-group">
              <textarea
                class="form-control"
                name="text"
                rows="8"
                placeholder="Write your article (in markdown)"
              ></textarea>
            </fieldset>
            <fieldset class="form-group">
              <input type="text" name="tags" class="form-control" placeholder="Enter tags" />
              <div class="tag-list">
                <span class="tag-default tag-pill"> <i class="ion-close-round"></i> tag </span>
              </div>
            </fieldset>
            <button class="btn btn-lg pull-xs-right btn-primary" type="submit">
              Publish Article
            </button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

@include('layouts.footer')