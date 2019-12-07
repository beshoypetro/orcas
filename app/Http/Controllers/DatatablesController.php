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

        $users = User::role('employee')->select(['id', 'name', 'email', 'pin', 'created_at', 'updated_at'])->get();

        return Datatables::of($users)
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
            ->removeColumn('password')
            ->make(true);
    }

    public function anyDataHr()
    {
        $users = User::role('hr')->select(['id', 'name', 'email', 'pin', 'created_at', 'updated_at'])->get();

        return Datatables::of($users)
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
            ->removeColumn('password')
            ->make(true);
    }

}
