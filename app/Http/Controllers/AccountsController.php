<?php

namespace App\Http\Controllers;

use App\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
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
        $user_uthenticade = Auth::user();

        $account = new Accounts;

        $account->name = $data['name'] ;
        $account->bank = $data['bank'] ;
        $account->number = $data['number'] ;
        $account->country = $data['country'] ;
        $account->id_card = $data['id_card'] ;
        $account->id_user = $user_uthenticade->id;

        $account->save();

        if($account->save()){
            /* envio de correo o algo así */
            return response()->json(['message' => 'Guardado Exitosamente'], 200);
        }else{
            // return response()->json([false]);
            return response()->json(['error' => 'Error al guardar'], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_uthenticade = Auth::user();

        $accounts = Accounts::where('id_user', $user_uthenticade->id)
                            ->orderBy('created_at', 'desc')->get();

        if($accounts){
            return response()->json($accounts, 200);
        }else{
            return response()->json(['error' => 'Error'], 404);
        }
    }

    /**
     * Display only 1 specific resource.
     *
     * @param  \App\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function findAccount(String $id)
    {

        $account = Accounts::find($id);

        if($account){
            return response()->json($account, 200);
        }else{
            return response()->json(['error' => 'Error cuenta no existe'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit(Accounts $accounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accounts $accounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accounts $accounts)
    {
        //
    }
}
