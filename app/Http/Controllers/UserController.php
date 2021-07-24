<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $user = new User;

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->phone = $data['phone'];
        $user->country = $data['country'];
        $user->username = $data['username'];

        $user->save();

        if($user->save()){
            /* envio de correo o algo así */

            return view('home');
        }else{
            // return response()->json([false]);
            return response()->json(['error' => 'Error al guardar'], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $user_log = User::find($user->id);
        return $user_log;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $user = Auth::user();

        $update_user = User::find($user->id)->update($request->all());

        if($update_user){
            return response()->json(['message' => 'Actualizado'], 200);
        }else{
            return response()->json(['error' => 'Error al guardar'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        if($users->delete()){
            return response()->json(['message' => 'Eliminado'], 200);
        }else{
            return response()->json(['error' => 'Error al eliminar'], 404);
        }
    }
}
