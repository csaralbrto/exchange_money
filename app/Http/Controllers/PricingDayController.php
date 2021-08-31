<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PricingDay;

class PricingDayController extends Controller
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

        $pricing = new PricingDay;

        $pricing->dayli_rate = $data['dayli_rate'] ;
        $pricing->img = $data['img'] ;

        $pricing->save();

        if($pricing->save()){
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
     * @param  \App\PricingDay  $pricingDay
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $pricing = PricingDay::all()
                            ->orderBy('created_at', 'desc')->get();

        if($pricing){
            return response()->json($pricing, 200);
        }else{
            return response()->json(['error' => 'Error'], 404);
        }
    }

    /**
     * Display only 1 specific resource.
     *
     * @param  \App\PricingDay  $pricingDay
     * @return \Illuminate\Http\Response
     */
    public function findAccount(String $id)
    {

        $pricing = PricingDay::find($id);

        if($pricing){
            return response()->json($pricing, 200);
        }else{
            return response()->json(['error' => 'Error tasa no existe'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PricingDay  $pricingDay
     * @return \Illuminate\Http\Response
     */
    public function edit(String $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PricingDay  $pricingDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update_pricing = PricingDay::find($request->id)->update($request->all());

        if($update_pricing){
            return response()->json(['message' => 'Actualizado'], 200);
        }else{
            return response()->json(['error' => 'Error al guardar'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PricingDay  $pricingDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        $pricing = PricingDay::findOrFail($id);

        $pricing->delete();

        if($pricing->delete()){
            return response()->json(['message' => 'Eliminado'], 200);
        }else{
            return response()->json(['error' => 'Error al eliminar'], 404);
        }
    }
}

