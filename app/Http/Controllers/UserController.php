<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users=User::get();
        return view('users.index',compact('users'));
    }

    public function block($id)
    {
        $user= User::findOrFail($id);
        if($user->isSuperAdmin ){
            return redirect()->back()->with('messege','لا يمكنك التعديل');
        }
        $user->isBlock=1;
        $user->save();
        return redirect()->back()->with('messege','Blocked');
    }
    public function unblock($id)
    {
        $user= User::findOrFail($id);
        if($user->isSuperAdmin ){
            return redirect()->back()->with('messege','لا يمكنك التعديل');
        }
        $user->isBlock=0;
        $user->save();
        return redirect()->back()->with('messege',' un Block');
    }
    public function admin($id)
    {
        $user= User::findOrFail($id);
        if($user->isSuperAdmin ){
            return redirect()->back()->with('messege','لا يمكنك التعديل');
        }
        $user->isAdmin=1;
        $user->save();
        return redirect()->back()->with('messege','Modified');
    }
    public function unadmin($id)
    {
        $user= User::findOrFail($id);
        if($user->isSuperAdmin ){
            return redirect()->back()->with('messege','لا يمكنك التعديل');
        }
        $user->isAdmin=0;
        $user->save();
        return redirect()->back()->with('messege','Modified');
    }

    public function showproducts($id)
    {
        $user = User::findOrFail($id);
        $products=$user->products;
        return view('users.showproducts',compact('products','user'));
    }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
