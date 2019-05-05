<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.edit');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


     //Kullanıcı Bilgilerini güncellemek için kullandık.
    public function update(Request $request, $id)
    {
        $request->validate([

            'name'=>'required',
            'password'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);


        $id = $request->input('id');
        $user = User::find($id);


        //Handle File Upload
        if($request->hasFile('profile_image')){
            // Get file name with the extension
    
            $filenameWithExt =$request->file('profile_image')->getClientOriginalName();
            //  Get just file name
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);
    
              }
             else{
    
                $fileNameToStore = 'noimage.jpg';
             }
        
        
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password')); //Hash db'deki cryptolu şifreyi geri çevirdi. 
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->adress = $request->input('adress');
        $user->gender = $request->input('gender'); 
        
        if($request->hasFile('profile_image')){

            $user->profile_image = $fileNameToStore;
         }

        $user->save();
        Auth::login($user);

        return redirect('/profile')->with('success', 'Profil Güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
