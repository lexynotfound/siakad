<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Logic Variable users search
        /* $name = $request->input('name'); */
        $users = DB::table('users')
            ->when($request->input('name'), function($query, $name){
                return $query->where('name', 'like', '%'.$name.'%');
            })
            ->select('id', 'name','email','phone','roles','profile_image','address', DB::raw('DATE_FORMAT(tgl_lahir,"%d %M %Y") as tgl_lahir'), DB::raw('DATE_FORMAT(created_at,"%d %M %Y") as created_at'))
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        /* $users = DB::table('users')
            ->when($request->input('name'), function($query, $name){
                return $query->where('name','like','%'.$name.'%');
            })
            ->select('id', 'name', 'email', 'phone', 'roles', 'address', DB::raw('DATE_FORMAT(tgl_lahir,"%d %M %Y") as tgl_lahir'), DB::raw('DATE_FORMAT(created_at,"%d %M %Y") as created_at'))
            ->paginate(15); */

        /* $users = DB::table('users')
        ->when($request->has('name'), function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->input('name') . '%');
        })
        ->select('id', 'name', 'email', 'phone', 'roles', 'address', DB::raw('DATE_FORMAT(tgl_lahir,"%d %M %Y") as tgl_lahir'), DB::raw('DATE_FORMAT(created_at,"%d %M %Y") as created_at'))
        ->paginate(15); */

        return view('pages.users.index',compact('users'));
    }

    /**
     * Views a newly created resource.
     */
    public function create(Request $request)
    {
        //
        return view('pages.users.create');
    }
    public function edit(User $user)

    /**
     * Views a newly edit resource.
     */
    {
        //
        return view('pages.users.edit')->with('user',$user);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
        User::create([
            'name' =>$request['name'],
            'email' =>$request['email'],
            'password' => Hash::make($request['password']),
            'roles' => $request['roles'],
            /* 'profile_image' => $request['profile_image'], */
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);

        return redirect(route('user.index'))->with('success', 'New User Successfully');
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
    public function update(UpdateUserRequest $request, User $user)
    {
        //Melakukan update dengan menggunakan Request

        $validate = $request->validated(/* [
            'name' => 'sometimes|string|max:80',
            'email' => [
                'sometimes',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'sometimes|required',
            'phone' => 'sometimes|string',
            'address' => 'sometimes|string',
            'roles' => 'sometimes|string',
        ] */);
        $user->update($validate);
        return redirect()->route('user.index')->with('success', 'Update Data User '.$user->name.' Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //Menghapus data user
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Deleted Data User '.$user->name.' Berhasil');
    }
}
