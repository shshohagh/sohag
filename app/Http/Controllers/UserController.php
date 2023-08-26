<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function user_export() 
    {
        return Excel::download(new UsersExport, 'users.csv'); /* users.xlsx / users.csv */
    }
    public function user_import(Request $request)
    {
        $request->validate([
            'import_file' => 'required',
        ]);

        Excel::import(new UsersImport, request()->file('import_file'));

        return back()->withStatus('Import done!');
    }

}
