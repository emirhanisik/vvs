<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post; //model name is App. Post is a model name.
use DB;
Use App\Comment;
Use App\Favorites;

class PostsController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    } 
    //Login olmadan blog post ile alakali olan sayfaya erisimi engelledik.
  
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Post::all(); // Tum Postlar ekrana geliyor.
        // $posts = DB::select('SELECT*FROM posts'); // query ile getirme yolu
        //$posts = Post::all();
        //$posts = Post::orderBy('title','desc')->take(1)->get(); // sadece tek bir blog getirir. 
      
        $posts = Post::orderBy('created_at','desc')->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('posts.index')->with('posts',$posts); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title'=>'required',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999',
            'city'=>'required',
            'trip_fee'=>'required',
            'trip_day'=>'required',
            'trip_type'=>'required'
         ]);
         
         //Handle File Upload
         if($request->hasFile('cover_image')){
        // Get file name with the extension

        $filenameWithExt =$request->file('cover_image')->getClientOriginalName();
        //  Get just file name
        $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
        //get just extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        //Filename to Store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

          }
         else{

            $fileNameToStore = 'noimage.jpg';
         }


         //Create Post
         $post = new Post;
         $post ->title = $request->input('title');
         $post ->body = $request->input('body');
         $post ->city= $request->input('city');
         $post ->trip_day= $request->input('trip_day');
         $post ->trip_fee= $request->input('trip_fee');
         $post ->trip_type= $request->input('trip_type');
         $post->user_id = auth()->user()->id;
         $post->cover_image = $fileNameToStore;
         $post ->save();

         return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show blog posts
        $post = Post::find($id);
        $comments=DB::TABLE('users')
        ->join('comments','users.id','=','comments.user_id')
        ->join('posts','comments.post_id','=','posts.id')
        ->select('users.name','comments.*')
        ->where(['posts.id'=>$id])
        ->get();

        return view('posts.show',['post'=>$post,'comments'=>$comments]);
       // ->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //Doğru kullanıcı için doğrulama - Check for correct user!!!
         if( auth()->user()->id !== $post->user_id){
           
            return redirect('/posts')->with('error','Unauthorized Page!!');
        }
        
        return view('posts.edit')->with('post',$post);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'title'=>'required',
            'body'=>'required',
            'city'=>'required',
            'trip_fee'=>'required',
            'trip_day'=>'required',
            'trip_type'=>'required'

         ]);

           //Handle File Upload
           if($request->hasFile('cover_image')){
            // Get file name with the extension
    
            $filenameWithExt =$request->file('cover_image')->getClientOriginalName();
            //  Get just file name
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
    
              }
           
    
         
         //Create Post
         $post = Post::find($id);
         $post ->title = $request->input('title');
         $post ->body = $request->input('body');
         $post ->city= $request->input('city');
         $post ->trip_day= $request->input('trip_day');
         $post ->trip_fee= $request->input('trip_fee');
         $post ->trip_type= $request->input('trip_type');
         if($request->hasFile('cover_image')){

            $post->cover_image = $fileNameToStore;
         }
         $post ->save();

         return redirect('/posts')->with('success', 'Post Updated');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

         //Doğru kullanıcı için doğrulama - Check for correct user!!!
         if( auth()->user()->id !== $post->user_id){
           
            return redirect('/posts')->with('error','Unauthorized Page!!');
        }
        
            if($post->cover_image != 'noimage.jpg'){

                //delete image
                Storage::delete('public/cover_images/'.$post->cover_image); 
        
            }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');   
    }

    public function search(Request $request){
       //Search Blog Post
        $keyword = $request->input('search');
        $posts = Post::where('title','LIKE','%'.$keyword.'%')->get(); //Query Keyworda göre arıyor.
        return view('posts.search',['posts'=>$posts]);
    }

    public function comment(Request $request,$id){

        $this->validate($request,[

            'comment'=>'required',
         ]);

         $post = Post::find($id);

         $comment = new Comment;
         $comment->comment=$request->input('comment');
         $comment->user_id = auth()->user()->id;
         $comment->post_id = $id;
         $comment->save();
         return redirect()->route('posts.show',[$post->id])->with('success', 'Yorum Başarıyla Eklendi.');
    }


    public function favorites(Request $request,$id){

        $post = Post::find($id);
        $favorites = new Favorites;
        $favorites->user_id = auth()->user()->id;
        $favorites->post_id = $id; 
        $favorites->save();
        return redirect()->route('posts.show',[$post->id])->with('success', 'Yazı favorilere eklendi.');
    }


/*
    public function showFavorites($id)
    {
     
        //show blog posts
        $post = Post::find($id);
        $favorites=DB::TABLE('users')
        ->join('favorites','users.id','=','favorites.user_id')
        ->join('posts','favorites.post_id','=','posts.id')
        ->select('users.name','favorites.*')
        ->where(['posts.id'=>$id])
        ->get();
        
        return view('posts.show',['post'=>$post,'favorites'=>$favorites]);
       // ->with('post',$post);
    }
*/
}
