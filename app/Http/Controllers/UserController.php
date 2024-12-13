<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $req){
        $users = User::all();
        return view('admin.user.index', [
            'users' => $users,
            'page_title' => 'Users'
        ]);

    }



    public function destroy($id)
    {
        try{


        $user = User::find($id);

        $user->delete();

        return redirect('Admin.Users.Index');
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to delete users. Please try again.');
        }

    }
}
