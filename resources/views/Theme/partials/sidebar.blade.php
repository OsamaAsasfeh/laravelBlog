
@php

  $headerCategories=  App\Models\Category::get();
  $counter = 1;

@endphp



<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
      <form action="{{ route('subscriber.store') }}" method='post'>
        @csrf
    
      <div class="single-sidebar-widget newsletter-widget">
        <h4 class="single-sidebar-widget__title">Newsletter</h4>
        <div class="form-group mt-30">
          <div class="col-autos">
            <input type="text" name='email' class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
              onblur="this.placeholder = 'Enter email'">
        @error('email')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        
            </div>
        </div>
        <button class="bbtns d-block mt-20 w-100">Subcribe</button>
      </div>
    </form>
      <div class="single-sidebar-widget post-category-widget">
        <h4 class="single-sidebar-widget__title">Catgory</h4>
        
        @if (count($headerCategories)>0)
                  
         
        
        
       
        <ul class="cat-list mt-20">
       
          @foreach ( $headerCategories as $cat)
          
         
          <li>
            <a href="#" class="d-flex justify-content-between">
              <p>{{ $cat->name }}</p>
              <p>{{ $counter++ }}</p>
            </a>
          </li>
          @endforeach

      </ul>
      @endif
      </div>

      <div class="single-sidebar-widget popular-post-widget">
        <h4 class="single-sidebar-widget__title">Recent Post</h4>
        <div class="popular-post-list">
          <div class="single-post-list">
            <div class="thumb">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/thumb/thumb1.png" alt="">
              <ul class="thumb-info">
                <li><a href="#">Adam Colinge</a></li>
                <li><a href="#">Dec 15</a></li>
              </ul>
            </div>
            <div class="details mt-20">
              <a href="blog-single.html">
                <h6>Accused of assaulting flight attendant miktake alaways</h6>
              </a>
            </div>
          </div>
          <div class="single-post-list">
            <div class="thumb">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/thumb/thumb2.png" alt="">
              <ul class="thumb-info">
                <li><a href="#">Adam Colinge</a></li>
                <li><a href="#">Dec 15</a></li>
              </ul>
            </div>
            <div class="details mt-20">
              <a href="blog-single.html">
                <h6>Tennessee outback steakhouse the
                  worker diagnosed</h6>
              </a>
            </div>
          </div>
          <div class="single-post-list">
            <div class="thumb">
              <img class="card-img rounded-0" src="{{asset('assets')}}/img/blog/thumb/thumb3.png" alt="">
              <ul class="thumb-info">
                <li><a href="#">Adam Colinge</a></li>
                <li><a href="#">Dec 15</a></li>
              </ul>
            </div>
            <div class="details mt-20">
              <a href="blog-single.html">
                <h6>Tennessee outback steakhouse the
                  worker diagnosed</h6>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>