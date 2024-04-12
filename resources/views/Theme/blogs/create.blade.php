

@extends('Theme.master')

@section('title','Add new blog')
@section("contact-active",'active')
@section('content')

  <!--================ Hero sm banner end =================-->  
  @include('Theme.partials.hero',["title"=>"Add new blog"])
  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        
        <div class="col-md-8 col-lg-9">
          <form enctype="multipart/form-data"  class="form-contact contact_form" action="{{ route("blogs.store") }}" method="post" id="contactForm" novalidate="novalidate">
           @csrf
           


           <div class="form-group">
            <input class="form-control" name="name" id="name" type="text" placeholder="Enter your blog title" value="{{ old("name") }}">
        
               @error('name')
                   <span class="text-danger">{{ $message }}</span>
                 @enderror
        
          </div>
          <div class="form-group">
            <input class="form-control" name="image"  type="file" placeholder="Enter your blog title" value="{{ old("name") }}">
        
               @error('image')
                   <span class="text-danger">{{ $message }}</span>
                 @enderror
        
          </div>
          <div class="form-group">
            <select class="form-control" name="category_id"   >

              <option value="">select your category</option>

              @if (count( $categories)>0)
  @foreach (  $categories as $cat)
  
  <option value="{{ $cat->id }}">{{ $cat->name }} </option>
  @endforeach
@endif
              </select>
        
               @error('category_id')
                   <span class="text-danger">{{ $message }}</span>



                 @enderror
        
          </div>

          <div class="form-group">
            <textarea class="w-100 different-control w-100" name="description"   cols="30" rows="5" placeholder="Enter Message"> {{ old("message") }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
          @enderror
       
          </div>
         
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->



@endsection