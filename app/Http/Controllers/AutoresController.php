<?php

namespace App\Http\Controllers;

use App\Models\Autores;
use Illuminate\Http\Request;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['autores']= Autores::paginate(5);
        
        return view('autores.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
            return view('autores.create');
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // $datosAutores = request()->all();
        $datosAutores = request()->except('_token');
        Autores::insert($datosAutores);

        //return response()->json($datosAutores);

        return redirect('autores')->with('mensaje','Autor agregado con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Autores $autores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $autores=Autores::findOrFail($id);

        return view('autores.edit',compact('autores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosAutores = request()->except(['_token','_method']);
        Autores::where('id','=', $id)->update($datosAutores);

        $autores=Autores::findOrFail($id);
        return view('autores.edit',compact('autores'));




        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Autores::destroy($id);
        return redirect('autores');
    }
}
