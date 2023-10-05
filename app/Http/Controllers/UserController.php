<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Logic Variable users search
        /* $name = $request->input('name');
        $users = DB::table('users')
            ->when($request->input('name'), function($query, $name){
                return $query->where('name', 'like', '%'.$name.'%');
            })
            ->select('id', 'name','email','phone','roles','address', DB::raw('DATE_FORMAT(tgl_lahir,"%d %M %Y") as tgl_lahir'), DB::raw('DATE_FORMAT(created_at,"%d %M %Y") as created_at'))
            ->paginate(15); */

        /* $users = DB::table('users')
            ->when($request->input('name'), function($query, $name){
                return $query->where('name','like','%'.$name.'%');
            })
            ->select('id', 'name', 'email', 'phone', 'roles', 'address', DB::raw('DATE_FORMAT(tgl_lahir,"%d %M %Y") as tgl_lahir'), DB::raw('DATE_FORMAT(created_at,"%d %M %Y") as created_at'))
            ->paginate(15); */

        $users = DB::table('users')
        ->when($request->has('name'), function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->input('name') . '%');
        })
        ->select('id', 'name', 'email', 'phone', 'roles', 'address', DB::raw('DATE_FORMAT(tgl_lahir,"%d %M %Y") as tgl_lahir'), DB::raw('DATE_FORMAT(created_at,"%d %M %Y") as created_at'))
        ->paginate(15);

        return view('pages.users.index',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
