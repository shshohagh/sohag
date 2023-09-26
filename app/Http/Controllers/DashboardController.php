<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

class DashboardController extends Controller
{
    public function dashboard(){
        
        //assign role 
        $user = \Auth::user();
        // dd($user);
        // if($user->hasRole('user')==false){
        //     $role = Role::where('slug','user')->first();
        //     $user->roles()->attach($role);
        // }
        
        // check role
        //dd($user->hasRole('admin'));
        
        
        // 
        // assign permission 
        // $permission = Permission::all();
        // $user->permissions()->attach($permission);
        // dd($user->permissions);
        
        // check permission
        // dd($user->hasPermission('add-post'));
        //dd($user->can('add-post'));
        // 
        // 
        // 
        // 
        //dd($user->roles);
        //dd($user->permissions);
        $users = User::paginate(30);
        return view('dashboard', compact('users'));
    }
}
