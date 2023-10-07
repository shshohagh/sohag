<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\{DB,Cache};
class DashboardController extends Controller
{
    public function dashboard(){

        $users = Cache::remember('users', now()->addMinutes(60*24), function () {
            return DB::table('users')->select('id', 'name', 'email')->get();
        });
        //$users = DB::table('users')->select(['id', 'name', 'email'])->get();
        return view('dashboard', compact('users'));
    }
}
