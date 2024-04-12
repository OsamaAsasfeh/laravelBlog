

@extends('Theme.master')

@section('title','my blogs')
@section("contact-active",'active')
@section('content')

  <!--================ Hero sm banner end =================-->  
  @include('Theme.partials.hero',["title"=>"my blogs"])
  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        
        <div class="col-12">
          <table class="table">
            @if(Session::has('deleteStatus'))
            <p class="alert alert-info">{{ Session::get('deleteStatus') }}</p>
@endif
            <thead>
              <tr>
         
                <th scope="col">Title</th>
                
                <th scope="col" width='15%'>Action</th>
              </tr>
            </thead>
            <tbody>
              @if (count($blogs)>0)
              @foreach ($blogs as $key=>$blog )
              <tr>
            
                <td>
                 
                    
                 
                  <a  target="_blank" href="{{ route('blogs.show', ['blog' => $blog->id]) }}">{{ $blog->name }}</a>
                </td>
                
                <td>
                 
                  <a href="{{ route("blogs.edit",['blog'=>$blog]) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                
                  <form id="delete_blog" action="{{ route('blogs.destroy', ['blog' => $blog->id]) }}" method="POST" class="d-inline">   
                                     @csrf
                    @method('delete')

                  <a class="btn btn-sm btn-danger mr-2" href="javascript:$('form#delete_blog').submit()">Delete</a>
                  </form>
                  </a>
                </td>
              </tr>
     
              @endforeach
                
              @endif
         
            </tbody>
          </table>
    @if (count($blogs)>0)
    {{ $blogs->render("pagination::bootstrap-4") }}
      
    @endif

        </div>

      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->



@endsection