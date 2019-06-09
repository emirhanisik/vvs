<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Post;
use App\Comment;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at','desc')->paginate(50);
        $users = User::orderBy('created_at','desc')->paginate(50);
        $posts = Post::orderBy('created_at','desc')->paginate(50);
        $comments = Comment::orderBy('created_at','desc')->paginate(50);
        
        return view('admin',['categories'=>$categories,'users'=>$users,'posts' =>$posts,'comments'=>$comments]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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

         'name'=>'required'
         
           
         ]);

         $category = new Category;
         $category ->name = $request->input('name');
         $category ->save();

         return redirect('/admin')->with('success', 'Kategori Eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           
    }

    public function removeCategory($id) {

        DB::table('categories')->where('id','=',$id)->delete();
        return redirect('admin')->with('success','Kategori Başarıyla Kaldırıldı.');
      }
}
