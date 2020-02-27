<?php

namespace App\Http\Controllers;

use App\Actors;
use Illuminate\Http\Request;

class ActorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Actors::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actor = new Actors();
        $actor->nombre = $request->nombre;
        //$actor->proyect_id = $request->proyect_id;
        $actor->descripcion = $request->descripcion;
        $actor->save();
        return $actor;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actors  $actors
     * @return \Illuminate\Http\Response
     */
    public function show(Actors $actors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actors  $actors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actor = Actors::find($id);
        if($actor != null){
            $actor->descripcion = $request->descripcion;
            $actor->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actors  $actors
     * @return \Illuminate\Http\Response
     */
    public function destroy($actors)
    {
        $actor = Actors::find($actors);
        if($actor != null){
            $actor->delete();
        }
    }
}
