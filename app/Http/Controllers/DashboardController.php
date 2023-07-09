<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        //assign role 
        $user = \Auth::user();
        // dd($user);
        // $role = Role::where('slug','editor')->first();
        // $user->roles()->attach($role);
        // dd($user->hasRole('editor'));
        // dd($user->hasRole('author'));
        // 
        // check permission 
        // $permission = Permission::first();
        // $user->permissions()->attach($permission);
        // dd($user->hasPermission('add-post'));
        // dd($user->permissions);
        dd($user->can('add-post'));
        // 
        // 
        // 
        // 
        // dd($user->roles);
        return view('dashboard');
    }
}
