<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogRequest ;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //using auth check or you can use midllawaer
//         if(Auth::check()){
//             $categories=Category::get();

//             return view('theme.blogs.create',compact( 'categories'));
//         }
// else abort(403);
$categories=Category::get();

            return view('theme.blogs.create',compact( 'categories'));
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest  $request)
    {
        //
        $data=$request->validated();
        //image uploading
        //1- get image
        $image=$request->image;
        //2- change its current name
        $newImageName=time().'-'.$image->getClientOriginalName();
        //3-move image to my project
        $image->storeAs('blogs',$newImageName,'public');
        //4-save new name to database recored
        $data['image']= $newImageName;
        $data['user_id']=Auth::user()->id;
        //dd($data);
       Blog::create($data);
       return back()->with('status','your blog created su');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //


        return view('theme.single-blog',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        //dont show any view for update if the recored is not for the user

                 if(Auth::check()&&Auth::user()->id==$blog->user_id){
                   $categories=Category::get();
            
                    return view('theme.blogs.edit',compact( 'categories','blog'));
                   }else abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest  $request,Blog $blog )
    {
        //
        //you need to chek that you update the record of the same user
        if(Auth::check()&&Auth::user()->id==$blog->user_id){
        $data=$request->validated();
        if($request->hasFile('image')){
   //image uploading
      //* you need to delete the old image first

      Storage::delete("public/blogs/$blog->image");
        //1- get image
        $image=$request->image;
        //2- change its current name
        $newImageName=time().'-'.$image->getClientOriginalName();
        //3-move image to my project
        $image->storeAs('blogs',$newImageName,'public');
        //4-save new name to database recored
        $data['image']= $newImageName;

     
        }
     
       // $data['user_id']=Auth::user()->id; the id of the user will not change
        //dd($data);
       Blog::create($data);
       $blog->update($data);
       return back()->with('status','your blog updated su');
    }
    else abort(403);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        Storage::delete("public/blogs/$blog->image");
        $blog->delete();
        return back()->with('deleteStatus','your blog deleted su');
    }
    public function myBlogs( )
{
    //
    if(Auth::check()){
        $blogs=Blog::where ('user_id',Auth::user()->id)->paginate(10);
        return view("theme.blogs.my-blogs",compact('blogs'));
    }else abort(403);

}

}
