<?php

namespace App\Http\Controllers;

use App\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
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
        $data = $request->all();
        
        $admin = new Administrator;

        $admin->name = $data['name'];
        $admin->bank = $data['email'];
        $admin->number = $data['phone'];
        $admin->country = $data['logo'];

        $admin->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrator $administrator)
    {
        $update_admin = Administrator::find($request->id)->update($request->all());

        if($update_admin){
            return response()->json(['message' => 'Actualizado'], 200);
        }else{
            return response()->json(['error' => 'Error al guardar'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        $admin = Administrator::findOrFail($id);

        $admin->delete();

        if($admin->delete()){
            return response()->json(['message' => 'Eliminado'], 200);
        }else{
            return response()->json(['error' => 'Error al eliminar'], 404);
        }
    }
}
