@extends('layouts.app')

@if (Auth::check())
    @include('includes.header_logged_in')
@else
    @include('includes.header')
@endif

<div class="auth-page">
  <div class="container page">
    <div class="row">
      <div class="col-md-6 offset-md-3 col-xs-12">
        <h1 class="text-xs-center">Sign up</h1>
        <p class="text-xs-center">
          <a href="/login">Have an account?</a>
        </p>

        <ul class="error-messages">
          <li>That email is already taken</li>
        </ul>

        <form method="POST" action="{{ route('register') }}">
        @csrf
          <fieldset class="form-group">
            <input name="username" class="form-control form-control-lg" type="text" placeholder="Username" />
          </fieldset>
          <fieldset class="form-group">
            <input name="email" class="form-control form-control-lg" type="text" placeholder="Email" />
          </fieldset>
          <fieldset class="form-group">
            <input name="password" class="form-control form-control-lg" type="password" placeholder="Password" />
          </fieldset>
          <button type="submit" class="btn btn-lg btn-primary pull-xs-right">Sign up</button>
        </form>
      </div>
    </div>
  </div>
</div>

@include('layouts.footer')