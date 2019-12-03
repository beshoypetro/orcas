<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * creat a role from header
     *
     * @return \Illuminate\Http\Response
     */
    public function addRole($role)
    {
        Role::create(['name' => $role]);
        return response()->json(['success'=> true, 'message'=>'role has been created']);
    }
    public function assignRole($id,$role)
    {
        $user = \App\User::find($id);
        $user->assignRole($role);
        return response()->json(['success'=> true, 'message'=>'done assigning role']);
    }

}
