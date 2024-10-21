<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {
        // $users = User::all();
        $users = User::where('role', '!=', 'admin')->get();

        // return $users;
        return view('user.index',compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function view($id){
        $ogId = decrypt($id);
        $user = User::find($ogId);
        return view('user.view',compact('user'));
    }

    
    public function save()
    {

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension(); // Create a unique name
        //     $imagePath = $image->storeAs('images', $imageName, 'public'); // Store in the 'images' directory
        // }
        $user= User::create([
            'name'=>request('name'),
            'password'=>bcrypt(request('password')),
            'mobile'=>request('mobile'),
            'role'=>request('role'),
            'username'=>request('username'),
            // 'image'=>$imagePath
        ]);
        return redirect()->route('user.home')->with('message','user Added sucessfully!!!');
    }

  
    
    public function edit($id)
    {
        $userId = decrypt($id);
        $user = User::find($userId);
        return view('user.edit',compact('user'));
    }

    public function update(){
        $id = decrypt(request("user_Id"));
        $user= User::find($id)->update([
            'name'=>request('name'),
            'password'=>bcrypt(request('password')),
            'mobile'=>request('mobile'),
            'role'=>request('role'),
            'username'=>request('username'),
        ]);
        return redirect()->route('user.home')->with('message','user Updated sucessfully!!!');

    }

    public function delete($id)
    {
        $stdntId =  decrypt($id);
        $user = User::find($stdntId)->delete();

        return redirect()->route('user.home')->with(['message'=>'user Deleted sucessfully!!!','delete'=>true]);
    }
}

