<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Toastr;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
       return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.user.create');
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
            'name'=>'required',
            'email'=>'required',
            'profile_photo_path'=>'required'
        ]);

        $profile_photo_path = $request->profile_photo_path; 
        $profile_photo_path_new_name = time().$profile_photo_path->getClientOriginalName(); 
        $profile_photo_path->move('uploads/users', $profile_photo_path_new_name);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'profile_photo_path'=>'uploads/users/'.$profile_photo_path_new_name,
            'admin'=> 1,
            'password'=>bcrypt('password')
       ]);
   
       Profile::create([
         'user_id' => $user->id,
        
     ]);
     Toastr::success('User Added Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
     return redirect()->back();
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
    public function destroy($id){
        //
    }
    public function Admin($id)
    { 
       $user = User::find($id);
       $user->admin = 1;
       $user->save();
       Toastr::success('Successfully Changed User Permission ', 'Message', ["positionClass" => "toast-top-center"]);
       return redirect()->back();
    }
    public function notAdmin($id){ 
       $user = User::find($id);
       $user->admin = 0;
       $user->save();
       Toastr::success('Successfully Changed User Permission ', 'Message', ["positionClass" => "toast-top-center"]);
       return redirect()->back();
    }
    public function myProfile(){
        $id = Auth::user()->id;
        $users = User::find($id);
        $profile = Profile::find($id);
        return view ('admin.user.profile',compact('users','profile'));
    }
    public function changeProfile(){
        $id = Auth::user()->id;
        $users = User::find($id);
        $profile = Profile::find($id);
       return view ('admin.user.update',compact('users','profile'));
    }
        public function updateProfile(Request $request, $id){
        $users = User::find($id);
         
        if($users->email == $request->email){
            if($request->hasfile('profile_photo_path')){    
                $profile_photo_path = $request->profile_photo_path; 
                $profile_photo_path_new_name = time().$profile_photo_path->getClientOriginalName(); 
                $profile_photo_path->move('uploads/users', $profile_photo_path_new_name);
                $file = $users->profile_photo_path;
                if($file){
                   unlink($users->profile_photo_path);
                }
                $users->profile_photo_path = 'uploads/users/'.$profile_photo_path_new_name;
                }
                $users->name = $request->name;
                $users->profile->facebook   =  $request->facebook;
                $users->profile->youtube   =  $request->youtube;
                $users->profile->twitter  =  $request->twitter;
                $users->profile->mobaile   =  $request->mobaile;
                $users->profile->address   =  $request->address;
                $users->profile->github    =  $request->github;
                $users->profile->globe   =  $request->globe;
                $users->save();
                
        }else{
            $this->validate($request, [
                'name'               => 'required',
                'facebook'               => 'required',
                'youtube'               => 'required',
                'twitter'               => 'required',
                'mobaile'               => 'required',
                'address'               => 'required',
                'github'               => 'required',
                'globe'               => 'required',
                'email'              => 'required|unique:users'    
             ]);
            
        }
            $users->email   =  $request->email;
            $users->save();
            $users->profile->save();
       
       
        Toastr::success('Profile Updated Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->route('my.profile');    
    }
}
