<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategoria;
use App\Categoria;

class AdminSubcategoriaController extends Controller
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
        $subcategorias = Subcategoria::all();
        return view('admin.subcategorias.listar', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::pluck('nombre', 'id');
        return view('admin.subcategorias.create', compact('categorias'));
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
            'nombre' => 'unique:subcategorias',
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $subcategoria = new Subcategoria();

        $subcategoria->fill($request->except('imagen'));

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/subcategorias/', $name);
            $subcategoria->imagen = $name;
        }

        if($request->input('nombre')) {
        $var = str_replace(" ", "_", $request->input('nombre'));
        $subcategoria->slug = $var;
        }

        $subcategoria->save();

        alert()->autoclose(3000)->success('Se ha Creado el elemento con exito!', 'Creado');
        return redirect('/admin/subcategorias');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategoria $subcategoria)
    {
        $categorias = Categoria::pluck('nombre', 'id');
        return view('admin.subcategorias.edit', compact('subcategoria', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategoria $subcategoria)
    {
        $subcategoria->fill($request->except('imagen'));

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/subcategorias/', $name);
            $subcategoria->imagen = $name;
        }

        if($request->input('nombre')) {
        $var = str_replace(" ", "_", $request->input('nombre'));
        $subcategoria->slug = $var;
        }

        $subcategoria->save();

        alert()->autoclose(3000)->success('Se ha Editado el elemento con exito!', 'Editado');
        return redirect('/admin/subcategorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategoria $subcategoria)
    {
        $file_path = public_path().'/imagenes/subcategorias/'.$subcategoria->imagen;
        \File::delete($file_path);
        $subcategoria->delete();
        alert()->autoclose(3000)->success('Se ha eliminado el elemento con exito!', 'Eliminado');
        return redirect('/admin/subcategorias');
    }
}
