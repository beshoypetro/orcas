<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class DatatablesController extends Controller
{
    public function getIndex()
    {
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
//        return Datatables::of(User::query()) //(clients.blade.php)
//        ->make(true);
        $users = User::role('employee')->select(['id', 'name', 'email', 'pin', 'created_at', 'updated_at'])->get();

        return Datatables::of($users)
//            ->addColumn('action', function ($user) {
////                return '&lta href="edit/'.$user->id.'" class="btn btn-xs btn-primary"&gt&lti class="glyphicon glyphicon-edit"&gt&lt/i&gt Edit&lt/a&gt';
//                return '<input type="button" onclick="location.href=\'users/' . $user->id .'/edit\'";" value="edit" />';
//            })
//            ->editColumn('id', 'ID: {{$id}}')
            ->addColumn('action', function ($row) {

                return '  <td>
                    <form method="post" action="users/' . $row->id . '">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="delete" />
                    <div class=\'btn-group\'>
                        <a href="users/' . $row->id . '" class=\'btn btn-default btn-xs\'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="users/' . $row->id . '/edit" class=\'btn btn-default btn-xs\'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        <button type="submit" value="Submit"> <i class="glyphicon glyphicon-trash"></i> </button>
                    </div>
</form>
                </td>';
            })
//            ->editColumn('show', function ($row) {
//                return '<a href="/users/' . $row->id . '" class="btn btn-primary button-red">show</a>';
//            })
//            ->rawColumns(['show' => 'show', 'action' => 'action'])
            ->removeColumn('password')
            ->make(true);
    }

}
