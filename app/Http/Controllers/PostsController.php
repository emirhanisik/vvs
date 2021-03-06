<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post; //model name is App. Post is a model name.
use DB;
Use App\User;
Use App\Comment;
Use App\Favorites;
Use App\Category;
Use App\City;

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
       $post = Post::all();
       $cat = Category::all();
       $city = City::all();
        return view('posts.create', ['post' => $post, 'cat' =>$cat , 'city' =>$city]);
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
            'image1' =>'image|nullable|max:1999',
            'image2' =>'image|nullable|max:1999',
            'image3' =>'image|nullable|max:1999',
            'image4' =>'image|nullable|max:1999',
            'trip_fee'=>'required',
            'trip_day'=>'required'
           
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

         //Handle File Upload - Image1
         if($request->hasFile('image1')){
            // Get file name with the extension
    
            $filenameWithExt1 =$request->file('image1')->getClientOriginalName();
            //  Get just file name
            $filename1 = pathInfo($filenameWithExt1, PATHINFO_FILENAME);
            //get just extension
            $extension1 = $request->file('image1')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore1 = $filename1.'_'.time().'.'.$extension;
            //Upload image
            $path1 = $request->file('image1')->storeAs('public/post_images', $fileNameToStore1);
    
              }
             else{
    
                $fileNameToStore1 = 'noimage.jpg';
             }


             //Handle File Upload - Image2
         if($request->hasFile('image2')){
            // Get file name with the extension
    
            $filenameWithExt2 =$request->file('image2')->getClientOriginalName();
            //  Get just file name
            $filename2 = pathInfo($filenameWithExt2, PATHINFO_FILENAME);
            //get just extension
            $extension2 = $request->file('image2')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore2 = $filename2.'_'.time().'.'.$extension;
            //Upload image
            $path2 = $request->file('image2')->storeAs('public/post_images', $fileNameToStore2);
    
              }
             else{
    
                $fileNameToStore2 = 'noimage.jpg';
             }

               //Handle File Upload - Image3
         if($request->hasFile('image3')){
            // Get file name with the extension
    
            $filenameWithExt3 =$request->file('image3')->getClientOriginalName();
            //  Get just file name
            $filename3 = pathInfo($filenameWithExt3, PATHINFO_FILENAME);
            //get just extension
            $extension3 = $request->file('image3')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore3 = $filename3.'_'.time().'.'.$extension;
            //Upload image
            $path3 = $request->file('image3')->storeAs('public/post_images', $fileNameToStore3);
    
              }
             else{
    
                $fileNameToStore3 = 'noimage.jpg';
             }
             

 //Handle File Upload - Image4
 if($request->hasFile('image4')){
    // Get file name with the extension

    $filenameWithExt4 =$request->file('image4')->getClientOriginalName();
    //  Get just file name
    $filename4 = pathInfo($filenameWithExt4, PATHINFO_FILENAME);
    //get just extension
    $extension4 = $request->file('image4')->getClientOriginalExtension();
    //Filename to Store
    $fileNameToStore4 = $filename4.'_'.time().'.'.$extension;
    //Upload image
    $path4 = $request->file('image4')->storeAs('public/post_images', $fileNameToStore4);

      }
     else{

        $fileNameToStore4 = 'noimage.jpg';
     }



         //Create Post
         $post = new Post;
         $post ->title = $request->input('title');
         $post ->body = $request->input('body');
         $post ->trip_day= $request->input('trip_day');
         $post ->trip_fee= $request->input('trip_fee');
         $post->user_id = auth()->user()->id;
         $post->cover_image = $fileNameToStore;
         $post->image1 = $fileNameToStore1;
         $post->image2 = $fileNameToStore2;
         $post->image3 = $fileNameToStore3;
         $post->image4 = $fileNameToStore4;
         $post->category_id = $request->category_id;
         $post->city_id = $request->city_id;

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
        $cat = Category::all();
        $city = City::all();

        //Doğru kullanıcı için doğrulama - Check for correct user!!!
         if( auth()->user()->id !== $post->user_id){
           
            return redirect('/posts')->with('error','Unauthorized Page!!');
        }
        
        return view('posts.edit', ['post'=>$post, 'cat'=>$cat , 'city'=>$city]);//->with('post',$post);
        
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
            'cover_image' => 'image|nullable|max:1999',
            'image1' =>'image|nullable|max:1999',
            'image2' =>'image|nullable|max:1999',
            'image3' =>'image|nullable|max:1999',
            'image4' =>'image|nullable|max:1999',
            'trip_fee'=>'required',
            'trip_day'=>'required'
            
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

              //Handle File Upload - Image1
         if($request->hasFile('image1')){
            // Get file name with the extension
    
            $filenameWithExt1 =$request->file('image1')->getClientOriginalName();
            //  Get just file name
            $filename1 = pathInfo($filenameWithExt1, PATHINFO_FILENAME);
            //get just extension
            $extension1 = $request->file('image1')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore1 = $filename1.'_'.time().'.'.$extension1;
            //Upload image
            $path1 = $request->file('image1')->storeAs('public/post_images', $fileNameToStore1);
    
              }
             else{
    
                $fileNameToStore1 = 'noimage.jpg';
             }


             //Handle File Upload - Image2
         if($request->hasFile('image2')){
            // Get file name with the extension
    
            $filenameWithExt2 =$request->file('image2')->getClientOriginalName();
            //  Get just file name
            $filename2 = pathInfo($filenameWithExt2, PATHINFO_FILENAME);
            //get just extension
            $extension2 = $request->file('image2')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;
            //Upload image
            $path2 = $request->file('image2')->storeAs('public/post_images', $fileNameToStore2);
    
              }
             else{
    
                $fileNameToStore2 = 'noimage.jpg';
             }

               //Handle File Upload - Image3
         if($request->hasFile('image3')){
            // Get file name with the extension
    
            $filenameWithExt3 =$request->file('image3')->getClientOriginalName();
            //  Get just file name
            $filename3 = pathInfo($filenameWithExt3, PATHINFO_FILENAME);
            //get just extension
            $extension3 = $request->file('image3')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;
            //Upload image
            $path3 = $request->file('image3')->storeAs('public/post_images', $fileNameToStore3);
    
              }
             else{
    
                $fileNameToStore3 = 'noimage.jpg';
             }
             

 //Handle File Upload - Image4
 if($request->hasFile('image4')){
    // Get file name with the extension

    $filenameWithExt4 =$request->file('image4')->getClientOriginalName();
    //  Get just file name
    $filename4 = pathInfo($filenameWithExt4, PATHINFO_FILENAME);
    //get just extension
    $extension4 = $request->file('image4')->getClientOriginalExtension();
    //Filename to Store
    $fileNameToStore4 = $filename4.'_'.time().'.'.$extension4;
    //Upload image
    $path4 = $request->file('image4')->storeAs('public/post_images', $fileNameToStore4);

      }
     else{

        $fileNameToStore4 = 'noimage.jpg';
     }
           
    
         
         //Create Post
         $post = Post::find($id);
         $post ->title = $request->input('title');
         $post ->body = $request->input('body');
         $post ->trip_day= $request->input('trip_day');
         $post ->trip_fee= $request->input('trip_fee');
         if($request->hasFile('cover_image')){

            $post->cover_image = $fileNameToStore;
         }
         if ($request->hasFile('image1')){
            $post->image1 = $fileNameToStore1;

         }
         if ($request->hasFile('image2')){
            $post->image1 = $fileNameToStore2;

         }
         if ($request->hasFile('image3')){
            $post->image1 = $fileNameToStore3;

         }
         if ($request->hasFile('image4')){
            $post->image1 = $fileNameToStore4;

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

  

    public function view_favorites(){
         $favorites = DB::table('favorites')
            ->leftJoin('posts', 'favorites.post_id', '=', 'posts.id')
            ->leftJoin('users', 'favorites.user_id', '=', 'users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();
         return view('favorite', ['favorites'=>$favorites]);
    }

    public function removeFavorite($id){

      //echo $id;
      DB::table('favorites')->where('post_id', '=', $id)->delete();
      return redirect('/favorite')->with('success', 'Favori Başarıyla Kaldırıldı.'); 

    }
    public function removeComment($id) {

      DB::table('comments')->where('id','=',$id)->delete();
      return redirect('posts')->with('success','Yorum Başarıyla Kaldırıldı.');
    }

    public function familyCategory(){

      $posts = Post::orderBy('created_at','desc')->where('category_id', '=' , 1)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('category.family')->with('posts',$posts); 
    }

    public function friendCategory(){

      $posts = Post::orderBy('created_at','desc')->where('category_id', '=' , 2)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('category.friend')->with('posts',$posts); 
    }

    public function newyearCategory(){

      $posts = Post::orderBy('created_at','desc')->where('category_id', '=' , 3)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('category.newyear')->with('posts',$posts); 
    }
    public function cultureCategory(){

      $posts = Post::orderBy('created_at','desc')->where('category_id', '=' , 4)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('category.culture')->with('posts',$posts); 
    }
    public function semesterCategory(){

      $posts = Post::orderBy('created_at','desc')->where('category_id', '=' , 5)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('category.semester')->with('posts',$posts); 
    }
    public function summerCategory(){

      $posts = Post::orderBy('created_at','desc')->where('category_id', '=' , 6)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('category.summer')->with('posts',$posts); 
    }

    //Popüler Şehirler
    public function ankara(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 1)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.ankara')->with('posts',$posts); 
    }
    public function istanbul(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 2)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.istanbul')->with('posts',$posts); 
    }
    public function izmir(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 3)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.izmir')->with('posts',$posts); 
    }
    public function antalya(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 7)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.antalya')->with('posts',$posts); 
    }
    public function paris(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 16)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.paris')->with('posts',$posts); 
    }
    public function berlin(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 21)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.berlin')->with('posts',$posts); 
    }
    public function newyork(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 28)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.newyork')->with('posts',$posts); 
    }
    public function losangeles(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 30)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.losangeles')->with('posts',$posts); 
    }
    public function viyana(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 35)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.viyana')->with('posts',$posts); 
    }
    public function sydney(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 38)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.sydney')->with('posts',$posts); 
    }
    public function dubai(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 41)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.dubai')->with('posts',$posts); 
    }
    public function rio(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 45)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.rio')->with('posts',$posts); 
    }
    public function prag(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 51)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.prag')->with('posts',$posts); 
    }
    public function marakes(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 55)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.marakes')->with('posts',$posts); 
    }
    public function amsterdam(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 63)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.amsterdam')->with('posts',$posts); 
    }
    public function londra(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 66)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.londra')->with('posts',$posts); 
    }
    public function barcelona(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 71)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.barcelona')->with('posts',$posts); 
    }
    public function madrid(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 72)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.madrid')->with('posts',$posts); 
    }
    public function roma(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 77)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.roma')->with('posts',$posts); 
    }
    public function venedik(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 78)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.venedik')->with('posts',$posts); 
    }
    public function porto(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 92)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.porto')->with('posts',$posts); 
    }
    public function moskova(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 93)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.moskova')->with('posts',$posts); 
    }
    public function kiev(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 101)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.kiev')->with('posts',$posts); 
    }
    public function belgrad(){

      $posts = Post::orderBy('created_at','desc')->where('city_id', '=' , 96)->paginate(10);
       // $posts = Post::orderBy('title','desc')->get(); //asc -> ascend desc->descend
        return view('city.belgrad')->with('posts',$posts); 
    }
   }
