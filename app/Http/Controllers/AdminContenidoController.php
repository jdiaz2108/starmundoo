<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contenido;
use App\Subcategoria;
use Alert;

class AdminContenidoController extends Controller
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
        $contenidos = Contenido::all();
        return view('admin.contenido.listar', compact('contenidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategorias = Subcategoria::pluck('nombre', 'id');
        return view('admin.contenido.create', compact('subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nombre' => 'unique:contenidos',
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $contenido = new Contenido();

        $contenido->fill($request->except('imagen'));

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/contenidos/', $name);
            $contenido->imagen = $name;
        }

        if($request->input('nombre')) {
        $var = str_replace(" ", "_", $request->input('nombre'));
        $contenido->slug = $var;
        }

        $contenido->save();

        alert()->autoclose(3000)->success('Se ha Creado el elemento con exito!', 'Creado');
        return redirect('/admin/contenidos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contenido $contenido)
    {
        $subcategorias = Subcategoria::pluck('nombre', 'id');
        return view('admin.contenido.edit', compact('contenido', 'subcategorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contenido $contenido)
    {

        $contenido->fill($request->except('imagen'));

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/contenidos/', $name);
            $contenido->imagen = $name;
        }

        if($request->input('nombre')) {
        $var = str_replace(" ", "_", $request->input('nombre'));
        $contenido->slug = $var;
        }

        $contenido->save();

        alert()->autoclose(3000)->success('Se ha Editado el elemento con exito!', 'Editado');
        return redirect('/admin/contenidos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contenido $contenido)
    {
        $file_path = public_path().'/imagenes/contenidos/'.$contenido->imagen;
        \File::delete($file_path);
        $contenido->delete();
        alert()->autoclose(3000)->success('Se ha eliminado el elemento con exito!', 'Eliminado');
        return redirect('/admin/contenidos');
    }
}
