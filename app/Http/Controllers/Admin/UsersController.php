<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Service;
use App\ServiceDIDN;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();
       return  view ('admin.index',
           [
           'users'=>$users,
           ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $services = ServiceDIDN::all();
        return view('admin.ajouter', [
            'users'=>$users,
            'services'=>$services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, User $users)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect()->route('users.index')->with('error', 'Un utilisateur avec la même adresse e-mail existe déjà.');
        }
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->service = $request->service;
        $users->password =hash::make($request->password) ;
        $users->save();
        $role = Role::select('id')->Where('name', 'utilisateur')->first();
        $users->roles()->attach($role);
        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('edit-users')) {
            return redirect()->route('users.index');
        }



        $services=ServiceDIDN::all();
        $roles = Role::all();
        return view('admin.edit', [
            'user' => $user,
            'roles' => $roles,
            'services'=>$services
         ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
            $user->roles()->sync($request->roles);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->service = $request->service;
            $user->save();
            return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::denies('delete-users')) {
            return redirect()->route('users.index');
        }


        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }

}
