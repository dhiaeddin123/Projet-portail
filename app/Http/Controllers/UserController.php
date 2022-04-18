<?php

namespace App\Http\Controllers;

use App\DBStorage;
use App\Mail\PurshaseMail;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users=User::with('role')->get();
        
        return view('admin.users',compact('users'));
    }
    public function edit($user)
    {
        $user=User::find($user);
        
        $roles=Role::all();
        return view('admin.user.update',compact('user','roles'));
    }
    public function save($user)
    {
       
        $user=User::find($user);

        
        $data=request()->validate([
            'name'=>'required',
            'email'=>'required',
            
            'role'=>'required'
            ]);
            
           
            
              $user->name=$data['name'];
              $user->email=$data['email'];
             
              $user->role_id=$data['role'];
              $user->save();
                return redirect('/admin/user');
    
    }
    public function delete($user)
    {
        $user=User::find($user);
        $user->delete();
        return redirect()->back();
    }
    public function purshases()
    {
        $content=auth()->user()->products;
        return view('cart.purshases',compact('content'));

    }
    
}
