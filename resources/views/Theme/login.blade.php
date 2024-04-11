@extends('theme.master')

@section('title','Login')
@section("category-active",'active')

@section('content')

  @include('Theme.partials.hero',["title"=>"Login"])
  <!--================ Hero sm Banner end =================-->      
  

  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-6 mx-auto">
          <form   class="form-contact contact_form" action="{{ route('login') }}" method="post"   novalidate="novalidate">
            @csrf
            <div class="form-group">
              <input class="form-control border" name="email"   type="email" placeholder="Enter email address"  :value="__('Email')">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <div class="form-group">
              <input class="form-control border" name="password" id="name" type="password" placeholder="Enter your password" :value="__('Password')">
              <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>
            <div class="form-group text-center text-md-right mt-3">
              <a href="{{ route("register") }}">dont have account ? register </a>

              <button type="submit" class="button button--active button-contactForm">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

@endsection