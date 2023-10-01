<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\{DB,Cache};

class UserController extends Controller
{
    public function user_export() 
    {
        return Excel::download(new UsersExport, 'users.csv'); /* xlsx / csv */
    }
    public function user_import(Request $request)
    {
        $request->validate([
            'import_file' => 'required',
        ]);

        Excel::import(new UsersImport, request()->file('import_file'));

        return back()->withStatus('Import done!');
    }

    public function getUsers(Request $request)
    {
        $recordsPerPage = $request->input('records', 10); // Default to 10 records per page
        $users = DB::table('users')->select(['id','name','email'])->paginate($recordsPerPage);
        $data ='<table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach($users as $res){
                                $data .='<tr>
                                    <td>'.$res->id.'</td>
                                    <td>'.$res->name.'</td> 
                                    <td>'.$res->email.'</td>  
                                </tr>';
                             }
                             $data .='</tbody>
                            <tfoot><tr><td id="pagination" colspan="3"> '.$users->links().' </td></tr></tfoot>
                        </table>';
        return response($data);
    }

}
