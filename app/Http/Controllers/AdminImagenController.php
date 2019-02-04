<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;

class AdminImagenController extends Controller
{
    public function __construct(){
    $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Imagen::all();
        return view('admin.imagenes.listar', compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.imagenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = new Imagen();

        $imagen->fill($request->except('imagen'));

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/', $name);
            $imagen->imagen = $name;
        }

        $imagen->save();

        alert()->autoclose(3000)->success('Se ha Creado el elemento con exito!', 'Creado');
        return redirect('/admin/imagenes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Imagen $imagen)
    {
        return $imagen
        return view('admin.imagenes.edit', compact('imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        $imagen->fill($request->except('imagen'));

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/', $name);
            $imagen->imagen = $name;
        }

        $imagen->save();

        alert()->autoclose(3000)->success('Se ha Creado el elemento con exito!', 'Creado');
        return redirect('/admin/imagenes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagen $imagen)
    {
        $file_path = public_path().'/imagenes/'.$imagen->imagen;
        \File::delete($file_path);
        $imagen->delete();
        alert()->autoclose(3000)->success('Se ha eliminado el elemento con exito!', 'Eliminado');
        return redirect('/admin/imagenes');
    }
}
